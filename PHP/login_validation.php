<?php
include 'includes/database_connectivity_includes.php';
if(isset ($_POST['login_email']) && isset ($_POST['login_pass']) && isset ($_POST['cookieFlag'])) {
    $l_email=mysql_real_escape_string(htmlentities($_POST['login_email']));
    $l_pass=mysql_real_escape_string(htmlentities($_POST['login_pass']));
    $cookeiFlag=mysql_real_escape_string(htmlentities($_POST['cookieFlag']));
    if(!empty ($l_email) && !empty ($l_pass) &&  !empty ($cookeiFlag)) {


        //modify
        if($result = mysql_query("select user_password, user_password_salt from userdata where user_email='$l_email'")) {
            if(mysql_num_rows($result) == 1) {
                @$salt = mysql_result($result, 0,1);
                @$dbpassword = mysql_result($result, 0,0);
                $l_pass = substr($salt, 0, 16) . $l_pass . substr($salt, 16, 16);
                $l_pass = hash("sha256", $l_pass);
                $l_pass = hash("sha256", $l_pass);
            }
            //modify
        }


        $query_login="SELECT UID,user_name,user_email,user_password,user_password_salt from userdata where user_email='$l_email' AND user_password='$l_pass'";
        if($result=mysql_query($query_login)) {
            $email_result=mysql_num_rows($result);
            if($email_result==1) {
                while($row=mysql_fetch_array($result)) {  //to get all data.....
                    session_start();
                    $_SESSION['UID']=mysql_real_escape_string($row['UID']);
                    $_SESSION['username']=mysql_real_escape_string($row['user_name']);
                    $_SESSION['email']=mysql_real_escape_string($row['user_email']);
                    $_SESSION['password']=mysql_real_escape_string($row['user_password']);
                }
                echo "done";
            }else{
                echo "Incorrect Email ID or Password";
            }
        }else {
            echo 'Connection Problem. Please try again leter.';
        }
    }
}
?>
