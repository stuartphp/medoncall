@component('mail::message')
Hi {{ $prospect->name }},

You have been invitated to join our site.

@component('mail::button', ['url' => $url ])
Register
@endcomponent

Thanks,<br>
Ravim
@endcomponent
