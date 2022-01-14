<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Our Team - Jemina Capital - The Future</title>
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
							<h1 class="page-title">Our Team</h1>
							<p>&nbsp;</p>						
						</div>
						<div class="page-breadcrumb">
							<ul class="breadcrumb">
								<li><a href="<?php echo $site; ?>">Home</a></li>
								<li><a href="<?php echo $site; ?>about-us/">About Us</a></li>
								<li class="active"><span>Our Team</span></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<div class="banner-bg imagebg">
				<!--<img src="/image/banner-inside-a.jpg" alt="" />-->
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
					
						<div class="team-profile">
							<div class="team-member row">
								<div class="team-photo col-md-4 col-sm-5 col-xs-12">
									<img alt="" src="<?php echo $site ?>image/team/ayanda.jpg">
								</div>
								<div class="team-info col-md-8 col-sm-7 col-xs-12">
									<h3 class="name">Ayanda Ndlovu</h3>
									<p class="sub-title">- Accountant</p>
									<p>Ayanda has working experience in the Finance industry. She started her career at one of the biggest pharmaceutical companies in Zimbabwe as a finance intern in 2016.
									</p>
									<p>She holds a Bachelor of Commerce Honours Degree in Accounting with the National University of Science and Technology (Zimbabwe) and aspires to be a Chartered Accountant.</p>
								</div>
							</div>
						</div>
						<div class="team-profile">
							<div class="team-member row">
								<div class="team-photo col-md-4 col-sm-5 col-xs-12">
									<img alt="" src="<?php echo $site ?>image/team/emily.jpg">
								</div>
								<div class="team-info col-md-8 col-sm-7 col-xs-12">
									<h3 class="name">Emily Maposa</h3>
									<p class="sub-title">- Risk and Compliance Officer</p>
									<p>Emily holds a Bachelor of Science ( Honours) degree in Economics from Africa University. She is eager to excel within the financial industry and acquired some practical working experience within a stockbroking 
organisation. </p>
									<p>&nbsp;</p>

								</div>
							</div>
						</div>
						
						<div class="team-profile">
							<div class="team-member row">
								<div class="team-photo col-md-4 col-sm-5 col-xs-12">
									<img alt="" src="<?php echo $site ?>image/team/godfrey.jpg">
								</div>
								<div class="team-info col-md-8 col-sm-7 col-xs-12">
									<h3 class="name">Godfrey Ropafadzo Muchati</h3>
									<p class="sub-title">- Research Analyst</p>
									<p>Godfrey is an award-winning Best CFA Local Research Analyst for 2020 (Zimbabwe) and was a CFA regional finalist for the CFA Global Research 2019/2020. He began his career in the banking industry having worked at a local financial bank.</p>
									<p>He holds a Bachelor of Commerce Honors Degree in Finance acquired at the National University of Science and Technology and is looking forward to pursuing his Bachelor of Science Master’s Degree in Financial Engineering, whilst working towards attaining the CFA designation.</p>

								</div>
							</div>
						</div>
						

						<div class="team-profile">
							<div class="team-member row">
								<div class="team-photo col-md-4 col-sm-5 col-xs-12">
									<img alt="" src="<?php echo $site ?>image/team/johnson.jpg">
								</div>
								<div class="team-info col-md-8 col-sm-7 col-xs-12">
									<h3 class="name">Johnson Andrew Siziba</h3>
									<p class="sub-title">- Research Analyst</p>
									<p>Johnson is a final year Business Studies and Computing Science (HBSCT) student at University of Zimbabwe. He is an enthusiastic software developer, eager to contribute to team success.</p>
									<p>He did his industrial attachment at a local bank where he worked in E-Channels Development.</p>

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
									<h3 class="name">Godfrey Ropafadzo Muchati</h3>
									<p class="sub-title">- xxx</p>
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
	<!-- End Footer Widget-->
	


	<!-- JavaScript Bundle -->
	<script src="<?php echo $site; ?>js/jquery.bundle.js"></script>
	<!-- Theme Script init() -->
	<script src="<?php echo $site; ?>js/script.js"></script>
	<!-- End script -->
</body>
</html>