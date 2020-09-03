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
{!! Form::model($producers,['method'=>'PATCH','route' => ['producers.update',$producers->producer_id]]) !!}
{{-- csrf_field() --}}
{{-- method_field('PATCH') --}}

<div class="form-group">
    <label for="fname" class="control-label">First Name</label>
    {{ Form::text('fname',null,array('class'=>'form-control','id'=>'fname')) }}
</div>

<div class="form-group">
    <label for="lname" class="control-label">Last Name</label>
    {{ Form::text('lname',null,array('class'=>'form-control','id'=>'lname')) }}
</div>

<div class="form-group">
    <label for="company" class="control-label">Company</label>
    {{ Form::text('company',null,array('class'=>'form-control','id'=>'company')) }}
</div>

    <input type="hidden"   name="id" value="{{$producers->producer_id}}">
    <button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
{!! Form::close() !!}
@endsection