@component('mail::message')
# Introduction

Confirmamos o empréstmo do livro!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
