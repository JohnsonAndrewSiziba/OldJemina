<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Jemina Capital - Price Sheet</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo $site ?>image/favicon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo $site ?>css/vendor.bundle.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/style.css">

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
                        </div>
                        <div class="page-breadcrumb">
                            <ul class="breadcrumb">
                                <li><a href="/">Home</a></li>
                                <li><a href="/services/">Services</a></li>
                                <li class="active"><span>Price Sheet</span></li>
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
			    <?php include_once("price_sheet/price_sheet.php"); ?>
			</div>
		</div>		
	</div>
	<!-- End Section -->	
	<!-- Company Product Brands -->
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

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $site ?>price_sheet/api_base.js"></script>
    <script src="<?php echo $site ?>price_sheet/price_sheet.js"></script>
</body>
</html>