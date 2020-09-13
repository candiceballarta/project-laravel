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

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3 bg-dark" style="width: 45rem;">
                <div class="card-header bg-warning text-black-50">Reviews</div>
                <div class="card-body">
                    <h5 class="card-title">User ID</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-footer bg-transparent border-warning">
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="score" class="control-label">Comment</label>
                            <input type="text" class="form-control " id="comment" name="comment" value="{{old('comment')}}">
                            @if($errors->has('comment'))
                            <small>{{ $errors->first('comment') }}</small>
                            @endif
                        </div>

                        <div class="form-group col-2">
                            <label for="inputState">Rating</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <button type="submit" style="height: 40px" class="btn btn-outline-warning col-2">Save</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mb-3 bg-dark" style="max-width: 18rem;">
            <div class="card-header bg-warning text-black-50">
                Cast
                <a href="{{route('movieactors.create')}}" class="btn btn-primary a-btn-slide-text mx-auto">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Light card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
</div>

@endsection
