<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- style -->
        <link href="/librares/bootstrap.min.css" rel="stylesheet">
        <script src="/librares/jquery.js"></script>
        <!-- icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <style>
            body{
                overflow: hidden;
            }
            .container-home{
                background-image: url({{asset('imgs/background.jpeg')}});
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                height: 100vh;
                width: 100vw;
            }
            .right-side{
                background-color: rgba(255, 255, 255, 0.267);
                width: 30%;
                padding: 10px 20px;
            }
            .button {
                margin:5px;
                width: 100%;
                display: inline-block;
                /* padding: 12px 24px; */
                padding: 5px 25px;
                border: 1px solid #4f4f4f;
                border-radius: 4px;
                transition: all 0.2s ease-in;
                position: relative;
                overflow: hidden;
                font-size: 19px;
                color: black;
                z-index: 1;
            }     
            .button:before {
                content: "";
                position: absolute;
                left: 50%;
                transform: translateX(-50%) scaleY(1) scaleX(1.25);
                top: 100%;
                width: 140%;
                height: 180%;
                background-color: rgba(0, 0, 0, 0.05);
                border-radius: 50%;
                display: block;
                transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
                z-index: -1;
            }    
            .button:after {
                content: "";
                position: absolute;
                left: 55%;
                transform: translateX(-50%) scaleY(1) scaleX(1.45);
                top: 180%;
                width: 160%;
                height: 190%;
                background-color: #39bda7;
                border-radius: 50%;
                display: block;
                transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
                z-index: -1;
            }        
            .button:hover {
                color: #ffffff;
                border: 1px solid #39bda7;
            }  
            .button:hover:before {
                top: -35%;
                background-color: #39bda7;
                transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
            }
            .button:hover:after {
                top: -45%;
                background-color: #39bda7;
                transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
            }
        </style>
    </head>
    <body >

    <div class="container-home  vh-100">
        <div class="right-side h-100  ml-auto d-flex flex-column align-items-center justify-content-center">
            @yield('content') 
        </div>
    </div>

    <script src="/librares/bootstrap.min.css"></script>
    </body>
</html>
