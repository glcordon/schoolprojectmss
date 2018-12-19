@extends('layouts.profile')

@section('content')

   <section class="row" style="margin-top:40px">
       <div class="col-md-12">
            
           <form role="form" action="/store-profile" autocomplete="off" method="POST" enctype="multipart/form-data">
            {{ @csrf_field() }}
            <input type="text" name="user_id" value="{{ Auth::user()->id}}">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Avatar/Profile Picture</label>
                        <input type="file" name="profile_img" id="profile_img" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Cover Photo</label>
                        <input type="file" name="cover_img" id="cover_img" class="form-control">
                    </div>
                    {{--  <div class="form-group">
                    <input type="text" value="" data-role="tagsinput" class="form-control" placeholder="My Name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="my_email" required placeholder="My Email">
                </div>  --}}
                <div class="form-group"><label for="">About Me</label>
                <textarea name="bio" class="form-control">{{ $user->profile->bio ?? '' }}</textarea>
                </div>
            </div>
            <div class="col-md-5">
                    <div class="image-placeholder col-md-12">
                            <h4>image placeholder text</h4>
                        </div>
            </div>
            </div>
            
            
            <div class="form-group">
                    <label for="">Facebook <span class="fa fa-facebook"></label>
                    <input type="text" name="fb" class="form-control" placeholder="Facebook">
            </div>
            <div class="form-group">
                    <label for="">Twitter <span class="fa fa-twitter"></label>
                    <input type="text" name="twitter" class="form-control" placeholder="Twitter">
            </div>
            <div class="form-group">
                    <label for="">Instagram <span class="fa fa-instagram"></label>
                    <input type="text" name="instagram" class="form-control" placeholder="Instagram">
            </div>
                  <input type="submit" value="Make It Happen">      
        </form>
       </div>
       
    </section>
    
@endsection
