@component('mail::message')
Olá, você acaba de ganhar acesso a plataforma do Ache Já lá você pode cenferir como anda as visualizações por lá e ainda cadastrar promoçoes e tickets.

Para poder acessar a plataforma você precisa cadastrar uma senha, basta clicar no botão e baixo e cadastrar a sua senha.

@component('mail::button', ['url' =>env('APP_URL').'/admin/users/setpassword?token='.$token])
Cadastrar Senha
@endcomponent

equipe,<br>
{{ config('app.name') }}
@endcomponent
