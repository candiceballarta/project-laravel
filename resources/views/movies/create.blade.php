<!-- resources/views/create.blade.php -->
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
@extends('layouts.base')
</head>
<body>
@section('body')

<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">

<h2>Create New Movie</h2>
<form method="post" action="{{url('movies')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="title" class="control-label">Title</label>
<input type="text" class="form-control" id="title" name="title" >
</div>

<div class="form-group">
<label for="artist" class="control-label">Director</label>
<input type="text" class="form-control " id="director" name="director" ></input>
</div>

<div class="form-group">
<label for="year" class="control-label">Year</label>
<input type="text" class="form-control" id="year" name="year">
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection