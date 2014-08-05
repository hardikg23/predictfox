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
        <link rel="stylesheet" type="text/css" href="css/league.css">
        <script>
            $(function() {
                $( document ).tooltip();
            });
        </script>
        <style>
            label {
                display: inline-block;
                width: 5em;
            }
            .radio{
                text-decoration: none;
                color: #898989;
            }
        </style>
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

                <!-- Join LEAGE create LEAGUE code  -->
                <div class="joinCreateLeague" style="position: absolute;top: 100px;left: 0px; height: 100px;width: 700px;">
                    <div style="position: absolute;width: 448px;height: 140px;left: 0px;top: 0px;border: 1px solid silver;border-radius:5px; ">
                        <div class="createLeague-head">
                            CREATE LEAGUE
                        </div>
                        <div id="createError1" style="color: red;position: absolute;top: 40px;width: 150px;height: 80px;font-size: 12px;left: 280px;"></div>
                        <table class="joinCreateLeagueTable">
                            <tr>
                                <td align="right">LEAGUE NAME : </td><td> <input type="text" maxlength="18" class="input-text" id="createLeague_name"></td>
                            </tr>
                            <tr>
                                <td align="right">CODE : </td><td><input type="password" maxlength="12" class="input-text " id="createLeague_code"></td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="radio" href="#" title="League code visible to other">
                                        <input type="radio" name="type" checked="checked" value="public">Public
                                    </a>
                                    <a class="radio" href="#" title="League code will not be visible">
                                        <input type="radio" name="type" value="private">Private
                                    </a>
                                </td>
                                <td align="center"><input type="button" class="create-button" value="CREATE" id="creatLeagueButton"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="joinCreateLeague" style="position: absolute;width: 448px;height: 140px;left: 452px;top: 0px;border: 1px solid silver;border-radius:5px; ">
                        <div class="createLeague-head">
                            JOIN LEAGUE
                        </div>
                        <div id="joinError1" style="color: red;position: absolute;top: 40px;width: 150px;height: 80px;font-size: 12px;left: 280px;"></div>
                        <table class="joinCreateLeagueTable">
                            <tr>
                                <td align="right">LEAGUE NAME : </td><td> <input type="text" maxlength="18" class="input-text" id="joinLeague_name"></td>
                            </tr>
                            <tr>
                                <td align="right">CODE : </td><td><input type="password" class="input-text" id="joinLeague_code"></td>
                            </tr>
                            <tr>
                                <td></td><td align="center"><input type="button" class="join-button"  value="JOIN" id="joinLeagueButton"></td>
                            </tr>
                        </table>
                    </div>
                    <!-------->


                </div>

                <div style="position: absolute;top: 275px;left: 0px;width: 700px;">
                    <?php
                    if(isset ($_GET['lid']) && !empty ($_GET['lid'])) {

                        $lid= mysql_real_escape_string(htmlentities($_GET['lid']));
                        $query = "SELECT leagueName,leagueCode,type FROM leaguecode WHERE leagueID = $lid ";
                        $displayCode = '';
                        if($resultSetOfLeague = mysql_query($query)) {
                            if(mysql_num_rows($resultSetOfLeague) == 1) {
                                $leagueName = mysql_real_escape_string(mysql_result($resultSetOfLeague, 0 ,0));
                                $leaguecode = mysql_real_escape_string(mysql_result($resultSetOfLeague, 0 ,1));
                                $type = mysql_real_escape_string(mysql_result($resultSetOfLeague, 0,2));

                                if($type == 'public')
                                    $displayCode = 'CODE : '.$leaguecode;
                            }
                        }

                        ?>

                    <div class="league-header" style="width: 700px;height: 30px;position: absolute;top: 0px;">
                        <div style="position: absolute;top:6px;left: 20px">LEAGUE NAME : <?php echo $leagueName;?></div>
                        <div style="position: absolute;top:6px;left: 500px"><?php echo $displayCode;?></div>
                    </div>
                    <div class="league-header" style="width: 700px;height: 30px;position: absolute;top: 30px;">
                        <div style="position: absolute;top:6px;left: 20px">RANK</div>
                        <div style="position: absolute;top:6px;left: 100px">USER NAME</div>
                        <div style="position: absolute;top:6px;left: 430px">POINTS</div>
                        <div style="position: absolute;top:6px;left: 585px">GD</div>
                    </div>

                    <div class="main-league-container" style="width: 700px;position: absolute;top: 62px;border: 1px solid silver;">
                            <?php
                            $query = "SELECT s.UID,s.points, s.goalDiff, u.fullName FROM userscore s
                            INNER JOIN leaguemember l ON s.`user_email` = l.`user_email`
                            INNER JOIN userdata u ON s.`UID` = u.`UID`
                            where l.leagueID =$lid
                            ORDER BY points DESC LIMIT 100";
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
                                        echo '<a class="main-league-container-item" href = "score.php?uid='.$uid.'"><div class="main-league-container-item" style="font-weight:'.$fontBold.';width: 700px;height:28px;">';
                                        echo "<div style='position: absolute;left: 20px;padding-top: 5px;'>$lastRank</div>
                                      <div style='position: absolute;left: 100px;padding-top: 5px;'>$name</div>
                                      <div style='position: absolute;left: 430px;padding-top: 5px;width:30px;' align='right'>$points</div>
                                      <div style='position: absolute;left: 570px;padding-top: 5px;width:30px;' align='right'>$goalDiff</div>";
                                        echo '</div></a>';
                                    }
                                    else {
                                        echo '<a class="main-league-container-item" href = "score.php?uid='.$uid.'"><div class="main-league-container-item" style="font-weight:'.$fontBold.';width: 700px;height:28px;">';
                                        echo "<div style='position: absolute;left: 25px;padding-top: 5px;'>$rank_no</div>
                                      <div style='position: absolute;left: 100px;padding-top: 5px;'>$name</div>
                                      <div style='position: absolute;left: 430px;padding-top: 5px;width:30px;' align='right'>$points</div>
                                      <div style='position: absolute;left: 570px;padding-top: 5px;width:30px;' align='right'>$goalDiff</div>";
                                        echo '</div></a>';

                                        $lastRank=$rank_no;
                                        $lastPoints=$user_points;
                                    }
                                    $rank_no++;
                                }
                            }else {
                                echo 'error';
                            }







                            ?>
                    </div>
                        <?php

                    }else {  // lid not set
                        ?>

                    <div class="league-header" style="width: 700px;height: 30px;position: absolute;top: 0px;">
                        <div style="position: absolute;top:6px;left: 20px">#</div>
                        <div style="position: absolute;top:6px;left: 75px">LEAGUE CODE</div>
                        <div style="position: absolute;top:6px;left: 375px">MEMBERS</div>
                        <div style="position: absolute;top:6px;left: 500px">RANK</div>
                    </div>
                    <div class="main-league-container" style="width: 700px;position: absolute;top: 32px;border: 1px solid silver;">
                            <?php
                            //******************   PRIVATE LEAGUE **********************************************************************
                            $leagueMember='leaguemember';
                            $leagueCode='leaguecode';
                            //$userTable='s'.$seriesId.'_user_eleven_data';
                            if($resultSet_league_data=mysql_query("select c.leagueID,c.leagueName,c.members
                                                             from $leagueMember l
                                                             INNER JOIN $leagueCode c
                                                             on l.leagueID=c.leagueID
                                                             where user_email='$session_email'")) {
                                if(mysql_num_rows($resultSet_league_data)>0) {
                                    $inc=1;
                                    while($row=mysql_fetch_array($resultSet_league_data)) {
                                        $LeagueID=mysql_real_escape_string($row[0]);
                                        $LeagueName=mysql_real_escape_string($row[1]);
                                        $member=mysql_real_escape_string($row[2]);
                                        $query_to_find_rank="SELECT count(s.user_email) FROM $leagueMember s
                                                       INNER JOIN $userTable u on s.user_email=u.user_email
                                                       where u.user_points > (select user_points from $userTable
                                                       where user_email='$session_email') AND leagueID = $LeagueID";
                                        $resultSet_to_find_rank=mysql_query($query_to_find_rank);
                                        $rankPlayer=mysql_result($resultSet_to_find_rank, 0,0);
                                        $rank=$rankPlayer+1;


                                        echo '<a class="main-league-container-item" href=league.php?lid='.$LeagueID.'><div class="main-league-container-item" style="width: 700px;height:28px;">';
                                        echo "<div style='position: absolute;left: 20px;padding-top: 5px;'>$inc</div>
                                              <div style='position: absolute;left: 75px;padding-top: 5px;'>$LeagueName</div>
                                              <div style='position: absolute;left: 400px;padding-top: 5px;'>$member</div>
                                              <div style='position: absolute;left: 510px;padding-top: 5px;'>$rank</div>";
                                        echo '</div></a>';

                                        $inc++;
                                    }

                                }else {
                                    echo 'You are not joined any private league';
                                }
                            }else {
                                echo 'SOME ERROR OCCURED.';
                            }
                            //*****

                            ?>
                    </div>
                        <?php
                    }
                    ?>
                </div>


                <div style="position: absolute;top: 275px;left: 710px;width: 190px;border: 1px solid silver;">
                    <?php include 'PHP/includes/privateLeague.php';?>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/league.js"></script>
    </body>
</html>