<form method="POST" action="/create-event" accept-charset="UTF-8" enctype="multipart/form-data" class="ajax gf"><input name="_token" type="hidden" value="{{ csrf_token()}}">
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
                                            @for ($i = 1 ; $i <= 12 ; $i++)
                                                <option value= "{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                    <select name="start_minute" id="start_minute">
                                            <option value="">min</option>
                                            <option value="00">00</option>
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>
                                    </select>
                                    <select name="start_am_pm" id="am_pm">
                                            <option value="12">PM</option>
                                            <option value="00">AM</option>
                                    </select>
                                                        
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="end_date" class="required control-label ">Event End Date</label>

                                    <input class="form-control end hasDatepicker " data-field="datetime" data-startend="end" data-startendelem=".start" name="end_date" type="date" id="end_date">
                                    <select name="end_hour" id="end_hour">
                                            <option value="">Hr</option>
                                            @for ($i = 1 ; $i <= 12 ; $i++)
                                                <option value= "{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                    <select name="end_minute" id="end_minute">
                                            <option value="">min</option>
                                            <option value="">min</option>
                                            <option value="00">00</option>
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>
                                    </select>
                                    <select name="end_am_pm" id="end_am_pm">
                                            <option value="12">PM</option>
                                            <option value="00">AM</option>
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
                            <label for="event_type">Event Type</label>
                            <select name="event_type" id="event_type" class="form-control" required>
                                <option value=""></option>
                                <option value="Physical">Physical</option>
                                <option value="Online">Online</option>
                            </select>
                        </div>
                            <div class="modal-footer">
                <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
                <input class="btn btn-success" type="submit" value="Create Event">
            </div>
        </div>
    </div>
</div>
</div>
    </div></form>