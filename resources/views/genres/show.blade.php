<!-- resources/views/show.blade.php -->
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
@extends('layouts.base')
</head>
<body>
@section('body')
<h1>{{$genres->genre_id}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Genre ID</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$genres->genre_id}}</td>
        <td>{{$genres->genre_name}}</td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection
</body>
</html>