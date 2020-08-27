@extends('layouts.app')
@section('content')

<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">

<h2>Create New Genre</h2>
<form method="post" action="{{url('roles')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="genre_name" class="control-label">Genre Name</label>
    <input type="text" class="form-control" id="genre_name" name="genre_name" value="{{old('genre_name')}}">
    @if($errors->has('genre_name'))
        <small>{{ $errors->first('genre_name') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection