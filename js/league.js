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



// LEAGUE CREATION *********************************************************************************
$('#creatLeagueButton').click(function(){
    var name=$('#createLeague_name').val();
    var code=$('#createLeague_code').val();
    var type=$('input[name=type]:checked').val();
    //alert(type+" "+code);
    if(name.length <=5 && code.length <=5)
        $('#createError1').empty().append("League Name AND Code Should be more than 5 Character!!! ");
    else if(name.length <=5)
        $('#createError1').empty().append("League Name Should be more than 5 Character!!! ");
    else if(code.length <=5)
        $('#createError1').empty().append("League Code Should be than 5 Character!!! ");
    else{

        $.post("PHP/createLeague_INSERT.php", {
            cname:name,
            ccode:code,
            type:type
        },
        function(data){
            if(data == 'done'){
                alert('League Created');
                window.location = "league.php";
            }else{
                alert(data);
            }

            
        });
    }
});


// JOIN LEAGUE *********************************************************************************
$('#joinLeagueButton').click(function(){
    var name=$('#joinLeague_name').val();
    var code=$('#joinLeague_code').val();
    //alert(name+" "+code);
    if(name.length <=5 && code.length <=5)
        $('#joinError1').empty().append("League Name AND Code Should be more than 5 Character!!! ");
    else if(name.length <=5)
        $('#joinError1').empty().append("League Name Should be more than 5 Character!!!");
    else if(code.length <=5)
        $('#joinError1').empty().append("League Code Should be more than 5 Character!!!");
    else{
        $.post("PHP/createLeague_INSERT.php", {
            jname:name,
            jcode:code
        },
        function(data){
            if(data == 'done'){
                alert('Joined League.');
                window.location = "league.php";
            }else{
                alert(data);
            }
        });
    }
});