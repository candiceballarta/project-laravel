@extends('layouts.app')
@section('content')
<h1>{{$movies->title}}</h1>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Movies ID</th>
                <th>Plot</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$movies->movie_id}}</td>
                <td>{{$movies->plot}}</td>
                <td>{{$movies->year}}</td>
            </tr>
        </tbody>
    </table>

    <div class="logo">
        <img src="/storage/movie_images/{{ $movies->movie_image }}" alt="movie-poster" width="150" height="150">
    </div>

    <div class="container">
        {{ $movies->actors() }}
    </div>

    <div class="container">
        <a href="{{route('movieactors.create')}}" class="btn btn-primary a-btn-slide-text">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <span><strong>ADD</strong></span>
        </a>
    </div>
</div>
</div>
@endsection
</body>
</html>
