@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h2>Meals</h2>
                    <form action="{{route('m_index')}}" method="get">
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                            </div>
                                            <div class="col-6">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                {{-- <div class="input-group mb-3">
                                                    <input type="text" name="s" class="form-control" value="{{$s}}">
                                                    <button type="submit" class="input-group-text">Search</button>
                                                </div> --}}
                                            </div>
                                            {{-- <div class="col-2">
                                                <a href="{{route('m_index')}}" class="btn btn-secondary">Reset</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($meals as $meal)
                        <li class="list-group-item">
                            <div class="movies-list">
                                <div class="content">
                                    @if($meal->getPhotos()->count())
                                    {{-- <h5><a href="{{$meal->lastImageUrl()}}"><img src="{{$meal->lastImageUrl()}}" alt="pic" width="60" height="50" target="_BLANK">Photos: [{{$meal->getPhotos()->count()}}]</a></h5> --}}
                                    <h5><a href="{{$meal->lastImageUrl()}}"><img src="{{$meal->lastImageUrl()}}" alt="pic" width="60" height="50" target="_BLANK"></a></h5>
                                    @endif
                                    <h2><span>Title: </span>{{$meal->title}}</h2>  
                                    <h4><span>Price: </span>{{$meal->price}}</h4>
                                    <h5>
                                        <span>Restaurant: </span>
                                        <a href="{{route('r_show', $meal->getRestaurant->id)}}">
                                            {{$meal->getRestaurant->title}}
                                        </a>
                                    </h5>
                                  
                                </div>
                                <div class="buttons">
                                    <a href="{{route('m_show', $meal)}}" class="btn btn-info">Show</a>
                                    @if(Auth::user()->role >= 10)
                                    <a href="{{route('m_edit', $meal)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('m_delete', $meal)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No meals found</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{-- {{ $meals->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection