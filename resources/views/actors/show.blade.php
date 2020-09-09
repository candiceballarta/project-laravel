@extends('layouts.app')
@section('content')
{{-- <h1>{{$actors->fname}}</h1>
<h1>{{$actors->lname}}</h1> --}}
<div class="table-responsive">
    <table class="table table-striped table-hover">
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

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Movie Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($actor->movies as $movie)

            <tr>
                <td>{{ $movie->title }} </td>
                @endforeach
                @foreach ($actor->movie_actors as $movie_actor)
                <td>{{ $movie_actor->role}}</td>
            </tr>
            @endforeach


        </tbody>
    </table>

    <div class="logo">
        <img src="{{ $actor->getFirstMediaUrl('actors') }}" alt="actor-poster" width="150" height="150">
    </div>
    @endforeach
</div>
</div>
@endsection
