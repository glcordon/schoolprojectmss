<?php
    namespace App\Http\Controllers;
    
    use App\Course;
    use App\Lessons;
    use App\Site;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Gate;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Admin\StoreCoursesRequest;
    use App\Http\Requests\Admin\UpdateCoursesRequest;
    use \Cohensive\Embed\Facades\Embed;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Validator;


    
    class CoursesController extends Controller
    {
        /**
         * Display a listing of Course.
         *
         * @return \Illuminate\Http\Response
         */
        protected $user;
        public function __construct()
        {
            $this->middleware('auth');
        }
        public function index()
        {
            // if (! Gate::allows('course_access')) {
            //     return abort(401);
            // }
            // if (request('show_deleted') == 1) {
            //     if (! Gate::allows('course_delete')) {
            //         return abort(401);
            //     }
            //     $courses = Course::onlyTrashed()->get();
            // } else {
            //     $courses = Course::all();
            // }
            $siteId = Session::get('tenant')->id;
            $siteData = Site::find($siteId);
            $course = Course::where('site_id', $siteId)->where('course_title', '<>', '')->get();
            $courses = collect($course->toArray())->map(function($item){
                $embed = Embed::make($item['course_intro_video'])->parseUrl();
                $url = '';
                if($embed)
                {
                    $url = $embed->getProvider()->info->id;
                }
                return [
                    'id' => $item['id'],
                    'course_title' => $item['course_title'],
                    'course_difficulty' => $item['course_difficulty'],
                    'category' => $item['category'],
                    'course_description' => $item['course_description'],
                    'course_intro_video' => $item['course_intro_video'],
                    'course_video_thumb' => $item['course_video_thumb'],
                    'course_image' => $item['course_image'] ?? null,
                    'site_id' => $item['site_id'],
                    'embed_url' => $item['embed_url'],
                    'url_token' =>  $url,
                ];
            });
            $categories = collect([['id'=> 1, 'name' => 'Sport'], ['id'=> 2, 'name' =>'Training'], ['id'=>3, 'name' =>'Drills']]);
            return view('courses.index', compact('courses', 'categories', 'siteData'));
        }
    
        /**
         * Show the form for creating new Course.
         *
         * @return \Illuminate\Http\Response
         */
        public function create(){
            $course = new Course;
            $course->course_title = '';
            $course->course_image = '';
            $course->created_by = Auth::user()->id;
            $course->save();
            $categories = collect([['id'=> 1, 'name' => 'Sport'], ['id'=> 2, 'name' =>'Training'], ['id'=>3, 'name' =>'Drills']]);
            return redirect('/courses/'.$course->id.'/create');
        }
    
        /**
         * Store a newly created Course in storage.
         *
         * @param  \App\Http\Requests\StoreCoursesRequest  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            if (! Gate::allows('course_create')) {
                return abort(401);
            }
            $course = Course::create($request->all());
    
            foreach ($request->input('lessons', []) as $data) {
                $course->lessons()->create($data);
            }
    
    
            return redirect()->route('courses.index');
        }
    
    
        /**
         * Show the form for editing Course.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $course = Course::findOrFail($id);
            $categories = collect([['id'=> 1, 'name' => 'Sport'], ['id'=> 2, 'name' =>'Training'], ['id'=>3, 'name' =>'Drills']]);
            
            $lessons= $course->lessons;
            return view('courses.create', compact('course','categories'));
            
            if (! Gate::allows('course_edit')) {
                return abort(401);
            }
            
        }
    
        /**
         * Update Course in storage.
         *
         * @param  \App\Http\Requests\UpdateCoursesRequest  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            // if (! Gate::allows('course_edit')) {
            //     return abort(401);
            // }
            dd($request->all());
            $validator = Validator::make($request->all(),([
                'course_title' => 'required',
                'course_difficulty' => 'required',
                'category' => 'required',
                'course_description' => 'required',
                'course_intro_video' => '',
                'course_video_thumb' => '',
                'course_image' => 'required',
            ]));
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
            $lessons = collect($request->lesson);
            
            $lessonArray = $lessons->map(function($item, $key) use($request){
                return [
                    'id' => $request->lesson_id[$key]?? '',
                    'lesson_title' => $item, 
                    'lesson_description' => $request->lesson_description[$key],
                    'lesson_video' => $request->lesson_video[$key],
                    'lesson_video_upload' => $request->lesson_video_upload[$key]
                ];
            });
            $course = Course::findOrFail($id);
            if($request->course_intro_thumb){
               $fileName = str_slug($request->course_title."_".\Carbon\Carbon::now()).".".$request->course_intro_thumb->getClientOriginalExtension();
                $course->course_image = $request->course_intro_thumb->storeAs('course_images', $fileName, 'public');
            }
            $course->course_title = $request->course_title;
            $embedId = '';
            $embed = Embed::make($request->course_intro_video)->parseUrl();
            if ($embed) {
                $embed->setAttribute(['width' => 600]);
                $embedId = $embed->getProvider()->info->id;
                $embedUrl = $embed->getProvider()->info->url;
                $embedImage = $embed->getProvider()->info->imageRoot."/0.jpg";
                // Print html: '<iframe width="600" height="338" src="//www.youtube.com/embed/uifYHNyH-jA" frameborder="0" allowfullscreen></iframe>'.
                // Height will be set automatically based on provider width/height ratio.
                // Height could be set explicitly via setAttr() method.
                // echo $embed; 
                $course->course_intro_video = $embedUrl;
                $course->embed_url = $embed->getHtml();
            }
            // dd($path = Storage::disk('local')->path($fileName));
            // $course->addMedia(Storage::disk('public')->path($course->course_image))
            // ->toMediaCollection();
            $course->created_by = Auth::user()->id;
            $course->course_video_thumb = $embedImage ?? null;
            $course->course_description = $request->course_description;
            $course->category = $request->category;
            if(Session::get('tenant') && Session::get('tenant')->id)
            {
                $course->site_id = Session::get('tenant')->id;
            }
            $course->course_difficulty = $request->course_difficulty;
            $course->save();
            foreach ($lessonArray as $key => $la){
                if($la['id'] == "")
                {
                    $lesson = new Lessons;
                }else{
                    $lesson = Lessons::find($la['id']);
                }
                $embed1 = Embed::make($la['lesson_video'])->parseUrl();
                $lesson->embed_url = $embed1->getProvider()->info->url;
                $lesson->lesson_title = $la['lesson_title'];
                $lesson->lesson_video = $embed1->gethtml();
                $lesson->lesson_description = $la['lesson_description'];
                $course->lessons()->save($lesson);
            }
            $lessons= $course->lessons;
    
            $categories = collect([['id'=> 1, 'name' => 'Sport'], ['id'=> 2, 'name' =>'Training'], ['id'=>3, 'name' =>'Drills']]);
            return redirect()->back()->withInput();
            return redirect()->route('courses.index');
        }
    
    
        /**
         * Display Course.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            // if (! Gate::allows('course_view')) {
            //     return abort(401);
            // }
            // $lessons = \App\Lesson::where('lesson_id', $id)->get();
    
            $course = Course::findOrFail($id);
    
            return view('courses.show', compact('course'));
        }
    
    
        /**
         * Remove Course from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            // if (! Gate::allows('course_delete')) {
            //     return abort(401);
            // }
            $course = Course::findOrFail($id);
            $course->delete();
    
            return redirect()->back();
        }
    
        /**
         * Delete all selected Course at once.
         *
         * @param Request $request
         */
        public function massDestroy(Request $request)
        {
            if (! Gate::allows('course_delete')) {
                return abort(401);
            }
            if ($request->input('ids')) {
                $entries = Course::whereIn('id', $request->input('ids'))->get();
    
                foreach ($entries as $entry) {
                    $entry->delete();
                }
            }
        }
    
    
        /**
         * Restore Course from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function restore($id)
        {
            if (! Gate::allows('course_delete')) {
                return abort(401);
            }
            $course = Course::onlyTrashed()->findOrFail($id);
            $course->restore();
    
            return redirect()->route('courses.index');
        }
    
        /**
         * Permanently delete Course from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function perma_del($id)
        {
            if (! Gate::allows('course_delete')) {
                return abort(401);
            }
            $course = Course::onlyTrashed()->findOrFail($id);
            $course->forceDelete();
    
            return redirect()->route('courses.index');
        }
    }
    
                    
    