@component('mail::message')
# Congratulations!!! Your payment has been verified.

The payment of your order with transaction ID ({{ $order->transID }}), and a total fee of {{ nairafy($order->total) }} has been verified, and your stocks have been added to your stock profile.

If you have any questions, please do not hesitate to get in touch by sending a mail to info@farmties.com.

@component('mail::button', ['url' => 'https://www.farmties.com/dashboard/stocks'])
View Stocks
@endcomponent

Best Regards, {{ $order->owner->name }}<br>
{{ config('app.name') }}
@endcomponent
