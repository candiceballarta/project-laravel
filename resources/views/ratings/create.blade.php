@extends('layouts.app')
@section('content')

<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">

<h2>Create New Rating</h2>
<form method="post" action="{{url('roles')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="score" class="control-label">Scores</label>
    <input type="text" class="form-control" id="score" name="score" value="{{old('score')}}">
    @if($errors->has('score'))
        <small>{{ $errors->first('score') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="score" class="control-label">Comment</label>
    <input type="text" class="form-control " id="comment" name="comment" value="{{old('comment')}}">
    @if($errors->has('comment'))
        <small>{{ $errors->first('comment') }}</small>
    @endif
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection