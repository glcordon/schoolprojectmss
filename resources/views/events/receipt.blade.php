@extends('layouts.generic')

@section('content')
<br>
<div class="content">
  <div class="row">
    <div class="col-md-8">
      <h3>Event Title: {{ $event->title}}</h3>{{date_format($event->start_date, 'M d, Y H:i')}} - {{date_format($event->end_date, 'M d, Y H:i')}}
      <br><br>
      <div class="card">
          <h5 class="card-header">Overview</h5>
          <div class="card-body">
            <p class="card-text">{{ $event->description }}</p>
            <h3>Venue Information</h3>
      <p>{{$event->venu_name}} </p>
      <p>{{$event->street}} </p>
      <p>{{$event->state}}, {{$event->zip}} </p>
      <p></p>
          </div>
        </div>
      
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-sm-12" data-turbolinks="true">
                <div class="card " id="form-selector">
            <div class="card-header">
                <div class="row text-center mt-3">
                    <div class="col-sm-12">
                        <a href="">
                            <img src="https://ui-avatars.com/api/?size=256&amp;background=9C27B0&amp;color=fff&amp;name={{$user}}" style="width: 90px; position: absolute; top: 5px; left: 0px; right: 0; margin-left: auto;  margin-right: auto; " class="img-fluid img-thumbnail rounded-circle">
                        </a>
                        <br>
                        <br>
                    </div>
                </div>
        
            </div>
                <div class="card-body">
        
                    <div class="col-sm-12 text-center">
                        <h3 class="mb-0 mt-5 h6 truncate">
                         Thank You {{$name}}, for Your Purchase
                        </h3>
                        <p><small><em>{{$email}}</em></small></p>
                        {{--  <p class="mt-0 mb-0">Suffolk, US</p>  --}}
                    </div>
                    <div class="row mt-3 mb-3">
        
                        <div class="col-sm-12 mx-auto text-center">
        
                            <p class="small mb-3 text-muted"><i class="mdi mdi-clock"></i> Posted {{ $date }}</p>
                                                {{--  <h3 class="mb-3 h2">£100.25 <i class="widget-indicator fa fa-circle-o-notch p-1 fa-spin float-right" style="display:none"></i></h3>  --}}
                            <h3 class="text-muted">Tickets</h3>
                            @if(count($ticket))
                                @foreach ($ticket as $tick )
                                <p>{{$tick->title}} - ${{$tick->price}}
                                    <select name="$tick->id" id="">
                                        @for ($i = 0; $i <= ($tick->quantity_available - $tick->quantity_sold); $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </p>
                                @endforeach
                            @else
                            No Tickets Available
                            @endif
                            
                            
                        </div>
        
                    </div>
        
                </div>
        
                <div class="card-footer bg-whites ">
                    Back 
                </div>
        </div>
        

          

          {{-- <p><button class="btn btn-primary">Purchase $</button></p> --}}
          


    </div>
  </div>
</div>


@if(Auth::id() == $event->user_id)
<a href="https://connect.stripe.com/express/oauth/authorize?redirect_uri=http://localhost:8000&client_id=ca_DvC9zEGyWxdAhCspTWfmf2hBo7GX78LR&state=new"> connect</a>

Edit Event <br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddTicketModal">
  Add A Ticket
</button>

<!-- Modal -->
<div class="modal fade" id="AddTicketModal" tabindex="-1" role="dialog" aria-labelledby="AddTicketModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddTicketModalTitle">Add New Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/add-ticket" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $event->id }}">
        Title: 
        <input type="text" name="ticket_title" placeholder="Ticket Title" class="form-control">
        Qty: <input type="number" name="ticket_qty" class="form-control" placeholder="0">
        Price: 
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control" name="price" aria-label="Amount">
              </div>
        <input type="submit" class="btn btn-primary" value="Add">
        </form>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
@endif

@endsection

