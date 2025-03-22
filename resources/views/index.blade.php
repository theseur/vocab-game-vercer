<?php
 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/stilus.css">
    <title>Rómeó és Júlia</title>
    <script src="/js/bird.js" type="module" defer></script>
    <script src="/js/ladder.js" type="module" defer></script>
    <script src="/js/wordChange.js" type="module" defer></script>
    <script src="/js/romeo.js" type="module" defer></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <div id="castle-container">
        <img src="/img/castle.svg" id="castle" alt="">
        </div>
       <!-- <div class="ladder" id="ladder1">
            <div >
                első
            </div>
        </div>
        <div class="ladder" id="ladder2">
            <div >
                második
            </div>
        </div>
        <div class="ladder" id="ladder3">
            <div >
                harmadik
            </div>
        </div>
        <div class="ladder" id="ladder4">
            <div >
                negyedik
            </div>
        </div>
        <div class="ladder" id="ladder5">
            <div >
                ötödik
            </div>
        </div>-->

        @for ($i = 0; $i < 5; $i++)
        <div class="ladder" id="ladder{{$i}}" data-div-index="{{$i}}" >
            <div >
                {{$i}}.
            </div>
        </div>

        @endfor
        <div id="juliet">

        </div>
        <div id="romeo">

        </div>
        <div id="white-flag">
            <div >
                angol
            </div>
        </div>
        <div id="bird">

        </div>
        <div id="pont">

        </div>

        <div class="kilepes">
            @include('menus.kilepes') 
        </div>
    <div id="sziv">   
    </div>
   
</body>
</html>