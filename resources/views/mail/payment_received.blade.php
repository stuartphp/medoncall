@component('mail::message')

Payment received on order #{{ $order->order_number }}

You shoud receive your order shortly.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
