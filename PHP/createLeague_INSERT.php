<?php
include 'includes/database_connectivity_includes.php';
@session_start();

include 'includes/session_setter.php';
include 'includes/seriedId_setter.php';
$createLeagueName;
$createLeagueCode;
$joinLeagueName;
$joinLeagueCode;
$codeTable='leaguecode';
$memberTable='leaguemember';
if(isset ($_POST['cname']) && isset($_POST['ccode']) && isset($_POST['type'])) {
    if(!empty ($_POST['cname']) && !empty ($_POST['ccode']) && !empty ($_POST['type'])) {
        $createLeagueName=mysql_real_escape_string(htmlentities($_POST['cname']));
        $createLeagueCode=mysql_real_escape_string(htmlentities($_POST['ccode']));
        $type=mysql_real_escape_string(htmlentities($_POST['type']));
        $leagueID=rand(1000,99999999);
        if(mysql_query("INSERT INTO $codeTable values ('$leagueID','$createLeagueName','$createLeagueCode','$type','$session_email',1)")) {
            if(mysql_query("INSERT INTO $memberTable values ('$leagueID','$session_email')")) {
                echo 'done';
            }
            else {
                echo 'Something went wrong';
            }
        }else {
            echo 'League Name is already in Use';
        }
    }
    else {
        echo 'League Name Or Code is less then 5 Character';
    }
}else if(isset ($_POST['jname']) && isset($_POST['jcode'])) {
    if(!empty ($_POST['jname']) && !empty ($_POST['jcode'])) {
        $joinLeagueName=mysql_real_escape_string(htmlentities($_POST['jname']));
        $joinLeagueCode=mysql_real_escape_string(htmlentities($_POST['jcode']));
        $resultSer_find_LeagueId=mysql_query("SELECT leagueID from $codeTable where leagueName = '$joinLeagueName' AND leagueCode='$joinLeagueCode'");
        if(mysql_num_rows($resultSer_find_LeagueId)==1) {
            $LeagueID=mysql_real_escape_string(htmlentities(mysql_result($resultSer_find_LeagueId, 0, 'leagueID')));
            if(mysql_query("INSERT INTO $memberTable values ('$LeagueID','$session_email')")) {
                mysql_query("UPDATE $codeTable
                                        SET members=members+1
                                        where leagueID=$LeagueID");
                echo 'done';

            }
            else {
                echo 'You Already join in Group';
            }

        }
        else {
            echo 'No League Name with '.$joinLeagueName.' OR Code may be wrong';
        }
    }
    else {
        echo 'League Name Or Code is less then 5 Character';
    }
}else {
    echo 'Error occured';
}
?>
