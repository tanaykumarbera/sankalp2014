<?php
    $uname= "reg";
    $upwd="50bucks";
    
    require_once './protect.php';
    require_once './req.php';

   //if($_SERVER['REQUEST_METHOD']!="POST" || $_REQUEST['rd']!=0) die('Hey you.. why are you doing this! ~_~');
    
    $done= FALSE;
    $arr= array('flag'=> FALSE, 'users'=>array());
    $srch= '%'.trim(urldecode($_REQUEST['q'])).'%';
    
    try{
        $q= $db->prepare("SELECT id, name, mail FROM userdata WHERE name LIKE ? OR mail LIKE ? OR id LIKE ?");
        $q->setFetchMode(PDO::FETCH_OBJ);
        $q->execute(array($srch, $srch, $srch));
        while($usr= $q->fetch()){
            array_push($arr['users'], array('id'=>$usr->id, 'name'=>$usr->name, 'mail'=>$usr->mail));
            $arr['flag']= TRUE;
        }
        echo json_encode($arr);
        $done= TRUE;
    }catch(PDOException $p){
        echo "error";
    }
    
    if(!$done) echo "error";
?>