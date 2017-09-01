@component('mail::message')
# Добро пожаловать на сайт {{ config('app.name') }}

{{ $user->name }}, Ваш аккаунт был создан. Вы можете войти, используя Ваш адрес электронной почты **{{ $user->email }}**,  и пароль на нашем сайте:
@component('mail::button', ['url' => config('app.url')])
    Перейти на сайт
@endcomponent

Зарегистрировавшись, вы сможете получить доступ ко всем сервисам, включая создание новостей.


Спасибо,<br>
{{ config('app.name') }}
@endcomponent
