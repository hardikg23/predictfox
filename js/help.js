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

$('.hsubItem').click(function(){
    $('.hselecte-item').removeClass('hselecte-item');
    $(this).addClass('hselecte-item').hide().fadeIn(500);
});


$('.about').click(function(){
    $('.visibleDiv').css('visibility','hidden');
    $('.aboutC').css('visibility','visible');
});

$('.howToPlay').click(function(){
    $('.visibleDiv').css('visibility','hidden');
    $('.howToPlayC').css('visibility','visible');
});
$('.erning').click(function(){
    $('.visibleDiv').css('visibility','hidden');
    $('.erningC').css('visibility','visible');
});

$('.league').click(function(){
    $('.visibleDiv').css('visibility','hidden');
    $('.leagueC').css('visibility','visible');
});
$('.faqs').click(function(){
    $('.visibleDiv').css('visibility','hidden');
    $('.faqsC').css('visibility','visible');
});