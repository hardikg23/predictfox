<?php
include 'header.php';
include 'PHP/includes/database_connectivity_includes.php';
@session_start();
include 'PHP/includes/session_setter.php';
?>
<html>
    <head>
        <title>
            PredictFOX
        </title>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" type="text/css" href="css/help.css">
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <body>

        <div style="width: 100%;height: 150px;position: absolute;left: 0px;top: 125px;">
            <div class="container" style="width: 100%;height: 130px;background-color:#000148;position: absolute;left: 0px;top: 20px;border-top: 1px solid #868686;">
            </div>
            <div class="match-container">
                <?php include 'PHP/includes/matchContainer.php';?>
            </div>
            <div class="main-container">
                <?php include 'PHP/includes/submenu.php';?>

                <div class="nevigation" style="position: absolute;width:180px;height: 300px; top: 80px;left: 0px;">
                    <table class="hMenu-table" style="width: 100%;height: 100%;">
                        <tr><td align="center"><a class="haSubMenu" href="#"><div class="hsubItem hselecte-item about"><br>About PredictFOX</div></a></td> </tr>
                        <tr><td align="center"><a class="haSubMenu" href="#"><div class="hsubItem howToPlay"><br>How to play</div></a></td></tr>
                        <tr><td align="center"><a class="haSubMenu" href="#"><div class="hsubItem erning"><br>Erning points</div></a></td></tr>
                        <tr><td align="center"><a class="haSubMenu" href="#"><div class="hsubItem league"><br>League</div></a></td></tr>
                        <tr><td align="center"><a class="haSubMenu" href="#"><div class="hsubItem faqs"><br>FAQ's</div></a></td></tr>
                    </table>
                </div>
                <div class="help-container" style="position: absolute;width:700px; top: 80px;left: 200px;color: #515151;">
                    <div class="aboutC visibleDiv" style="visibility: visible;position: absolute;top: 0px;">
                        <div style="width: 680px;border-bottom: 1px solid silver;height: 30px;font-size: 24px;padding-left: 20px;">
                            About PredictFOX
                        </div>
                        <p class="visibleDiv-containt">
                            &nbsp; &nbsp; &nbsp; &nbsp;  PredictFox is a website aimed towards football aficionados.
                            It aims to introduce an element of boisterousness and predictions into this year's football world cup.
                            Users can use this website to make bold predictions regarding the outcome of all the matches that
                            would be taking place during the course of the 2014 FIFA World Cup.
                            And If their predictions do indeed come true, then would earn precious points.
                            The users who are consistently able to make perfect predictions will top the table.
                            <br><br>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            Then there is also a concept of Leagues, which users can create in order to
                            invite their friends into using this website and have a great
                            time sharing progress and points.
                            Football lovers will definitely find visiting this website more often during the forthcoming period.
                        </p>
                    </div>
                    <div class="howToPlayC visibleDiv" style="visibility: hidden;position: absolute;top: 0px;">
                        <div style="width: 680px;border-bottom: 1px solid silver;height: 30px;font-size: 24px;padding-left: 20px;">
                            How to play
                        </div>
                        <p class="visibleDiv-containt">
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            Playing on PredictFox is pretty simple.
                            It's all about making predictions regarding who will win the current contest.
                            Supposing there's a match being played between Brazil and Croatia.
                            Users are required to predict two things-Which Team will win the match? And by what score would they win?
                            <br><br>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            Based on the number of users who have registered on the website and have made predictions,
                            they will be divided into 3 categories- Percentage of people who think TEAM A will win ,
                            Percentage of people who think TEAM B will win and Percentage of people who think  that match will be a draw.
                            Taking our previous example, if there's a match between Brazil and Croatia,
                            the homepage would display the percentage of people supporting Brazil to win (say 66%),
                            the percentage of people who support Croatia to win (say 32%)
                            and Percentage of people who think that the match will be a draw.(say 1%).
                            <br><br>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            Now suppose, you as a user had predicted that Brazil would win and if it does win,
                            then you will score exactly the that much points,
                            as were the percentage of people supporting Croatia (ie-33 in this case.)
                            But if Brazil loses, then you won't gain any points and The supporters of Croatia
                            would gain that many points as were the Supporters of Brazil (ie-66 in this case.).
                            and if the match turns  to be a draw,
                            then only those users who had predicted a draw will gain that many points as were the percentage
                            of users who had predicted a draw.(ie-1 in our case)and the rest of the users wont gain anything.
                            Simple enough!
                            <br><br>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            The Detailed pointing system is explained in the Earning Points section.
                        </p>
                    </div>
                    <div class="erningC visibleDiv" style="visibility: hidden;position: absolute;top: 0px;">
                        <div style="width: 680px;border-bottom: 1px solid silver;height: 30px;font-size: 24px;padding-left: 20px;">
                            Erning points
                        </div>
                        <p class="visibleDiv-containt">
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            In the How to play section,
                            we have given you a fairly good explanation about how and how much points a user can gain.
                            But the prediction regarding the exact score line by which a particular team will win or lose,
                            will deduct some of your points.
                            <br><br>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            Say for example, taking the previous case,
                            that you predict that Brazil wins against Croatia by a score of 2-0
                            if Brazil wins the match with the scoreboard showing the exact same score line that you had predicted,
                            then you will not lose any points.
                            But Take another scenario, If the user predicts that Brazil will win the match with a score 2-0.
                            But instead the match ends in a draw at 2-2,
                            then the user will lose 4 points, 2 points each for 1 wrongly predicted goal.
                            Since in this case, he had predicted 2 wrong goals, therefore he loses 4 points.
                            The basic formula being used to deduct points is-
                            <br>
                            <b>Number of points lost = ((Number of actual match goals)-(Number of predicted goals))*2</b>
                            <br><br>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            Consider another scenario. If the user predicts that Brazil will win with a score of 4-2. But instead, Brazil wins with a score of 2-1, then in this case, the user loses 6 points, by applying the above formula.
                            <br><br>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            You can apply this to many different scenarios that would arise. Point deduction is being done to normalize the overall points gained by all users.
                        </p>
                    </div>
                    <div class="leagueC visibleDiv" style="visibility: hidden;position: absolute;top: 0px;">
                        <div style="width: 680px;border-bottom: 1px solid silver;height: 30px;font-size: 24px;padding-left: 20px;">
                            League
                        </div>
                        <p class="visibleDiv-containt">
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            There is also a concept of Leagues that users can utilize. The Basic concept behind leagues is to enable users to spread the word about him/her joining this website amongst his likeminded friends and invite them to join too. There are two types of leagues that exist-Private League and Public League. Those users who wish to create a league of their own can create a Private League and then invite their friends to join that league. The League Code will not be visible to others.
                            <br><br>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            There's also public league. This league is declared as public by the one who created it originally and is open to everybody to join. The League Code will be visible to others


                        </p>
                    </div>
                    <div class="faqsC visibleDiv" style="visibility: hidden;position: absolute;top: 0px;">
                        <div style="width: 680px;border-bottom: 1px solid silver;height: 30px;font-size: 24px;padding-left: 20px;">
                            FAQ's
                        </div>
                        <p class="visibleDiv-containt">
                            <b><i>1. Till what time can I submit my prediction for any match?</i></b><br>
                            You can submit your prediction one hour before the schedule start of match.
                            <br><br>

                            <b><i>2. What is the difference between public and private league?</i></b><br>
                            In public league, League Code is visible to everyone but in private league, League Code will not be visible to anyone.
                            <br><br>

                            <b><i>3. What if match goes into penalty shootout?</i></b><br>
                            If any match goes into penalty shootout then score line will only be consider till the 120mins (90mins + ET). But winner and loser will be decided from penalty shootout.
                            <br><br>

                            <b><i>4. What if any team scores more than 10 goals in a match?</i></b><br>
                            If any team score 10+ goals in a match, then goals will be consider as 10 only and points will apply to user as per 10 goals.
                            <br><br>

                            <b><i>5. How many public and private leagues can I create and join?</i></b><br>
                            You can create or join any number of leagues you want.
                            <br><br>


                        </p>
                    </div>

                </div>
                <div style="position: absolute;top: 500px;opacity:0">a</div>
            </div>
        </div>
        <script type="text/javascript" src="js/help.js"></script>
    </body>
</html>