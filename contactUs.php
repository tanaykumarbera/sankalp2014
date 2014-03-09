<?php
    $title= "Contact Us";
    require_once './header.php';
?>
        <section>
            <div class="container" style="background: url('_img/eb.jpg') no-repeat right; padding-top: 100px;">
                <div class="row" style="background: rgba(255,255,255,0.8); height: 600px; padding: 100px 50px;">
                    <div class="col-sm-7">
                        <div class="input-group form-group">
                            <label class="input-group-addon">Your Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your name here"/>
                        </div>
                        <div class="input-group form-group">
                            <label class="input-group-addon">Email</label>
                            <input type="email" name="mail" id="mail" class="form-control" placeholder="a mail to contact you later"/>
                        </div>
                        <div class="form-group">
                            <label>Your message here</label>
                            <textarea id="umsg" class="form-control" placeholder="and your message goes here." style="height: 150px;"></textarea>
                        </div>
                        <hr/>
                        <div class="row">
                            <div id="bar" class="col-sm-8" style="padding-top: 8px;"></div>
                            <input type="button" class="btn btn-primary col-lg-4 pull-right" id="sbtn" value="submit" onclick="sub_q();"/>
                        </div>
                        <div id="msg" class="row" style="margin-top: 20px;"></div>
                    </div>
                </div>
            </div>
        </section>
    
<?php require_once './scripts.php';?>        
        <script type="text/javascript">
            $(document).ready(function(){
               comm();
            });
        </script>
<?php require_once './footer.php';?>