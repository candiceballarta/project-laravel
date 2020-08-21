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
{!! Form::model($actors,['method'=>'PATCH','route' => ['actors.create']]) !!}
{{-- csrf_field() --}}
{{-- method_field('PATCH') --}}

<div class="form-group">
    <label for="fname" class="control-label">FirstName</label>
    {{ Form::text('fname',null,array('class'=>'form-control')) }}
</div>

<div class="form-group">
    <label for="lname" class="control-label">LastName</label>
    {{ Form::text('lname',null,array('class'=>'form-control')) }}
</div>

<div class="form-group">
    <label for="notes" class="control-label">Notes</label>
    {{ Form::text('notes',null,array('class'=>'form-control')) }}
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
{!! Form::close() !!}
@endsection