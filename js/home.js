$(document).ready(function(){
    function adjust_window(){
        var winW = $(window).width();
        var matchContainer=$('.match-container').width();
        if(winW >= matchContainer)
        {
            $('.match-container').css('left', winW/2-matchContainer/2);
            $('.main-container').css('left', winW/2-matchContainer/2);
        }
        else{
            $('.match-container').css('left', 0);
            $('.main-container').css('left', 0);
        }
    }
    adjust_window();
    $(window).resize(function(){
        adjust_window();
    });
});
$(document).ready(function(){
    $('.match-container').hide().fadeIn(300);
});

$(document).ready(function(){
    $('#countdown').countdown({
        date: matchTime ,
        currentDate : now
    });
});


var value1=$('#playerscore1').val();
var value2=$('#playerscore2').val();
$(function() {
    $( "#slider" ).slider({
        value:value1,
        min: 0,
        max: 10,
        step: 1,
        animate: "fast",
        slide: function( event, ui ) {
            $( "#amount" ).text(ui.value );
        }
    });
    $( "#amount" ).text($( "#slider" ).slider( "value" ));
});
$(function() {
    $( "#slider1" ).slider({
        value:value2,
        min: 0,
        max: 10,
        step: 1,
        animate: "fast",
        slide: function( event, ui ) {
            $( "#amount1" ).text(ui.value );
        }
    });
    $( "#amount1" ).text($( "#slider1" ).slider( "value" ));
});


$('#bSubmitPrediction').click(function(){
    var score1 = $( "#slider" ).slider( "option", "value" );
    var score2 = $( "#slider1" ).slider( "option", "value" );
    var matchId = $('#matchId').val();
    //alert(matchId);
    $.post('PHP/updateScore.php',{
        score1:score1,
        score2:score2,
        matchId:matchId
    },
    function(data){
        if(data=="success")
        {
            location.reload();
        }else{
            //alert("Some Error occured");
            alert(data);
        }
    });
});

$('#bClearComment').click(function(){
    $('.commentText').val('');
});

$('#bAddComment').click(function(){
    var com = $('.commentText').val();
    var matchId = $('#matchId').val();
    //alert(matchId + " "+ com);
    $.post('PHP/addComment.php',{
        com:com,
        matchId:matchId
    },
    function(data){
       var app = "<div style='width:95%' class='comment-head'>"+data +",</div>"+
                    "<div style='width:95%;padding-left:20px;'>" + com+"</div><br><hr size='1px' style='opacity:0.3'>";
       $('.comment-show').prepend(app).fadeIn(500);
       $('.commentText').val('');
       
    });
});


