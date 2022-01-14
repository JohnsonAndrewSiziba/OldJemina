<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Jemina Capital - Home</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo $site ?>image/favicon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo $site ?>css/vendor.bundle.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/style.css">
</head>
<body class="site-body style-v1">
	<!-- Header --> 
	<header class="site-header header-s1 is-transparent is-sticky">
		<!-- Topbar -->
		<?php include_once("nav_topbar.php"); ?>
		<!-- #end Topbar -->
		<!-- Navbar -->
		<div class="navbar navbar-primary">
			<div class="container">
				<!-- Logo -->
				<?php include_once("jemina_logo.php"); ?>
				<!-- #end Logo -->
				
				<!-- MainNav -->
				<?php include_once("nav.php"); ?>         
				<!-- #end MainNav -->
			</div>
		</div>
		<!-- #end Navbar -->
		<!-- Banner/Slider -->
		<div id="slider" class="banner banner-slider slider-large carousel slide carousel-fade">
			<!-- Wrapper for Slides -->
			<div class="carousel-inner">
				<div class="item active">
					<!-- Set the first background image using inline CSS below. -->
					<div class="fill" style="background-image:url('<?php echo $site ?>image/slider-lg-a.jpg');">
						<div class="banner-content">
							<div class="container">
								<div class="row">
									<div class="banner-text al-left pos-left light">
										<h2>Fit your life and budget<strong>.</strong></h2>
										<p>We provide independent advice based on established research methods, and our experts have in-depth sector knowledge.</p>
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<!-- Set the second background image using inline CSS below. -->
					<div class="fill" style="background-image:url('<?php echo $site ?>image/slider-lg-b.jpg');">
						<div class="banner-content">
							<div class="container">
								<div class="row">
									<div class="banner-text al-left pos-left light">
										<h2>Expert Financial Advice<strong>.</strong></h2>
										<p>We help clients find ways to leverage their assets into actionable insights by utilising our wealth of experience in the financial markets.</p>
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
							</div>
						</div>					
					</div>
				</div>
				<!-- -->
				<div class="item">
					<!-- Set the second background image using inline CSS below. -->
					<div class="fill" style="background-image:url('<?php echo $site ?>image/slider-lg-c.jpg');">
						<div class="banner-content">
							<div class="container">
								<div class="row">
									<div class="banner-text al-left pos-left light">
										<h2>State-of-the-art Portfolio Management<strong>.</strong></h2>
										<p>We help clients find ways to strategically position their portfolios to achieve maximum utility through state-of-the-art portfolio and investment management strategies.</p>
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
							</div>
						</div>					
					</div>
				</div>
				<!-- -->				
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#slider" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#slider" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!-- #end Banner/Slider -->
	</header>
	<!-- End Header -->
	
	<!-- Service Section -->
	<div class="section section-services">
	    <div class="container">
	        <div class="content row">
				<!-- Feature Row  -->
				<div class="feature-row feature-service-row row feature-s4 off-text boxed-filled boxed-w">
					<div class="heading-box clearfix">
						<div class="col-sm-3">
							<h2 class="heading-section">Stockbroking Specialists</h2>
						</div>
						<div class="col-sm-8 col-sm-offset-1">
							<span>Years of knowledge, along with care and attention brings with us the greatest results for our clients.</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 even">
						<!-- Feature box -->
						<div class="feature">
							<a href="<?php echo $site; ?>services/securities-trading/#securities">
								<div class="fbox-photo">
									<img src="<?php echo $site ?>image/services/securities.jpg" alt=""><!--/image/services/securities.jpg-->
								</div>
								<div class="fbox-over">
									<h3 class="title">Securities Trading</h3>
									<div class="fbox-content">
										<p>The trading team offers an efficient platform for individual and institutional investors...</p>
										<span class="btn">Learn More</span>
									</div>
								</div>
							</a>
						</div>
						<!-- End Feature box -->
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 odd">
						<!-- Feature box -->
						<div class="feature">
							<a href="<?php echo $site; ?>services/custodial-services/#custodial">
								<div class="fbox-photo">
									<img src="<?php echo $site ?>image/services/custodial.jpg" alt="">
								</div>
								<div class="fbox-over">
									<h3 class="title">Custodial Services</h3>
									<div class="fbox-content">
										<p>We offer broker controlled custodial services that allows our clients...</p>
										<span class="btn">Learn More</span>
									</div>
								</div>
							</a>
						</div>
						<!-- End Feature box -->
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 even">
						<!-- Feature box -->
						<div class="feature">
							<a href="<?php echo $site; ?>services/research-services/#research">
								<div class="fbox-photo">
									<img src="<?php echo $site ?>image/services/research_2.jpg" alt="">
								</div>
								<div class="fbox-over">
									<h3 class="title">Research Services</h3>
									<div class="fbox-content">
										<p>Jemina offers tailor-made research solutions and information management requirements for its clients...</p>
										<span class="btn">Learn More</span>
									</div>
								</div>
							</a>
						</div>
						<!-- End Feature box -->
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-6 odd">
						<!-- Feature box -->
						<div class="feature">
							<a href="<?php echo $site; ?>services/direct-market-access/#dma">
								<div class="fbox-photo">
									<img src="<?php echo $site ?>image/services/dma.jpg" alt="">
								</div>
								<div class="fbox-over">
									<h3 class="title">Direct Market Access</h3>
									<div class="fbox-content">
										<p>Our clients have direct access to ZSE, FINSEC, VFEX and such other exchanges...<br></p>
										<span class="btn">Learn More</span>
									</div>
								</div>
							</a>
						</div>
						<!-- End Feature box -->
					</div>					
				</div>
				<!-- Feture Row  #end -->

	        </div>
	    </div>
	</div>
	<!-- End Section -->

	<!-- Content -->
	<br>
	<div class="section section-content section-pad" style="padding-top: 0; padding-bottom: 0;">
		<div class="container" style="padding-top: 0; padding-bottom: 0;">
			<div class="content row">

				<div class="row row-vm">
					<div class="col-md-6 res-m-bttm">
						<h5 class="heading-sm-lead">Featured Listed Company</h5>
						<?php include_once("company_snippet.php"); ?>
					</div> 
				</div>
				
			</div>	
		</div>
	</div>
	<!-- End Content -->
	
	<!-- Latest Reports -->
	<div class="section section-news section-pad">
		<div class="" style="margin: 0; padding-top: 0; padding-bottom: 0;">
			<div style="margin-left: 4%; margin-right: 4%; border: 1px solid #dedede;">
				<br>
				<h5 class="heading-sm-lead center">Reports</h5>
				<h2 class="heading-section center">Latest Reports</h2>

				<div style="">
				<?php include_once("reports_snippet.php"); ?>
				</div>
				<br>
			</div>
		</div>
	</div>
	<!-- End Section -->
	
	<!-- Client logo -->
	<!--<div class="section section-logos section-pad-sm bg-light bdr-top">
		<div class="container">
			<div class="content row">

				<div class="owl-carousel loop logo-carousel style-v2">
					<div class="logo-item"><img alt="" width="190" height="82" src="image/cl-logo1-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="image/cl-logo2-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="image/cl-logo3-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="image/cl-logo4-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="image/cl-logo5-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="image/cl-logo6-w.png"></div>
				</div>

			</div>
		</div>	
	</div>-->
	<!-- End Section -->

	<!-- Call Action -->
	<?php include_once("calltoaction.php"); ?>
	<!-- End Section -->

	<!-- Footer Widget-->
	<?php include_once("footer.php"); ?>
	<!-- End Footer Widget -->
	
	<!-- Rreload Image for Slider -->
	<div class="preload hide">
		<img alt="" src="<?php echo $site ?>image/slider-lg-a.jpg">
		<img alt="" src="<?php echo $site ?>image/slider-lg-b.jpg">
		<img alt="" src="<?php echo $site ?>image/slider-lg-c.jpg">
	</div>
	<!-- End -->

	<!-- Preloader !active please if you want -->
	<!-- <div id="preloader"><div id="status">&nbsp;</div></div> -->
	<!-- Preloader End -->

	<!-- JavaScript Bundle -->
	<script src="<?php echo $site ?>js/jquery.bundle.js"></script>
	<!-- Theme Script init() -->
	<script src="<?php echo $site ?>js/script.js"></script>
	<!-- End script -->



	<script src="<?php echo $site ?>price_sheet/api_base.js"></script>
    <!-- End script -->
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- <script src="price_sheet/company_details.js"></script> -->

    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="<?php echo $site ?>price_sheet/reports_snippets.js"></script>
    
</body>
</html>