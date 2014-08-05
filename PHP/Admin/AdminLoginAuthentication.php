<?php
include '../includes/database_connectivity_includes.php';
@session_start();
?>
<?php
if(isset($_POST['adminpassword'])&&isset($_POST['databasepassword'])) {
    if(!empty($_POST['adminpassword'])&&!empty($_POST['databasepassword'])) {
        $adminpass=mysql_real_escape_string(htmlentities($_POST['adminpassword']));
        $databasepass=mysql_real_escape_string(htmlentities($_POST['databasepassword']));


        $adminsalt='691097261532abbb2744d74.47543125';
        $adminhashpassword='c99827488e3dc5a41985551dbd62ff46a05e95133a9b1d5df9ed7be0f80de3ac';
        $databaselogin=  mysql_query("select * from databaselogin_details");
        while($row =  mysql_fetch_array($databaselogin)) {
            $datasalt=mysql_real_escape_string($row['data_salt']);
            $datahashpassword=mysql_real_escape_string($row['data_hash_password']);
        }
        $adminverifypassword = substr($adminsalt, 0, 16) . $adminpass . substr($adminsalt, 16, 16);
        $adminverifypassword = hash("sha256", $adminverifypassword);
        $adminverifypassword = hash("sha256", $adminverifypassword);
        $databaseverifypassword = substr($datasalt, 0, 16) . $databasepass . substr($datasalt, 16, 16);
        $databaseverifypassword = hash("sha256", $databaseverifypassword);
        $databaseverifypassword = hash("sha256", $databaseverifypassword);
        if($adminhashpassword==$adminverifypassword&&$datahashpassword==$databaseverifypassword) {
            $_SESSION['setadminpassword']=$adminpass;
            $_SESSION['setdatabasepassword']=$databasepass;
            echo "<script>window.location='pointUpdate.php'</script> ";
        }
        else {
            echo 'Wrong password';
        }

    }
}
?>



<html>
    <head>

        <title>Authenticate</title>
        <style type="text/css">
            .login-div-container{
                font-family: "Lao UI";
                box-shadow:1px 1px 1px 1px #504848;
                -webkit-box-shadow: 1px 1px 1px 1px #504848;
                -moz-box-shadow:1px 1px 1px 1px #504848;
            }
            .login-but-div{
                width: 75px;
                height: 30px;
                border-radius:3px;
                color: white;
                font-size: 14px;
                font-weight: bolder;
                cursor: pointer;
                background-color: #167C07;
                border: 1px solid black;
                box-shadow:1px 1px 1px 1px #504848;
                -webkit-box-shadow: 1px 1px 1px 1px #504848;
                -moz-box-shadow:1px 1px 1px 1px #504848;
            }
        </style>
    </head>
    <body>
        <div class="login-div-container" align="center" style="border: 1px solid silver;position:absolute;left: 600px;top: 300px;width: 300px;height: 150px;">

            <form name="f" method="post" action="AdminLoginAuthentication.php">
                <table style="border-spacing: 0 0.5em;">
                    <tr style="background-color: #000000;color:white;">
                        <td colspan="2" align="center">
                            AdminLogin
                        </td>

                    </tr>
                    <tr>
                        <td>
                            AdminPassword:
                        </td>
                        <td>
                            <input type="password" name="adminpassword" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            DatabasePassword:
                        </td>
                        <td>
                            <input type="password" name="databasepassword" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Login" class="login-but-div">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>




