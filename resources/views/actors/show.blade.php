@extends('layouts.app')
@section('content')
@include('actors/style')
@foreach($actors as $actor)

<div class="bg-container">
    <div class="container">
        <div class="bg-warning" style="height: 200px;"></div>
        <div class="card mb-3 bg-dark" style="width: 200;">
            <div class="text-center py-5">
                <img src="/storage/actor_images/{{ $actor->actor_image }}" class="avatar img-lg rounded-circle mb-4" width="200" height="200">
                <div class="col-md-8 col-lg-6 col-xl-5 p-0 mx-auto">
                    <h2 class="font-weight-bold my-4 text-white">{{ $actor->fname." ".$actor->lname }}</h2>
                    <div class="text-muted mb-4">
                        <h4>{{'"'.$actor->notes.'"' }}</h4>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="card-deck col-md-3">
                        <div class="card mb-4 box-shadow bg-secondary" style="width: 220px;">
                            @foreach ($actor->movies as $movie)
                                <img class="card-img-top" src="/storage/movie_images/{{ $movie->movie_image }}" alt="movie-poster" width="70" height="250"></a>
                            @endforeach
                            <div class="card-body">
                                @foreach ($actor->movies as $movie)
                                    <h5 class="card-title font-weight-bold" style="color: #FF2340">{{$movie->title}}</h5> 
                                @endforeach
                                @foreach ($actor->roles as $role)
                                    <p class="card-text">{{ $role->role_name}}</p>
                                @endforeach
                                @foreach ($actor->movies as $movie)
                                    <small>{{$movie->year}}</small><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endforeach        
    </div>
</div>

@endsection
