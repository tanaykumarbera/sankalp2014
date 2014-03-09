<?php
    $uname= "reg";
    $upwd="50bucks";
    
    require_once './protect.php';
    require_once './req.php';

   //if($_SERVER['REQUEST_METHOD']!="POST" || $_REQUEST['rd']!=0) die('Hey you.. why are you doing this! ~_~');
    
    $done= FALSE;
    $arr= array('flag'=> FALSE, 'user'=>'');
    $srch= trim(urldecode($_REQUEST['uid']));
    
    try{
        $q= $db->prepare("SELECT * FROM userdata WHERE id= ?");
        $q->setFetchMode(PDO::FETCH_OBJ);
        $q->execute(array($srch));
        $usr= $q->fetch();
            $arr['user']= array('id'=>$usr->id, 'name'=>$usr->name, 'mail'=>$usr->mail, 'mob'=>$usr->mob, 'ins'=>$usr->institution, 'events'=>$usr->events, 'paid'=>$usr->paid);
            $arr['flag']= TRUE;
        
        echo json_encode($arr);
        $done= TRUE;
    }catch(PDOException $p){
        echo "error";
    }
    
    if(!$done) echo "error";

?>