@component('mail::message')
# Hello {{$data['email']}},

{{$data['subject']}}

{{$data['message']}}

Thanks,<br>
myMovies Team
@endcomponent
