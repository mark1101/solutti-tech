@component('mail::message')
# Introduction

Produto {{ $nome }} {{ $mensagem }} com sucesso!.

Obs: Essa é uma mensagem automática da plataforma.

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
