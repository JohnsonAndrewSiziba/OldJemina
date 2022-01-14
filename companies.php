<?php include_once("constants.php"); ?>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Jemina Capital - Listed Companies</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo $site ?>image/favicon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo $site ?>css/vendor.bundle.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/style.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo $site ?>price_sheet/modal.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>price_sheet/style.css">
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
							<h1 class="page-title">Listed Companies</h1>
						</div>
						<div class="page-breadcrumb">
							<ul class="breadcrumb">
								<li><a href="/">Home</a></li>
								<li class="active"><span>Listed Companies</span></li>
							</ul>
						</div>
		
					</div>
				</div>
			</div>
			<div class="banner-bg imagebg">
			<!--- TODO DYNAMICALLY CHANGE PAGE BANNER /image/banner-inside-b.jpg--->
				<img src="" alt="" />
			</div>
		</div>
		<!-- #end Banner/Static -->
	</header>
	<!-- End Header -->
	<!-- Contents -->
	<div class="section section-contents section-pad">
		<div class="container">
			<div class="content row">
			
				<div class="row">
					<div class="col-md-8">

						<h2 class="heading-lg">Listed Companies</h2>
						<div class="panel-group accordion" id="general" role="tablist" aria-multiselectable="true">
							<!-- each panel -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="ques-i1">
									<h4 class="panel-title">
										<a class="" role="button" data-toggle="collapse" data-parent="#general" href="#ques-ans-i1" aria-expanded="false">
											ZSE EQUITY LISTED COMPANIES
											<span class="plus-minus"><span></span></span>
										</a>
									</h4>
								</div>
								<div id="ques-ans-i1" class="panel-collapse" role="tabpanel" aria-labelledby="ques-i1">
									<div class="panel-body">
										<table id="zse_equity" class="display" width="100%"></table>
									</div>
								</div>
							</div> 
							<!-- each panel -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="ques-i2">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#general" href="#ques-ans-i2" aria-expanded="false">
											ZSE ETFs
											<span class="plus-minus"><span></span></span>
										</a>
									</h4>
								</div>
								<div id="ques-ans-i2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ques-i2">
									<div class="panel-body">
										<table id="zse_etfs" class="display" width="100%"></table>
									</div>
								</div>
							</div>
							<!-- each panel -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="ques-i3">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#general" href="#ques-ans-i3" aria-expanded="false">
										   VFEX LISTED COMPANIES
											<span class="plus-minus"><span></span></span>
										</a>

									</h4>
								</div>
								<div id="ques-ans-i3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ques-i3">
									<div class="panel-body">
										<table id="vfex" class="display" width="100%"></table>
									</div>
								</div>
							</div>
							<!-- each panel -->
						</div>
						<!-- End Acorrdion -->
					
					</div>
					
					<!-- Sidebar -->
					<?php include_once("listed_sidebar.php"); ?>
					<!-- Sidebar #end -->
				</div>
				
			</div>
		</div>		
	</div>
	<!-- End Section -->	

	<!-- Call Action -->
	<?php include_once("calltoaction.php"); ?>
	<!-- End Section -->

	<!-- Footer Widget-->
	<?php include_once("footer.php"); ?>
	<!-- End Footer Widget -->


	<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
	  <span class="close">&times;</span>
		<h1 class="heading-section">
			<a title="View Company" href="#" class="sector_company_name sector_company_link"></a>
		</h1>
		<h3 class="heading-sm-lead color-secondary with-line sector_company_symbol"></h3>
		<p>
			<img src="" alt="" style="width: 160px" class="alignleft col-md-4 no-round sector_company_logo_img">
		</p>
		<div class="sector_company_summary"></div>
		<hr style="clear: both">           
		<div class="row" style=" clear: both; margin-right: 10px; margin-left: 10px;">
			<div style="border-right: 1px solid #f5f0f0; padding-right: 20px; margin-top: 20px;" class="col-md-4">
				<h2 class="heading-lead" style="margin: 0; padding: 0;">
					$  <span class="sector_company_price" >-</span> <small>(zwl)</small> 
				</h2> 
				<p>
					<span style="margin-right: 10px;" > <span class="sector_company_change"></span> &#916; </span>
					<span style="border-left: 1px solid #000"></span>
					<span style="margin-left: 10px"><span class="sector_company_percentage_change"></span>% &#916;</span>
				</p>
			</div>
			<div  class="col-md-4" style=" margin-top: 20px;">
				<small >Market Cap. (M)</small> <br>
				<h2 class="heading-section" style="margin: 0; padding: 0;">
					
					$  <span class="sector_company_market_cap">-</span> <small>(zwl)</small> 
				</h2> 
			</div>
			<div  class="col-md-4" style="margin-top: 20px;">
				<div id="sector_company_market_share_chart"></div>
			</div>
		</div>  <!-- row -->
	</div>
  
  </div>

  <script src="<?php echo $site ?>price_sheet/api_base.js"></script>
	<!-- JavaScript Bundle -->
	<script src="<?php echo $site ?>js/jquery.bundle.js"></script>
	<!-- Theme Script init() -->
	<script src="<?php echo $site ?>js/script.js"></script>
	<!-- End script -->

	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>


	<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo $site ?>price_sheet/companies.js"></script>
</body>
</html>