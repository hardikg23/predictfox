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