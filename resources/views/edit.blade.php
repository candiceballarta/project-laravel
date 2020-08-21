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
{!! Form::model($movies,['method'=>'PATCH','route' => ['update',$movies->id]]) !!}
{{-- csrf_field() --}}
{{-- method_field('PATCH') --}}

<div class="form-group">
    <label for="title" class="control-label">Title</label>
    {{ Form::text('title',null,array('class'=>'form-control','id'=>'title')) }}
</div>

<div class="form-group">
    <label for="artist" class="control-label">Director</label>
    {{ Form::text('director',null,array('class'=>'form-control','id'=>'director')) }}
</div>

<div class="form-group">
    <label for="year" class="control-label">Year</label>
    {{ Form::text('year',null,array('class'=>'form-control','id'=>'year')) }}
</div>

    <input type="hidden"   name="id" value="{{$movies->id}}">
    <button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
{!! Form::close() !!}
@endsection