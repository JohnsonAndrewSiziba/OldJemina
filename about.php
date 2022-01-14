<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Who We Are | Jemina Capital - The future</title>
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
		<!-- Banner/Static -->
		<div class="banner banner-static">
			<div class="banner-cpn">
				<div class="container">
					<div class="content row">
					
						<div class="banner-text">
							<h1 class="page-title">Who We Are</h1>
							<p>&nbsp;</p>						
						</div>
						<div class="page-breadcrumb">
							<ul class="breadcrumb">
								<li><a href="/">Home</a></li>
								<li><a href="/about-us/">About Us</a></li>
								<li class="active"><span>Our Team</span></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<div class="banner-bg imagebg">
				<!--<img src="/image/team_banner_b.jpg" alt="" />-->
				<img src="<?php echo $site ?>image/management_banner_b.jpg" alt="" />
			</div>
		</div>
		<!-- #end Banner/Static -->
	</header>
	<!-- End Header -->
	<!-- Content Section -->
	<div class="section section-contents section-pad">
		<div class="container">
			<div class="content row">
			
				<div class="row">
					<div class="col-md-8">
					
						
					
						<h5 class="heading-sm-lead">About us</h5>
						<h2 class="heading-section">Who we are</h2>
						<p>Jemina Capital (Pvt) Ltd (Jemina)  is a brain child of a unique group of securities dealers with an impeccable finance and investment banking background. The company is registered and fully licensed with the Securities and Exchange Commission of Zimbabwe as a securities dealing firm. It is a member of the Zimbabwe Stock Exchange (ZSE), Financial Securities Exchange (FINSEC) and the Victoria Falls Stock Exchange (VFEX).
</p>
						<p>Jemina is an aggressively independent and privately owned securities dealing firm. Our focus is on achieving lasting impact by generating long term wealth for our investors cognisant of our future success whilst creating unprecedented value for our clients.
</p>
						<p>As an astutely well poised organization in research, innovation and identifying investment   opportunities with a lasting impact for our investors. Our portfolio includes a diverse clientele of individuals, pension and retirement funds, trusts, companies including state owned companies and foundations, and others.
</p>
						<p>The impetus and momentum that we have will enable us to create and influence the future of our local and global clients’ needs today.
</p>
					
					
				
						
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