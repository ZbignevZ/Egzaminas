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
                    <form action="{{route('m_update', $meal)}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input type="text" name="title" class="form-control" value="{{old('title', $meal->title)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="text" name="price" class="form-control" value="{{old('price', $meal->price)}}">
                        </div>
                        <select name="restaurant_id" class="form-select mt-3">
                            <option value="0">Change Restaurant</option>
                            @foreach($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}" @if($restaurant->id == old('restaurant_id', $meal->restaurant_id)) selected @endif>{{$restaurant->title}}</option>
                            @endforeach
                        </select>
                           <div class="input-group mt-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo[]" multiple class="form-control">
                        </div>
                        <div class="img-small-ch mt-3">
                            @forelse($meal->getPhotos as $photo)
                            <div class="img">
                                <label class="form-check-label" for="{{$photo->id}}-del-photo">x</label>
                                <input class="form-check-input" type="checkbox" value="{{$photo->id}}" id="{{$photo->id}}-del-photo" name="delete_photo[]">
                                <img src="{{$photo->url}}">
                            </div>
                            @empty
                            <h2>No photos yet.</h2>
                            @endforelse
                        </div>
                    
                        
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
