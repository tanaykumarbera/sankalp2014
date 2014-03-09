<?php
    require_once './req.php';

    $rd= $_REQUEST['rd'];
    
    $events= array(5,6,11,12);

    $usr= explode(',', urldecode($_REQUEST['usr']));
    $udb= "#".implode("#", $usr)."#";

    $eve= explode(',', urldecode($_REQUEST['eve']));
    $edb= "#".implode("#", $eve)."#";

    $tnam= $_REQUEST['tnam'];
        
    try{
        $q= $db->prepare("SELECT events FROM teamdata WHERE members LIKE :mid");
        $q->setFetchMode(PDO::FETCH_OBJ);
        $q->bindParam(':mid', $mbrid, PDO::PARAM_STR);

        $bool= TRUE;
        foreach($usr as $mid){
            $mbrid= "%#".$mid."#%";
            $q->execute();
            while($itm= $q->fetch()){
                foreach($eve as $e)
                    if(asrch($e, explode('#', $itm->events))) $bool= FALSE;
            }
        }
            
        if($bool){
            $q2= $db->prepare("INSERT INTO teamdata (name, members, events) VALUES(?,?,?)");
            $q2->execute(array($tnam, $udb, $edb));
            echo $db->lastInsertId();
            $done= TRUE;
        }else{
            die("duplicate");
            $done= TRUE;
        }

    }catch(PDOException $e){
        echo "error";
    }
        
    if(!$done) echo "error";
?>