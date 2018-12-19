@extends('layouts.generic')

@section('content')

<form action="" method="POST" class="form">
{{ @csrf_field() }}
    <div class="form-group">
        <label for="title">Event Title</label>
        <input type="text" class="title form-control" name="title" value="{{ $event->title ?? old('title') }}">
    </div>
    <div class="form-group">
        <label for="description" class="control-label required">Event Description</label><br />
        <textarea class="form-control  editable" rows="5" name="description" cols="50" id="description" >{{ $event->description ?? old('description') }}</textarea>
    </div>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" class="form-control start hasDatepicker " data-field="datetime" data-startend="start" data-startendelem=".end"  name="start_date" type="text" id="start_date">
                    <label for="start_date" class="required control-label">Event Start Date</label>
                </div>
                <div class="col-md-4">
                    <select name="start_hour" id="start_hour" class="form-control">
                        <option value=""></option>
                        @for ($i = 1 ; $i <= 24 ; $i++)
                            <option value= "{{ $i }}" {{ $event->start_hour == $i ? 'selected' : '' }}>{{ $i>12 ? $i-12 .' PM' : $i . ' AM' }}</option>
                        @endfor
                </select>
                <label for="">Hour</label>
                </div>
                <div class="col-md-4">
                <select name="start_minute" id="start_minute" class="form-control">
                        <option value="00">00</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                </select>
                <label for="">Minute</label>
                {{--  <select name="start_am_pm" id="am_pm">
                        <option value="12">PM</option>
                        <option value="00">AM</option>
                </select>  --}}
                 </div>                   
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="end_date" class="required control-label ">Event End Date</label>

                <input class="form-control end hasDatepicker " data-field="datetime" data-startend="end" data-startendelem=".start" name="end_date" type="date" id="end_date">
                <select name="end_hour" id="end_hour" class="form-control">
                        <option value=""></option>
                        @for ($i = 1 ; $i <= 24 ; $i++)
                            <option value= "{{ $i }}" {{ $event->start_hour == $i ? 'selected' : '' }}>{{ $i>12 ? $i-12 .' PM' : $i . ' AM' }}</option>
                        @endfor
                </select>
                <select name="end_minute" id="end_minute" class="form-control">
                        <option value="00">00</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                </select>
                
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="category" class="control-label">Category</label>
        <select name="category" id="category" class="form-control">
            <option value="">Select</option>
            @foreach ($categories as $category )
            <option value="{{ $category->id }}" {{ $event->category = $category->id  ? 'selected' : '' }}>{{$category->category_name}}</option>
                
            @endforeach
        </select>
    </div>
        <div class="row">
        <div class="col-md-6">
            <label for="event_type">Event Type</label>
                <select name="event_type" id="event_type" class="form-control" required>
                    <option value=""></option>
                    <option value="Physical" {{ $event->event_type == 'Physical' ? 'selected' : '' }}>Physical</option>
                    <option value="Online" {{ $event->event_type == 'Online' ? 'selected' : '' }}>Online</option>
                </select>
        </div>
        <div class="col-md-6">
            <label for="Event Privacy">Event Privacy</label>
            <select name="event_visibility" id="event_visibility" class="form-control" required>
                <option value=""></option>
                <option value="public" {{ $event->event_visibility == 'public' ? 'selected' : '' }}>Public</option>
                <option value="private" {{ $event->event_visibility == 'private' ? 'selected' : '' }}>Private</option>
                <option value="subscribers" {{ $event->event_visibility == 'subscribers' ? 'selected' : '' }}>Subscribers Only</option>
                
            </select>
        </div>
        </div>
        <br />
        <div class="row {{ $event->event_type !=='Online' ? 'hidden' : '' }}" id="online" >
            <div class="col-md-12">
                <div class="form-group">
                    <label for="url">Url to Website Link</label>
                    <input type="text" name="url" class="form-control" placeholder="http://">
                </div>
            </div>
        </div>
        <div class="row {{ $event->event_type !=='Physical' ? 'hidden' : '' }}" id="physical" >
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="url">Address</label>
                        <input type="text" name="venue" class="form-control" value="{{ $event->venue ?? '' }}" placeholder="Venue Name">
                        <input type="text" name="street" class="form-control" value="{{ $event->venue ?? '' }}" placeholder="Street Address">
                        <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="city" id="city" class="form-control" placeholder="City">
                                </div>
                                <div class="col-md-4">
                                        <input type="text" name="state" id="state" class="form-control" placeholder="State">
                                </div>
                                <div class="col-md-4">
                                        <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $('#event_type').on('change', function(){
            var online = $(this).children("option:selected").val();
           if(online == 'Online')
           {
            $('#physical').fadeOut();
            $('#online').fadeIn();
           }
           else
           {
               $('#physical').fadeIn();
               $('#online').fadeOut();
           }
            
        });
    });
</script>
@endsection

