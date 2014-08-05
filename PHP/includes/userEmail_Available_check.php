<?php
include 'database_connectivity_includes.php';
if(isset($_POST['userEmail']) && !empty($_POST['userEmail'])) {
    $uEmail=  mysql_real_escape_string(htmlentities($_POST['userEmail']));
    if($result_from_users_data=mysql_query("SELECT user_email from userdata where user_email like '$uEmail'")) {
        $row1=  mysql_num_rows($result_from_users_data);
        if($row1 == 1) {
            echo 'Email Address is Already in use!';
        }
    }
}
?>


