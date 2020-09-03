@component('mail::message')
# Hello New User,

Welcome to myMovies website, giving you the best where movies are always updated. Have a great day.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
myMovies Team
{{-- {{ config('app.name') }} --}}
@endcomponent
