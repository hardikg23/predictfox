<?php
include '../includes/database_connectivity_includes.php';
@session_start();
if(isset($_SESSION['setadminpassword'])&&isset($_SESSION['setdatabasepassword'])) {
    ?>
<html>
    <head>
    </head>
    <body>
            <?php
            if(isset ($_POST['MID']) && isset ($_POST['team1Score']) && isset ($_POST['team2Score']) && isset ($_POST['finishedID'])) {
                $MID = mysql_real_escape_string(htmlentities($_POST['MID']));
                $team1score = mysql_real_escape_string(htmlentities($_POST['team1Score']));
                $team2score = mysql_real_escape_string(htmlentities($_POST['team2Score']));
                $finish = mysql_real_escape_string(htmlentities($_POST['finishedID']));
                if(!empty ($MID) && !empty ($finish)) {


                    $queryToUpateGoals = "UPDATE fixture SET score1=$team1score,score2=$team2score WHERE MID =$MID";
                    if($res = mysql_query($queryToUpateGoals)) {

                    }else{
                        echo "Goals is not upated";
                    }


                    // finding % for team1 team2 and draw **********************
                    $queryTogetSupport = "SELECT `team1SUP`,`team2SUP`,`draw` FROM `fixture` WHERE `MID` = $MID";
                    if($resultSetOfSupport = mysql_query($queryTogetSupport)) {
                        $team1SUP = mysql_real_escape_string(mysql_result($resultSetOfSupport, 0,0));
                        $team2SUP = mysql_real_escape_string(mysql_result($resultSetOfSupport, 0,1));
                        $draw = mysql_real_escape_string(mysql_result($resultSetOfSupport, 0,2));

                        $sum = $team1SUP + $team2SUP + $draw;
                        $percent1 = (int)($team1SUP / $sum * 100);
                        $percent2 = (int)($team2SUP / $sum * 100);
                        $percent3 = (int)(100 - $percent1 - $percent2);
                    }
                    // finding % for team1 team2 and draw **********************

                    $realGoalAddition = $team1score + $team2score;
                    $winTeamID = 0;

                    if(checkGoal($team1score,$team2score)) {
                        if($team1score > $team2score)  // team1 won
                            $winTeamID = 1;
                        else if($team1score < $team2score)  //team2 won
                            $winTeamID = 2;

                        echo "<b>team1 = $percent1    team2 = $percent2    DRAW = $percent3<br> Win TEAM : $winTeamID  TEAM GOAL ADDITION : $realGoalAddition </b><br>";

                        $queryToGetAllUser = "SELECT * FROM usermatchscore WHERE MID = $MID";
                        if($resultSetData = mysql_query($queryToGetAllUser)) {
                            echo '<table border=1px width="60%">';
                            while ($row = mysql_fetch_array($resultSetData)) {

                                $userEmail = mysql_real_escape_string($row['user_email']);
                                $userID = mysql_real_escape_string($row['UID']);
                                $userScore1 = mysql_real_escape_string($row['score1']);
                                $userScore2 = mysql_real_escape_string($row['score2']);
                                $userGoalAddition = $userScore1 + $userScore2;
                                $absoluteGoalDiff = abs($realGoalAddition - $userGoalAddition);


                                //finding users win TEAM prediction   *********************
                                $userWinTeamID = 0;
                                if($userScore1 > $userScore2)  // team1 won
                                    $userWinTeamID = 1;
                                else if($userScore1 < $userScore2)  //team2 won
                                    $userWinTeamID = 2;
                                //*********************************************************


                                if($winTeamID == $userWinTeamID) {
                                    $scoreDeduction = $absoluteGoalDiff*2;

                                    if($winTeamID == 1)
                                        if(mysql_query("UPDATE usermatchscore SET mPoints=$percent2 - $scoreDeduction,goalDiff = $absoluteGoalDiff  WHERE UID = $userID and MID = $MID")) {
                                            echo '<tr><td>'.$userEmail.' </td><td>'.$team1score.' - '.$team2score.'</td><td>'.$userScore1.' - '.$userScore2.'</td><td> : TOTAL POINTS &nbsp;&nbsp;&nbsp;&nbsp;    '.($percent2 - $scoreDeduction).' </td>  <td>   GD : '.$absoluteGoalDiff.'</td></tr>';
                                        }
                                    if($winTeamID == 2)
                                        if(mysql_query("UPDATE usermatchscore SET mPoints=$percent1 - $scoreDeduction,goalDiff = $absoluteGoalDiff WHERE UID = $userID and MID = $MID")) {
                                            echo '<tr><td>'.$userEmail.' </td><td>'.$team1score.' - '.$team2score.'</td><td>'.$userScore1.' - '.$userScore2.'</td><td> : TOTAL POINTS  &nbsp;&nbsp;&nbsp;&nbsp;   '.($percent1 - $scoreDeduction).' </td>  <td>   GD : '.$absoluteGoalDiff.'</td></tr>';
                                        }
                                    if($winTeamID == 0)
                                        if(mysql_query("UPDATE usermatchscore SET mPoints=$percent3 - $scoreDeduction,goalDiff = $absoluteGoalDiff WHERE UID = $userID and MID = $MID")) {
                                            echo '<tr><td>'.$userEmail.' </td><td>'.$team1score.' - '.$team2score.'</td><td>'.$userScore1.' - '.$userScore2.'</td><td> : TOTAL POINTS   &nbsp;&nbsp;&nbsp;&nbsp;   '.($percent3 - $scoreDeduction).' </td>  <td>   GD : '.$absoluteGoalDiff.'</td></tr>';
                                        }


                                }else {
                                    // Deducting points for the GOAL difference *************************
                                    $scoreDeduction = $absoluteGoalDiff*2;
                                    if(mysql_query("UPDATE usermatchscore SET mPoints=-$scoreDeduction,goalDiff = $absoluteGoalDiff WHERE UID = $userID and MID = $MID")) {
                                        echo '<tr><td>'.$userEmail.' </td><td> </td><td> </td><td> </td><td>   GD : '.$absoluteGoalDiff.'</td></tr>';
                                    }
                                    // ****************** Deducting points for the GOAL difference
                                }



                                $queryUpdateTotalScore = "UPDATE userscore SET points=(SELECT sum(mPoints) FROM usermatchscore WHERE UID = $userID),goalDiff=(SELECT sum(goalDiff) FROM usermatchscore WHERE UID = $userID) WHERE UID = $userID";
                                if(mysql_query($queryUpdateTotalScore));


                            }
                            echo '</table>';
                        }

                    }
                }else {
                    echo 'Some data is EMPTY';
                }
            }else {
                echo 'Some data is not set';
            }
    ?>
    </body>
</html>
    <?php
}
else {
    header('Location: AdminLoginAuthentication.php');
}

// IF goals are in range [0,10]
function checkGoal($team1score,$team2score) {
    $t1 = $team1score >=0 && $team1score <=10;
    $t2 = $team2score >=0 && $team2score <=10;

    return $t1&&$t2;

}

?>