@extends('layouts.app')
@section('content')
{{-- <h1>{{$actors->fname}}</h1>
<h1>{{$actors->lname}}</h1> --}}
<div class="table-responsive">
    <table class="table table-striped table-hover text-white">
        <thead>
            <tr>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actors as $actor)
            <tr>
                <td>{{$actor->actor_image}}</td>
                {{-- <td>{{$actor->actor_id}}</td> --}}
                <td>{{$actor->fname}}</td>
                <td>{{$actor->lname}}</td>
                <td>{{$actor->notes}}</td>
            </tr>
        </tbody>
    </table>

    <div class="logo">
        <img src="/storage/actor_images/{{ $actor->actor_image }}" alt="actor-poster" width="150" height="150">
    </div>

    <table class="table table-striped table-hover text-white">
        <thead>
            <tr>
                <th>Poster</th> 
                <th>Movie Title</th>
                <th>Year</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($actor->movies as $movie)

            <tr>
                    <td>{{ $movie->title }} </td>
                @endforeach
                @foreach ($actor->roles as $role)
                    <td>{{ $role->role_name}}</td>
            </tr>
            @endforeach


        </tbody>
    </table>

    {{-- <div class="card text-white">
        {{ dd($actor->movie_actors()) }}
    </div> --}}
    
    @endforeach
</div>
</div>
@endsection
