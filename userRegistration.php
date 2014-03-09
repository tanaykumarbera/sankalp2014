<?php
    require_once './req.php';
    
   if($_SERVER['REQUEST_METHOD']!="POST") die('Hey you.. why are you doing this! ~_~');
    
    $done= FALSE;
    function _v($x,$i){
        switch ($i){
            case 1: return filter_var($x, FILTER_SANITIZE_STRING); break;
            case 2: return filter_var($x, FILTER_VALIDATE_EMAIL); break;
            default : return FALSE;
        }
    }

    $name= trim(urldecode($_POST['name']));
    $mail= trim(urldecode($_POST['mail']));
    $ins= trim(urldecode($_POST['ins']));
    $events= trim(urldecode($_POST['events']));
    $acc= trim(urldecode($_POST['acc']));
    $mob= trim(urldecode($_POST['mob']));
    if(empty($acc)) $acc= 0;
    else $acc= 1;
    
    if(_v($name,1)&&_v($mail,2)&&_v($ins,1)&&_v($events,1)){
        $eStr= json_encode($events);
        try{
            $q= $db->prepare("SELECT id, name FROM userdata WHERE mail = :mail");
            $q->execute(array(':mail'=>$mail));
            $q->setFetchMode(PDO::FETCH_OBJ);
            if($q->rowCount()>0){
                $v= $q->fetch();
                
                echo 'The email provided is already registered for '.$v->name.' [ SN'.$v->id.' ]';
                
                die();
            }

            $qr= $db->prepare("INSERT INTO userdata (name, mail, mob, institution, events, acc) VALUES (?, ?, ?, ?, ?, ?)");
            $qr->execute(array($name, $mail, $mob, $ins, $eStr, $acc));
            
            echo "Registration Successfull. Sankalp ID 'SN".$db->lastInsertId()."'";
            
            $done= TRUE;
        }catch(PDOException $e){
            file_put_contents('./log.record', date()." :: ".$e->getMessage().PHP_EOL, FILE_APPEND);
        }

    }else{
        echo "spam";
        $done= TRUE;
    }
    
    if(!$done) echo "error";
    
?>