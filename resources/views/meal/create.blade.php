@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>New Meal</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('m_store')}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="text" name="price" class="form-control" value="{{old('price')}}">
                        </div>
                        <select name="restaurant_id" class="form-select mt-3">
                            <option value="0">Choose restaurant</option>
                            @foreach($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}" @if($restaurant->id == old('restaurant_id')) selected @endif>{{$restaurant->title}}</option>
                            @endforeach
                        </select>
                        <div data-clone class="input-group mt-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo[]" multiple class="form-control">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection