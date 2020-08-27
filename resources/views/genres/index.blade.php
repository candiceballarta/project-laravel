@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('genres.create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <span><strong>ADD</strong></span>
    </a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
    @endif
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Genre ID</th>
            <th>Genre Name</th>
            <th>Edit</>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($genres as $genre)
        <tr>
        <td>{{$genre->genre_id}}</td>
            <td><a href="{{route('genres.show',$genre->genre_id)}}">{{$genre->genre_name}}</a></td>
            <td align="center"><a href="{{ route('genres.edit',$genre->genre_id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
            <td align="center"><a href="{{ route('genres.destroy',$genre->genre_id) }}"  ><i class="fa fa-trash-o" style="font-size:24px; color:red" ></a></i></td>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection