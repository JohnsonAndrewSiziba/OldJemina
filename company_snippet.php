
<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title class="name">Company</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo $site ?>image/favicon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo $site ?>css/vendor.bundle.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/style.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
	</style>
</head>
<body>
    <div class="container">
		<h1 class="heading-section">
			<a href="#" class="name link"></a>
		</h1>
        <h3 class="heading-sm-lead color-secondary with-line symbol"></h3>
        <p>
            <img src="" alt="" style="width: 160px" class="alignleft col-md-4 no-round logo_img">
        </p>
        <div class="summary"></div>
		<hr style="clear: both">           
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
            <div  class="col-md-4" style=" margin-top: 20px;">
				<small >Market Cap. (M)</small> <br>
                <h2 class="heading-section" style="margin: 0; padding: 0;">
                    
                    $  <span class="market_cap">-</span> <small>(zwl)</small> 
                </h2> 
            </div>
            <div  class="col-md-4" style="margin-top: 20px;">
                <div id="market_shaare_chart"></div>
            </div>
        </div>  <!-- row -->
        <div>
            <br />
            <table id="details" class="display" width="100%"></table>
        </div>
    </div>

    <script src="<?php echo $site ?>js/jquery.bundle.js"></script>

</body>
</html>