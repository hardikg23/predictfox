<table style="color: #DFDFDF;font-family: AR JULIAN;font-size: 12px;" width="100%" class="table-match-container">
    <tr>
        <?php

        $datetime=date("Y-m-d H:i:s");
        $query = "SELECT f.MID,f.team1ATTR,f.team2ATTR,f.score1,f.score2,f.matchTime,u.`score1`,u.`score2`
                                    FROM fixture f
                                    left join usermatchscore u
                                    on f.MID = u.MID
                                    WHERE f.matchTime >= '$datetime' and u.`UID` = $session_UID
                                    UNION
                                    SELECT MID,team1ATTR,team2ATTR,score1,score2,matchTime,-1,-1
                                    FROM `fixture` WHERE matchTime >= '$datetime'
                                    and MID not in(
                                    SELECT f.MID
                                    FROM fixture f
                                    left join usermatchscore u
                                    on f.MID = u.MID
                                    WHERE f.matchTime >= '$datetime' and u.`UID` = $session_UID) order by `MID` LIMIT 10";
        if($resultSet_of_match = mysql_query($query)) {

            while ($row = mysql_fetch_array($resultSet_of_match)) {
                $MID= mysql_real_escape_string($row['MID']);
                $team1= mysql_real_escape_string($row['team1ATTR']);
                $team2= mysql_real_escape_string($row['team2ATTR']);
                $score1= mysql_real_escape_string($row[3]);
                $score2= mysql_real_escape_string($row[4]);
                $time= mysql_real_escape_string($row['matchTime']);
                $playerSCORE1= mysql_real_escape_string($row[6]);
                $playerSCORE2= mysql_real_escape_string($row[7]);
                $old_date_timestamp = strtotime($time);
                $old_date_timestamp = $old_date_timestamp - '19800';
                $time = date('j,M H:i', $old_date_timestamp).' GMT';

                $fColor = '#B5B5B5';
                if($MID == $matchID) {
                    $fColor = 'white';
                }

                $fSelectedColor = '#D8001D';
                if($playerSCORE1 == -1 || $playerSCORE2 == -1) {
                    $fSelectedColor = '#B5B5B5';
                    $playerSCORE1=$playerSCORE2=0;
                }


                echo "<td align= 'center'>";
                echo "</br><font style='font-size:10px;font-family:Calibri;'>$time</font><br><br>
                                <a href='home.php?matchID=$MID' style='color:$fColor;text-decoration:none'>$team1 Vs $team2</a>
                                <br>
                $score1 - $score2<br>
                                    <hr>
                                    <font style='color:$fSelectedColor'>$playerSCORE1 - $playerSCORE2</font>
                ";
                echo "</td>";

            }
        }
        ?>
    </tr>
</table>