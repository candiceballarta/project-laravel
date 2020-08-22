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
<h1>{{$movies->title}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>movies ID</th>
            <th>Plot</th>
            <th>Year</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$movies->id}}</td>
        <td>{{$movies->plot}}</td>
        <td>{{$movies->year}}</td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection
</body>
</html>