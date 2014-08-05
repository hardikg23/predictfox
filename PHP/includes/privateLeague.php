<div class="league-header" style="width: 190px;height: 30px;position: absolute;top: 0px;">
    <div style="position: absolute;top:6px;left: 5px">LEAGUE</div>
    <div style="position: absolute;top:6px;left: 115px">MEMs</div>
    <div style="position: absolute;top:6px;left: 150px">RANK</div>
</div>
 <div class="main-league-container" style="width: 190px;position: absolute;top: 32px;border: 1px solid silver;">
<?php
$leagueMember='leaguemember';
$leagueCode='leaguecode';
if($resultSet_league_data=mysql_query("select c.leagueID,c.leagueName,c.members
                                                             from $leagueMember l
                                                             INNER JOIN $leagueCode c
                                                             on l.leagueID=c.leagueID
                                                             where user_email='$session_email'")) {
    if(mysql_num_rows($resultSet_league_data)>0) {
        while($row=mysql_fetch_array($resultSet_league_data)) {
            $LeagueID=mysql_real_escape_string($row[0]);
            $LeagueName=mysql_real_escape_string($row[1]);
            $member=mysql_real_escape_string($row[2]);
            $query_to_find_rank="SELECT count(s.user_email) FROM $leagueMember s
                                                       INNER JOIN $userTable u on s.user_email=u.user_email
                                                       where u.user_points > (select user_points from $userTable
                                                       where user_email='$session_email') AND leagueID = $LeagueID";
            $resultSet_to_find_rank=mysql_query($query_to_find_rank);
            $rankPlayer=mysql_result($resultSet_to_find_rank, 0,0);
            $rank=$rankPlayer+1;


            echo '<a class="main-league-container-item" href=league.php?lid='.$LeagueID.'><div class="main-league-container-item" style="width: 190px;height:28px;">';
            echo "<div style='position: absolute;left: 5px;padding-top: 5px;width:100'>$LeagueName</div>
                 <div style='position: absolute;left: 135px;padding-top: 5px;'>$member</div>
                 <div style='position: absolute;left: 172px;padding-top: 5px;'>$rank</div>";
            echo '</div></a>';

        }

    }else {
        echo 'You are not joined any private league';
    }
}else {
    echo 'SOME ERROR OCCURED.';
}
//*****

?>
 </div>