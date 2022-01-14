<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Executive Team | Jemina Capital - The future</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo $site ?>image/favicon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo $site ?>css/vendor.bundle.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/style.css">
	
	<style>
	    div, p {
          text-align: justify;
          text-justify: inter-word;
        }
	</style>
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
		
		<!-- Banner/Static  -->
		<?php include_once("banner.php"); ?>
		<!-- #end Banner/Static -->
		
		
		
	</header>
	<!-- End Header -->
	<!-- Content Section -->
	<div class="section section-contents section-pad">
		<div class="container">
			<div class="content row">
			
				<div class="row">
					<div class="col-md-8">
					
						<div class="team-profile">
							<div class="team-member row">
								<div class="team-photo col-md-4 col-sm-5 col-xs-12">
									<img alt="" src="<?php echo $site ?>image/team/mashoko.jpg">
								</div>
								<div class="team-info col-md-8 col-sm-7 col-xs-12">
									<h3 class="name">Mashoko Dzimiri</h3>
									<p class="sub-title">- Principal Broker</p>
									<p align="justify">Mashoko has over a decade of working experience in the financial services industry. His elaborate career began by working  for a stockbroking firm and a financial advisory company. </p>
									<p align="justify">His expertise includes but not limited to business valuations and due diligence, documentation of circulars, private placement offer documents, mergers and acquisitions, private equity fund management. Deal structuring and execution is second nature to him.</p>
									<p align="justify">Mashoko holds a Bachelor of Commerce Honours in Finance with the National University of Science and Technology (Zimbabwe) and has a Master of Science in Finance and Investment from the same University. His passion in finance has led him to impart his knowledge at local and regional universities.</p>
								</div>
							</div>
						</div>
						<div class="team-profile">
							<div class="team-member row">
								<div class="team-photo col-md-4 col-sm-5 col-xs-12">
									<img alt="" src="<?php echo $site ?>image/team/llyod.jpg">
								</div>
								<div class="team-info col-md-8 col-sm-7 col-xs-12">
									<h3 class="name">Lloyd Mupfurutsa</h3>
									<p class="sub-title">-Director</p>
									<p align="justify">Lloyd has more than three decades’ experience in the Financial Services Sector, having begun his illustrious career as a Tax Assessor with the then Department of Taxes. He has a wealth of experience in securities dealing, sponsoring broker-ships, general management as well as strategic management. He has had the title of Principal broker at several Stockbroking firms.</p>
									<p align="justify">Lloyd has participated as a Sponsoring Broker in the listings and other corporate actions of numerous Zimbabwe Stock Exchange listed firms where his major role was to assist with investment and strategic efforts of the organisations.</p>
									<p align="justify"> Lloyd holds a number of Diplomas in Accounting, General Management, Securities Dealing and Theology, as well as a Master of Science Degree in Strategic Management obtained from the Derbyshire Business School in the United Kingdom. </p>

								</div>
							</div>
						</div>
						<!--
						<div class="team-profile">
							<div class="team-member row">
								<div class="team-photo col-md-4 col-sm-5 col-xs-12">
									<img alt="" src="/image/team-c.jpg">
								</div>
								<div class="team-info col-md-8 col-sm-7 col-xs-12">
									<h3 class="name">Fulker Johnstone</h3>
									<p class="sub-title">- Chief Operating Officer</p>
									<p>Lorem ipsum dolor sit amet consectetur to adipiscing elit, sed dot eiusmod tempor incididunt labore et dolore magna aliqua. Veniam quis nostrud exercitation ullamco laboris nisiut.</p>
									<p>Lorem ipsum dolor sit amet consectetur to adipiscing elit, sed dot eiusmod tempor incididunt labore et dolore magna aliqua. Veniam quis nostrud exercitation ullamco laboris nisiut. Lorem ipsum dolor sit amet consectetur to adipis.</p>

								</div>
							</div>
						</div>-->
						
					</div>

					<!-- Sidebar -->
					<?php include_once("about_sidebar.php"); ?>
					<!-- Sidebar #end -->
				</div>
				
			</div>
		</div>		
	</div>
	<!-- End Section -->
	<!-- Client logo -->
	<!--<div class="section section-logos section-pad-sm bg-light bdr-top">
		<div class="container">
			<div class="content row">

				<div class="owl-carousel loop logo-carousel style-v2">
					<div class="logo-item"><img alt="" width="190" height="82" src="/image/cl-logo1-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="/image/cl-logo2-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="/image/cl-logo3-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="/image/cl-logo4-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="/image/cl-logo5-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="/image/cl-logo6-w.png"></div>
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
	

	<!-- Preloader !active please if you want -->
	<!-- <div id="preloader"><div id="status">&nbsp;</div></div> -->
	<!-- Preloader End -->

	<!-- JavaScript Bundle -->
	<script src="<?php echo $site ?>js/jquery.bundle.js"></script>
	<!-- Theme Script init() -->
	<script src="<?php echo $site ?>js/script.js"></script>
	<!-- End script -->
</body>
</html>