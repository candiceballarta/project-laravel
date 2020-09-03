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
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title',old('title'),array('class'=>'form-control')) }}
    @if($errors->has('title'))
        <small>{{ $errors->first('title') }}</small>
    @endif
</div>

<div class="form-group">
    {{ Form::label('plot', 'Plot') }}
    {{ Form::text('plot',old('plot'),array('class'=>'form-control')) }}
    @if($errors->has('plot'))
        <small>{{ $errors->first('plot') }}</small>
    @endif
</div>

<div class="form-group">
    {{ Form::label('year', 'Year') }}
    {{ Form::text('year',old('year'),array('class'=>'form-control')) }}
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