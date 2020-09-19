@extends('layouts.app')
@section('content')

<div class="table-responsive">
    <table class="table table-striped table-hover">

        <div class="container">

            <h2>Edit Rating</h2>
            {!! Form::model($ratings,['method'=>'PATCH','route' => ['ratings.update',$ratings->rating_id]]) !!}
            {{-- csrf_field() --}}
            {{-- method_field('PATCH') --}}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group mb-3">
                    <label for=movie" class="control-label">Movie</label>
                    {!! Form::select('movie_id',$movies, null,['class' => 'form-control']) !!}
                    @if($errors->has('movie'))
                    <small>{{ $errors->first('movie') }}</small>
                    @endif
            </div>

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

            <input type="hidden"  name="rating_id" value="{{$ratings->rating_id}}">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
        </div>
    </div>
</form>
{!! Form::close() !!}
@endsection
