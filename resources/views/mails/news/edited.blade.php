@component('mail::message')
# @lang('mails.news_edit')

@lang('mails.news_edit_line_1', ['title' => $news->title])

@component('mail::button', ['url' => config('app.url')])
    @lang('mails.go_to_site')
@endcomponent

@lang('mails.regards'),<br>
{{ config('app.name') }}
@endcomponent
