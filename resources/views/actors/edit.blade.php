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
{!! Form::model($actors,['method'=>'PATCH','route' => ['actors.update',$actors->id]]) !!}
{{-- csrf_field() --}}
{{-- method_field('PATCH') --}}

<div class="form-group">
    <label for="fname" class="control-label">FirstName</label>
    {{ Form::text('fname',null,array('class'=>'form-control','id'=>'fname')) }}
</div>

<div class="form-group">
    <label for="lname" class="control-label">LastName</label>
    {{ Form::text('lname',null,array('class'=>'form-control','id'=>'lname')) }}
</div>

<div class="form-group">
    <label for="notes" class="control-label">Notes</label>
    {{ Form::text('notes',null,array('class'=>'form-control','id'=>'notes')) }}
</div>

    <input type="hidden"   name="id" value="{{$actors->id}}">
    <button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
{!! Form::close() !!}
@endsection