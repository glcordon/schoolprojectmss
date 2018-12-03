@extends('layouts.generic')

@section('content')
<br>
<div class="content">
  <div class="row">

        <div class="card-deck">
           
            @foreach ($search as $event )
                @include('partials.event-card')
            @endforeach
        </div>
    
  </div>
</div>

@endsection

