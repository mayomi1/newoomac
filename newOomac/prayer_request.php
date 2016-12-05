<?php
require_once "include/function.php";
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Prayer request | oomac </title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/newstyle.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

</head>
<body>
<!-- header -->
<div class="banner">
    <div class="container">
        <div class="header">
            <div class="head-bann">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" class="img-responsive" alt="" /></a>
                </div>
                <div class="head-part">
                    <ul>
                        <li><a href="unitslist.php">Units List |</a></li>
                        <li><a href="blog/">Blog |</a></li>
                        <li><a href="#">Contact Us</a></li>

                    </ul>
                </div>
                <div class="clearfix"> </div>

            </div>
            <div class="head-nav">
                <span class="menu"> </span>
                <ul>
                    <li><a href="about.php">about</a></li>
                    <li><a href="index.php">home</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="blog/">Blog</a></li>
                    <li><a href="#">donate</a></li>
                    <div class="clearfix"> </div>
                </ul>
            </div>
            <div class="clearfix"> </div>

            <!-- script-for-nav -->
            <script>
                $( "span.menu" ).click(function() {
                    $( ".head-nav ul" ).slideToggle(300, function() {
                        // Animation complete.
                    });
                });
            </script>
            <!-- script-for-nav -->
        </div>
        <div class="banner-info1">
            <h2>Prayer Request</h2>
        </div>
    </div>
</div>
<!-- header -->
<!-- events -->
<?php process_prayer_requests();
global $message,$error1,$errRequest,$errName ;?>
<div class="shop">
    <div class="container">
        <div class="row grids-1">
            <span class="error"><?php echo $error1 ?></span>
            <span class="message"><?php echo $message ?></span>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <span class="error"><?php echo $errName ?></span>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>your request</label>
                    <span class="error"><?php echo $errRequest ?></span>
                    <textarea name="request" class="form-control" cols="75" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-success" name="submit">submit request</button>
            </form>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- events -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-4 news">
                <h4>SIGNUP TO OUR NEWSLETTER</h4>
                <form>
                    <input type="submit" value="EMAIL SIGNUP">
                </form>
            </div>
            <div class="col-md-4 service">
                <h5>SERVICE TIMES</h5>
                <h6>Sundays at 9:30 & 11:30 AM</h6>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-md-4 connect">
                <h5>CONNECT WITH US</h5>
                <ul>
                    <li><a href="#"><i class="fb"></i></a></li>
                    <li><a href="#"><i class="twt"></i></a></li>
                    <li><a href="#"><i class="yout"></i></a></li>
                    <li><a href="#"><i class="payp"></i></a></li>
                    <li><a href="#"><i class="email"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="bottom">
            <p>Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
        </div>
    </div>
</div>
<!-- footer -->
</body>
</html>