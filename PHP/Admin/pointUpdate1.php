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
            if(isset ($_GET['mid']) && !empty ($_GET['mid'])) {
                $MID = mysql_real_escape_string(htmlentities($_GET['mid']));

                $query = "SELECT * FROM fixture WHERE updateStatus='no' AND MID = $MID";

                if($matchResultSet = mysql_query($query)) {
                    if(mysql_num_rows($matchResultSet)) {
                        while($row = mysql_fetch_array($matchResultSet)) {
                            $MID = mysql_real_escape_string($row['MID']);
                            $team1 = mysql_real_escape_string($row['team1']);
                            $team2 = mysql_real_escape_string($row['team2']);
                            $score1 = mysql_real_escape_string($row['score1']);
                            $score2 = mysql_real_escape_string($row['score2']);
                            $team1SUP = mysql_real_escape_string($row['team1SUP']);
                            $team2SUP = mysql_real_escape_string($row['team2SUP']);
                            $draw = mysql_real_escape_string($row['draw']);
                            $matchTime = mysql_real_escape_string($row['matchTime']);

                            echo '<form name="f" method="post" action="pointUpdate2.php">';
                            echo '<b>MATCH TIME  : '.$matchTime.' </b> <br><br>';
                            echo "<b>MATCH ID  : <input type='text' name='MID' value = '$MID'></b> <br><br>";
                            echo "$team1 <input type='text' name='team1Score'> - <input type='text' name='team2Score'> $team2 <br><br>";
                            echo "FINISHED:
                                    <select id='finishedID' name ='finishedID'>
                                        <option value='no' selected='selected'>NO</option>
                                        <option value='yes'>Yes</option>
                                    </select><br><br>";

                            echo '<input type="submit" value="submit">
                                    <a href="adminlogout.php" >Logout</a>';
                            echo '</form>';
                        }
                    }else {
                        echo 'Match Finished ';
                    }
                }else {
                    echo 'Query error';
                }
            }else {
                echo 'Some error occured';
            }

            ?>
    </body>
</html>
    <?php
}
else {
    header('Location: AdminLoginAuthentication.php');
}
?>