<?php
    $title= "RegDesk | Sankalp 2k14";
    $uname= "reg";
    $upwd="50bucks";
    
    require_once './protect.php';
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
    $acc= trim(urldecode($_POST['acc']));
    $id= trim(urldecode($_POST['uid']));
    $mob= trim(urldecode($_POST['mob']));
    
    if(empty($acc)) $acc= 0;
    else $acc= 1;
    
    if(_v($name,1)&&_v($mail,2)&&_v($ins,1)&&_v($mob,1)){
        $eStr= json_encode($events);
        try{
            $qr= $db->prepare("UPDATE userdata SET name= ?, mail= ?, mob= ?, institution= ?, events= ?, paid= ? WHERE id= ?");
            $qr->execute(array($name, $mail, $mob, $ins, $eStr, $acc, $id));
            
            $str= "UPDATE SUCCESSFULL | ";
            if($acc==1) $str.= "PAYMENT CLEARED";
            else $str.= "PAYMENT NOT CLEARED YET";
            
            echo $str;
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