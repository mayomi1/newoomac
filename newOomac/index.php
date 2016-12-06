<?php require_once "include/function.php" ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Oyejide Oloyede Memerial Anglican Church | Home :: OOMAC</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
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
									<li class="active"><a href="index.php">home</a></li>
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
		</div>
		
			<div class="wmuSlider example1 section" id="section-1">
			   <article style="position: absolute; width: 100%; opacity: 0;"> 
			   	   	<div class="banner-info">
						<h1>Welcome to OOMAC website<span> Oyejide Oloyede Memorial Anglican Church Oke-Bode area Modakeke.</span></h1>
					</div>
				</article>
				 <article style="position: absolute; width: 100%; opacity: 0;"> 
			   	   	<div class="banner-info">
						<h1>Welcome to OOMAC website<span> Oyejide Oloyede Memorial Anglican Church Oke-Bode area Modakeke.</span></h1>
					</div>
				</article>
				 <article style="position: absolute; width: 100%; opacity: 0;"> 
			   	   		<div class="banner-info">
							<h1>Welcome to OOMAC website<span> Oyejide Oloyede Memorial Anglican Church Oke-Bode area Modakeke.</span></h1>
					</div>
				</article>
				<ul class="wmuSliderPagination">
                	<li><a href="#" class="">0</a></li>
                	<li><a href="#" class="">1</a></li>
                	<li><a href="#" class="">2</a></li>
                </ul>
		  </div>		
		
		<!-- script -->
          <script src="js/jquery.wmuSlider.js"></script> 
			<script>
       			$('.example1').wmuSlider();         
   		    </script>
			<!-- script -->		
	</div>
<!-- header -->
<!-- content -->
<div class="content">
<div class="container">
		<div class="row grids">
			<div class="col-md-4 grid1">
			  <a href="about.php">
				<img src="images/img1.jpg" class="img-responsive" alt=""/>
				<h3>stories</h3>
				<div class="look">	
					<ul>
						<li><h4>Read stories of OOMAC</h4></li>
						<li><i class="arrow"></i></li>
					</ul>
				</div></a>
			</div>
			<div class="col-md-4 grid2">
			  <a href="">
				<img src="images/img2.jpg" class="img-responsive" alt=""/>
				<h3>give on line</h3>
				<div class="look1">	
					<ul>
						<li><h4>Quick & easy online giving</h4></li>
						<li><i class="arrow"></i></li>
					</ul>
				</div></a>
			</div>
			<div class="col-md-4 grid3">
			  <a href="prayer_request.php">
				<img src="images/img3.jpg" class="img-responsive" alt=""/>
				<h3>prayer</h3>
				<div class="look2">
					<ul>
						<li><h4>Submit your prayer request</h4></li>
						<li><i class="arrow"></i></li>
					</ul>
				</div></a>
			</div>
				<div class="clearfix"> </div>
		</div>
</div>
</div>
<!-- content -->
<!-- events -->
	<div class="events">
		<div class="container">
			<div class="col-md-6 upcoming">
				<h3>UPCOMING EVENTS</h3>
				<?php foreach (event_home(3) as $event){
					$date = $event['date'];
					$day = substr($date, 0,2);
					$month = substr($date, 3, 2);
                    $week_day = substr($date, 10,12);
                    $event_time = $event['event_time'];
					//echo $month;
					//$month = array(01=>"January", 02=>"February", 07=>"July", 12=>"December");
					?>
				<div class="family">
					<div class="twenty">
						<h4><?php echo $day?></h4>
						<p><?php number_to_word($month)?></p>
					</div>
					<div class="sunday">
						<h5><?php echo $event['event_name']?></h5>

						<p><?php echo "$week_day   | $event_time " ; ?></p>
					</div>
					<div class="mor">
						<a class="more" href="events.php">MORE</a>
					</div>
						<div class="clearfix"> </div>
				</div>
<?php } ?>
			</div>
			<div class="col-md-6 oaks">
				<h3>Oyejide Oloyede Memorial Anglican Church(OOMAC)</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<a class="read" href="#">READ MORE >></a>
			</div>
			<div class="clearfix"> </div>
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
		</div>
	</div>
<!-- footer -->
</body>
</html>
