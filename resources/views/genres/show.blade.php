@extends('layouts.app')
@section('content')
<h1>{{$genres->genre_name}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Genre ID</th>
            <th>Genre Name</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$genres->id}}</td>
        <td>{{$genres->genre_name}}</td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection