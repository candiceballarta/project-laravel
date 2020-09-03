@extends('layouts.app')
@section('content')
<div>
    @foreach($movies as $movie)
    <div class="div-col-md-3">
        <div class="text-center">
            <a href="{{route('movies.show',$movie->id)}}">
                <img src="{{$movie->img}}" alt="mov-poster">
                <h5>{{$movie->title}}</h5>
                <h1>{{ $movie->year }}</h1>
            </a>
        </div>
    </div>
    @endforeach
</div>