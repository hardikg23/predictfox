<?php
include 'includes/database_connectivity_includes.php';
session_start();
include 'includes/session_setter.php';

if(isset ($_POST['com']) && isset ($_POST['matchId'])) {
    $com= mysql_real_escape_string(htmlentities($_POST['com']));
    $matchId = mysql_real_escape_string(htmlentities($_POST['matchId']));
    if(!empty ($com) && !empty ($matchId)){
        $query = "INSERT INTO `comments`(`TID`, `UID`, `MID`, `user_name`, `commentText`) VALUES ('',$session_UID,$matchId,'$session_username','$com')";
        if(mysql_query($query)){
            echo $session_username;
        }
    }
}
?>