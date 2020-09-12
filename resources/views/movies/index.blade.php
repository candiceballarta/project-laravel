@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('movies.create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <span><strong>ADD</strong></span>
    </a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="container">
        <div class="row">
            @foreach($movies as $movie)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow bg-dark" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $movie->getFirstMediaUrl('posters') }}" alt="movie-poster" width="70" height="250">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold" style="color: #FF2340">{{$movie->title}}</h5>
                        <p class="card-text">{{ $movie->producers->fname." ".$movie->producers->lname }}</p>
                        <small>{{$movie->year}}</small><br>
                        <div class="btn-group">
                            {!! Form::open(array('route' => array('movies.edit',$movie->movie_id),'method'=>'GET')) !!}
                            <button class="btn btn-sm btn-outline-secondary">Edit</button>
                            {!! Form::close() !!}
                            {!! Form::open(array('route' => array('movies.destroy',$movie->movie_id),'method'=>'DELETE')) !!}
                            <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                            {!! Form::close() !!}
                            {!! Form::open(array('route' => array('movies.restore', $movie->movie_id), 'method'=>'GET')) !!}
                            <button type="button" class="btn btn-sm btn-outline-secondary">Restore</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Movie ID</th>
                    <th>Title</th>
                    <th>Producer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Restore</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td>{{$movie->movie_id}}</td>
                    <td><a href="{{route('movies.show',$movie->movie_id)}}">{{$movie->title}}</a></td>
                    <td>{{ $movie->producers->fname." ".$movie->producers->lname }}</td>

                    <td>{!! Form::open(array('route' => array('movies.edit',$movie->movie_id),'method'=>'GET')) !!}
                        <button><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px; color:yellow" ></i></button></td>
                        {!! Form::close() !!}
                        <td>{!! Form::open(array('route' => array('movies.destroy',$movie->movie_id),'method'=>'DELETE')) !!}
                            <button ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:24px; color:red" ></i></button></td>
                            {!! Form::close() !!}
                            <td>{!! Form::open(array('route' => array('movies.restore', $movie->movie_id), 'method'=>'GET')) !!}
                                <button><i class="fa fa-undo" aria-hidden="true" style="font-size:24px; color:green" ></i></button></td>
                                {!! Form::close() !!}
                            </tr>

                            @endforeach
                        </tbody>
                    </table> --}}
                    {{-- </div> --}}
                    {{-- <div>{{$movies->links()}}</div> --}}
                </div>
                @endsection
