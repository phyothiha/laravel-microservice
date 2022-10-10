@component('mail::message')

Customer "{{ $ticket->customer->full_name }}" is opened a new ticket on {{ $ticket->created_at }}

@component('mail::table')
|               |                                |
| ------------- |:------------------------------ |
| Subject       | {{ $ticket->subject }}         |
| Type          | {{ $ticket->type_name }}       |
| Status        | {{ $ticket->status_name }}     |
| Priority      | {{ $ticket->priority_name }}   |
@endcomponent

@component('mail::button', ['url' => $url])
Give it a Read
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
