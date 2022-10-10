@component('mail::message')

"{{ $ticket->subject }}" Was Updated

It looks like a forum conversation you're watching has been updated by {{ $reply->user->full_name }}.

@component('mail::button', ['url' => $url])
Give it a Read
@endcomponent

@component('mail::panel')
{{ $reply->content }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
