@component('mail::message')
# Ваша новость удалена

Ваша новость "**{{ $news->title }}**" была только что удалена.

@component('mail::button', ['url' => config('app.url')])
    Перейти на сайт
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
