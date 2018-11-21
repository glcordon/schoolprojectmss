@extends('layouts.generic')

@section('content')
<h1>Add Category</h1>
    <form action="/store-category" method="POST" enctype="multipart/form-data">
        {{ csrf_field()}}
        
        <input type="text" name="category_name" placeholder="Add Category Name" class="form-control"><br>
        <input type="file" name="image_url" id="" class="form-control"><br>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    <hr>
    <div class="card-deck">
        @foreach ($categories as $category )
        <div class="card" style="text-align:left;max-width: 22rem; min-width:18rem; margin-bottom:20px;">
                <img class="card-img" src="{{ Storage::url($category->image_url) }}" alt="Card image cap" >
                    <div class="card-body">
                        
                        <h4 class="card-title">{{$category->category_name}}</h4>
                    </div>  
                    <div class="card-footer">
                        <a href="/delete-event/{{$category->id}}" class="btn btn-sm btn-danger">x</a>
                    </div>
                </div>  
            
        @endforeach
    </div>
@endsection