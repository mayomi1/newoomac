<?php
require_once "../include/function.php";
db();
global $link;
$err=$message="";
$errName=$errLen=$errComm="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $bid =$_POST['bid'];
    if($_POST['bid']==""){
        header("Location :blog.php");
        exit();
    }
    $reply_name=check($_POST['reply_name']);
    $comment = check($_POST['comment']);
    $error = 0;
    if(empty($reply_name)){
        $errName= "you must enter a name";
        $error = 1;
    }
    /**if(strlen($reply_name<1)){
     * $errLen = strlen($reply_name);
    //$errLen = "your name cannot be one letter";
     * $error = 1;
    }**/
    if(empty($comment)){
        $errComm= "you have not type in any comment";
        $error = 1;
    }
    if ($error != 1) {
        $result = mysqli_query($link, "INSERT INTO blog_reply(reply_author, reply_date,comment, blog_id)
            VALUES ('$reply_name', now(), '$comment', '$bid' )") or die("reply query error");
        if ($result) {
            $message= "<script type='text/javascript'>alert(\"your comment was successfully addedj\")</script>";
        } else {
            $err= "there was error entering your comment pls try again";
        }
        mysqli_close($link);
    }
}


if(!isset($_GET['bid'])){
    header("location: index.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>News | Blog </title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/newstyle.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="../js/fancyapps/source/jquery.fancybox.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/move-top.js"></script>
    <script type="text/javascript" src="../js/easing.js"></script>
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
                    <a href="index.php"><img src="../images/logo.png" class="img-responsive" alt="" /></a>
                </div>
                <div class="head-part">
                    <ul>
                        <li><a href="#">units list |</a></li>
                        <li><a href="../blog/">Blog |</a></li>
                        <li><a href="l">Contact Us</a></li>

                    </ul>
                </div>
                <div class="clearfix"> </div>

            </div>
            <div class="head-nav">
                <span class="menu"> </span>
                <ul>
                    <li><a href="../about.php">about</a></li>
                    <li><a href="../index.php">home</a></li>
                    <li><a href="../gallery.php">Gallery</a></li>
                    <li><a href="../events.php">Events</a></li>
                    <li class="active"><a href="../blog/">Blog</a></li>
                    <li><a href="../giveonline.php">Give Online</a></li>
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
            <h2>Blog</h2>
        </div>
    </div>
</div>
<!-- header -->
<!-- events -->
<div class="shop">
    <div class="container">
        <div class="row grids-1">
                    <div class="col-md-9">
                        <?php
                        require_once "../include/function.php";
                        db();
                        global $link;
                        if(isset($_GET['bid'])){
                            $bid = check($_GET['bid']);

                            $result = mysqli_query($link, "SELECT * FROM blog WHERE blog_id=".$bid);
                            if(mysqli_num_rows($result)==1) {
                                if($row = mysqli_fetch_array($result)) {
                                    $content=check($row['post_content']);
                                    $title = check($row['post_title']);
                                    $date = check($row['post_date']);
                                    $post_author= check($row['post_author']);
                                    $image = check($row['blog_image']);

                                    echo "<h4>$title</h4> <hr>";
                                    if($image){
                                        echo '<img src="blog_image/'.$image.'"  style="width: 450px; height: 400px ">';
                                    }
                                    echo "<p>$content</p><hr>";
                                }
                            }
                        }
                        echo "<h3><label class='bg-warning'>Comment from people</label></h3>";
                        $reply_result = mysqli_query($link, "SELECT * FROM blog_reply WHERE blog_id ='$bid' ORDER BY reply_id DESC ") or die("error reply query error");
                        while($row_reply=mysqli_fetch_array($reply_result)){
                            $reply=check($row_reply['comment']);
                            $name = check($row_reply['reply_author']);
                            $reply_date = check($row_reply['reply_date']);
                            echo "$reply<br>&nbsp; posted by $name &nbsp;  on &nbsp; $reply_date<hr>";
                        }
                        ?>



                        <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                            <label class="alert-warning">Add your comment</label>
                            <span class="message"> <?php echo $message; ?></span>
                            <span class="error"> <?php echo $err;?></span>



                            <div class="form-group"><label for="reply_name">Your Name</label>
                                <span class="error"> <?php echo $errName, $errLen?></span>
                                <input type="text" name="reply_name" id="reply_name" class="form-control"></div>
                            <div class="form-group"><label for="comment">your comment</label>
                                <span class="error"> <?php echo $errComm;?></span>

                                <textarea name="comment" cols="75" id="comment"   rows="10" class="form-control"></textarea></div>
                            <input type="hidden" name="bid" value="<?php echo $bid;?>">
                            <input name="submit" value="add comment" type="submit" class="form-control">

                        </form>

                    </div>




        </div>



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