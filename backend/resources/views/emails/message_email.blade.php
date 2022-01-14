<!doctype html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>jemina.capital</title>

</head>

<body>



    <h1>{{ $details['title'] }}</h1>

    <h2>Hi, {{ $details['name'] }}</h2>

    <br>
    <p>{{ $details['body'] }}</p>
    
    <br>

    <p>Services You Are Interested In: {{ $details['services'] }}    </p>

    <br>
    <p>Your message: <i> {{ $details['message'] }} </i></p>

    <br />

    <p>Regards,</p>

    <p>Jemina Capital Web Team</p>



</body>

</html>

