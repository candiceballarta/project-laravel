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

<h2>Edit Rating</h2>
{!! Form::model($ratings,['method'=>'PATCH','route' => ['ratings.update',$ratings->id]]) !!}
{{-- csrf_field() --}}
{{-- method_field('PATCH') --}}

<div class="form-group">
    <label for="score" class="control-label">Roles</label>
    {{ Form::text('score',null,array('class'=>'form-control','id'=>'score')) }}
</div>

    <input type="hidden"   name="id" value="{{$roles->id}}">
    <button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
{!! Form::close() !!}
@endsection