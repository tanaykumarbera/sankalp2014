<?php
    $title= "Registration";
    require_once './header.php';
?>
<?php
    require_once './req.php';
    
    try{
        $q= $db->prepare("SELECT * FROM events");
        $q->execute();
        $q->setFetchMode(PDO::FETCH_OBJ);
?>
        <section>
            <div class="container" style="background: url('_img/eb.jpg') no-repeat right; padding-top: 100px;">
                <div class="row" style="background: rgba(255,255,255,0.8); height: 600px; padding: 100px 50px;">
                    <div class="col-sm-7">
                        <hr/>
                        <p class="alert alert-info">Online Registrations has </p>
                        <hr/>
                        <div class="row mT20">
                            <div id="bar" class="col-sm-8" style="padding-top: 8px;"></div>
                            <input type="button" class="btn btn-primary col-lg-4 pull-right" id="sbtn" value="yes! count me in" onclick="enrol_me();"/>
                        </div>
                    </div>
                    
                </div>
                <div class="blnk50"></div>
                
            </div>
        </section>
        <div class="blnk120"></div>
    
<?php 
        }catch(PDOException $e){
            file_put_contents('./log.record', date()." :: ".$e->getMessage().PHP_EOL, FILE_APPEND);
        }

    require_once './scripts.php';?>        
        <script type="text/javascript">
            $(document).ready(function(){
               comm();
            });
        </script>
<?php require_once './footer.php';?>