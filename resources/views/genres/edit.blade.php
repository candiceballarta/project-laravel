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

<h2>Edit Actor</h2>
{!! Form::model($genres,['method'=>'PATCH','route' => ['genre.update',$genre->id]]) !!}
{{-- csrf_field() --}}
{{-- method_field('PATCH') --}}

<div class="form-group">
    <label for="genre_name" class="control-label">Genre Name</label>
    {{ Form::text('genre_name',null,array('class'=>'form-control','genre_id'=>'genre_name')) }}
</div>

    <input type="hidden"   name="id" value="{{$genres->genre_id}}">
    <button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
{!! Form::close() !!}
@endsection