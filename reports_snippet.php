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



		.container {

		padding: 2px 16px;

		}

    </style>

</head>

<body>

    



		<div class="container">

			<div class=" row">

				

				<!-- <h5 class="heading-sm-lead center">Latest News</h5> -->

					<!-- Blog Post Loop -->

					

					<div class="" id="reports_div">

					

						<div class=" col-md-4 col-sm-6" id="report_template" style="display: none;">

							<div style="padding: 5px; border: 1px solid #dedede; min-height: 390px;">

								<div class="post-thumbs">

									<!-- <a href="news-details.html"><img alt="" src="price_sheet/assets/business_analysis.jpg"></a> -->

								</div>

								<div class="post-entry">

									<p class="heading-sm-lead report_type">Weekly Report</p>

									<div class="post-meta"><span class="pub-date report_dates"></span></div>

									<!-- <h2><a class="report_link" href=""> <span class="report_title"></span> </a></h2> -->

									<div class="extract"></div>

									<a class="btn btn-alt report_link" href="">Read More</a>

								</div>

							</div>

						</div>

					</div>

				

			</div>

		</div>





		<div>

			<br>

			<p class="text-center">

				<a href="/reports/" class="btn btn-outline btn-sm">

					View All...

				</a>

			</p>

		</div>



</body>

</html>