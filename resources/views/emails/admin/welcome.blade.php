<x-mail::message>
# Bienvenue cher {{ $name }}

Nous sommes heureux de vous accuellir dans notre equipe !<br>

Nous vous invitons a vous connecter dans votre espace, voici vos identifiants de connexion :
1. Email : {{ $email }}
2. Email : {{ $password }}

##NB:VEUILLER MODIFIER VOTRE MOT DE PASSE POUR PLUS DE SECURITE.

Cordialement,<br>
L'equipe 
{{ config('app.name') }}
</x-mail::message>
