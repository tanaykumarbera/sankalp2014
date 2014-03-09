<?php
    try{
        $db= new PDO("mysql:host=localhost;dbname=sankalp2014", 'root', '');    
        //$db= new PDO("mysql:host=mysql.hostinger.in;dbname=u257221409_tanay", 'u257221409_test', '123456');
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }catch(PDOException $e){
        echo 'error: '.$e->getMessage();
    }
    
    function asrch($a, $arr){
        foreach ($arr as $li){
            if($a==$li) return TRUE;
        }
        return FALSE;
    }
?>