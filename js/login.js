//login JS  ********************************************
$('#login').click(function(){
    login_clicked();

});

function runScript(e) {
    if (e.keyCode == 13) {
        login_clicked();
    }
}

function login_clicked(){

    var cookieFlag=false;
    if($('#keep-logged-in').is(":checked"))
        cookieFlag=true;

    var loginflag=true;
    var login_email=$('#email').val();
    var login_pass=$('#pass').val();
    if(login_email=="" && login_pass==""){
        //alert("Enter Email Address and Password");
        $('#email,#pass').css('border-color','red');
        $('#email,#pass').css('box-shadow', '0px 0px 5px red');

        loginflag=false;
    }
    else if(login_email==""){
        //alert("Enter Email Address");
        $('#email').css('border-color','red');
        $('#email').css('box-shadow', '0px 0px 5px red');
        loginflag=false;
    }
    else if(login_pass==""){
        //alert("Enter PassWord");
        $('#pass').css('border-color','red');
        $('#pass').css('box-shadow', '0px 0px 5px red');
        loginflag=false;
    }
    if(loginflag==true){
        $.post('PHP/login_validation.php',{
            login_email:login_email,
            login_pass:login_pass,
            cookieFlag:cookieFlag
        },
        function(data){
            if(data=="done"){
                if(cookieFlag == true)
                {
                    var exdate = new Date();
                    exdate.setDate(exdate.getDate() + 30);
                    document.cookie="emailID="+login_email+"; expires="+exdate;
                    document.cookie="password="+login_pass+"; expires="+exdate;
                }
                window.location="home.php";
            }
            else
            {
                $('.errormsg').text(data);
            }
        });
    }
}



$('#email').focus(function(){
    $('#email').css('border-color','#12DEE5');
    $('#email').css('box-shadow', '0px 0px 5px #12DEE5');
});
$('#email').focusout(function(){
    $('#email').css('border-color','silver');
    $('#email').css('box-shadow', 'none');
});
$('#pass').focus(function(){
    $('#pass').css('border-color','#12DEE5');
    $('#pass').css('box-shadow', '0px 0px 5px #12DEE5');
});
$('#pass').focusout(function(){
    $('#pass').css('border-color','silver');
    $('#pass').css('box-shadow', 'none');
});
//login JS  ********************************************


//register JS  ********************************************
function validateForm()
{
    var s1=validateUserName();
    var s2=validateEmail();
    var s3=validatePassword();
    var s4=validateName();
    if(s1&&s2&&s3&&s4)
    {
        return true;
    }
    return false;
}
function validateUserName()
{
    var f=document.getElementById("user_name").value;
    if(f=="")
    {
        $('#user_name').css('border','1px solid red');
        $('#user_name').css('box-shadow', '0px 0px 5px red');
        return false;
    }
    else
    {
        $('#user_name').css('border-color','silver');
        $('#user_name').css('box-shadow', 'none');
        return true;
    }
}

function validateEmail()
{
    var e=document.getElementById("user_email").value;
    if(e=="")
    {
        $('#user_email').css('border','1px solid red');
        $('#user_email').css('box-shadow', '0px 0px 5px red');
        return false;
    }
    else
    {
        //var rule=/^[a-zA-Z]+(\.[0-9]+[a-zA-Z]|_[0-9]+|_[0-9]+[a-zA-Z]+|[0-9]+_[a-zA-Z]+|_[a-zA-Z]+|\.[0-9]+|[0-9]+|[0-9]+[a-zA-Z]+|[a-zA-Z]*|\.[a-zA-Z]+|\.[a-zA-Z]+[0-9]+)(@)[a-zA-Z]+\.([a-zA-Z]+|[a-zA-Z]+\.[a-z]{2})$/;
        var rule= /^[a-zA-Z0-9_\.]+(@)[a-zA-Z]+\.([a-zA-Z]{2,3}|[a-zA-Z]+\.[a-z]{2})$/;
        if(!e.match(rule))
        {
            document.getElementById("wrongEmailError").style.display="block";
            return false;

        }
        else
        {
            document.getElementById("wrongEmailError").style.display="none";
            $('#user_email').css('border-color','silver');
            $('#user_email').css('box-shadow', 'none');
            return true;
        }
    }
}
function validatePassword()
{
    var pass=document.getElementById("user_password").value;
    if(pass=="")
    {
        $('#user_password').css('border','1px solid red');
        $('#user_password').css('box-shadow', '0px 0px 5px red');
        return false;
    }
    else if(pass.length<8)
    {
        $('#user_password').css('border','1px solid red');
        $('#user_password').css('box-shadow', '0px 0px 5px red');
        document.getElementById("passwordError").style.display="block";
        return false;
    }
    else
    {
        document.getElementById("passwordError").style.display="none";
        $('#user_password').css('border-color','silver');
        $('#user_password').css('box-shadow', 'none');
        return true;
    }
}

function validateName(){
    var f=document.getElementById("full_name").value;
    if(f=="")
    {
        $('#full_name').css('border','1px solid red');
        $('#full_name').css('box-shadow', '0px 0px 5px red');
        return false;
    }
    else
    {
        $('#full_name').css('border-color','silver');
        $('#full_name').css('box-shadow', 'none');
        return true;
    }
}




var userNameFlag=true;
$('#user_name').focus(function(){
    $('#user_name_status').html("");
});
$('#user_name').blur(function(){
    var uName=jQuery.trim($(this).val());
    $.post('PHP/includes/userName_Available_check.php',{
        userName:uName
    } ,

    function(data1){
        data1=data1+"";
        if(data1.indexOf('User Name is not available')!=-1)
        {
            userNameFlag=false;
            $('#user_name_status').html(data1);
            $('#user_name').css('border','1px solid red');
            $('#user_name').css('box-shadow', '0px 0px 5px red');
        }else{
            userNameFlag=true;
            $('#user_name_status').html("");
        }
    });
});


var userEmailFlag=true;
$('#user_email').focus(function(){
    $('#user_email_status').html("");
});
$('#user_email').blur(function(){
    var uEmail=jQuery.trim($(this).val());
    $.post('PHP/includes/userEmail_Available_check.php',{
        userEmail:uEmail
    } ,

    function(data1){
        data1=data1+"";
        if(data1.indexOf('Email Address is Already in use')!=-1)
        {
            userEmailFlag=false;
            $('#user_email_status').html(data1);
            $('#user_email').css('border','1px solid red');
            $('#user_email').css('box-shadow', '0px 0px 5px red');
        }else{
            userEmailFlag=true;
            $('#user_email_status').html("");
        }
    });
});

$('#submit').click(function(){
    if(validateForm() && userNameFlag && userEmailFlag)
    {
        var u_name=$('#user_name').val();
        var email=$('#user_email').val();
        var password=$('#user_password').val();
        var fullname=$('#full_name').val();

        $.post('PHP/includes/register_database.php',{
            input1:u_name,
            input2:email,
            input3:password,
            input4:fullname
        },
        function(data){
            if(data=="success")
            {
                window.location="login.php";
            }
        });
    }else{
        if(!userNameFlag)
        {
            $('#user_name').css('border','1px solid red');
            $('#user_name').css('box-shadow', '0px 0px 5px red');

        }
        if(!userEmailFlag)
        {
            $('#user_email').css('border','1px solid red');
            $('#user_email').css('box-shadow', '0px 0px 5px red');
        }

    }
});
//register JS  ********************************************

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


$('.subItem').click(function(){
    $('.selecte-item').removeClass('selecte-item');
    $(this).addClass('selecte-item').hide().fadeIn(500);
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

