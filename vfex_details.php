<?php include_once("constants.php"); ?>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<title class="name">Company</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo $site ?>image/favicon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo $site ?>css/vendor.bundle.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/style.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>price_sheet/style.css">
	<!-- <link id="style-css" rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>price_sheet/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo $site ?>price_sheet/modal.css">
	<style>
		.d-table tr{
			cursor: pointer;
		}

		#companies_paginate {
			font-size: 10px;
			width: 60%;
		}

		#companies_filter input {
			margin-left: 0;
			margin:auto;
		}

		
		#chartdiv {
			width: 100%;
			height: 500px;
			max-width: 100%;
		}
		#pie_chartdiv {
			width: 100%;
			height: 120px;
		}
		tspan {
			font-size: 9px;
		}
		#gauge_div {
			width: 100%;
  			height: 250px;
		}

		.card {
			box-shadow: 0 1px 2px 0 rgba(0,0,0,0.2);
			transition: 0.3s;
			width: 100%;
			padding: 25px;
		}

		.card:hover {
			box-shadow: 0 2px 4px 0 rgba(63, 52, 52, 0.2);
		}

		.container {
		padding: 2px 16px;
		}
	</style>
	<link rel="stylesheet" href="price_sheet/assets/spinner.css">
</head>
<body class="site-body style-v1">
<!-- <div id="spinner">
		<img src="<?php echo $site ?>price_sheet/assets/ajax-loader.gif"/>
