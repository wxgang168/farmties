@component('mail::message')
# Almost Done {{ $order->owner->name }}!!

Congratulations on your new order with transaction number {{ $order->transID }}. However you would have to complete this purchase by making payment to the account details stated below. After which you can visit your profile or click on the verify payment button to upload proof of payment.

@component('mail::panel')
## Account Details <br>
**Bank Name:** Sterling Bank <br>
**Account Number:** 0065825069<br>
**Amount to be Paid:** {{ nairafy($order->total) }}<br>
**Account Name:** Dahrah Global Limited
@endcomponent 

@component('mail::button', ['url' => 'https://farmties.app/dashboard/orders'])
Verify Payment
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
