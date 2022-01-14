<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title id="page_title"> Jemina Capital | Reports | </title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo $site ?>image/favicon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo $site ?>css/vendor.bundle.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/style.css">

	<style>
		.chart_div {
			width: 100%;
			height: 230px;
			margin-top: 10px;
			margin-bottom: 10px;
		}

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
							<h1 class="page-title title">Report Title</h1>
						</div>
						<div class="page-breadcrumb">
							<ul class="breadcrumb">
								<li><a href="#">Home</a></li>
								<li><a href="#">Reports</a></li>
								<li class="active"><span class="title">Report Title</span></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<div class="banner-bg imagebg">
				<!-- <img src="image/banner-inside-b.jpg" alt="" /> -->
			</div>
		</div>
		<!-- #end Banner/Static -->
	</header>
	<!-- End Header -->
	<!-- Contents -->
	<div class="section section-contents section-pad">
		<div class="container">
			<div class="content row">
			
				<div class="row" style="padding-top: 20px;">
					<div class="col-md-6">

						<h2 class="heading-md dateHeading the_dates"></h2>
						<h3 class="heading-sm-lead color-secondary with-line type section_1_title"></h3>						
						<div class="section_1"></div>
						<br>
						<h3 class="heading-sm-lead color-secondary with-line section_2_title"> </h3>						
						<div class="section_2"></div>
						<hr>

						<div>
							<h3 class="heading-sm-lead color-secondary with-line"> DOWNLOAD </h3>

							<div class="wgs-content">
								<p>Download the report as a PDF</p>
								<p><a href="" target="_blank" class="btn btn-alt btn-sm download_link">Download</a></p>
							</div>
						</div>

						<hr>

					</div>
					
					<!-- Sidebar -->
					<div class="col-md-6">
						<div class="sidebar-right">
							<br>
							<br>
							<br>
						<h3 class="heading-sm-lead color-secondary with-line">Report Metrics

						</h3>

							<div class="wgs-box wgs-menus" id="indices_chart_div" style="display: none;">
								<h4 class="heading-sm-lead-smaller color-secondary with-line">INDICES</h4>
								<div class="wgs-content">
									<table id="indices" style="font-size: 13px" class="display  table-sm" width="100%">
									</table>
								</div>
							</div>

							<hr>
							
							<div class="wgs-box wgs-menus" id="unavail" style="display: none">
								<p style="width: 50%; margin: auto">Data Unavailable</p>
							</div> 

							<div class="wgs-box wgs-menus" id="v_ldr">
								<h6 class="heading-sm-lead-smaller color-secondary with-line">VALUE LEADERS</h6>
								<div class="wgs-content">
								<div id="value_leaders" class="chart_div">

								</div>
							</div>

							<hr>

							<div class="wgs-box wgs-menus" id="vol_ldr">
								<h6 class="heading-sm-lead-smaller color-secondary with-line">VOLUME LEADERS</h6>
								<div class="wgs-content">
								<div id="volume_leaders" class="chart_div"></div>
							</div>

							<hr>

							<div class="wgs-box wgs-menus">
								<h6 class="heading-sm-lead-smaller color-secondary with-line">TOP 5 GAINERS</h6>
								<div class="wgs-content">
								<table id="gainers_table" style="font-size: 12px;" class="display" width="100%"></table>
							</div>

							<hr>


							<div class="wgs-box wgs-menus">
								<h6 class="heading-sm-lead-smaller color-secondary with-line">TOP 5 SHAKERS</h6>
								<div class="wgs-content">
								<table id="shakers_table" style="font-size: 12px;" class="display  compact" width="100%"></table>
							</div>

						</div>
					</div>
					<!-- Sidebar #end -->
				</div>
				
			</div>
		</div>		
	</div>
	<!-- End Section -->	
	<!-- Client logo -->
	<div class="section section-logos section-pad-sm bg-light bdr-top">
		<div class="container">
			<div class="content row">

				<div class="owl-carousel loop logo-carousel style-v2">
					<div class="logo-item"><img alt="" width="190" height="82" src="<?php echo $site ?>image/cl-logo1-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="<?php echo $site ?>image/cl-logo2-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="<?php echo $site ?>image/cl-logo3-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="<?php echo $site ?>image/cl-logo4-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="<?php echo $site ?>image/cl-logo5-w.png"></div>
					<div class="logo-item"><img alt="" width="190" height="82" src="<?php echo $site ?>image/cl-logo6-w.png"></div>
				</div>

			</div>
		</div>	
	</div>
	<!-- End Section -->

	<?php include_once("calltoaction.php"); ?>

	<!-- Footer Widget-->
	<?php include_once("footer.php"); ?>
	<!-- End Footer Widget -->

	<!-- JavaScript Bundle -->
	<script src="<?php echo $site ?>js/jquery.bundle.js"></script>
	<!-- Theme Script init() -->
	<script src="<?php echo $site ?>js/script.js"></script>
	<!-- End script -->


	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
	

	<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo $site ?>price_sheet/reportData.js"></script>
</body>
</html>