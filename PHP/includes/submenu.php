<html>
    <head>
        <style>
            .Menu-table td{
                width: 158px;
                font-family: Lao UI;
                background-color: #a3a3a3;
                color: white;
                font-weight: bold;
                font-size: 11px;
            }
            .subItem{
                height: 50px;
            }
            .selected{
                background-color:white;
                color: #a3a3a3;
                cursor: pointer;
            }
            .subItem:hover {
                background-color:white;
                color: #a3a3a3;
                cursor: pointer;
            }
            .aSubMenu{
                text-decoration: none;
                color: white;
            }

        </style>
    </head>
    <body>
        <div class="" style="position: absolute;left: 0px;top:2px;width:900px;height:50px;">
            <table class="Menu-table" style="width: 100%;height: 100%;">
                <tr>
                    <td align="center"><a class="aSubMenu" href="home.php"><div class="subItem a-home selected"><br>HOME</div></a></td>
                    <td align="center"><a class="aSubMenu" href="score.php"><div class="subItem a-score"><br>SCORE</div></a></td>
                    <td align="center"><a class="aSubMenu" href="leaderboard.php"><div class="subItem a-leaderboard"><br>LEADERBOARD</div></a></td>
                    <td align="center"><a class="aSubMenu" href="league.php"><div class="subItem a-league"><br>LEAGUE</div></a></td>
                    <td align="center"><a class="aSubMenu" href="fixture.php" ><div class="subItem a-fixture"><br>FIXTURE</div></a></td>
                    <td align="center"><a class="aSubMenu" href="help.php"><div class="subItem a-help"><br>HELP</div></a></td>
                    <td align="center"><a class="aSubMenu" href="logout.php"><div class="subItem"><br>LOGOUT</div></a></td>
                </tr>
            </table>
        </div>


        <script>
            $(document).ready(function(){
                var loc = window.location.href;
                //alert(loc);
                if(loc.indexOf("home.php") != -1)
                {
                    $('.selected').removeClass('selected');
                    $('.a-home').addClass('selected');
                }
                if(loc.indexOf("score.php") != -1)
                {
                    $('.selected').removeClass('selected');
                    $('.a-score').addClass('selected');
                }
                if(loc.indexOf("leaderboard.php") != -1)
                {
                    $('.selected').removeClass('selected');
                    $('.a-leaderboard').addClass('selected');
                }
                if(loc.indexOf("league.php") != -1)
                {
                    $('.selected').removeClass('selected');
                    $('.a-league').addClass('selected');
                }
                if(loc.indexOf("fixture.php") != -1)
                {
                    $('.selected').removeClass('selected');
                    $('.a-fixture').addClass('selected');
                }
                if(loc.indexOf("help.php") != -1)
                {
                    $('.selected').removeClass('selected');
                    $('.a-help').addClass('selected');
                }
            });
        </script>
    </body>
</html>
