<?php
require_once "../include/function.php"?>
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
                        <li><a href="../unitslist.php">Units List |</a></li>
                        <li><a href="../blog/">Blog |</a></li>
                        <li><a href="#">Contact Us</a></li>
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
                db();
                global $link;
                $tbl_name="blog";		//db table name
                $adjacents = 6;

                // the total number of item on the table
                $query = "SELECT COUNT(*) as num FROM $tbl_name";
                $total_pages = mysqli_fetch_array(mysqli_query($link, $query));
                $total_pages = @$total_pages[num];

                /* Setup vars for query. */
                $targetpage = "index.php"; 	//name of file
                $limit = 5; 								//how many items to show per page
                @$page = $_GET['page'];
                if($page)
                    $start = ($page - 1) * $limit; 			//first item to display on this page
                else
                    $start = 0;								//if no page var is given, set start to 0

                /* Get data. */
                $sql = "SELECT * FROM $tbl_name ORDER BY blog_id DESC LIMIT $start, $limit ";
                $result = mysqli_query($link, $sql);

                /* Setup page vars for display. */
                if ($page == 0) $page = 1;					//if no page var is given, default to 1.
                $prev = $page - 1;							//previous page is page - 1
                $next = $page + 1;							//next page is page + 1
                $lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
                $lpm1 = $lastpage - 1;						//last page minus 1

                /*
                    Now we apply our rules and draw the pagination object.
                    We're actually saving the code to a variable in case we want to draw it more than once.
                */
                $pagination = "";
                if($lastpage > 1)
                {
                    $pagination .= "<div class=\"pagination\">";
                    //previous button
                    if ($page > 1)
                        $pagination.= "<a href=\"$targetpage?page=$prev\"> previous</a>";
                    else
                        $pagination.= "<span class=\"disabled\"> previous</span>";

                    //pages
                    if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
                    {
                        for ($counter = 1; $counter <= $lastpage; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                        }
                    }
                    elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
                    {
                        //close to beginning; only hide later pages
                        if($page < 1 + ($adjacents * 2))
                        {
                            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                            {
                                if ($counter == $page)
                                    $pagination.= "<span class=\"current\">$counter</span>";
                                else
                                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                            }
                            $pagination.= "...";
                            $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                            $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
                        }
                        //in middle; hide some front and some back
                        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                        {
                            $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                            $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                            $pagination.= "...";
                            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                            {
                                if ($counter == $page)
                                    $pagination.= "<span class=\"current\">$counter</span>";
                                else
                                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                            }
                            $pagination.= "...";
                            $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                            $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
                        }
                        //close to end; only hide early pages
                        else
                        {
                            $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                            $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                            $pagination.= "...";
                            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                            {
                                if ($counter == $page)
                                    $pagination.= "<span class=\"current\">$counter</span>";
                                else
                                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                            }
                        }
                    }

                    //next button
                    if ($page < $counter - 1)
                        $pagination.= "<a href=\"$targetpage?page=$next\">next </a>";
                    else
                        $pagination.= "<span class=\"disabled\">next </span>";
                    $pagination.= "</div>\n";
                }
                ?>

                <?php
                while($row = mysqli_fetch_array($result))
                {

                    $image = check($row['blog_image']);
                    $title = check($row['post_title']);
                    $content = check(substr($row['post_content'], 0, 400));
                    $date = check($row['post_date']);
                    // $edited_date = check($row['last_edited']);
                    $post_author_id = check($row['post_author']);
                    $author_result = mysqli_query($link, "SELECT member_id, username FROM member WHERE member_id = '$post_author_id'");
                    if(mysqli_num_rows($author_result)==1){
                        $row2=mysqli_fetch_array($author_result);
                        $author = check($row2['username']);
                    }


                    ?>

                    <hr>
                    <h2><?php echo "$title"?></h2>


                    <?php if($image){ ?>
                    <img src="blog_image/<?php echo $row['blog_image']?>"  style='width: 450px; height: 400px'>

                <?php }    ?>





                    <p><?php echo "$content"?>
                    </p>



                    <?php echo "<a href='view_blog.php?bid=".$row['blog_id']."'><botton type=\"botton\" class=\"btn btn-success btn-lg\">read more</botton><span><em></a>"."";?>
                        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;posted by <?php echo $author?>
                    </em></span><span>&nbsp; &nbsp; &nbsp; &nbsp;on &nbsp;  <?php echo "$date \t" ?>

                    </p></span>



                    <?php
                }
                ?><hr>

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