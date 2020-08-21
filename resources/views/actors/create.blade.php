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

<h2>Create New Actor</h2>
<<<<<<< HEAD
=======
<form method="post" action="{{url('actors')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
>>>>>>> 077d5bb0058c51bd65c646cf1c4a8f36f4d026de

<div class="form-group">
<label for="fname" class="control-label">First Name</label>
<input type="text" class="form-control" id="fname" name="fname" >
</div>

<div class="form-group">
<label for="lname" class="control-label">Last Name</label>
<input type="text" class="form-control " id="lname" name="lname" ></input>
</div>

<div class="form-group">
<label for="notes" class="control-label">Notes</label>
<input type="text" class="form-control " id="notes" name="notes" ></input>
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection