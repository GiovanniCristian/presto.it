<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1 style="font-weight: bold; font-size: 35px;">Grazie {{$user_contact['name']}} per averci contattato!</h1>
        <h2 style="font-weight: bold;">Ecco il tuo messaggio:</h2>
        <br>
        <p>Nome: {{$user_contact['name']}}</p>
        <p>Oggetto: {{$user_contact['subject']}}</p>
        <p>Messaggio: {{$user_contact['message']}}</p>
        <br>
        <p style="font-weight: bold;">Risponderemo alla tua richiesta entro 24h!</p>
        <br>
        <p style="font-style: italic;">Ti preghiamo di non rispondere a questa email. Grazie e buono shopping!</p>
    </div>
</body>
</html>