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
<h1>{{$producers->fname}}</h1>
<h1>{{$producers->lname}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Producer ID</th>
            <th>Company</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$producers->id}}</td>
        <td>{{$producers->Company}}</td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection
</body>
</html>