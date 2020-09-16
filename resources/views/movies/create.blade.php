@extends('layouts.app')
@section('content')

<div class="table-responsive">
    <table class="table table-striped table-hover">

        <div class="container">

            <h2>Create New Movie</h2>
            <form method="post" action="{{url('movies')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="movie_image" class="custom-file-input" id="inputGroupFile">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title',old('title'),array('class'=>'form-control')) }}
                    @if($errors->has('title'))
                    <small>{{ $errors->first('title') }}</small>
                    @endif
                </div>

                <div class="form-group mb-3">
                    {{ Form::label('plot', 'Plot') }}
                    {{ Form::text('plot',old('plot'),array('class'=>'form-control')) }}
                    @if($errors->has('plot'))
                    <small>{{ $errors->first('plot') }}</small>
                    @endif
                </div>

                <div class="form-group mb-3">
                    {{ Form::label('year', 'Year') }}
                    {{ Form::text('year',old('year'),array('class'=>'form-control')) }}
                    @if($errors->has('year'))
                    <small>{{ $errors->first('year') }}</small>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="producer" class="control-label">Producer</label>
                    {!! Form::select('producer_id',$producers, null,['class' => 'form-control']) !!}
                    @if($errors->has('producer'))
                    <small>{{ $errors->first('producer') }}</small>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label class="control-label">Genre</label><br>
                    @foreach ($genres as $id => $genre)
                    <div class="form-check form-check-inline">
                        {!! Form::checkbox('genre_id[]', $genre->genre_id, null, array('class'=>'form-check-input','id'=>'genre')) !!}
                        {!!Form::label('genre', $genre->genre_name,array('class'=>'form-check-label')) !!}
                    </div>
                    @endforeach
                </div>


                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
            </div>
        </div>
    </form>
    @endsection
