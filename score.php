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
        <link rel="stylesheet" type="text/css" href="css/score.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
    </head>
    <body>
        <div style="width: 100%;height: 150px;position: absolute;left: 0px;top: 125px;">
            <div class="container" style="width: 100%;height: 130px;background-color:#000148;position: absolute;left: 0px;top: 20px;border-top: 1px solid #868686;">
            </div>
            <div class="match-container">
                <?php include 'PHP/includes/matchContainer.php';?>
            </div>
            <div class="main-container">
                <?php include 'PHP/includes/submenu.php';

                $datetime=date("Y-m-d H:i:s");
                if(isset ($_GET['uid']) && !empty ($_GET['uid'])  && ($_GET['uid'] != $session_UID) ) {
                    $uid = mysql_real_escape_string(htmlentities($_GET['uid']));
                    $query = "SELECT s.points,s.goalDiff,u.fullName FROM userscore s inner join userdata u on u.UID = s.UID where s.UID = $uid LIMIT 1";
                    if($reslutSetOfLeaderBoar = mysql_query($query)) {
                        while ($row = mysql_fetch_array($reslutSetOfLeaderBoar)) {
                            $name = mysql_real_escape_string($row['fullName']);
                            $points = mysql_real_escape_string($row['points']);
                            $goalDiff = mysql_real_escape_string($row['goalDiff']);

                            $query2 = "SELECT count(points) FROM userscore WHERE points > $points";
                            $rank = 'NA';
                            if($resutlRank = mysql_query($query2)) {
                                $rank = mysql_result($resutlRank, 0) + 1;
                            }

                        }
                    }
                    ?>
                <div  style="width: 898px;position: absolute;top: 62px;">
                    <div class="score-header" align="center" style="width: 300px;position: absolute;height: 100px;left: 0px;color:#2AD300;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 2px 2px 2px #262626;">USER NAME<br><font style='font-size:24px;color:#D70000'><?php echo $name; ?></font></div>
                    <div class="score-header" align="center" style="width: 200px;position: absolute;height: 100px;left: 300px;color:#2AD300;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 2px 2px 2px #262626;">POINTS <br><font style='font-size:40px;color:#D70000'><?php echo $points; ?></font></div>
                    <div class="score-header" align="center" style="width: 200px;position: absolute;height: 100px;left: 500px;color:#2AD300;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 2px 2px 2px #262626;">GOAL DIFF<br><font style='font-size:40px;color:#D70000'><?php echo $goalDiff; ?></font></div>
                    <div class="score-header" align="center" style="width: 200px;position: absolute;height: 100px;left: 700px;color:#2AD300;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 2px 2px 2px #262626;">RANK<br><font style='font-size:40px;color:#D70000'><?php echo $rank; ?></font></div>
                </div>
                <div class="score-header" style="width: 898px;height: 30px;position: absolute;top: 162px;">
                    <div style="position: absolute;top:6px;left: 20px">#</div>
                    <div style="position: absolute;top:6px;left: 75px">TEAM</div>
                    <div style="position: absolute;top:6px;left: 175px"></div>
                    <div style="position: absolute;top:6px;left: 270px">SCORE</div>
                    <div style="position: absolute;top:6px;left: 350px"></div>
                    <div style="position: absolute;top:6px;left: 450px">TEAM</div>
                    <div style="position: absolute;top:6px;left: 600px">USERs PREDICTION</div>
                    <div style="position: absolute;top:6px;left: 770px">POINTS</div>
                    <div style="position: absolute;top:6px;left: 850px">GD</div>
                </div>
                <div class="main-score-container" style="width: 898px;position: absolute;top: 192px;">
                        <?php
                        $query = "SELECT f.MID,f.team1ATTR,f.team2ATTR,f.score1,f.score2,f.matchTime,u.`score1`,u.`score2`,u.mPoints,f.team1,f.team2
                                    FROM fixture f
                                    left join usermatchscore u
                                    on f.MID = u.MID
                                    INNER JOIN userscore s ON s.UID = u.UID
                                    WHERE f.lockTime < '$datetime' and f.Live='yes' and u.`UID` = $uid
                                    UNION
                                    SELECT MID,team1ATTR,team2ATTR,score1,score2,matchTime,-1,-1,-1,team1,team2
                                    FROM `fixture` WHERE lockTime < '$datetime' and Live='yes'
                                    and MID not in(
                                    SELECT f.MID
                                    FROM fixture f
                                    left join usermatchscore u
                                    on f.MID = u.MID
                                    WHERE f.lockTime < '$datetime' and f.Live='yes' and u.`UID` = $uid) order by `MID`";

                        if($resultSet_of_match = mysql_query($query)) {
                            if(mysql_num_rows($resultSet_of_match) > 0) {
                                while ($row = mysql_fetch_array($resultSet_of_match)) {
                                    $MID= mysql_real_escape_string($row['MID']);
                                    $team1= mysql_real_escape_string($row['team1ATTR']);
                                    $team2= mysql_real_escape_string($row['team2ATTR']);
                                    $teamName1= mysql_real_escape_string($row['team1']);
                                    $teamName2= mysql_real_escape_string($row['team2']);
                                    $score1= mysql_real_escape_string($row[3]);
                                    $score2= mysql_real_escape_string($row[4]);
                                    $time= mysql_real_escape_string($row['matchTime']);
                                    $playerSCORE1= mysql_real_escape_string($row[6]);
                                    $playerSCORE2= mysql_real_escape_string($row[7]);
                                    $mPoints= mysql_real_escape_string($row[8]);
                                    if($mPoints == -1)
                                        $mPoints = '';
                                    $old_date_timestamp = strtotime($time);
                                    $old_date_timestamp = $old_date_timestamp - '19800';
                                    $time = date('j,M H:i', $old_date_timestamp).' GMT';


                                    $yourPreication ='';
                                    $gDiff = '';
                                    $bgColor = '';
                                    if($playerSCORE1 != -1 && $playerSCORE2 != -1) {
                                        $yourPreication = $playerSCORE1.' - '.$playerSCORE2;
                                        $bgColor = 'addedClassEffect';
                                        $gDiff = abs(($score1 +$score2)-($playerSCORE1 + $playerSCORE2));
                                    }



                                    echo '<div class="main-score-container-item '.$bgColor.'" style="width: 898px;height:28px;background-color:'.$bgColor.';">';
                                    echo "<div style='position: absolute;left: 20px;padding-top: 5px;'>$MID</div>
                                      <div style='position: absolute;left: 75px;padding-top: 5px;'>$teamName1</div>
                                      <div style='position: absolute;left: 175px;padding-top: 3px;'><img class='main-score-container-image' src='photos/teamFlags/min/$team1.jpg' width = '36px' height= '22px'></div>
                                      <div style='position: absolute;left: 275px;padding-top: 5px;'>$score1 - $score2</div>
                                      <div style='position: absolute;left: 350px;padding-top: 3px;'><img class='main-score-container-image' src='photos/teamFlags/min/$team2.jpg' width = '36px' height= '22px'></div>
                                      <div style='position: absolute;left: 450px;padding-top: 5px;'>$teamName2</div>
                                      <div style='position: absolute;left: 640px;padding-top: 5px;'>$yourPreication</div>
                                      <div style='position: absolute;left: 770px;padding-top: 5px;width:35px;' align='right'>$mPoints</div>
                                      <div style='position: absolute;left: 835px;padding-top: 5px;width:25px;' align='right'>$gDiff</div>";
                                    echo '</div>';
                                }
                            }else {
                                echo '<div style="width:900px;height:600px;" align="center">
                                    <br><br><br><br><br><br><br>Score will be available after player predicts any match score
                                    </div>';
                            }
                        }
                        ?>
                </div>
                    <?php
                }
                else {  //if UID not set
                    $query = "SELECT s.points,s.goalDiff,u.fullName FROM userscore s inner join userdata u on u.UID = s.UID where s.UID = $session_UID LIMIT 1";
                    if($reslutSetOfLeaderBoar = mysql_query($query)) {
                        while ($row = mysql_fetch_array($reslutSetOfLeaderBoar)) {
                            $name = mysql_real_escape_string($row['fullName']);
                            $points = mysql_real_escape_string($row['points']);
                            $goalDiff = mysql_real_escape_string($row['goalDiff']);

                            $query2 = "SELECT count(points) FROM userscore WHERE points > $points";
                            $rank = 'NA';
                            if($resutlRank = mysql_query($query2)) {
                                $rank = mysql_result($resutlRank, 0) + 1;
                            }
                        }
                    }
                    ?>
                <div  style="width: 900px;position: absolute;top: 62px;">
                    <div class="score-header" align="center" style="width: 300px;position: absolute;height: 100px;left: 0px;color:#2AD300;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 2px 2px 2px #262626;">USER NAME<br><font style='font-size:24px;color:#D70000'><?php echo $name; ?></font></div>
                    <div class="score-header" align="center" style="width: 200px;position: absolute;height: 100px;left: 300px;color:#2AD300;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 2px 2px 2px #262626;">POINTS <br><font style='font-size:40px;color:#D70000'><?php echo $points; ?></font></div>
                    <div class="score-header" align="center" style="width: 200px;position: absolute;height: 100px;left: 500px;color:#2AD300;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 2px 2px 2px #262626;">GOAL DIFF<br><font style='font-size:40px;color:#D70000'><?php echo $goalDiff; ?></font></div>
                    <div class="score-header" align="center" style="width: 200px;position: absolute;height: 100px;left: 700px;color:#2AD300;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 2px 2px 2px #262626;">RANK<br><font style='font-size:40px;color:#D70000'><?php echo $rank; ?></font></div>
                </div>


                <div class="score-header" style="width: 900px;height: 30px;position: absolute;top: 162px;">
                    <div style="position: absolute;top:6px;left: 20px">#</div>
                    <div style="position: absolute;top:6px;left: 75px">TEAM</div>
                    <div style="position: absolute;top:6px;left: 175px"></div>
                    <div style="position: absolute;top:6px;left: 270px">SCORE</div>
                    <div style="position: absolute;top:6px;left: 350px"></div>
                    <div style="position: absolute;top:6px;left: 450px">TEAM</div>
                    <div style="position: absolute;top:6px;left: 600px">YOUR PREDICTION</div>
                    <div style="position: absolute;top:6px;left: 770px">POINTS</div>
                    <div style="position: absolute;top:6px;left: 850px">GD</div>

                </div>
                <div class="main-score-container" style="width: 900px;position: absolute;top: 192px;">
                        <?php
                        $query = "SELECT f.MID,f.team1ATTR,f.team2ATTR,f.score1,f.score2,f.matchTime,u.`score1`,u.`score2`,u.mPoints,f.team1,f.team2
                                    FROM fixture f
                                    left join usermatchscore u
                                    on f.MID = u.MID
                                    INNER JOIN userscore s ON s.UID = u.UID
                                    WHERE f.Live='yes' and u.`UID` = $session_UID
                                    UNION
                                    SELECT MID,team1ATTR,team2ATTR,score1,score2,matchTime,-1,-1,-1,team1,team2
                                    FROM `fixture` WHERE Live='yes'
                                    and MID not in(
                                    SELECT f.MID
                                    FROM fixture f
                                    left join usermatchscore u
                                    on f.MID = u.MID
                                    WHERE f.Live='yes' and u.`UID` = $session_UID) order by `MID`";

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
                                $playerSCORE1= mysql_real_escape_string($row[6]);
                                $playerSCORE2= mysql_real_escape_string($row[7]);
                                $mPoints= mysql_real_escape_string($row[8]);
                                if($mPoints == -1)
                                    $mPoints = '';
                                $old_date_timestamp = strtotime($time);
                                $old_date_timestamp = $old_date_timestamp - '19800';
                                $time = date('j,M H:i', $old_date_timestamp).' GMT';

                                $yourPreication ='';
                                $gDiff = '';
                                $bgColor = '';
                                if($playerSCORE1 != -1 && $playerSCORE2 != -1) {
                                    $yourPreication = $playerSCORE1.' - '.$playerSCORE2;
                                    $bgColor = 'addedClassEffect';
                                    $gDiff = abs(($score1 +$score2)-($playerSCORE1 + $playerSCORE2));
                                }



                                echo '<div class="main-score-container-item '.$bgColor.'" style="width: 900px;height:28px;">';
                                echo "<div style='position: absolute;left: 20px;padding-top: 5px;'>$MID</div>
                                      <div style='position: absolute;left: 75px;padding-top: 5px;'>$teamName1</div>
                                      <div style='position: absolute;left: 175px;padding-top: 3px;'><img class='main-score-container-image' src='photos/teamFlags/min/$team1.jpg' width = '36px' height= '22px'></div>
                                      <div style='position: absolute;left: 275px;padding-top: 5px;'>$score1 - $score2</div>
                                      <div style='position: absolute;left: 350px;padding-top: 3px;'><img class='main-score-container-image' src='photos/teamFlags/min/$team2.jpg' width = '36px' height= '22px'></div>
                                      <div style='position: absolute;left: 450px;padding-top: 5px;'>$teamName2</div>
                                      <div style='position: absolute;left: 640px;padding-top: 5px;'>$yourPreication</div>
                                      <div style='position: absolute;left: 770px;padding-top: 5px;width:35px;' align='right'>$mPoints</div>
                                      <div style='position: absolute;left: 835px;padding-top: 5px;width:25px;' align='right'>$gDiff</div>";
                                echo '</div>';
                            }

                        }
                    }
                    ?>
                </div>
            </div>

        </div>


        <script type="text/javascript" src="js/score.js"></script>
    </body>
</html>