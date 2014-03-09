<?php
    $title= "One Day B Plan";
    require_once './header.php';
?>
        <section id="container" itemscope itemtype="http://schema.org/Event">
            <div class="page" itemprop="subEvents" itemscope itemtype="http://schema.org/Event">
                <meta itemprop="name" content="ONE DAY MANAGEMENT"/>
                <img src="_img/_bP.jpg" width="100%" alt="globsyn skills">
                <div class="container content">
                    <div class="eNB" style="margin-top: -40px;"></div>
                    <div class="eveName" style="font-size: 50px; ">ONE DAY MANAGEMENT</div>
                    <div class="txt-cnt">
                        <p class="text-left"><strong>Is it possible to squeeze a complete MBA curriculum into just one day? One would say it's impossible. However, our participants confirm that this seminar contains more practical management knowledge than they remember from their entire management education.</strong></p>
                        <div class="blnk50"></div>
                        <h4><strong>Insights + impact = MBA in One Day</strong></h4>
                        <p class="text-left">An MBA in One Day seminar is by no means a lazy day. The speakers are high-speed performers: they present an unbelievable number of eye-openers in a very short time. MBA in One Day is inspiring, involving and very energetic. All participants are on the edge of their seats from the beginning until the very end!</p>
                        <div class="blnk50"></div>
                        <h4><strong>Our goal</strong></h4>
                        <p class="text-left">MBA in One Day has only one goal: making the best ideas of the most important management thinkers directly available and applicable to all participating professionals, managers and entrepreneurs. Both participants and press are raving.</p>
                        <div class="blnk50"></div>
                        <blockquote>
                            "I was very impressed seeing Ben deliver MBA in One Day. I am in favor of more people getting a sense of what it takes to build and manage a business or non-governmental organization."
                        </blockquote>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <input type="button" class="btn btn-primary blockC" value="Sign Up for the course" onclick="$('.page').animate({scrollTop: $('#gpsp').offset().top});"/>
                        </div>
                        
                    </div>
                </div>
                <div class="blnk50"></div>
                <iframe src="https://mapsengine.google.com/map/embed?mid=zEGRKk_enwVY.kVou-gMZqwSg" width="100%" height="480"></iframe>
                <div class="blnk50"></div>
                <div class="txt-cnt">
                    <p>This event will be organized by Globsyn at their Amtala Campus.<br/>
                    They are providing a brilliant opportunity for BBA Students along with final year B. TECH students
                    to get a short glimpse of management.<br/>
                    The course is well affiliated, and certification will be provided along with.
                    </p>
                </div>
                <div class="blnk50"></div>
                <div class="row">
                    <div class="col-md-5"></div>
                    <input id="enbtn" type="button" class="btn btn-primary blockC col-md-2" value="Thats Intresting! Enroll Me" data-toggle="modal" data-target="#bpln"/>
                </div>
                <div class="container">
                    <hr/>
                    <div class="row">
                        <div class="col-md-6"><p><span class="glyphicon glyphicon-earphone">&nbsp;Rohit Rai <span style="font-family: monospace;">+91 8296699046</span></p></div>
                        <div class="col-md-6"><p><a href="mailto:info@snklp.com">info@snklp.com</a><p></div>
                    </div>
                    <hr/>
                </div>
                <div class="blnk50"></div>
                <img id="gpsp" src="_img/glob.png" width="1000" class="blockC" alt="globsyn logos">
                <div class="blnk50"></div>
            </div>
        </section>

        <div class="modal fade" id="bpln" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">One Day Management</h4><strong>powered by Globsyn Finishing School</strong>
            </div>
            <div class="modal-body">
                <iframe src="https://docs.google.com/forms/d/1Gkp-KxNZdOXDtHj1fsL15bSGYvmK_dt7B-FBgfPOj8A/viewform?embedded=true" width="100%" height="450" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        
<?php require_once './scripts.php';?>        
        <script type="text/javascript">
            $(document).ready(function(){
               comm();
               init(1);
            });
        </script>
<?php require_once './footer.php';?>