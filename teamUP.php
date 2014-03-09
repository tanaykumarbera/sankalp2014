<?php
    $title= "Team Registration";
    require_once './header.php';
?>
<?php
    $events= array(array('Eid'=>'1','Ename'=>'aaaaaaaaaaa'),
                array('Eid'=>'1','Ename'=>'aaaaaaaaaaa'),
                array('Eid'=>'1','Ename'=>'aaaaaaaaaaa'));
?>
        <section>
            <div class="container" style="background: url('_img/be.jpg') no-repeat right; padding-top: 100px;">
                <div class="row" style="background: rgba(255,255,255,0.8); height: 600px; padding: 100px 50px;">
                    <div class="col-sm-offset-2 col-sm-4">
                        <div class="input-group form-group">
                            <label class="input-group-addon">MEMBER 01</label>
                            <input type="text" name="m1" id="m1" class="form-control" placeholder="Registration ID"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">MEMBER 02</label>
                            <input type="text" name="m2" id="m2" class="form-control" placeholder="Registration ID"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">MEMBER 03</label>
                            <input type="text" name="m3" id="m3" class="form-control" placeholder="Registration ID"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">MEMBER 04</label>
                            <input type="text" name="m4" id="m4" class="form-control" placeholder="Registration ID"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">MEMBER 05</label>
                            <input type="text" name="m5" id="m5" class="form-control" placeholder="Registration ID"/>
                        </div>
                        <hr/>
                        <div class="row">
                            <input type="button" class="btn btn-danger" id="rbtn" value="reset" onclick="reset();"/>
                            <input type="button" class="btn btn-primary pull-right" id="sbtn" value="proceed" onclick="team();"/>
                        </div>
                        <div id="msg" class="row" style="margin-top: 20px;"></div>
                    </div>
                    <div id="tmEve" class="col-sm-5">
                        <p class="text-right">Pick the events</p>
                        <hr/>
                        <div id="eveChk" style="padding-left: 50px;">
                            <p>Please Enter user Registration ID and click on proceed below. The Events which are common to all users, will be appearing here. Choose the events, give a team name and press TEAM UP. Do not forget to provide the Team ID generated afterwards.</p>
                        </div>
                        <hr/>
                        <div class="row">
                            <div id="bar" class="col-sm-8" style="padding-top: 8px;"></div>
                            <input type="button" class="btn btn-primary col-lg-4 pull-right disabled" id="tbtn" value="Team Up" onclick="team_up();"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php require_once './scripts.php';?>        
        <script type="text/javascript">
            $(document).ready(function(){
               comm();
            });
            
            function reset(){
                $("#m1, #m2, #m3, #m4, #m5").val("");
                $("#eveChk").html('<p>Please Enter user Registration ID and click on proceed below. The Events which are common to all users, will be appearing here. Choose the events, give a team name and press TEAM UP. Do not forget to provide the Team ID generated afterwards.</p>');
                $("#sbtn").removeClass("disabled");
                $("#tbtn").addClass("disabled");
                $("#msg, #bar").html("");
            }
            function team(){
                $("#sbtn").addClass("disabled");
                var d= "m1="+$("#m1").val()+"&m2="+$("#m2").val()+"&m3="+$("#m3").val()+"&m4="+$("#m4").val()+"&m5="+$("#m5").val();
                var aj=$.ajax({
                        url: "teamH.php",
                        type: "POST",
                        data: d,
                        timeout: 10000
                   });
                   
                aj.done(function(msg){
                    if(msg=="error"){
                        $("#msg").html('<p class="alert alert-warning">Looks like something went wrong. Please re submit.</p>');
                    }else{
                        var json= $.parseJSON(msg);
                        if(json['flag']){ 
                            var i, l= json['cat'].length, s='';
                            for(i=0; i<l; i++){
                                s = s + '<div class="checkbox"><label><input type="checkbox" name="events" id="events" value="' + json['cat'][i]['Eid'] + '" onclick="amnt()" amt="'+ json['cat'][i]['Ecost'] +'"/>&nbsp;' + json['cat'][i]['Ename'] + '</label></div>';
                            }
                            s+='<input type="text" class="form-control" id="tnam" placeholder="Team Name"/>';
                            $("#eveChk").html(s);
                            $("#tbtn").removeClass("disabled");
                        }else{
                            var l= json['user'].length, s='Recheck ID(s)';
                            for(i=0; i<l; i++){
                                s = s + '&nbsp;&nbsp;' + json['user'][i];
                            }
                            $("#msg").html('<p class="alert alert-danger">'+s+'</p>');
                            $("#sbtn").removeClass("disabled");
                        }
                    }
                });
                aj.fail(function(msg){
                    $("#msg").html('<p class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> Sorry unable to request Server.</p>');
                    $("#sbtn").removeClass("disabled");
                });
            }
            function amnt(){
                var s=0;
                $("input:checked").each(function(){
                    s+=parseInt($(this).attr("amt"));
                });
                $("#bar").html('<p>Amount: Rs '+s+'</p>');
            }
            function team_up(){
                var aj=$.ajax({
                        url: "groupReg.php",
                        type: "POST",
                        data: d,
                        timeout: 10000
                   });
                   
                aj.done(function(msg){
                    if(msg=="error"){
                        $("#msg").html('<p class="alert alert-warning">Looks like something went wrong. Please re submit.</p>');
                    }else{
                        $("#eveChk").html('<p class="alert alert-success">Team Registered Successfully. TEAM ID: TM'+msg+'</p>');
                    }
                });
                aj.fail(function(msg){
                    $("#msg").html('<p class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> Sorry unable to request Server.</p>');
                    $("#sbtn").removeClass("disabled");
                });
            }
        </script>
<?php require_once './footer.php';?>