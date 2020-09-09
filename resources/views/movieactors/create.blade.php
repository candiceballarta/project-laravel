@extends('layouts.app')
@section('content')

<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">

<h2>Create Movie Actor</h2>
<form method="post" action="{{url('movieactors')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    {{ Form::label('role', 'Role Name') }}
    {{ Form::text('role',old('role'),array('class'=>'form-control')) }}
    @if($errors->has('role'))
        <small>{{ $errors->first('role') }}</small>
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
    <label for="actor" class="control-label">Actor</label>
    {!! Form::select('actor_id',$actors, null,['class' => 'form-control']) !!}
    @if($errors->has('actor'))
        <small>{{ $errors->first('actor') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="role_id" class="control-label">Role</label>
    {!! Form::select('role_id',$roles, null,['class' => 'form-control']) !!}
    @if($errors->has('role_id'))
        <small>{{ $errors->first('role_id') }}</small>
    @endif
</div>


<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection
