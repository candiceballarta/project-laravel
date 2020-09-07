@component('mail::message')
# Write us a message

Hello myMovies,

{{ $data['message'] }}

Thanks,<br>
<strong>{{ $data['name'] }}</strong><br>
<small>{{ $data['email'] }}</small>
@endcomponent
