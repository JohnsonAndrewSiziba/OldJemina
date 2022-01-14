<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Service | Jemina Capital - The Future</title>
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
		<!-- Banner/Static -->
		<div class="banner banner-static">
			<div class="banner-cpn">
				<div class="container">
					<div class="content row">
					
						<div class="banner-text">
							<h1 class="page-title">Our Services</h1>
							<p>&nbsp;</p>						
						</div>
						<div class="page-breadcrumb">
							<ul class="breadcrumb">
								<li><a href="/index.html">Home</a></li>
								<li class="active"><span>Our Services</span></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<div class="banner-bg imagebg">
				<img src="<?php echo $site ?>image/service_hdr.jpg" alt="" />
			</div>
		</div>
		<!-- #end Banner/Static -->
	</header>
	<!-- End Header -->
	<!-- Service Section -->
	<div class="section section-services section-pad">
	    <div class="container">
	        <div class="content row">
	        	
	        	<div class="wide-md center">
	        		<h2 class="heading-lead">Services</h2>
					<p>&nbsp;</p>
	        	</div>
	        	<!-- Feature Row  -->
				<div class="feature-row feature-service-row row">
					<div class="col-md-4 col-sm-6 even first">
						<!-- feature box -->
						<div class="feature boxed">
							<a href="/services/securities-trading/#securities">
								<div class="fbox-photo">
									<img src="<?php echo $site ?>image/services/securities.jpg" alt="">
								</div>
							</a>
							<div class="fbox-content">
								<h3 class="lead"><a href="/#">Securities Trading</a></h3>
								<p>The trading team offers an efficient platform for individual and institutional investors to execute their trades in the following financial securities;</p>
								<p><a href="<?php echo $site ?>services/securities-trading/#securities" class="btn-link link-arrow-sm">Learn More</a></p>
							</div>
						</div>
						<!-- End Feature box -->
					</div>
					<div class="col-md-4 col-sm-6 odd">
						<!-- feature box -->
						<div class="feature boxed">
							<a href="/services/direct-market-access/#dma">
								<div class="fbox-photo">
									<img src="<?php echo $site ?>image/services/dma.jpg" alt="">
								</div>
							</a>
							<div class="fbox-content">
								<h3 class="lead"><a href="/#">Direct Market Access</a></h3>
								<p>Our clients have direct access to ZSE, FINSEC, VFEX and such other exchanges that might be introduced from time through C Trade and ZSE Direct trading platforms.</p>
								<p><a href="<?php echo $site ?>services/direct-market-access/#dma" class="btn-link link-arrow-sm">Learn More</a></p>
							</div>
						</div>
						<!-- End Feature box -->
					</div>
					<div class="col-md-4 col-sm-6 even">
						<!-- feature box -->
						<div class="feature boxed">
							<a href="/services/advisory-services/#advisory">
								<div class="fbox-photo">
									<img src="<?php echo $site ?>image/services/advisory.jpg" alt="">
								</div>
							</a>
							<div class="fbox-content">
								<h3 class="lead"><a href="/services/advisory-services/#advisory">Advisory Services</a></h3>
								<p>Advising prospective and existing issuers on IPOs, rights issue, mergers & acquisitions, spin offs, curve outs, share consolidations and splits.</p>
								<p><a href="<?php echo $site ?>services/securities-trading/#advisory" class="btn-link link-arrow-sm">Learn More</a></p>
							</div>
						</div>
						<!-- End Featur box -->
					</div>
					<div class="col-md-4 col-sm-6 odd first">
						<!-- featured box -->
						<div class="feature boxed">
							<a href="/services/custodial-services/#custodial">
								<div class="fbox-photo">
									<img src="/image/services/custodial.jpg" alt="">
								</div>
							</a>
							<div class="fbox-content">
								<h3 class="lead"><a href="/#">Custodial Services</a></h3>
								<p>We offer broker controlled custodial services that allows our clients to trade electronically all listed equities and the service is underwritten by reputable commercial banks and ZSE</p>
								<p><a href="<?php echo $site ?>services/custodial-services/#custodial" class="btn-link link-arrow-sm">Learn More</a></p>
							</div>
						</div>
						<!-- End Feature box -->
					</div>
					<div class="col-md-4 col-custodialsm-6 odd">
						<!-- featured box -->
						<div class="feature boxed">
							<a href="/services/research-services/#research">
								<div class="fbox-photo">
									<img src="<?php echo $site ?>image/services/research_2.jpg" alt="">
								</div>
							</a>
							<div class="fbox-content">
								<h3 class="lead"><a href="/#">Research Services</a></h3>
								<p>Jemina offers tailor-made research solutions and information management requirements for its clients. It has an effective investor data bank that offers cutting edge issuer statistics and information for effective investment decisions.</p>
								<p><a href="<?php echo $site ?>services/research-services/#research" class="btn-link link-arrow-sm">Learn More</a></p>
							</div>
						</div>
						<!-- End Feature box -->
					</div>

	        </div>
	    </div>
	</div>
	<!-- End Section -->	
	<!-- Client logo -->
	<!--
	<div class="section section-logos section-pad-sm bg-light bdr-top">
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

	<!-- JavaScript Bundle -->
	<script src="<?php echo $site ?>js/jquery.bundle.js"></script>
	<!-- Theme Script init() -->
	<script src="<?php echo $site ?>js/script.js"></script>
	<!-- End script -->
</body>
</html>