</div> -->
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
                            <h1 class="page-title name">Company</h1>
                        </div>
                        <div class="page-breadcrumb">
                            <ul class="breadcrumb">
                                <li><a href="/">Home</a></li>
                                <li><a href="#">Companies</a></li>
                                <li class="active"><span class="name">Company</span></li>
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

						<div class="content-section" >	
							<p class="heading-sm-lead symbol"></p>
						</div>

						<div class="content row">

							<!-- <h2 class="heading-lg">Investment Planning</h2> -->
							<p><img src="" alt="" style="max-height: 200px; max-width: 180px" class="alignleft col-md-4 no-round logo_img"></p>
							<div class="summary"></div>
							<hr style="clear: both;">

							<div class="row" style=" clear: both; margin-right: 10px; margin-left: 10px;">

								<div style="border-right: 1px solid #f5f0f0; padding-right: 20px; margin-top: 20px;" class="col-md-4">
									<h2 class="heading-lead" style="margin: 0; padding: 0;">
										 
										$  <span class="price" >-</span> <small>(zwl)</small> 
									</h2> 
									<p>
										<span style="margin-right: 10px;" > <span class="change"></span> &#916; </span>
										<span style="border-left: 1px solid #000"></span>
										<span style="margin-left: 10px"><span class="percentage_change"></span>% &#916;</span>
									</p>
								</div>
					
								<div  class="col-md-4" style=" margin-top: 20px; display: none">
									<small >Market Cap. (M)</small> <br>
									<h2 class="heading-section" style="margin: 0; padding: 0;">
										
										$  <span class="market_cap">-</span> <small>(zwl)</small> 
									</h2> 
								</div>
					
								<div  class="col-md-4" style="margin-top: 20px; display: none">
									<div id="market_shaare_chart"></div>
								</div>
							</div>

							
							<hr />
							<h3 class="color-primary">STOCK CHART</h3>
							<div id="controls" style="width: 100%; overflow: hidden;">
							<div style="float: left; margin-left: 15px;">
							From: <input type="text" id="fromfield" class="amcharts-input" />
							To: <input type="text" id="tofield" class="amcharts-input" />
							</div>
							<div style="float: right; margin-right: 15px;">
							<button id="b1m" class="amcharts-input">1m</button>
							<button id="b3m" class="amcharts-input">3m</button>
							<button id="b6m" class="amcharts-input">6m</button>
							<button id="b1y" class="amcharts-input">1y</button>
							<button id="bytd" class="amcharts-input">YTD</button>
							<button id="bmax" class="amcharts-input">MAX</button>
							</div>
							</div>
							<div id="chartdiv"></div>

						</div>

						<div style="margin-top: 45px;" class="panel-group accordion" id="general" role="tablist" aria-multiselectable="true">
							<!-- each panel -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="ques-i1">
									<h3 class="panel-title">
										<a class="collapsed color-primary" role="button" data-toggle="collapse" data-parent="#general" href="#ques-ans-i1" aria-expanded="false">
											TOP SHAREHOLDERS
											<span class="plus-minus"><span></span></span>
										</a>
									</h3>
								</div>
								<div id="ques-ans-i1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ques-i1">
									<div class="panel-body">
										<table id="top_shareholders" class="display" width="100%"></table>
									</div>
								</div>
							</div> 
							<!-- each panel -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="ques-i2">
									<h4 class="panel-title">
										<a class="collapsed color-primary" role="button" data-toggle="collapse" data-parent="#general" href="#ques-ans-i2" aria-expanded="false">
											REPORTS
											<span class="plus-minus"><span></span></span>
										</a>
									</h4>
								</div>
								<div id="ques-ans-i2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ques-i2">
									<div class="panel-body row" id="reports_row">

										<div class="col-md-6" id="report_card_template" style="display: none;">
											<div class="card shadow-sm" >
												<h6 class="heading-sm-lead color-secondary type">Weekly Report</h6>
												
												<div style="line-height: normal; height: 200px;">
												
												<br>
												<p>
												<strong style="font-size: 40px;" class="report_title"> This is the title </strong><br><small class="report_date">2021-10-13</small>
												
												</p>
												
												<span style="font-size: 15px" class="extract">
					
												</span>
												</div>
												<hr>
												<div class="flex flex-deirection-row">
												<a href="#"  class="btn btn-alt btn-outline btn-sm report_link">Read More</a>
												</div>
											</div>
										</div>



									</div>
								</div>
							</div>
							<!-- each panel -->
							
						</div>
						<!-- End Acorrdion -->
						<!-- <img src="image/photo-lg-a.jpg" alt="" class="aligncenter">
						<h3 class="color-secondary">Areas of Expertise</h3>
						<p>Bring to the table dolor sit amet enim ad minim veniam, quis nostrud exercation ullamco laboris nisi ution aliquip exon commodo conquat. Duis aute irure dolor nostrud ullamco. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<p>If you have any questions regarding our services, please <strong>contact us</strong> or call at <strong>800 1234 5677</strong>.</p>
						 -->
					</div>
					
					<!-- Sidebar -->
					<div class="col-md-4">
						<div class="sidebar-right">


						<!-- ------------------------ SECTOR COMPOSITION ----------------------------- -->

						<div class="panel-group accordion" id="general" role="tablist" aria-multiselectable="true">
							<!-- each panel -->
							<!-- <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="ques-i1">
									<h4 class="panel-title">
										<a class="" role="button" data-toggle="collapse" data-parent="#general" href="#sector_composition" aria-expanded="false">
											SECTOR COMPOSITION
											<span class="plus-minus"><span></span></span>
										</a>
									</h4>
								</div>
								<div id="sector_composition" class="panel-collapse " role="tabpanel" aria-labelledby="ques-i1">
									<div class="panel-body">
										<h6 class="heading-sm-lead-smaller color-secondary with-line sector_name"> </h6>
										<table style="font-size: 12px" id="sector_composition_table" class="display" width="100%"></table>
									</div>
								</div>
							</div>  -->
							<!-- each panel -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="ques-i2">
									<h4 class="panel-title">
										<a class="" role="button" data-toggle="collapse" data-parent="#general" href="#companies_sd" aria-expanded="false">
											COMPANIES
											<span class="plus-minus"><span></span></span>
										</a>
									</h4>
								</div>
								<div id="companies_sd" class="panel-collapse" role="tabpanel" aria-labelledby="ques-i2">
									<div class="panel-body">
										<div class="wgs-box wgs-menus">
											<div class="wgs-content">
												<ul class="list list-grouped">
													<li class="list-heading">
														<span>Companies</span>
														<table style="font-size: 12px;" id="companies" class="display" width="100%"></table>
													</li>
												</ul>									
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<br>
						<!--
							<div class="wgs-box boxed light has-bg">
								<div class="wgs-content">
									<h3>Innovative Tools for Investor</h3>
									<p>We employ a long-established strategy, sector-focused investing across all of our markets globally...</p>
									<a href="service-single.html" class="btn btn-alt btn-outline"> Learn More</a>
								</div>
								<div class="wgs-bg imagebg">
									<img src="<?php echo $site ?>image/photo-sd-a.jpg" alt="">
								</div>
							</div>
							
							<div class="wgs-box boxed bg-secondary light">
								<div class="wgs-content">
									<h3>Need Help To Grow Your Business?</h3>
									<p>Investment Expert will help you start your own company.</p>
									<a href="contact.html" class="btn btn-light"> Get In Touch</a>
								</div>
							</div>
							
							-->

						</div>
					</div>
					<!-- Sidebar #end -->
				</div>
				
			</div>
		</div>		
	</div>
	<!-- End Section -->	
	<!-- 
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
	 -->



	<!-- _____________________________ MODAL _________________________ -->

	<!-- The Modal -->
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
	<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo $site ?>price_sheet/api_base.js"></script>
	<!-- <script src="price_sheet/company_details.js"></script> -->
	
	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
	<!-- <script src="price_sheet/stock_chart.js"></script> -->
	<!-- <script src="price_sheet/pie_chart.js"></script> -->
	<script src="<?php echo $site ?>price_sheet/gauge.js"></script>

	<script src="<?php echo $site ?>price_sheet/vfexScript.js"></script>
</body>
</html>