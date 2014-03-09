<?php
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
    $msg= trim(urldecode($_POST['msg']));
    
    if(_v($name,1)&&_v($mail,2)&&_v($msg,1)){
        if(mail('info@snklp.com', 'ENQUIRY', $msg, 'FROM: '.$mail)){
            echo "Your query has been registered successfully. We will get back to you soon.";
            $done=TRUE;
        }
    }else{
        echo "spam";
        $done= TRUE;
    }
    
    if(!$done) echo "error";
?>