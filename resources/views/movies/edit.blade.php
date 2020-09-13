@extends('layouts.app')
@section('content')

<div class="table-responsive">
    <table class="table table-striped table-hover">

        <div class="container">

            <h2>Create New Movie</h2>
            {!! Form::model($movies,['method'=>'PATCH','route' => ['movies.update',$movies->movie_id]]) !!}
            {{-- {{ csrf_field() }}
            {{ method_field('PATCH') }} --}}

            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" name="movie_image" class="custom-file-input" id="inputGroupFile">
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                </div>
                @if($errors->has('movie_image'))
                <small>{{ $errors->first('movie_image') }}</small>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title',null,array('class'=>'form-control','id'=>'title')) }}
                @if($errors->has('title'))
                <small>{{ $errors->first('title') }}</small>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('plot', 'Plot') }}
                {{ Form::text('plot',null,array('class'=>'form-control','id'=>'plot')) }}
                @if($errors->has('plot'))
                <small>{{ $errors->first('plot') }}</small>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('year', 'Year') }}
                {{ Form::text('year',null,array('class'=>'form-control','id'=>'year')) }}
                @if($errors->has('year'))
                <small>{{ $errors->first('year') }}</small>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('producer', 'Producer') }}
                {!! Form::select('producer_id',$producers, null,['class' => 'form-control']) !!}
                @if($errors->has('producer'))
                <small>{{ $errors->first('producer') }}</small>
                @endif
            </div>

            <input type="hidden"   name="id" value="{{$movies->movie_id}}">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
        </div>
    </div>
</form>
{!! Form::close() !!}
@endsection
