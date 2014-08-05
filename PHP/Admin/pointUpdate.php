<?php
include '../includes/database_connectivity_includes.php';
@session_start();
if(isset($_SESSION['setadminpassword'])&&isset($_SESSION['setdatabasepassword'])) {
    ?>
<html>
    <head>
        <style>
            .tableC{
                border:1px solid silver;
                width:80%
            }
            .tableC td{
                border-bottom: 1px solid silver;
                padding-left: 8px;
            }
        </style>
    </head>
    <body>
            <?php
            $datetime=date("Y-m-d H:i:s");
            $query = "SELECT * FROM fixture WHERE updateStatus='no' AND matchTime<'$datetime' ORDER BY  MID ASC";


            if($matchResultSet = mysql_query($query)) {
                echo '<table class="tableC">';
                echo '<tr>
                        <th>MID</th>
                        <th>TEAM1</th>
                        <th></th><th></th>
                        <th>TEAM2</th>
                        <th>team1SUP</th>
                        <th>draw</th>
                        <th>team1SUP</th>
                        <th>TIME</th>
                        <th>UPDATE</th>
                      </tr>';

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

                    echo "<tr>
                        <td>$MID</td>
                        <td>$team1</td>
                        <td>$score1 </td><td> $score2</td>
                        <td>$team2</td>
                        <td>$team1SUP</td>
                        <td>$draw</td>
                        <td>$team2SUP</td>
                        <td>$matchTime</td>
                        <td><a target='_blank' href='pointUpdate1.php?mid=$MID'><input type='button' value='update'></a></td>
                      </tr>";


                }
                echo '</table>';
            }else {
                echo 'Query not exicuted';
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