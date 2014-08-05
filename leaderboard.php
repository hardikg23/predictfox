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
        <link rel="stylesheet" type="text/css" href="css/leaderboard.css">
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
                <?php include 'PHP/includes/submenu.php';?>

                <div class="leaderboard-header" style="width: 900px;height: 30px;position: absolute;top: 62px;">
                    <div style="position: absolute;top:6px;left: 20px">RANK</div>
                    <div style="position: absolute;top:6px;left: 140px">USER NAME</div>
                    <div style="position: absolute;top:6px;left: 560px">POINTS</div>
                    <div style="position: absolute;top:6px;left: 750px">GOAL DIFFERENCE</div>
                </div>
                <div class="main-leaderboard-container" style="width: 898px;position: absolute;top: 92px;">
                    <?php
                    $query = "SELECT s.UID,s.points, s.goalDiff, u.fullName FROM userscore s INNER JOIN userdata u ON s.`UID` = u.`UID` ORDER BY  `points` DESC, goalDiff LIMIT 100 ";
                    if($reslutSetOfLeaderBoar = mysql_query($query)) {
                        $rank_no=1;
                        $lastRank=1;
                        $lastPoints=0;

                        while ($row = mysql_fetch_array($reslutSetOfLeaderBoar)) {
                            $uid =mysql_real_escape_string($row['UID']);
                            $name = mysql_real_escape_string($row['fullName']);
                            $points = mysql_real_escape_string($row['points']);
                            $goalDiff = mysql_real_escape_string($row['goalDiff']);

                            $fontBold = 'normal';
                            if($uid == $session_UID)
                                $fontBold = 'bold';

                            if($lastPoints==$points) {
                                echo '<a class="main-leaderboard-container-item" href = "score.php?uid='.$uid.'"><div class="main-leaderboard-container-item"  style="font-weight:'.$fontBold.';width: 900px;height:28px;">';
                                echo "<div style='position: absolute;left: 20px;padding-top: 5px;'>$lastRank</div>
                                      <div style='position: absolute;left: 140px;padding-top: 5px;'>$name</div>
                                      <div style='position: absolute;left: 550px;padding-top: 5px;width:50px;' align='right'>$points</div>
                                      <div style='position: absolute;left: 750px;padding-top: 5px;width:50px;' align='right'>$goalDiff</div>";
                                echo '</div></a>';
                            }
                            else {
                                echo '<a class="main-leaderboard-container-item" href = "score.php?uid='.$uid.'"><div class="main-leaderboard-container-item" style="font-weight:'.$fontBold.';width: 900px;height:28px;">';
                                echo "<div style='position: absolute;left: 25px;padding-top: 5px;'>$rank_no</div>
                                      <div style='position: absolute;left: 140px;padding-top: 5px;'>$name</div>
                                      <div style='position: absolute;left: 550px;padding-top: 5px;width:50px;' align='right'>$points</div>
                                      <div style='position: absolute;left: 775px;padding-top: 5px;width:50px;' align='right'>$goalDiff</div>";
                                echo '</div></a>';

                                $lastRank=$rank_no;
                                $lastPoints=$user_points;
                            }
                            $rank_no++;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="js/leaderboard.js"></script>
    </body>
</html>