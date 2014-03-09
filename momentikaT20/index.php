<?php
    /* Header Section */
    header('Content-Type: text/html;charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Momentika Top 20 | sankalp 2k14</title>
        <link rel="shortcut icon" href="../_img/fab.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../_css/style.css">
        <!--<link href="../b/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <script type="text/javascript" src="./swfobject.js"></script>
        <style type="text/css">	
           html{height: 100%;overflow: hidden;}	
           #flashcontent{height: 100%;}
           body{
                height: 100%;
                margin: 0;
                padding: 10px 0px;
                background-color: #181818;
                color:#ffffff;
                font-family:sans-serif;
                font-size:40;
            }	
            a{color:#cccccc;}
        </style>
    </head>
    <body>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4"><a href="/"><img id="logo" height="196px" width="200px" src="../_img/logo.png" alt="sankalp 2k14"></a></div>
                    <div id="nav-menu" class="col-sm-8">
                        <div class="row">
                            <a href="/">
                                <div class="col-sm-2 nav-icn">
                                    <p><span class="glyphicon glyphicon-home nicn white"></span></p>
                                    <p class="white">Home</p>
                                </div>
                            </a>
                            <a href="/events">
                                <div class="col-sm-2 nav-icn">
                                    <p><span class="glyphicon glyphicon-stats nicn white"></span></p>
                                    <p class="white">Events</p>
                                </div>
                            </a>
                            <a href="/enquiry">
                                <div class="col-sm-2 nav-icn">
                                    <p><span class="glyphicon glyphicon-envelope nicn white"></span></p>
                                    <p class="white">Contact Us</p>
                                </div>
                            </a>
                            <a href="/gallery">
                                <div class="col-sm-2 nav-icn">
                                    <p><span class="glyphicon glyphicon-facetime-video nicn white"></span></p>
                                    <p class="white">Gallery</p>
                                </div>
                            </a>
                            <a href="/directions">
                                <div class="col-sm-2 nav-icn">
                                    <p><span class="glyphicon glyphicon-map-marker nicn white"></span></p>
                                    <p class="white">How to reach</p>
                                </div>
                            </a>
                            <a href="/enroll">
                                <div class="col-sm-2 nav-icn">
                                    <p><span class="glyphicon glyphicon-send nicn white"></span></p>
                                    <p class="white">Enroll</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div></div>
            </div>
            <div name="hd-btn" id="hd-btn" onclick="hd_tog();">
                <span class="glyphicon glyphicon-th-list white"></span>
            </div>
        </div>
        <div id="flashcontent">AutoViewer requires JavaScript and the Flash Player. <a href="http://www.macromedia.com/go/getflashplayer/">Get Flash here.</a> </div>	
	<!--<script type="text/javascript" src="../_js/jquery-1.10.2.min.js"></script>-->
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <!--<script src="../b/js/bootstrap.min.js"></script>-->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../_js/jscr.js"></script>
        <script type="text/javascript">
		var fo = new SWFObject("autoviewer.swf", "autoviewer", "100%", "100%", "8", "#181818");		
		fo.write("flashcontent");
                $(document).ready(function(){
                    comm();
                 });
	</script>	
</body>
</html>