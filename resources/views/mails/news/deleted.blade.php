@component('mail::message')
# @lang('mails.news_deleted')

@lang('mails.news_deleted_line_1', ['title' => $news->title])

@component('mail::button', ['url' => config('app.url')])
    @lang('mails.go_to_site')
@endcomponent

@lang('mails.regards'),<br>
{{ config('app.name') }}
@endcomponent
