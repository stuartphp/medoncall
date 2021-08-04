@component('mail::message')

Your order #{{ $order->order_number }} has been dispatched.

You shoud receive your order shortly.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
