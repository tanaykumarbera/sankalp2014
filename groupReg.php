<?php
    $done= FALSE;
    //if($_SERVER['REQUEST_METHOD']=="POST"){
//        $cnt= 0; $usr= array();
//        $m1= $_POST['m1']; if(!empty($m1)) array_push($usr, $m1);
//        $m2= $_POST['m2']; if(!empty($m2)) array_push($usr, $m2);
//        $m3= $_POST['m3']; if(!empty($m3)) array_push($usr, $m3);
//        $m4= $_POST['m4']; if(!empty($m4)) array_push($usr, $m4);
//        $m5= $_POST['m5']; if(!empty($m5)) array_push($usr, $m5);
//        $tn= $_POST['tnam'];
//        
//        if(count($usr)!=0&&!empty($tn)){
//            
//            $eveArr= $uarr;
//        }
        
        function asrch($a, $arr){
            foreach ($arr as $li){
                if($a==$li) return TRUE;
            }
            return FALSE;
        }


        try{
        $db= new PDO("mysql:host=localhost;dbname=sankalp2014", 'root', '');    
        //$db= new PDO("mysql:host=mysql.hostinger.in;dbname=u257221409_tanay", 'u257221409_test', '123456');
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }catch(PDOException $e){
        echo 'error: '.$e->getMessage();
    }
    
        $rd= $_REQUEST['rd'];
        $events= array(1,2,3,4);
        
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
            //file_put_contents('./log.record', date()." :: ".$e->getMessage().PHP_EOL, FILE_APPEND);
            echo "error";
        }
        
    if(!$done) echo "error";
?>

