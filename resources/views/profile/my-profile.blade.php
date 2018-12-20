@extends('layouts.profile')

@section('content')

   <section class="row" style="margin-top:40px">
       <div class="col-md-3">
          <div class="card" style="margin-top:-80px">
              <img class="card-img-top" src="{{ Storage::disk('public')->url($myProfile->profile_img) ?? 'https://html.crumina.net/html-olympus/img/author-main1.jpg' }}">
              <div class="card-block">
                  <h4 class="card-title">{{ $myProfile->users->name ?? 'My Name' }}</h4>
                  <div class="meta">
                      <a href="#">Followers</a>
                  </div>
                  <div class="card-text">
                    {{ $myProfile->tag_line ?? 'Your Tagline Goes Here' }}
                  </div>
              </div>
              <div class="card-footer">
                  <span class="float-right">Joined in 2013</span>
                  <span><i class=""></i>{{ $myProfile->followers ?? '0' }} Mentees</span>
              </div>
          </div>
          <br>
            <div class="card">
                  <div class="card-header card-title">
                    About Me:
                  </div>
                  <div class="card-body">
                    <blockquote class="card-text">
                      <p>My Sports:</p>
                      <p>Last Update</p>
                      <footer class="blockquote-footer">Company or Personal Tag Line</footer>
                    </blockquote>
                  </div>
              </div>
       </div>
       <div class="col-md-8">
         <div class="row">
           <div class="col-md-3"><i class="fa fa-video"></i> | <i class="fas fa-plus-square"></i></div>
         </div>
         
            <div class="card">
                    <div class="card-header card-title">
                      {{ $myProfile->article->title ?? 'Article Title Here'  }}
                    </div>
                    <div class="card-body">
                      <blockquote class="card-text">
                        <p>Date of Birth</p>
                      </blockquote>
                    </div>
                  </div>
       </div>
   </section>
@endsection
