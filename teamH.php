<?php
    require_once './req.php';
    
    try{
        $q= $db->prepare("SELECT events FROM userdata WHERE id= :uid AND paid=1");
        $q->setFetchMode(PDO::FETCH_OBJ);
        $q->bindParam(':uid', $u, PDO::PARAM_INT);

        $q2= $db->prepare("SELECT * FROM events");
        $q2->execute();
        $q2->setFetchMode(PDO::FETCH_OBJ);
        $eventList= array();
        $events= array();
        
        while($event= $q2->fetch()){
            $evenList[$event->eid]= array('Ename'=>$event->ename, 'Ecost'=>$event->eprice);
        }
        
        $cnt= 0; $usr= array();
        if(!empty($_REQUEST['m1'])) { array_push($usr, $_REQUEST['m1']); $cnt++; }
        if(!empty($_REQUEST['m2'])) { array_push($usr, $_REQUEST['m2']); $cnt++; }
        if(!empty($_REQUEST['m3'])) { array_push($usr, $_REQUEST['m3']); $cnt++; }
        if(!empty($_REQUEST['m4'])) { array_push($usr, $_REQUEST['m4']); $cnt++; }
        if(!empty($_REQUEST['m5'])) { array_push($usr, $_REQUEST['m5']); $cnt++; }
        $rd= $_REQUEST['rd'];
        if($cnt==0) die("no user"); 
        
        switch ($rd){
            case 1: $events= array(1,2,3,4); break;
            case 2: $events= array(11,12); break;
            case 3: $events= array(10); break;
            case 4: $events= array(8,9); break;
            case 5: $events= array(5); break;
            default : die("error");
        }
        
        $comEve= array('flag'=>TRUE, 'cat'=>array(), 'user'=>array());
        $flg= TRUE;
        
        foreach($usr as $u){
            $q->execute();
            $ui= $q->fetch();
            if(empty($ui->events)){ 
                array_push($comEve['user'], $u);
                $flg= FALSE;
                continue;
            }
            //$events= array_intersect($events, explode(',',json_decode($ui->events)));
        }
        
        $comEve['flag']= $flg;
        
        if($flg){
            foreach ($events as $i){
            $i= (int) $i;
                $eventL= $evenList[$i];
                array_push($comEve['cat'], array('Eid'=>$i,'Ename'=>$eventL['Ename'], 'Ecost'=>$eventL['Ecost']));
            }
            $comEve['user']= $usr;
        }
        $j= json_encode($comEve);
        echo $j;
        $done =TRUE;
        
    }catch(PDOException $e){
        //file_put_contents('./log.record', date()." :: ".$e->getMessage().PHP_EOL, FILE_APPEND);
        echo "error";
    }

    
?>