@extends('layouts.app')
@section('content')
<h1>{{$ratings->score}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Rating ID</th>
            <th>Score</th>

        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$ratings->id}}</td>
        <td>{{$ratings->score}}</td>
        <td>{{$ratings->comment}}</td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection
</body>
</html>