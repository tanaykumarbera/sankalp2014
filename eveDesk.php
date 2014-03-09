<?php
    $uname= "snklp";
    $upwd="nitmasFest";
    
    require_once './protect.php';
    require_once './header.php';
    require_once './req.php';

   //if($_SERVER['REQUEST_METHOD']!="POST" || $_REQUEST['rd']!=0) die('Hey you.. why are you doing this! ~_~');
    
    $done= FALSE;
    $arr= array('flag'=> FALSE, 'users'=>array());
    if(!empty($_REQUEST['eid'])) $eid= '%#'.trim(urldecode($_REQUEST['eid'])).'#%'; else $eid= '%#1#%';
    $id='';
    try{
        $q= $db->prepare("SELECT * FROM teamdata WHERE events LIKE ?");
        $q2= $db->prepare("SELECT id, name, mob FROM userdata WHERE id LIKE ?");
        $q->setFetchMode(PDO::FETCH_OBJ);
        $q2->setFetchMode(PDO::FETCH_OBJ);
        $q->execute(array($eid));
        $q2->bindParam(1, $uid, PDO::PARAM_INT);
        
        echo '<section class="container" style="padding-top: 120px;"><div class="row"><div class="col-md-7"><div class="panel-group" id="accordion">';
        while($usr= $q->fetch()){
?>          
            <div class="panel panel-primary ms10">
                <div class="panel-heading">
                    <a class="txtN white" data-toggle="collapse" data-parent="#accordion" href="#pnl<?php echo $usr->id;?>">
                        <?php echo 'TM '.$usr->id.' | '.$usr->name;?>
                        <span class="glyphicon glyphicon-plus-sign pull-right white"></span>
                    </a>
                </div>
                <div id="pnl<?php echo $usr->id;?>" class="panel-collapse collapse">
                    <table class="table">
                    <?php
                        $uarr= explode('#', $usr->members);
                        foreach($uarr as $uid){
                            $q2->execute();
                            $uu= $q2->fetch();
                            if(!empty($uu)) echo '<tr><td><span class="label label-info">SN '.$uu->id.'</span></td><td><span class="label label-success">'.$uu->name.'</span></td><td style="font-family: monospace;"><span class="glyphicon glyphicon-earphone"></span> '.$uu->mob.'</td></tr>';
                        }
                    ?>
                    </table>
                </div>
            </div>
        
<?php
        }
        echo '</div></div></div></section>';
?>
<div style="position: fixed; right: 200px; bottom: 50%; height: 100px; width: 100px; font-size: 7em;" onclick=""><span class="glyphicon glyphicon-refresh"><br/><input type="button" class="btn btn-primary" value="Refresh List" onclick="location.reload();"></div>
        <div id="brdcm">
            <div class="row">
                <div class="col-sm-5">
                    <div class="row">
                        <p class="bdHead">Robotics</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"><p><a id="l1" href="./eveDesk.php?eid=1" <?php if($eid==1) echo 'class="lact"';?> >Line Follower</a></p></div>
                        <div class="col-sm-3"><p><a id="l2" href="./eveDesk.php?eid=2" <?php if($eid==2) echo 'class="lact"';?> >Terrainz</a></p></div>
                        <div class="col-sm-3"><p><a id="l3" href="./eveDesk.php?eid=3" <?php if($eid==3) echo 'class="lact"';?> >Robo War</a></p></div>
                        <div class="col-sm-3"><p><a id="l4" href="./eveDesk.php?eid=4" <?php if($eid==4) echo 'class="lact"';?> >Aqua Tron</a></p></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <p class="bdHead">Creativity</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p><a id="l5" href="./eveDesk.php?eid=5" <?php if($eid==5) echo 'class="lact"';?> >AlgoGeek</a></p></div>
                        <div class="col-sm-4"><p><a id="l8" href="./eveDesk.php?eid=8" <?php if($eid==8) echo 'class="lact"';?> >Quiz</a></p></div>
                        <div class="col-sm-4"><p><a id="l9" href="./eveDesk.php?eid=9" <?php if($eid==9) echo 'class="lact"';?> >Junkyard</a></p></div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="row">
                        <p class="bdHead">Gaming</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"><p><a id="l10" href="./eveDesk.php?eid=10" <?php if($eid==10) echo 'class="lact"';?> >CS 1.6</a></p></div>
                        <div class="col-sm-3"><p><a id="l11" href="./eveDesk.php?eid=11" <?php if($eid==11) echo 'class="lact"';?> >NFS</a></p></div>
                        <div class="col-sm-4"><p><a id="l12" href="./eveDesk.php?eid=12" <?php if($eid==12) echo 'class="lact"';?> >Fifa</a></p></div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div id="bd-icn"></div>
                </div>
            </div>
        </div>
    
<?php
        $done= TRUE;
    }catch(PDOException $p){
        echo "error";
    }
    
    if(!$done) echo "error";
    
    require_once './scripts.php';
    ?>
        <script>
            setInterval(function(){ location.reload(); }, 30000);
        </script>    
    <?php
    require_once './footer.php';
?>