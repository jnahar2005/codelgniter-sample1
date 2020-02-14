//-- Login User onclick login button
$("input[name='loginBtn']").click(function(){
    var username = $("#username").val();
    var password = $("#password").val();
    var hidden_path_info = $("#hidden_path_info").val().substring(1);
    if(username ==''){
        $("#username").css('border-color','red');
        return false;
    }
    if(password ==''){
        $("#password").css('border-color','red');
        return false;
    }
    if(username!='' && password!=''){
        $.ajax({
            url: base_url+'home/userLogin',
            type: 'POST',
            data: {username: username, password: password, hidden_path_info: hidden_path_info},            
            success: function (response){
                var response = JSON.parse(response);
                if(response['status'] == 1){
                    window.location = response['redirect'];
                }else if(response['status'] == 0){
                    $(".loginform_error").show();
                    $('.loginform_error').html(response['messgae']);
                    $("#username").css('border-color','red');
                    $("#password").css('border-color','red');
                }else{
                    $(".loginform_error").show();
                    $('.loginform_error').html(response.message.username);
                    $("#username").css('border-color','red');
                    $("#password").css('border-color','red');
                }
            }
        });
    }
});

//-- Login User onkeypress enter button
$('input').keypress(function (e) {
    if(e.which == 13) {
        $('input[name = loginBtn]').click();
        return false;  
    }
});   

//-- Login alertify Message bok show onclick booking
$('a#alertifyLogin').click(function(e) {
    e.preventDefault();
    alertify.alert('Please login first or create an account to book the appointment');
});   



//--- 20 Minute sosson logout manage.
var idleTime = 0; var s=0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60*1000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {    
    idleTime = idleTime + 1;
    if (idleTime > 18) { // 20 minutes 
        $.ajax({
            url: base_url+'home/sessionCheck',
            success: function (result) { 
                if(result == '1' && s==0){s++;
                    $("#sessionModal").modal('show');;
                    startTimer();
                }
            }
        });
    }
}

function startTimer() {
    var duration = 60 * 5;
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        document.querySelector('#time').textContent = minutes + ":" + seconds;
        if (--timer < 0) {
            logout();
            timer = duration;
        }
    }, 1000);
}

//-- On click stay login reset Session
function resetSession() {
    $.ajax({
        url: base_url+'home/resetSession',
        success: function (result) { 
            if(result == '1'){
                $('#sessionModal').modal('hide');
                window.location = base_url+'dashboard';
            }else{
                window.location = base_url+'home/logout';
            }
        }
    });
}

//-- Sleep mode logout function
var SAMPLE_RATE = 1000; // 1 seconds
var lastSample = Date.now();
function sample() {
    if(sessionStorage.getItem("sleepSessionStatus")==1){
        $.ajax({
            url: base_url+'home/sessionCheck',
            success: function (result) { 
                sessionStorage.clear()
                window.location = base_url+'home/logout';
            }
        });
    }
    var sleepIdleTime = 60000*20;
    if (Date.now() - lastSample >= sleepIdleTime) {
        sessionStorage.setItem("sleepSessionStatus", 1);
    }
    lastSample = Date.now();
    setTimeout(sample, SAMPLE_RATE);
}
sample();

function logout(){
    $('#sessionModal').modal('hide')
    window.location = base_url+'home/logout';
}