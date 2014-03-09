var wd, p=1;

function comm(){
    $('*').click(function(){ tog_off(); });
}

function tog_off(){
    if($('#header').css('top')=='0px') $('#header').animate({top: '-145px'},"slow");
}
function init(a){
    wd = parseInt($('#container').css('width'));
    $('.page').css({width: wd});
    $('#scroller').css({width: a*wd});
}

function browse(a){
    $(".lact").removeClass("lact");
    $("#l"+a).addClass("lact");
   // $('#scroller').animate({marginLeft: (p-a)*wd-((a-p)*10)},"fast", function(){$('#scroller').animate({marginLeft: '-='+((p-a)*10)});});
    if(a>p){
        $('#scroller').animate({left: (((a-1)*wd*(-1))-20)+'px' }, function (){ 
            $('#scroller').animate({left: '+=20px' });
        }); 
    }else{
        $('#scroller').animate({left: (((a-1)*wd*(-1))+20)+'px' }, function (){
            $('#scroller').animate({left: '-=20px' });});
    }
    p=a;
}

function hd_tog(s){
    if($('#header').css('top')=='0px') $('#header').animate({top: '-145px'},"slow");
    else $('#header').animate({top: '0px'},"slow");
}

function _e(y){
    x=$("#"+y).val();
    if(x==''|| x==' ') return true;
    else return false;
}

function hlp1(){
    $("#sbtn").removeClass("disabled");
    $("#bar").html("");
}

function enrol_me(){
    $("#sbtn").addClass("disabled");
    $("#bar").html('<div class="progress progress-striped active"><div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>');
    var n=0, acc= 0, ev = new Array();
    $("input:checked").each(function() {
       if(!isNaN($(this).val())){
       ev.push($(this).val()); n++;
       }else acc= 1;
    });
    if(_e("fname")|| _e("mail") ||  _e("mob") || n==0){
        $("#msg").html('<p class="alert alert-warning">Hey you can not leave a field blank!');
        hlp1();
        return;
    }
    var d= "name=" + encodeURIComponent($("#fname").val()) + "&mail=" + encodeURIComponent($("#mail").val()) + "&ins=" + encodeURIComponent($("#ins").val()) + "&events=" + encodeURIComponent(ev) + "&mob=" + encodeURIComponent($("#mob").val()) + "&acc=" + encodeURIComponent(acc);
    var aj=$.ajax({
                url: "userRegistration.php",
                type: "POST",
                data: d,
                timeout: 20000
           });
    aj.done(function(msg){
        if(msg=="error"){
            $("#msg").html('<p class="alert alert-warning">Looks like something went wrong. Please re submit.</p>');
        }else if(msg=="spam"){
            $("#msg").html('<p class="alert alert-warning">~_~ &nbsp;DO NOT sneek around. Expecting a proper input this time.</p>');
        }else{
            $("#msg").html('<p class="alert alert-info">'+msg+'</p>');
        }
        hlp1();
    });
    aj.fail(function(msg){
        $("#msg").html('<p class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> Sorry unable to request Server.</p>');
        hlp1();
    });
}

function sub_q(){
    if(_e("name")|| _e("mail") || _e("umsg")){
        $("#msg").html('<p class="alert alert-warning">Hey you can not leave a field blank!');
        return;
    }
    $("#sbtn").addClass("disabled");
    var d= "name=" + encodeURIComponent($("#name").val()) + "&mail=" + encodeURIComponent($("#mail").val()) + "&msg=" + encodeURIComponent($("#umsg").val());
    var aj=$.ajax({
                url: "contactH.php",
                type: "POST",
                data: d,
                timeout: 20000
           });
    aj.done(function(msg){
        if(msg=="error"){
            $("#msg").html('<p class="alert alert-warning">Looks like something went wrong. Please re submit.</p>');
        }else if(msg=="spam"){
            $("#msg").html('<p class="alert alert-warning">~_~ &nbsp;DO NOT sneek around. Expecting a proper input this time.</p>');
        }else{
            $("#msg").html('<p class="alert alert-info">'+msg+'</p>');
        }
        $("#sbtn").removeClass("disabled");
    });
    aj.fail(function(msg){
        $("#msg").html('<p class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> Sorry unable to request Server.</p>');
        $("#sbtn").removeClass("disabled");
    });
}

function loadEve(){
    $("#container").load("eveH.php", function (){
        init(12);
        setTimeout(function (){
            $("#shutter").fadeOut("slow");
            setTimeout(function (){
                $("#odm").addClass("oef");
            },5000);
        },10000);
    });
}

function loadODM(){
    
}