<?php
error_reporting( 0 );
session_start();
if(isset ($_SESSION['username']) && isset ($_SESSION['email'])&&isset ($_SESSION['password'])&&isset ($_SESSION['UID'])) {
    if(!empty ($_SESSION['username']))
        $session_username= $_SESSION['username'];
    if(!empty ($_SESSION['email']))
        $session_email= $_SESSION['email'];
    if(!empty ($_SESSION['password']))
        $session_password= $_SESSION['password'];
    if(!empty ($_SESSION['UID']))
        $session_UID= $_SESSION['UID'];
}
else {
    echo("<script>window.location= 'login.php';</script>");
}
?>
