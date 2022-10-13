@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Meal</h2>
                </div>
                <div class="card-body">
                    <div class="movie-show">
                        <div class="line"><small>Title:</small>
                            <h5>{{$meal->title}}</h5>
                        </div>
                        <div class="line"><small>Price:</small>
                            <h5>{{$meal->price}}</h5>
                        </div>
                        <div class="line"><small>Restaurant:</small>
                            <h5>{{$meal->getRestaurant->title}}</h5>
                        </div>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @forelse($meal->getPhotos as $photo)
                                <div class="swiper-slide">
                                    <div class="img">
                                        <img src="{{$photo->url}}">
                                    </div>
                                </div>
                                @empty
                                <h2>No photos available</h2>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
