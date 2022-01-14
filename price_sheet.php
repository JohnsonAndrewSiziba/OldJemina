<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Price Sheet</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo $site ?>image/favicon.png" type="/image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo $site ?>css/vendor.bundle.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/style.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/grid.css">
	<link rel="stylesheet" href="https:////cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

	<style>
        .summaries {
            font-size: 14px;
        }

    </style>

</head>
<body class="site-body style-v1">
	<!-- Header --> 
	<header class="site-header header-s1 is-transparent is-sticky">
		<!-- Topbar -->
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
							<h1 class="page-title">Price Sheet - <span class="date"></span></h1>
							<p>To ventore veritatis et quasi architecto beatae vitae dicta et quasi architecto beatae vitae dicta.</p>						
						</div>
						<div class="page-breadcrumb">
							<ul class="breadcrumb">
								<li><a href="<?php echo $site ?>">Home</a></li>
								<li><a href="#">Services</a></li>
								<li class="active"><span>Investment Planning</span></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<div class="banner-bg imagebg">
				<!-- <img src="/image/banner-inside-b.jpg" alt="" /> -->
			</div>
		</div>
		<!-- #end Banner/Static -->
	</header>
	<!-- End Header -->
	<!-- Content -->

	<!-- End Content -->
	<!-- End Section -->

    <?php include_once("price_sheet/price_sheet.php"); ?>

	<!-- Call Action -->
	<div class="call-action cta-small has-bg bg-primary" style="background-image: url('<?php echo $site ?>image/plx-cta.jpg');">
		<div class="cta-block">
			<div class="container">
				<div class="content row">

					<div class="cta-sameline">
						<h2>Have any Question?</h2>
						<p>We're here to help. Send us an email or call us at +012-345-6789. Please feel free to contact our expert.</p>
						<a class="btn btn-alt" href="#">Contact Us</a>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- End Section -->

	<!-- Footer Widget-->
	<?php include_once("footer.php"); ?>
	<!-- End Footer Widget -->

	<!-- Copyright -->
	<div class="copyright style-v2">
		<div class="container">
			<div class="row">
			
				<div class="row">
					<div class="site-copy col-sm-7">
						<p>&copy; 2017 Finance Corp. <a href="#">Policy</a></p>
					</div>
					<div class="site-by col-sm-5 al-right">
						<p>Template Made by <a href="http://softnio.com/" target="_blank">Softnio.</a></p>
					</div>
				</div>
				 				
			</div>
		</div>
	</div>
	<!-- End Copyright -->

	<!-- JavaScript Bundle -->
	<script src="<?php echo $site ?>js/jquery.bundle.js"></script>
	<!-- Theme Script init() -->
	<script src="<?php echo $site ?>js/script.js"></script>
	<!-- End script -->

	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo $site ?>price_sheet/api_base.js"></script>
	<script src="<?php echo $site ?>price_sheet/price_sheet.js"></script>
</body>
</html>