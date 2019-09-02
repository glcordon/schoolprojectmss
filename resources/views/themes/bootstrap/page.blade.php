@extends('theme::layouts.app')

@section('content')


    <div class="uk-container uk-container-small uk-margin-medium-top">
        <article id="page-{{ $page->id }}" class="uk-article post-{{ $page->id }} uk-text-center uk-margin-large-bottom">
            
            <meta property="name" content="{{ $page->title }}">
            <meta property="author" typeof="Person" content="admin">
            <meta property="dateModified" content="{{ Carbon\Carbon::parse($page->updated_at)->toIso8601String() }}">
            <meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($page->created_at)->toIso8601String() }}">

            <div class="uk-margin-medium-bottom uk-text-left uk-margin-large-top">    
                <h1 class="uk-heading-line uk-margin-remove-top uk-text-center"><span>{{ $page->title }}</span></h1>      
            </div>

            @if(!is_null($page->image))
                <div class="uk-margin-bottom">
                    <img width="1200" height="640" src="{{ $page->image() }}" alt="{{ $page->title }}" srcset="{{ $page->image() }}">
                </div>
            @endif
            
            <div class=" uk-text-left">
                
                {!! $page->body !!}
                
            </div>
            
        </article>
    </div>

@endsection