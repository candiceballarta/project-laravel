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

<h2>Create New Producer</h2>
<form method="post" action="{{url('producers')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="fname" class="control-label">First Name</label>
<input type="text" class="form-control" id="fname" name="fname" value="{{old('fname')}}">
@if($errors->has('fname'))
<small>{{ $errors->first('fname') }}</small>
@endif
</div>

<div class="form-group">
<label for="lname" class="control-label">Last Name</label>
<input type="text" class="form-control " id="lname" name="lname" value="{{old('lname')}}">
@if($errors->has('lname'))
<small>{{ $errors->first('lname') }}</small>
@endif
</div>

<div class="form-group">
<label for="company" class="control-label">Company</label>
<input type="text" class="form-control " id="company" name="company" value="{{old('company')}}">
@if($errors->has('company'))
<small>{{ $errors->first('company') }}</small>
@endif
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection