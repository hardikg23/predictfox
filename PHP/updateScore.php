<?php
include 'includes/database_connectivity_includes.php';
session_start();
include 'includes/session_setter.php';

$score2 = 0;
if(isset ($_POST['score1']) && isset ($_POST['score2']) && isset ($_POST['matchId'])) {
    $score1 = mysql_real_escape_string(htmlentities($_POST['score1']));
    $score2 = mysql_real_escape_string(htmlentities($_POST['score2']));
    if(empty ($score1))
        $score1 = 0;
    if(empty ($score2))
        $score2 = 0;
    $matchId = mysql_real_escape_string(htmlentities($_POST['matchId']));
    // echo $session_UID;
    if($resultSet = mysql_query("SELECT * from usermatchscore where MID = $matchId and UID=$session_UID")) {
        if(mysql_num_rows($resultSet) == 1) {
            //echo 'update';
            if($querySet=mysql_query("SELECT score1,score2 from usermatchscore WHERE MID = $matchId and UID = $session_UID")) {
                $pastScore1 = mysql_real_escape_string(mysql_result($querySet, 0,0));
                $pastScore2 = mysql_real_escape_string(mysql_result($querySet, 0,1));
                if($pastScore1 == $pastScore2){
                    if(mysql_query("UPDATE `fixture` SET draw=draw-1 WHERE MID = $matchId")) {}
                }
                if($pastScore1 > $pastScore2){
                    if(mysql_query("UPDATE `fixture` SET team1SUP=team1SUP-1 WHERE MID = $matchId")) {}
                }
                if($pastScore1 < $pastScore2){
                    if(mysql_query("UPDATE `fixture` SET team2SUP=team2SUP-1 WHERE MID = $matchId")) {}
                }
            }
            if(mysql_query("UPDATE usermatchscore SET score1=$score1,score2=$score2 WHERE MID = $matchId and UID = $session_UID")) {
               if($score1 == $score2){
                    if(mysql_query("UPDATE `fixture` SET draw=draw+1 WHERE MID = $matchId")) {}
                }
                if($score1 > $score2){
                    if(mysql_query("UPDATE `fixture` SET team1SUP=team1SUP+1 WHERE MID = $matchId")) {}
                }
                if($score1 < $score2){
                    if(mysql_query("UPDATE `fixture` SET team2SUP=team2SUP+1 WHERE MID = $matchId")) {}
                }
                echo 'success';
            }
        }else {
            //echo 'insert';
            if(mysql_query("INSERT INTO usermatchscore(`TID`, `UID`, `user_email`, `user_name`, `MID`, `score1`, `score2`, `mPoints`,`goalDiff`) VALUES ('',$session_UID,'$session_email','$session_username',$matchId,$score1,$score2,0,0)")) {

                if($score1 == $score2){
                    if(mysql_query("UPDATE `fixture` SET draw=draw+1 WHERE MID = $matchId")) {}
                }
                if($score1 > $score2){
                    if(mysql_query("UPDATE `fixture` SET team1SUP=team1SUP+1 WHERE MID = $matchId")) {}
                }
                if($score1 < $score2){
                    if(mysql_query("UPDATE `fixture` SET team2SUP=team2SUP+1 WHERE MID = $matchId")) {}
                }

                echo 'success';
            }
        }
    }
}