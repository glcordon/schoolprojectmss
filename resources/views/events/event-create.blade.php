<form method="POST" action="/create-event" accept-charset="UTF-8" class="ajax gf"><input name="_token" type="hidden" value="{{ csrf_token()}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="control-label required">Event Title</label>
                            <input class="form-control" placeholder="E.g: Gary's International Conference" name="title" type="text" id="title">
                        </div>

                        <div class="form-group custom-theme">
                            <label for="description" class="control-label required">Event Description</label><br />
                            <textarea class="form-control  editable" rows="5" name="description" cols="50" id="description" ></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="start_date" class="required control-label">Event Start Date</label>
                                    <input type="date" class="form-control start hasDatepicker " data-field="datetime" data-startend="start" data-startendelem=".end"  name="start_date" type="text" id="start_date">
                                    <select name="start_hour" id="start_hour">
                                            <option value="">Hr</option>
                                            @for ($i = 1 ; $i <= 24 ; $i++)
                                                <option value= "{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                    <select name="start_minute" id="start_minute">
                                            <option value="">min</option>
                                            @for ($i = 0 ; $i <= 45; $i=$i+15)
                                                <option value= "{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                                
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="end_date" class="required control-label ">Event End Date</label>

                                    <input class="form-control end hasDatepicker " data-field="datetime" data-startend="end" data-startendelem=".start" name="end_date" type="date" id="end_date">
                                    <select name="end_hour" id="end_hour">
                                            <option value="">Hr</option>
                                            @for ($i = 1 ; $i <= 24 ; $i++)
                                                <option value= "{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                    <select name="end_minute" id="end_minute">
                                            <option value="">min</option>
                                            @for ($i = 0 ; $i <= 45; $i=$i+15)
                                                <option value= "{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select</option>
                                @foreach ($categories as $category )
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="event_image" class="control-label ">Event Image (Flyer or Graphic etc.)</label>
                            <div class="styledFile" id="input-event_image">
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file ">
                    Browse… <input name="event_image" type="file">
                </span>
            </span>
            <input type="text" class="form-control" readonly="">
            <span style="display: none;" class="input-group-btn btn-upload-file">
                <span class="btn btn-success ">
                    Upload
                </span>
            </span>
        </div>
    </div>

                        </div>
                        <div class="form-group address-automatic" style="display: none;">
                            <label for="name" class="control-label required ">Venue Name</label>
                            <input class="form-control geocomplete location_field" placeholder="E.g: The Crab Shack" name="venue_name_full" type="text" autocomplete="off">

                                    <!--These are populated with the Google places info-->
                            <div>
                                <input class="location_field" name="formatted_address" type="hidden" value="">
                                <input class="location_field" name="street_number" type="hidden" value="">
                                <input class="location_field" name="country" type="hidden" value="">
                                <input class="location_field" name="country_short" type="hidden" value="">
                                <input class="location_field" name="place_id" type="hidden" value="">
                                <input class="location_field" name="name" type="hidden" value="" id="name">
                                <input class="location_field" name="location" type="hidden" value="">
                                <input class="location_field" name="postal_code" type="hidden" value="">
                                <input class="location_field" name="route" type="hidden" value="">
                                <input class="location_field" name="lat" type="hidden" value="">
                                <input class="location_field" name="lng" type="hidden" value="">
                                <input class="location_field" name="administrative_area_level_1" type="hidden" value="">
                                <input class="location_field" name="sublocality" type="hidden" value="">
                                <input class="location_field" name="locality" type="hidden" value="">
                            </div>
                            <!-- /These are populated with the Google places info-->
                        </div>

                        <div class="address-manual" style="">
                            <h5>
                                Address Details
                            </h5>

                            <div class="form-group">
                                <label for="location_venue_name" class="control-label required ">Venue Name</label>
                                <input class="form-control location_field" placeholder="E.g: The Crab Shack" name="location_venue_name" type="text" id="location_venue_name">
                            </div>
                            <div class="form-group">
                                <label for="location_address_line_1" class="control-label">Address Line 1</label>
                                <input class="form-control location_field" placeholder="E.g: 45 Grafton St." name="location_address_line_1" type="text" id="location_address_line_1">
                            </div>
                            <div class="form-group">
                                <label for="location_address_line_2" class="control-label">Address Line 2</label>
                                <input class="form-control location_field" placeholder="E.g: Dublin." name="location_address_line_2" type="text" id="location_address_line_2">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location_state" class="control-label">City</label>
                                        <input class="form-control location_field" placeholder="E.g: Dublin." name="location_state" type="text" id="location_state">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location_post_code" class="control-label">Post Code</label>
                                        <input class="form-control location_field" placeholder="E.g: Dublin." name="location_post_code" type="text" id="location_post_code">
                                    </div>
                                </div>
                            </div>
                        </div>

                                                    <input name="organiser_id" type="hidden" value="{{Auth::id()}}">
                                            </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
                <input class="btn btn-success" type="submit" value="Create Event">
            </div>
        </div>
        
    </div></form>