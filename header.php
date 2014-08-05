<html>
    <head>
        <title>
            PredictFOX
        </title>
        <link rel="shortcut icon" href="photos/logo-small.png">
        <style>
            .container{
                -moz-box-shadow: 0px 2px 2px #888888;
                -webkit-box-shadow: 0px 2px 2px #888888;
                box-shadow-bottom: 5px #888888;
            }
        </style>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                function adjust_window(){
                    var winW = $(window).width();
                    var matchContainer=$('.player-image-header').width();
                    var logoContainer=$('.logo-image-header').width();
                    if(winW >= matchContainer)
                    {
                        $('.player-image-header').css('left', winW/2-matchContainer/2+200);
                        $('.logo-image-header').css('left', winW/2-matchContainer/2-100);
                    }
                    else
                    {
                        $('.player-image-header').css('left', 200);
                        $('.logo-image-header').css('left', 0);
                    }

                }
                adjust_window();
                $(window).resize(function(){
                    adjust_window();
                });
            });

        </script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5398675b11c073ce"></script>
    </head>
    <body>
        <div class="container" style="width: 100%;height: 125px;background-color:#D5D5D5;position: absolute;left: 0px;top: 0px;border-top: 1px solid #868686;">
            <img class="logo-image-header" src="photos/header/header-image.png" width="125px" height="125px" style="position: absolute;left: 200px;">
            <img class="player-image-header" src="photos/header/header-player.png" height="180px" width="650px" style="position: absolute;left: 400px;top: 2px;">
        </div>
    </body>
</html>