@component('mail::message')
# Welcome {{ $user->name }} to Farmties

Thank you for registering with farmties, we are glad you are on board. Enjoy trading with our platform. If you have any questions or queries, please contact us at info@farmties.com.

@component('mail::button', ['url' => 'https://www.farmties.com/verify/user/'.$user->token])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
