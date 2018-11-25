@extends('layouts.generic')

@section('content')
<br>
<h3>Event Title: {{ $event->title}}</h3>{{ $event->start_date}} - {{ $event->end_date}}
<p> </p><p>{{ $event->description }}</p>

<h3>Venue Information</h3>
<p>{{$event->venu_name}} </p>
<p>{{$event->street}} </p>
<p>{{$event->state}}, {{$event->zip}} </p>
<p></p>
<h3>Tickets</h3>
@foreach ($ticket as $tick )
<p>{{$tick->title}} - ${{$tick->price}}
    <select name="$tick->id" id="">
        @for ($i = 0; $i <= ($tick->quantity_available - $tick->quantity_sold); $i++)
            <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>
</p>
@endforeach

{{-- <p><button class="btn btn-primary">Purchase $</button></p> --}}
<form action="/make-payment" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{$event->user_id}}">
<script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_Dx3GM5FEhPWgCx6CvstMnJBQ"
    data-amount="1000"
    data-name="{{ $event->title}} Tickets"
    data-description="MSS Tickets."
    {{--  data-image="url({{ asset('img/icon.jpg') }})"  --}}
    data-locale="auto">
</script>
</form>

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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endif

@endsection

