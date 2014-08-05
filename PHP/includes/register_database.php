<?php
include 'database_connectivity_includes.php';
session_start();
$sendData1 = "Required : ";
$sendData2 = "";
$u_name;
$email;
$psward;
if (isset($_POST['input1']) && isset ($_POST['input2']) && isset ($_POST['input3']) && isset ($_POST['input4'])) {
    $u_name =mysql_real_escape_string(htmlentities($_POST['input1']));
    $email = mysql_real_escape_string(htmlentities($_POST['input2']));
    $psward = mysql_real_escape_string(htmlentities($_POST['input3']));
    $fullname = mysql_real_escape_string(htmlentities($_POST['input4']));

    if ($u_name == "" && $email == "" && $psward == "") {
        if ($u_name == "")
            $sendData = +"User name ";
        if ($email == "")
            $sendData = +" Email ";
        if ($psward == "")
            $sendData = +" Password ";
        if ($fullname == "")
            $sendData = +" Full Name ";
        echo $sendData1;
    }
    else {
        if ($ResultSet_of_emailAdd = mysql_query("SELECT user_email from userdata where user_email = '$email'")) { // not registred
            if (mysql_num_rows($ResultSet_of_emailAdd) == 0) {
                $salt = uniqid(mt_rand(), true);
                $salt = substr($salt, 0, 32);
                $psward = substr($salt, 0, 16) . $psward . substr($salt, 16, 16);
                $psward = hash("sha256", $psward);
                $psward = hash("sha256", $psward);

                $datetime=date("Y-m-d H:i:s");
                $query_insert = "insert into userdata values('','$fullname','$email','$psward','$u_name','$datetime','$salt')";
                if (@$query_insert_run = mysql_query($query_insert)) { // insert user
                    $query_login="SELECT UID,user_name,user_email,user_password,user_password_salt from userdata where user_email='$email' AND user_password='$psward'";
                    if($result=mysql_query($query_login)) {
                        $email_result=mysql_num_rows($result);
                        if($email_result==1) {
                            while($row=mysql_fetch_array($result)) {  //to get all data.....
                                $uid=$_SESSION['UID']=mysql_real_escape_string($row['UID']);
                                $uname=$_SESSION['username']=mysql_real_escape_string($row['user_name']);
                                $uemail=$_SESSION['email']=mysql_real_escape_string($row['user_email']);
                                $_SESSION['password']=mysql_real_escape_string($row['user_password']);
                                if(mysql_query("INSERT INTO userscore(TID,UID,user_email,user_name,points,goalDiff) VALUES ('',$uid,'$uemail','$uname',0,0)")){
                                    //echo 'inserted';
                                }
                            }
                        }
                        echo 'success';
                    }
                    else
                        echo 'error';
                }
            }else {
                echo 'Email address already registered.">';
            }
        }
    }
}
