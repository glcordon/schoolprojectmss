
    <div class="card" style="text-align:left;max-width: 22rem; min-width:18rem; margin-bottom:20px;">
    <img class="card-img" src="{{ Storage::url($event->image) ?? asset('img/baseball-field.jpg') }}" alt="Card image cap" >
        <div class="card-body">
            
            <h4 class="card-title">{{$event->title}}</h4>
            <p class="card-text">{{date_format($event->start_date, 'm/d/Y H:i')}} - {{date_format($event->end_date, 'm/d/Y H:i')}} </p>
        </div>  
        <div class="card-footer">
            <a href="/view-event/{{ $event->id }}" class="card-link"><small><em>Ticket Price: from $</em></small> </a>
            <a href="/view-event/{{ $event->id }}" class="card-link btn btn-sm btn-success pull-right">Buy Now</a>
        </div>
    </div>  