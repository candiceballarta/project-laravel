@extends('layouts.app')
@section('content')

<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">

<h2>Create New Movie</h2>
{{-- dd($producers) --}}
<form method="post" action="{{url('movies')}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="title" class="control-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
    @if($errors->has('title'))
        <small>{{ $errors->first('title') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="artist" class="control-label">Plot</label>
    <input type="text" class="form-control " id="plot" name="plot" value="{{old('plot')}}"></input>
    @if($errors->has('plot'))
        <small>{{ $errors->first('plot') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="year" class="control-label">Year</label>
    <input type="text" class="form-control" id="year" name="year"  value="{{old('year')}}">
    @if($errors->has('year'))
        <small>{{ $errors->first('year') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="producer" class="control-label">Producer</label>
    {!! Form::select('producer_id',$producers, null,['class' => 'form-control']) !!}
    @if($errors->has('producer'))
        <small>{{ $errors->first('producer') }}</small>
    @endif
</div>


<button type="submit" class="btn btn-primary">Save</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
@endsection