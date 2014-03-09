<?php
    /* Header Section */
    header('Content-Type: text/html;charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?> | sankalp 2k14</title>
        <link rel="shortcut icon" href="_img/fab.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" type="text/css" href="_css/style.css">
        <link href="b/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!--        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Racing+Sans+One' rel='stylesheet' type='text/css'>-->
    </head>
    <!--
        Aha ! Some one bothered to see that! 
    
        Gali mat do yaar.. Bootstrap with no responsiveness.. Yes that sucks! But still.. 
    
        Ny suggestions ? Drop by fb.com/tanaykumarbera or google.com/+TANAYKUMARBERA :)
    
        Yay we share same interest.. thats y you are here ;)
    -->
    <body>
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="/"><img id="logo" width="200px" src="_img/logo.png" alt="sankalp 2k14"></a>
                    </div>
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
                                    <p class="white">Register</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div name="hd-btn" id="hd-btn" onclick="hd_tog();">
                    <span class="glyphicon glyphicon-th-list white"></span>
                </div>
                
            </div>
            
        </header>