@extends('layouts.app')
@section('content')

<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">

<h2>Create Movie Actor</h2>
{!! Form::model($movie_actors,['method'=>'PATCH','route' => ['movie_actors.update',$movie_actors->movie_id]]) !!}

<div class="form-group">
    {{ Form::label('role_name', 'Role Name') }}
    {{ Form::text('role_name',old('role_name'),array('class'=>'form-control', 'movie_id' => 'role_name')) }}
    @if($errors->has('role_name'))
        <small>{{ $errors->first('role_name') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="movie" class="control-label">Movie</label>
    {!! Form::select('movie_id',$movies, null,['class' => 'form-control']) !!}
    @if($errors->has('movie'))
        <small>{{ $errors->first('movie') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="producer" class="control-label">Role</label>
    {!! Form::select('producer_id',$producers, null,['class' => 'form-control']) !!}
    @if($errors->has('producer'))
        <small>{{ $errors->first('producer') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="producer" class="control-label">Producer</label>
    {!! Form::select('producer_id',$producers, null,['class' => 'form-control']) !!}
    @if($errors->has('producer'))
        <small>{{ $errors->first('producer') }}</small>
    @endif
</div>


<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection
