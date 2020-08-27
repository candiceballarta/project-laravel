@extends('layouts.app')
@section('content')
<div class="table-responsive">
<table class="table table-striped table-hover">

<div class="container">

<h2>Edit Genre</h2>
{!! Form::model($genres,['method'=>'PATCH','route' => ['genres.update',$genres->id]]) !!}
{{-- csrf_field() --}}
{{-- method_field('PATCH') --}}

<div class="form-group">
    <label for="genre_name" class="control-label">Genre Name</label>
    {{ Form::text('genre_name',null,array('class'=>'form-control','genre_id'=>'genre_name')) }}
</div>

    <input type="hidden"   name="id" value="{{$genres->id}}">
    <button type="submit" class="btn btn-primary">Update</button>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
{!! Form::close() !!}
@endsection