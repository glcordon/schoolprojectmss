<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Profile as MyProfile;
use App\Http\Helpers\Upload;
use Avatar;

use App\User;

class ProfileController extends Controller
{
    // public function getAuthUser ()
    // {
    //     return Auth::user();
    // }

    public function updateAuthUser (Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.Auth::id()
        ]);

        $user = User::find(Auth::id());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $avatar = Avatar::create($user->name)->getImageObject()->encode('png');
        Storage::put('avatars/'.$user->id.'/avatar.png', (string) $avatar);

        return $user;
    }

    public function updatePasswordAuthUser(Request $request)
    {
        $this->validate($request, [
            'current' => 'required|string',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string'
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->current, $user->password)) {
            return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }

    public function uploadAvatarAuthUser(Request $request)
    {
        $upload = new Upload();
        $avatar = $upload->upload($request->file, 'avatars/'.Auth::id())->resize(200, 200)->getData();

        $user = User::find(Auth::id());
        $user->avatar = $avatar['basename'];
        $user->save();

        return $user;
    }

    public function removeAvatarAuthUser()
    {
        $user = User::find(Auth::id());
        $user->avatar = 'avatar.png';
        $user->save();

        return $user;
    }
    public function myProfile()
    {
        return view('profile.my-profile');
    }

    public function viewPublicProfile($id)
    {
        $profile = \App\Profile::find($id);
        return view('profile.my-profile', compact('profile'));
    }

    public function storeMyProfile(Request $request){
        
        $myProfile = MyProfile::where('user_id', $request->user_id)->first();
        if($myProfile){
            $myProfile->cover_img = $request->file('cover_img')->store(
                'covers/'.$request->user()->id, 'public'
            );
            $myProfile->save();
            return($myProfile);
           return $myProfile->update($request->except('_token'));
        }
        return MyProfile::create($request->all());
    }
    public function createMyProfile(){
        $user = Auth::user();
        $myProfile = MyProfile::where('user_id', Auth::user()->id)->first();
        return view('profile.create-profile', compact('user', 'myProfile'));
    }
}
