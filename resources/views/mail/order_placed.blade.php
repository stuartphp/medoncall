@component('mail::message')
# Order Created #{{ $order->order_number }}

Your order was created, please make a payment to:
<table style="width: 200px">
<tr>
    <td>Bank:</td>
    <td>FNB</td>
</tr>
<tr>
    <td>Holder:</td>
    <td>Meds</td>
</tr>
<tr>
    <td>A/C:</td>
    <td>6209-4422-822</td>
</tr>
<tr>
    <td>Ref:</td>
    <td>{{ $order->order_number }}</td>
</tr>
</table>

For faster actions please mail proof of payment to paymnets@ravim.co.za with your order number.

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
