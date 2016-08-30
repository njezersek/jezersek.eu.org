<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>jezersek.eu.org</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,900" rel="stylesheet">
    <meta name="theme-color" content="#091d43">
    <style>
        .cont{
            margin: 10px;
        }
        .cont #tile{
            border: #fff solid 10px;
            box-sizing: border-box;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: block;
            font-family: 'Roboto', sans-serif;
            font-size: 2em;
            color: #fff;
            padding: 20px;
            text-transform: uppercase;
            font-weight: 900;
            
            transition-property: width, height, left, top, background;
            transition-duration: 1s;
        }
        .cont #tile:hover{
            background-position: top left;
        }
        
        .cont #tile .line{
            width: 50px;
            height: 4px;
            background: #fff;
        }
        
        .cont a{
            text-decoration: none;
        }
        body{
            overflow-x: hidden;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        
        header{
            background: #091d43;
            color: #fff;
        }
        
        header h1{
            margin: 0;
            padding: 20px;
            font-weight: 100;
        }
        
        h2{
            color: #091d43;
            font-weight: 400;
            margin: 20px;
            text-align: center;
        }
        
        .contact{
            background: #091d43;
            padding: 10px;
        }
        
        .contact .max{
            max-width: 1000px;
            margin: 0 auto 0;
        }
        
        .contact .input{
            width: 100%;
            box-sizing: border-box;
            font-size: 18px;
            font-family: 'Roboto Slab', serif;
            margin: 0px 10px;
            padding: 10px;
            outline: none;
            border-radius: 0px;
            border: none;
        }

        .contact textarea{
            width: 100%;
            box-sizing: border-box;
            max-width: 100%;
            min-height: 200px;
            font-family: 'Roboto Slab', serif;
            text-align: justify;
            font-size: 18px;
            padding: 10px;
            outline: none;
            border-radius: 0px;
            border: none;
            margin: 0px 10px;
        }

        .contact h2{
            color: #fff;
        }

        .contact .row{
            display: flex;
            width: 100%;
            padding: 10px 0px;
            box-sizing: border-box;
        }

        .contact .bottom{
            text-align: right;
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            padding: 10px 10px;
        }
        
        .contact .submit{
            border: none;
            padding: 10px 30px;
            font-size: 18px;
            background: #008062;
            color: #fff;
            border-radius: 0px;
            cursor: pointer;
            margin-left: 20px;
            margin-bottom: 22px;
        }
        
        .contact .bottom .g-recaptcha{
            margin-bottom: 20px;
        }
        
        .social{
            text-align: center;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .social a{
            padding: 20px;
        }
        
        @media only screen and (max-width: 800px) {
            .social img{
                width: 80px;
            }
            
            .social a{
                padding: 10px;
            }
        }
        
        footer{
            padding: 10px;
            text-align: center;
            background: #091d43;
            color: #fff;
        }

    </style>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <header><h1><b>jezersek</b>.eu.org</h1></header>
    <h2>Some of my projects</h2>
    <div class="cont" id="cont">
        <a href="forum/" class="2" id="tile" style="background-image: url('img/forum.jpg');">         <div class="title">forum</div>            <div class="line"></div></a>    
        <a href="storage/" class="2" id="tile" style="background-image: url('img/fileManager.jpg');">   <div class="title">storage</div>          <div class="line"></div></a>  
        <a href="ball/" class="1" id="tile" style="background-image: url('img/ball.jpg');">          <div class="title">bouncing ball</div>    <div class="line"></div></a>   
        <a href="chat/" class="3" id="tile" style="background-image: url('img/chat.jpg');">          <div class="title">chat</div>             <div class="line"></div></a> 
        <a href="raptor/" class="2" id="tile" style="background-image: url('img/raptor.jpg');">        <div class="title">raptor</div>           <div class="line"></div></a>   
        <a href="blackHole/" class="1" id="tile" style="background-image: url('img/blackHole.jpg');">     <div class="title">black hole</div>       <div class="line"></div></a>  
        <a href="connect4/" class="4" id="tile" style="background-image: url('img/connect4.jpg');">      <div class="title">connect4</div>         <div class="line"></div></a> 
        <a href="particles/" class="2" id="tile" style="background-image: url('img/particles.jpg');">     <div class="title">particles</div>        <div class="line"></div></a>    
        <a href="pipes/" class="1" id="tile" style="background-image: url('img/pipes.jpg');">         <div class="title">pipes</div>            <div class="line"></div></a> 
        <a href="rocket/" class="3" id="tile" style="background-image: url('img/rocket.jpg');">        <div class="title">rocket</div>           <div class="line"></div></a>   
        <a href="ticTacToe/" class="4" id="tile" style="background-image: url('img/tictactoe.jpg');">     <div class="title">tic tac toe</div>      <div class="line"></div></a>  
        <a href="snake/" class="3" id="tile" style="background-image: url('img/snake.jpg');">         <div class="title">snake</div>            <div class="line"></div></a> 
        <a href="mcServer" class="2" id="tile" style="background-image: url('img/mcServer.jpg');">      <div class="title">mc server</div>        <div class="line"></div></a>    
        <a href="colorPicker/" class="1" id="tile" style="background-image: url('img/color.jpg');">         <div class="title">color picker</div>     <div class="line"></div></a> 
        <a href="stopwatch/" class="1" id="tile" style="background-image: url('img/stopwatch.jpg');">     <div class="title">stopwatch</div>        <div class="line"></div></a>    
        <a href="exercises/" class="1" id="tile" style="background-image: url('img/generator.jpg');">     <div class="title">exercises generator</div><div class="line"></div></a>   
    </div>
    <section class="contact">
        <div class="max">
            <h2>Contact</h2>
            <form action="index.php" method="post">
                <div class="row">
                    <input name="name" placeholder="Name" type="text" class="input">
                    <input name="surname" placeholder="Surname" type="text" class="input">
                </div>
                <div class="row">
                    <input name="email" placeholder="Email" type="text" class="input">
                </div>
                <div class="row">
                    <textarea name="text"></textarea>
                </div>
                <div class="row bottom">
                    <div class="g-recaptcha" data-sitekey="6LfC4igTAAAAAEy9hERmaDJnOgML09p-fr8Jym9f"></div>
                    <input type="submit" value="Send" class="submit">
                </div>
            </form>
        </div>
    </section>
    <h2>Social media</h2>
    <section class="social">
        <a href="https://www.facebook.com/njezersek"><img src="img/social/facebook.png"></a>
        <a href="https://twitter.com/njezersek"><img src="img/social/twitter.png"></a>
        <a href="https://plus.google.com/+nejcjezersek"><img src="img/social/google-plus.png"></a>
        <a href="https://www.youtube.com/channel/UCa5YVYljcqyb7yy-kvjsNKQ"><img src="img/social/youtube.png"></a>
        <a href="https://www.instagram.com/nejcjezersek/"><img src="img/social/instagram.png"></a>
        <a href="https://www.linkedin.com/in/njezersek"><img src="img/social/linkedin.png"></a>
        <a href="https://codepen.io/njezersek/"><img src="img/social/code-pen.png"></a>
        <a href="https://github.com/njezersek"><img src="img/social/github.png"></a>
    </section>
    <footer>
        All rights reserved - 2016 - Nejc Jezeršek - jezersek.eu.org
    </footer>
    
    <script>
        var elements = [];
        var cont;
        var children;
        function load(){

            cont = document.getElementById('cont');
            children = cont.children;
            for(var i=0; i<children.length; i++){
                elements.push({title: "", type: children[i].className, img: ""});
            }

            resize();
        }
        
        function resize(){
            var w = document.getElementById('cont').offsetWidth;

            var idealCell = 250;
            if(w<1200)idealCell = 200;
            if(w<800)idealCell = 150;
            table = [];

            //get offset
            var oy = document.getElementById('cont').offsetTop;
            var ox = document.getElementById('cont').offsetLeft;

            //number of columns
            var columns = Math.round(w/idealCell);
            if(columns<2)columns=2;
            var cell = w/columns;

            //noumer of rows
            var nCells = 0;
            for(var i=0; i<elements.length; i++){
                if(elements[i].type == 1)nCells += 1;
                else if(elements[i].type == 2)nCells += 2;
                else if(elements[i].type == 3)nCells += 2;
                else if(elements[i].type == 4)nCells += 4;
            }
            var rows = Math.ceil(nCells/columns)+1;
            

            for(var i=0; i<columns; i++){
                table.push([]);
                for(var j=0; j<rows; j++){
                    table[i].push(0);
                }
            }

            //figure out positioning
            for(var i=0; i<elements.length; i++){
                for(var r=0; r<table[0].length; r++){
                    for(var c=0; c<table.length; c++){
                        if(elements[i].type == 1){
                            if(table[c][r] == 0){
                                elements[i].x = c;
                                elements[i].y = r;

                                table[c][r] = 1;
                                r = table[0].length;
                                c = table.length;
                            }
                        }
                        else if(elements[i].type == 2){
                            if(typeof(table[c+1]) !== "undefined"){
                                if(table[c][r] == 0 && table[c+1][r] == 0){
                                    elements[i].x = c;
                                    elements[i].y = r;

                                    table[c][r] = 2;
                                    table[c+1][r] = 2;

                                    r = table[0].length;
                                    c = table.length;
                                }
                            }
                        }
                        else if(elements[i].type == 3){
                            if(typeof(table[c][r+1]) !== "undefined"){
                                if(table[c][r] == 0 && table[c][r+1] == 0){
                                    elements[i].x = c;
                                    elements[i].y = r;

                                    table[c][r] = 3;
                                    table[c][r+1] = 3;

                                    r = table[0].length;
                                    c = table.length;
                                }
                            }
                        }
                        else if(elements[i].type == 4){
                            if(typeof(table[c+1]) !== "undefined"){
                                if(typeof(table[c+1][r+1]) !== "undefined"){
                                    if(table[c][r] == 0 && table[c][r+1] == 0 && table[c+1][r] == 0 && table[c+1][r+1] == 0){
                                        elements[i].x = c;
                                        elements[i].y = r;

                                        table[c][r] = 4;
                                        table[c][r+1] = 4;
                                        table[c+1][r] = 4;
                                        table[c+1][r+1] = 4;

                                        r = table[0].length;
                                        c = table.length;
                                    }
                                }
                            }
                        }

                    }
                }
            }
            
            var empty = 1;
            for(var i=0; i<table.length; i++){
                if(table[i][table[i].length-1] != 0)empty = 0;
            }
            document.getElementById('cont').style.height = (rows-empty)*cell+"px";
            
           //render
            
            for(var i=0; i<elements.length; i++){
                if(elements[i].type == 1){
                    children[i].style.height = (1*cell)+"px";
                    children[i].style.width = (1*cell)+"px";
                }
                else if(elements[i].type == 2){
                    children[i].style.height = (1*cell)+"px";
                    children[i].style.width = (2*cell)+"px";
                }
                else if(elements[i].type == 3){
                    children[i].style.height = (2*cell)+"px";
                    children[i].style.width = (1*cell)+"px";
                }
                else if(elements[i].type == 4){
                    children[i].style.height = (2*cell)+"px";
                    children[i].style.width = (2*cell)+"px";
                }
                children[i].style.position = "absolute";
                children[i].style.top = (elements[i].y*cell+oy)+"px";
                children[i].style.left = (elements[i].x*cell+ox)+"px";
                children[i].style.fontSize = (cell/10)+"px";
            }
        
        }
        
        window.addEventListener('resize', resize);
        window.addEventListener('load', function(){load();resize()});
    </script>

</body>
</html>