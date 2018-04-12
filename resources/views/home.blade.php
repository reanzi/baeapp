<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css') }}">

    <style>
        #app2 {
            padding: 10px;
            bottom: 60px;
            padding-bottom: 60px;
            /* Height of the footer */
        }

        #footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            /* Height of the footer */
        }
    </style>

    <title>Bae | Home</title>
</head>

<body>
    <div id="app">
        <v-app>
            <v-container>
                <app-home></app-home>
            </v-container>
        </v-app>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>