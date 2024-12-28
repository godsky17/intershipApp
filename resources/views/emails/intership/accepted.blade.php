<x-mail::message>
# Cher(e) {{$name}}

Nous somme heureux de vous annoncez que vous etes retenu pour un stage allant du {{$periode}}. A cet effet, vous etes invite a valider votre compte.
Voici vos informations de connexion

1. Email: votre email<br>
2. password : {{$password}}<br><br>

Pour plus de securite, veillez changer votre mot de passe.<br>


Cordialement,<br>
L'equipe 
{{ config('app.name') }}
</x-mail::message>
