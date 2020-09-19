@extends('layouts.app')
@section('content')

<div class="table-responsive">
    <table class="table table-striped table-hover">

        <div class="container">

            <h2>Create New Rating</h2>
            <form method="post" action="{{url('roles')}}" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group mb-3">
                    <label for=movie" class="control-label">Movie</label>
                    {!! Form::select('movie_id',$movies, null,['class' => 'form-control']) !!}
                    @if($errors->has('movie'))
                    <small>{{ $errors->first('movie') }}</small>
                    @endif
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
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

                    <button type="submit" class="btn btn-outline-warning">Save</button>
                </div>



                <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
            </div>
        </div>
    </form>
    @endsection
