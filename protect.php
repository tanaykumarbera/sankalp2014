<?php
session_start();
error_reporting(0);
if($_SESSION['uname']==$uname&&$_SESSION['upwd']==$upwd){
}else{
    $bhul= FALSE;
    if(isset($_REQUEST['sbtn'])){
        if(($_REQUEST['m1']==$uname)&&($_REQUEST['m2']==$upwd)){
            $_SESSION['uname']= $uname;
            $_SESSION['upwd']= $upwd;
            header('Location: '.__FILE__);
        }else $bhul= TRUE;
    }
?>   
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Protected Area | Snklp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .blockC{display: block; margin-left: auto; margin-right: auto; width: 550px; }
        </style>
        <link href="b/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container">
            <div style="width: 550px; margin: 100px auto;">
                <form action="" method="POST">
                    <div style="background: url('_img/logosite.png') center no-repeat; height: 200px; margin-bottom: 100px;"></div>
                    <?php if($bhul) echo '<p class="alert alert-danger">Invalid Credentials!</p>'; ?>
                    <div class="input-group form-group">
                        <label class="input-group-addon">username: </label>
                        <input type="text" name="m1" id="m1" class="form-control" placeholder="Registration Desk ID"/>
                    </div>
                    <div class="input-group form-group">
                        <label class="input-group-addon">password: </label>
                        <input type="password" name="m2" id="m2" class="form-control" placeholder="Password provided to you"/>
                    </div>
                    <hr/>
                    <input type="submit" name="sbtn" value="Log In" class="btn btn-primary pull-right">
                </form>
                
            </div>
        </div>
    </body>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</html>
<?php    
die();
}
?>
