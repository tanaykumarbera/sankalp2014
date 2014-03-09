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
                        <div id="msg" class="row"></div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">Full Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Full Name (including middle name, if any)"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">Email</label>
                            <input type="email" name="mail" id="mail" class="form-control" placeholder="Please provide a working mailing address"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">Mobile</label>
                            <input type="text" name="mob" id="mob" class="form-control" placeholder="a number to cotact you back "/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">Institute</label>
                            <input type="text" name="ins" id="ins" class="form-control" placeholder="Please provide full institutional name"/>
                        </div>
                        <p class="text-left">Pick your events</p>  
                        <div style="padding-left: 50px;">
                            <?php
                                while($event= $q->fetch()){
                                    echo '<div class="checkbox"><label><input type="checkbox" name="events" id="events" value="'.$event->eid.'"/>&nbsp;'.$event->ename.'</label></div>';
                                }
                            ?>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="checkbox pull-right"><label><input type="checkbox" name="acc" id="acc" value="required"/>&nbsp;Accomodation required. </label></div>
                        </div>
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