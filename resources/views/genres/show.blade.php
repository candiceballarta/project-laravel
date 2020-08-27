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