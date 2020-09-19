@extends('layouts.app')
@section('content')
@foreach($movies as $movie)
<div class="container">
    <div class="featured">
        <div class="row mb-3">
            <div class="logo col-3">
                <img src="/storage/movie_images/{{ $movie->movie_image }}" alt="movie-poster" width="200" height="230">
            </div>
            <div class="featured-text col-md-8 mt-5">
                <h1 style="color: red">{{$movie->title}}</h1>
                <h3>{{ $movie->producers->fname." ".$movie->producers->lname }}</h3>
                <small>{{ $movie->year }}</small>
            </div>
            <div class="rating">
                <h1><span class="badge badge-warning">{{ $round.'/5' }}</span></h1>
            </div>
        </div>
    </div>

    <div class="card mb-3 bg-dark">
        <div class="card-body">
            {{ $movie->plot }}
        </div>
    </div>

    <div class="plot-text">

    </div>
    @endforeach

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3 bg-dark" style="width: 45rem;">
                <div class="card-header bg-warning text-black-50">Reviews</div>
                @if ($ratings->isEmpty())
                    <div class="card-body">
                        <h5 class="card-title">No rating <span class="badge badge-warning">0/5</span></h5>
                        <p class="card-text">This movie has not been rated yet.</p>
                    </div>
                @else
                    @foreach ($ratings as $rating)
                        <div class="card-body">
                            <h5 class="card-title">{{ $rating->name }}<span class="badge badge-warning">{{ 'Score: '.$rating->score.'/5' }}</span></h5>
                            <p class="card-text">{{ $rating->comment }}</p>
                            <div class="btn-group">
                                {!! Form::open(array('route' => array('ratings.edit',$rating->rating_id),'method'=>'GET')) !!}
                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                {!! Form::close() !!}
                                {!! Form::open(array('route' => array('ratings.destroy',$rating->rating_id),'method'=>'DELETE')) !!}
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="card-footer bg-transparent border-warning">
                    {{-- {!! Form::model($ratings ?? ['method'=>'PATCH','route' => ['ratings.create'], 'class'=>'form-row align-items-center']) !!} --}}
                    @guest
                        <div class="container">
                            Please log in to rate this movie.
                        </div>
                    @else
                        <form method="post" action="{{url('ratings')}}" class="form-row align-items-center">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="movie_id" value="{{ $movie->movie_id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group col-md-7">
                            {!! Form::label('comment', 'Comment') !!}
                            {!! Form::textarea('comment', $value = old('comment'), ['class' => 'form-control', 'rows' => 3]) !!}
                            @if($errors->has('comment'))
                            <small>{{ $errors->first('comment') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="score">Rating</label>
                            <select id="score" name="score" class="form-control">
                                <option selected>Choose...</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            @if($errors->has('score'))
                            <small>{{ $errors->first('score') }}</small>
                            @endif
                        </div>
                        <button type="submit" style="height: 40px" class="btn btn-outline-warning col-2">Save</button>
                    </form>
                    {!! Form::close() !!}
                    @endguest
                </div>
            </div>
        </div>


        <div class="card mb-3 bg-dark" style="width: 23rem;">
            <div class="card-header bg-warning text-black-50">
                Cast
                <a href="{{route('roles.create')}}" class="btn btn-danger a-btn-slide-text mx-auto">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <ul class="list-group list-group-flush bg-dark">
                <li class="list-group-item bg-dark">
                    @if ($roles->isEmpty())
                        <div class="row inline-block">
                            <h5 class="ml-4 mt-4">No Actors Yet</h5>
                        </div>
                    @else
                        @foreach ($roles as $role)
                            <div class="row inline-block">
                                <img class="col-md-4" src="/storage/actor_images/{{ $role->actor_image }}" alt="actor-poster" width="80" height="100">
                                <p class="mt-4">{{ $role->fname.' '.$role->lname }}<br>{{ ' as '.$role->role_name }}</p>
                            </div>
                        @endforeach
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection
