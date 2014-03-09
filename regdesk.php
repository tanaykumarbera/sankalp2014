<?php
    $title= "RegDesk | Sankalp 2k14";
    $uname= "reg";
    $upwd="50bucks";
    
    require_once './protect.php';
    require_once './header.php';
    require_once './req.php';

    try{
        $q= $db->prepare("SELECT * FROM events");
        $q->execute();
        $q->setFetchMode(PDO::FETCH_OBJ);
?>
        <section>
            <div class="container" style="background: url('_img/logof.png') no-repeat right; padding-top: 100px;">
                <div class="row" style="background: rgba(255,255,255,0.4); height: 600px; padding: 50px 50px;">
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" name="srch" id="srch" class="form-control" placeholder="ID / Name / Email "/>
                            <span class="input-group-btn"><input type="button" class="btn btn-primary pull-right" id="srbtn" name="srbtn" value="Search" onclick="ldSrc()"/></span>
                        </div>
                        <hr/>
                        <div id="srbar" class="progress progress-striped"><div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>
                        <hr/>
                        <div id="msg" class="row mT20"></div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">Full Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Full Name (including middle name, if any)"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">Email</label>
                            <input type="email" name="mail" id="mail" class="form-control" placeholder="Please provide a working mailing address"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">Institute</label>
                            <input type="text" name="ins" id="ins" class="form-control" placeholder="Please provide full institutional name"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">Mobile</label>
                            <input type="text" name="mob" id="mob" class="form-control" placeholder="Please provide full institutional name"/>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="checkbox pull-right" style="margin-right: 30px;"><label><input type="checkbox" name="pd50" id="pd50" value="paid"/>&nbsp;Rs 50.00 paid</label></div>
                        </div>
                        <div class="row mT20">
                            <div id="qbar" class="col-sm-8" style="padding-top: 8px;"></div>
                            <input type="button" class="btn btn-primary col-lg-4 pull-right" id="sbtn" value="Update details" onclick="enrol_me();"/>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        
                        <div id="lst" class="list-group" style="height: 300px; overflow-x: hidden; overflow-y: auto; padding-right: 20px; opacity: 0.8; font-family: monospace;">
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    
<?php 
        }catch(PDOException $e){
            file_put_contents('./log.record', date()." :: ".$e->getMessage().PHP_EOL, FILE_APPEND);
        }

    require_once './scripts.php';?>        
        <script type="text/javascript">
            var userID;
            
            function ldSrc(){
                $("#sbtn, #srbtn").addClass("disabled");
                $("#srbar").addClass("active");
                var d= "rd=0&q="+$("#srch").val();
                var aj=$.ajax({
                        url: "srch.php",
                        type: "POST",
                        data: d,
                        timeout: 10000
                   });
                   
                aj.done(function(msg){
                    if(msg=="error"){
                        $("#msg").html('<p class="alert alert-warning">Looks like something went wrong. Please re submit.</p>');
                    }else{ //alert(msg);
                        var json= $.parseJSON(msg), s='';
                        if(json['flag']){
                            for(i=0; i<json['users'].length; i++){
                                s+='<a href="#" onclick="ldinfo('+json['users'][i].id+')"><div class="list-group-item mT20">SN '+json['users'][i].id+' | '+json['users'][i].name+'<br/><sup>'+json['users'][i].mail+'</sup></div></a>';
                            }
                            $("#lst").html(s);
                        }else{
                            $("#lst").html('<p class="alert alert-danger">Sorry No records found!</p>');
                        }
                    }
                    $("#sbtn, #srbtn").removeClass("disabled");
                    $("#srbar").removeClass("active");
                });
                aj.fail(function(msg){
                    $("#msg").html('<p class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> Sorry unable to request Server.</p>');
                    $("#sbtn, #srbtn").removeClass("disabled");
                    $("#srbar").removeClass("active");
                });
            }
            
            function ldinfo(id){
                userID= id;
                $("#sbtn, #srbtn").addClass("disabled");
                $("#srbar").addClass("active");
                var d= "rd=0&uid="+userID;
                var aj=$.ajax({
                        url: "ldinfo.php",
                        type: "POST",
                        data: d,
                        timeout: 10000
                   });
                   
                aj.done(function(msg){// alert(msg);
                    if(msg=="error"){
                        $("#msg").html('<p class="alert alert-warning">Looks like something went wrong. Please re submit.</p>');
                    }else{
                        var json= $.parseJSON(msg);
                        if(json['flag']){ 
                            $("#fname").val(json['user'].name);
                            $("#mail").val(json['user'].mail);
                            $("#ins").val(json['user'].ins);
                            $("#mob").val(json['user'].mob);
                            if(json['user'].paid=="1") $("#pd50").prop("checked", true);
                            else $("#pd50").prop("checked", false);
                            
                        }else{
                            $("#msg").html('<p class="alert alert-danger">Sorry No records found :: SN</p>');
                            $("#sbtn").removeClass("disabled");
                        }
                        $("#sbtn, #srbtn").removeClass("disabled");
                        $("#srbar").removeClass("active");
                    }
                });
                aj.fail(function(msg){
                    $("#msg").html('<p class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> Sorry unable to request Server.</p>');
                    $("#sbtn, #srbtn").removeClass("disabled");
                    $("#srbar").removeClass("active");
                });
            }
    
            function enrol_me(){
                $("#bar").html('<div class="progress progress-striped active"><div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>');
                var acc= 0, ev = new Array();
                $("input:checked").each(function() {
                   if(isNaN($(this).val())) acc= 1;
                });
                if(_e("fname")|| _e("mail")|| _e("mob")){
                    $("#msg").html('<p class="alert alert-warning">Hey you can not leave a field blank!');
                    hlp1();
                    return;
                }
                $("#sbtn, #srbtn").addClass("disabled");
                $("#srbar").addClass("active");
                var d= "name=" + encodeURIComponent($("#fname").val()) + "&mail=" + encodeURIComponent($("#mail").val()) + "&ins=" + encodeURIComponent($("#ins").val()) + "&events=" + encodeURIComponent(ev) + "&acc=" + encodeURIComponent(acc)+ "&uid=" + encodeURIComponent(userID)+ "&mob=" + encodeURIComponent($("#mob").val());
                var aj=$.ajax({
                            url: "vUser.php",
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
                    $("#sbtn, #srbtn").removeClass("disabled");
                    $("#srbar").removeClass("active");
                });
                aj.fail(function(msg){
                    $("#msg").html('<p class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> Sorry unable to request Server.</p>');
                    $("#sbtn, #srbtn").removeClass("disabled");
                    $("#srbar").removeClass("active");
                });
            }

    
            $(document).ready(function(){
               comm();
            });
        </script>
<?php require_once './footer.php';?>