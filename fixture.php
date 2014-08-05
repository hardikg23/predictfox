<?php
include 'header.php';
include 'PHP/includes/database_connectivity_includes.php';
@session_start();
include 'PHP/includes/session_setter.php';
?>
<html>
    <head>
        <title>
            PredictFOX
        </title>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" type="text/css" href="css/fixture.css">
    </head>
    <body>
        <div style="width: 100%;height: 150px;position: absolute;left: 0px;top: 125px;">
            <div class="container" style="width: 100%;height: 130px;background-color:#000148;position: absolute;left: 0px;top: 20px;border-top: 1px solid #868686;">
            </div>
            <div class="match-container">
                <?php include 'PHP/includes/matchContainer.php';?>
            </div>
            <div class="main-container">
                <?php include 'PHP/includes/submenu.php';?>
                <div class="fixture-header" style="width: 900px;height: 30px;position: absolute;top: 62px;">
                    <div style="position: absolute;top:6px;left: 20px">#</div>
                    <div style="position: absolute;top:6px;left: 75px">TEAM</div>
                    <div style="position: absolute;top:6px;left: 175px"></div>
                    <div style="position: absolute;top:6px;left: 275px">SCORE</div>
                    <div style="position: absolute;top:6px;left: 350px"></div>
                    <div style="position: absolute;top:6px;left: 450px">TEAM</div>
                    <div style="position: absolute;top:6px;left: 600px">SCHEDULE START</div>
                    <div style="position: absolute;top:6px;left: 770px">YOUR PREDICTION</div>

                </div>
                <div class="main-fixture-container" style="width: 898px;position: absolute;top: 92px;">
                    <?php
                    $datetime=date("Y-m-d H:i:s");
                    $query = "SELECT f.MID,f.team1ATTR,f.team2ATTR,f.score1,f.score2,f.matchTime,u.`score1`,u.`score2`,f.team1,f.team2
                                    FROM fixture f
                                    left join usermatchscore u
                                    on f.MID = u.MID
                                    WHERE u.`UID` = $session_UID and Live='yes'
                                    UNION
                                    SELECT MID,team1ATTR,team2ATTR,score1,score2,matchTime,-1,-1,team1,team2
                                    FROM `fixture` WHERE Live='yes'
                                    and MID not in(
                                    SELECT f.MID
                                    FROM fixture f
                                    left join usermatchscore u
                                    on f.MID = u.MID
                                    WHERE u.`UID` = $session_UID)  order by `MID`";
                    if($resultSet_of_match = mysql_query($query)) {
                        while ($row = mysql_fetch_array($resultSet_of_match)) {
                            $MID= mysql_real_escape_string($row['MID']);
                            $team1= mysql_real_escape_string($row['team1ATTR']);
                            $team2= mysql_real_escape_string($row['team2ATTR']);
                            $teamName1= mysql_real_escape_string($row['team1']);
                            $teamName2= mysql_real_escape_string($row['team2']);
                            $score1= mysql_real_escape_string($row[3]);
                            $score2= mysql_real_escape_string($row[4]);
                            $time= mysql_real_escape_string($row['matchTime']);
                            $predictString = 'result';
                            if($time  > $datetime)
                                $predictString = 'predict';
                            $playerSCORE1= mysql_real_escape_string($row[6]);
                            $playerSCORE2= mysql_real_escape_string($row[7]);
                            $old_date_timestamp = strtotime($time);
                            $old_date_timestamp = $old_date_timestamp - '19800';
                            $time = date('j,M H:i', $old_date_timestamp).' GMT';

                            $yourPreication ='';
                            if($playerSCORE1 != -1 && $playerSCORE2 != -1) {
                                $yourPreication = $playerSCORE1.' - '.$playerSCORE2;
                            }

                            echo '<div class="main-fixture-container-item" style="width: 900px;height:28px;">';
                            echo "<div style='position: absolute;left: 20px;padding-top: 5px;'>$MID</div>
                                      <div style='position: absolute;left: 75px;padding-top: 5px;'>$teamName1</div>
                                      <div style='position: absolute;left: 200px;padding-top: 3px;'><img class='main-fixture-container-image' src='photos/teamFlags/min/$team1.jpg' width = '36px' height= '22px'></div>
                                      <div style='position: absolute;left: 275px;padding-top: 5px;'>$score1 - $score2</div>
                                      <div style='position: absolute;left: 350px;padding-top: 3px;'><img class='main-fixture-container-image' src='photos/teamFlags/min/$team2.jpg' width = '36px' height= '22px'></div>
                                      <div style='position: absolute;left: 450px;padding-top: 5px;'>$teamName2</div>
                                      <div style='position: absolute;left: 600px;padding-top: 5px;'>$time</div>
                                      <div style='position: absolute;left: 770px;padding-top: 5px;'>$yourPreication</div>
                                      <div style='position: absolute;left: 820px;padding-top: 5px;'><a style='text-decoration:none;color: #00B4B7;' href='home.php?matchID=$MID'>$predictString</a></div>";
                            echo '</div>';



                        }

                    }
                    ?>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/fixture.js"></script>
    </body>
</html>