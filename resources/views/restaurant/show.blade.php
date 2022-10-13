@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Restaurant</h2>
                </div>
                <div class='card-body'>
                    <div class="category">
                        <h5>{{$restaurant->title}}</h5>
                    </div>
                    <div class="category">
                        <h5>{{$restaurant->address}}</h5>
                    </div>

                </div>
            </div>
            <ul class="list-group">
                @forelse($restaurant->meals as $meal)
                <li class="list-group-item">
                    <div class="movies-list">
                        <div class="content">
                            <h2><span>Title: </span>{{$meal->title}}</h2>
                            <h4><span>Price: </span>{{$meal->price}}</h4>
                        </div>
                    </div>
                </li>
                
                @empty
                <li class="list-group-item">No restaurants found</li>
                @endforelse
                </ul>
                @if(Auth::user()->role >= 10)
                  <div class="buttons m-2">
                  <form action="{{route('r_delete_meals', $restaurant)}}" method="post">
                  @csrf
                  @method('delete')
                     <button type="submit" class="btn btn-danger">Delete all restaurants</button>
                </form>
                @endif
                </div>
            
        </div>
    </div>
</div>
@endsection
