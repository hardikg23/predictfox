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
        <link rel="stylesheet" type="text/css" href="css/home.css">
    </head>
    <body>
        <?php
        $datetime=date("Y-m-d H:i:s");
        $matchLIVE;
        if(isset ($_GET['matchID']) && !empty ($_GET['matchID'])) {
            $matchID = mysql_real_escape_string(htmlentities($_GET['matchID']));
            if($restul_to_validate_MatchID = mysql_query("SELECT lockTime from fixture where MID = '$matchID' and Live = 'yes' LIMIT 1") ) {
                if(mysql_num_rows($restul_to_validate_MatchID) == 0) {
                    if($restul_to_validate_MatchID = mysql_query("SELECT MID from fixture WHERE lockTime > '$datetime' and Live = 'yes' LIMIT 1") ) {
                        if(mysql_num_rows($restul_to_validate_MatchID) == 1) {
                            $matchID = mysql_real_escape_string(htmlentities(mysql_result($restul_to_validate_MatchID, 0)));
                            $matchLIVE = TRUE;
                        }else {
                            if($restul_to_validate_MatchID = mysql_query("SELECT MID FROM `fixture` WHERE Live = 'yes' order by `MID` desc limit 1") ) {
                                if(mysql_num_rows($restul_to_validate_MatchID) == 1) {
                                    $matchID = mysql_real_escape_string(htmlentities(mysql_result($restul_to_validate_MatchID, 0)));
                                    $matchLIVE = FALSE;
                                }
                            }
                        }
                    }
                }else {
                    $mTime = mysql_real_escape_string(htmlentities(mysql_result($restul_to_validate_MatchID, 0,0)));
                    if($mTime > $datetime)
                        $matchLIVE = TRUE;
                    else
                        $matchLIVE = FALSE;
                }
            }

        }else {
            if($restul_to_validate_MatchID = mysql_query("SELECT MID from fixture WHERE lockTime > '$datetime' LIMIT 1") ) {
                if(mysql_num_rows($restul_to_validate_MatchID) == 1) {
                    $matchID = mysql_real_escape_string(htmlentities(mysql_result($restul_to_validate_MatchID, 0)));
                    $matchLIVE = TRUE;
                }
            }
        }
        if(isset ($matchID) && !empty ($matchID)) {
            ?>

        <input type="text" value="<?php echo $matchID;?>" id="matchId" style="visibility: hidden">



        <div style="width: 100%;height: 150px;position: absolute;left: 0px;top: 125px;">
            <div class="container" style="width: 100%;height: 130px;background-color:#000148;position: absolute;left: 0px;top: 20px;border-top: 1px solid #868686;">
            </div>
            <div class="match-container">
                <?php include 'PHP/includes/matchContainer.php';?>
            </div>
            <div class="main-container">
                    <?php include 'PHP/includes/submenu.php';

                    $query = "SELECT * FROM `fixture` WHERE MID = $matchID LIMIT 1";
                    if($resultSet_of_match = mysql_query($query)) {
                        if(mysql_num_rows($resultSet_of_match) == 1) {
                            while ($row = mysql_fetch_array($resultSet_of_match)) {
                                $team1= mysql_real_escape_string($row['team1ATTR']);
                                $team1Name= mysql_real_escape_string($row['team1']);
                                $team2= mysql_real_escape_string($row['team2ATTR']);
                                $team2Name= mysql_real_escape_string($row['team2']);
                                $score1= mysql_real_escape_string($row['score1']);
                                $score2= mysql_real_escape_string($row['score2']);
                                $team1SUP= mysql_real_escape_string($row['team1SUP']);
                                $team2SUP= mysql_real_escape_string($row['team2SUP']);
                                $draw= mysql_real_escape_string($row['draw']);
                                $time= mysql_real_escape_string($row['matchTime']);
                                $lockTime= mysql_real_escape_string($row['lockTime']);
                                $old_date_timestamp = strtotime($time);
                                $old_date_timestamp = $old_date_timestamp - '19800';
                                $matchDate = date('j,M H:i', $old_date_timestamp).' GMT';
                            }
                        }
                        else {
                            $query = "SELECT * FROM `fixture` order by lockTime DESC LIMIT 1";
                            if($resultSet_of_match = mysql_query($query)) {
                                if(mysql_num_rows($resultSet_of_match) == 1) {
                                    while ($row = mysql_fetch_array($resultSet_of_match)) {
                                        $team1= mysql_real_escape_string($row['team1ATTR']);
                                        $team1Name= mysql_real_escape_string($row['team1']);
                                        $team2= mysql_real_escape_string($row['team2ATTR']);
                                        $team2Name= mysql_real_escape_string($row['team2']);
                                        $score1= mysql_real_escape_string($row['score1']);
                                        $score2= mysql_real_escape_string($row['score2']);
                                        $team1SUP= mysql_real_escape_string($row['team1SUP']);
                                        $team2SUP= mysql_real_escape_string($row['team2SUP']);
                                        $draw= mysql_real_escape_string($row['draw']);
                                        $time= mysql_real_escape_string($row['matchTime']);
                                        $lockTime= mysql_real_escape_string($row['lockTime']);
                                        $old_date_timestamp = strtotime($time);
                                        $old_date_timestamp = $old_date_timestamp - '19800';
                                        $matchDate = date('j,M H:i', $old_date_timestamp).' GMT';
                                    }
                                }
                            }
                        }

                        ?>
                <div class="main-body">

                    <img src="photos/home/bg2.png" width="100%" height="100%" class="main-container-bg">

                    <table width="100%" style="height: 100%;position: absolute;top: 0px;color: white">
                        <tr>
                            <td height="50%" width="37%" align="center">
                                <img src="photos/teamFlags/<?php echo $team1;?>.jpg" width="85%" height="70%" class="flag-item"><br>
                                        <?php echo '<font style="font-family: Algerian;font-weight:bold;font-size:36px;">'.strtoupper($team1Name).'</font>';?>
                            </td>
                            <td align="center" style="font-weight:bold;font-size:18px;">

                                <div>
                                    <div id="countdown">
                                        <script type="text/javascript">
                                            var matchTime='<?php echo $lockTime ?>';
                                            var now='<?php echo $datetime ?>';
                                        </script>
                                    </div>
                                </div>
                                        <?php
                                        echo '<font style="font-size:80px;">' . $score1 . ' - ' . $score2.'<font>';
                                        ?>
                            </td>
                            <td width="37%" align="center">
                                <img src="photos/teamFlags/<?php echo $team2;?>.jpg" width="85%" height="70%" class="flag-item"><br>
                                        <?php echo '<font style="font-family: Algerian;font-weight:bold;font-size:36px;">'.strtoupper($team2Name).'</font>';?>
                            </td>
                        </tr>
                        <tr style="font-size: 68px;font-family: Algerian;font-weight: bold;text-shadow: 4px 4px 5px #262626;">
                                    <?php
                                    $sum = $team1SUP + $team2SUP + $draw;
                                    $percent1 = (int)($team1SUP / $sum * 100);
                                    $percent2 = (int)($team2SUP / $sum * 100);
                                    $percent3 = (int)(100 - $percent1 - $percent2);

                                    $Losscolor= '#F50029';   //loss
                                    $Wincolor= '#00D52B';   // win
                                    $Drawcolor= '#CADC00';   // Draw
                                    if($percent1 > $percent2) {
                                        $team1Color = $Wincolor;
                                        $team2Color = $Losscolor;
                                    }else if($percent1 < $percent2) {
                                        $team1Color = $Losscolor;
                                        $team2Color = $Wincolor;
                                    }else {
                                        $team1Color = $Drawcolor;
                                        $team2Color = $Drawcolor;
                                    }

                                    ?>
                            <td height="15%" align="center">
                                        <?php echo "<font style='color:$team1Color;'>$percent1</font><font style='color:$team1Color;font-size:30px;'>%<br>$team1Name WIN</font>"; ?>
                            </td>
                            <td align="center">
                                        <?php echo "<font style='color:$Drawcolor;'>$percent3</font><font style='color:$Drawcolor;font-size:30px;'>%<br>DRAW</font>"; ?>
                            </td>
                            <td align="center">
                                        <?php echo "<font style='color:$team2Color;'>$percent2</font><font style='color:$team2Color;font-size:30px;'>%<br>$team2Name WIN</font>"; ?>
                            </td>
                        </tr>
                        <tr>

                                    <?php
                                    $query_toGetMatchData = "SELECT score1,score2,mPoints FROM `usermatchscore` WHERE `UID` = $session_UID and MID = $matchID";
                                    $recordata=false;
                                    if($resultSetOfMatchData = mysql_query($query_toGetMatchData)) {
                                        if(mysql_num_rows($resultSetOfMatchData) == 0) {
                                            $recordata=true;
                                        }
                                        $playerScore1 = mysql_real_escape_string(mysql_result($resultSetOfMatchData, 0,0));
                                        $playerScore2 = mysql_real_escape_string(mysql_result($resultSetOfMatchData, 0,1));
                                        $mPoints = mysql_real_escape_string(mysql_result($resultSetOfMatchData, 0,2));
                                    }
                                    if($matchLIVE) {
                                        ?>

                            <td  height="35%" align="right">
                                <input type="text" id="playerscore1" style="visibility: hidden" value="<?php echo $playerScore1;?>">
                                <input type="text" id="playerscore2" style="visibility: hidden" value="<?php echo $playerScore2;?>">
                                <div id="slider" style="border: 1px solid #006460;background-color: #00C7C0;width: 90%;height: 10px;"></div>
                            </td>
                            <td align="center">
                                <table width="80%" style="font-size:80px;font-weight: bold;color: white;text-shadow: 4px 4px 5px #262626;">
                                    <tr>
                                        <td align="center"><div id="amount"></div></td>
                                        <td align="center">-</td>
                                        <td align="center"><div id="amount1"></div></td>
                                    </tr>
                                </table>

                                <input type="button" value ="PREDICT" class="bSubmitPrediction" id="bSubmitPrediction">

                            </td>
                            <td align="left">
                                <div id="slider1" style="border: 1px solid #006460;background-color: #00C7C0;width: 90%;height: 10px;"></div>
                            </td>
                                        <?php
                                    }else {
                                        ?>
                            <td  height="35%" align="center">
                                            <?php if(!$recordata) {?>
                                <font style='color:#D70000;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 4px 4px 5px #262626;'>
                                    YOUR PREDICTION
                                </font>
                                <table width="40%" style="font-size:50px;font-weight: bold;color: white;text-shadow: 4px 4px 5px #262626;">
                                    <tr>
                                        <td align="center"><?php echo $playerScore1;?></td>
                                        <td align="center">-</td>
                                        <td align="center"><?php echo $playerScore2;?></td>
                                    </tr>
                                </table>
                                                <?php }?>
                            </td>
                            <td align="center">
                                            <?php
                                            if($recordata)
                                                echo "<font style='color:#D70000;font-size:35px;font-family: Algerian;font-weight: bold;text-shadow: 4px 4px 5px #262626;'>NO PREDICTION</font>";
                                            ?>
                            </td>
                            <td align="left">
                                            <?php
                                            if(!$recordata)
                                                echo "<font style='color:#2AD300;font-size:24px;font-family: Algerian;font-weight: bold;text-shadow: 4px 4px 5px #262626;'>YOU GOT <font style='font-size:40px;color:#D70000'>$mPoints</font> POINTS</font>";
                                            ?>
                            </td>

                                        <?php
                                    }
                                    ?>


                        </tr>
                    </table>
                </div>
                        <?php
                    }else {
                        echo '<br><br><br><br><br><center>ERROR</center>';
                    }
                    ?>
                <div class="comment-div" style="position: absolute;height: 500px;width: 920px;top:650px;">
                    <div class="comment-header" style="width: 875px;height: 30px;position: absolute;top: 0px;">
                        Comments
                    </div>
                    <div class="comment-add" style="position: absolute;width: 880px;top:30px;">
                        <textarea style="width: 100%;height: 60px;" name="comment" class="commentText"></textarea>
                        <div align="right" style="width: 98%">
                            <input type="button" id="bClearComment" class="bComment" value="clear">
                            <input type="button" id="bAddComment" class="bComment" value="comment">

                        </div>
                    </div>
                    <div class="comment-show" style="position: absolute;width: 860px;top:130px;overflow: auto;">
                            <?php

                            $query = "SELECT * FROM `comments` where MID = $matchID order by TID DESC limit 40";
                            if($resultSetComment = mysql_query($query)) {

                                while ($row = mysql_fetch_array($resultSetComment)) {
                                    $userNAme = $row['user_name'];
                                    $commentData = $row['commentText'];

                                    echo "<div style='width:95%' class='comment-head'>$userNAme,</div>";
                                    echo "<div style='width:95%;padding-left:20px;'>$commentData</div><br><hr size='1px' style='opacity:0.3'>";

                                }
                            }else {
                                echo '<div style="width:100%" align="center">ERROR</div>';
                            }
                            ?>
                    </div>

                </div>
            </div>


        </div>

        <script type="text/javascript" src="js/home.js"></script>
        <script type="text/javascript" src="js/countdown.jquery.js"></script>
            <?php }?>
    </body>
</html>