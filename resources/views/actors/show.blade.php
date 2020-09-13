@extends('layouts.app')
@section('content')
{{-- <h1>{{$actors->fname}}</h1>
<h1>{{$actors->lname}}</h1> --}}
<div class="table-responsive">
    <table class="table table-striped table-hover text-white">
        <thead>
            <tr>
                <th>Actor ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actors as $actor)
            <tr>
                <td>{{$actor->actor_id}}</td>
                <td>{{$actor->fname}}</td>
                <td>{{$actor->lname}}</td>
                <td>{{$actor->notes}}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped table-hover text-white">
        <thead>
            <tr>
                <th>Movie Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($actor->movie_actors as $movie)

            <tr>
                <td>{{ $movie->title }} </td>
                <td>{{ $movie->role_id}}</td>
                <td>test</td>
            </tr>
            @endforeach


        </tbody>
    </table>

    {{-- <div class="card text-white">
        {{ dd($actor->movie_actors()) }}
    </div> --}}
    <div class="logo">
        <img src="/storage/actor_images/{{ $actor->actor_image }}" alt="actor-poster" width="150" height="150">
    </div>
    @endforeach
</div>
</div>
@endsection
