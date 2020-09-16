@extends('layouts.app')
@section('content')

<div class="table-responsive">
    <table class="table table-striped table-hover">

        <div class="container">

            <h2>Edit Role</h2>
            {!! Form::model($roles,['method'=>'PATCH','route' => ['roles.update',$roles->role_id]]) !!}
            {{-- csrf_field() --}}
            {{-- method_field('PATCH') --}}

            <div class="form-group">
                <label for="role_name" class="control-label">Roles</label>
                {{ Form::text('role_name',null,array('class'=>'form-control','roles_id'=>'role_name')) }}
            </div>

            <div class="form-group mb-3">
                <label for=movie" class="control-label">Movie</label>
                {!! Form::select('movie_id',$movies, null,['class' => 'form-control']) !!}
                @if($errors->has('movie'))
                <small>{{ $errors->first('movie') }}</small>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="actor" class="control-label">Actor</label>
                {!! Form::select('actor_id',$actors, null,['class' => 'form-control']) !!}
                @if($errors->has('actors'))
                <small>{{ $errors->first('actor') }}</small>
                @endif
            </div>

            <input type="hidden"   name="roles_id" value="{{$roles->role_id}}">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
        </div>
    </div>
</form>
{!! Form::close() !!}
@endsection
