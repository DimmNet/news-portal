@component('mail::message')
# Ваша новость отредактирована

Ваша новость "**{{ $news->title }}**" была только что отредактирована.

@component('mail::button', ['url' => config('app.url')])
    Перейти на сайт
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
