@component('mail::message')
# Introduction

Olá {{$user->name}} seja bem vindo ao Ache Já, aqui nós faremos de tudo para que o seu negocio ganhe a visibilidade que você merece.

Equipe,<br>
{{ config('app.name') }}
@endcomponent
