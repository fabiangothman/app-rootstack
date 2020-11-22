<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    
    @php
        $color = "purple";
        $alertType = "alert";
    @endphp

    <body>
        <div class="container mx-auto">
            
            <x-alert :color="$color" class="mb-4">

                <x-slot name="title">
                    Title 1
                </x-slot>

                asd ajsdfisjs sidfjisds kdsfjs
            </x-alert>

            <x-alert2 color="blue" class="mb-4">
                <x-slot name="title">
                    Test title
                </x-slot>
                Something not ideal might be happening.
            </x-alert2>
            
            <x-alert2/>

            <x-dynamic-component :component="$alertType">
                <x-slot name="title">
                    Another title
                </x-slot>
                Something not ideal might be happening by dynamic.
            </x-dynamic-component>

            <x-alert color="green">

                <x-slot name="title">
                    Title 2
                </x-slot>
                
                Hello!
            </x-alert>
            <x-alert />
        </div>
    </body>
</html>
