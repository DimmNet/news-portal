@component('mail::message')
# @lang('mails.welcome', ['siteName' => config('app.name')])

{{ $user->name }}, @lang('mails.registered_line_1', ['email' => $user->email])
@component('mail::button', ['url' => config('app.url')])
    @lang('mails.go_to_site')
@endcomponent

@lang('mails.registered_line_2')


@lang('mails.thanks'),<br>
{{ config('app.name') }}
@endcomponent
