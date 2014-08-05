<?php
include 'database_connectivity_includes.php';
if(isset($_POST['userName']) && !empty($_POST['userName'])) {
    $uName=  mysql_real_escape_string(htmlentities($_POST['userName']));
    if($result_from_users_data=mysql_query("SELECT user_name from userdata where user_name like '$uName'")) {
        $row1=  mysql_num_rows($result_from_users_data);
        if($row1 == 1) {
            echo 'User Name is not available';
        }
    }
}
?>


