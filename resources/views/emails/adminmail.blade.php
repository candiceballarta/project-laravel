@component('mail::message')
# Hello {{$data['email']}},

<strong>{{$data['subject']}}</strong><br>
<small>{{$data['message']}}</small>

Thanks,<br>
myMovies Team
@endcomponent
