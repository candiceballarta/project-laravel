@extends('layouts.app')
@section('content')
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