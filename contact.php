<?php include_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Contact Jemina | Jemina Capital - The Future</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo $site ?>image/favicon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo $site ?>css/vendor.bundle.css">
	<link id="style-css" rel="stylesheet" type="text/css" href="<?php echo $site ?>css/style.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav" aria-expanded="false">
						<span class="sr-only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Q-Button for Mobile -->
					<div class="quote-btn"><a class="btn" href="<?php echo $site ?>get-a-quote.html">Sign in</a></div>
				</div>
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
							<h1 class="page-title">Contact Jemina Capital</h1>
							<p>Would you like to come by and say hi?</p>						
						</div>
						<div class="page-breadcrumb">
							<ul class="breadcrumb">
								<li><a href="<?php echo $site ?>index.html">Home</a></li>
								<li class="active"><span>Contact Us</span></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<div class="banner-bg imagebg">
				<!--<img src="/image/banner-contact.jpg" alt="" />-->
			</div>
		</div>
		<!-- #end Banner/Static -->
	</header>
	<!-- End Header -->
	<!-- Content -->
	<div class="section section-contents section-contact section-pad">
		<div class="container">
			<div class="content row">

				<h2 class="heading-lg">Contact Us</h2>
				<div class="contact-content row">
					<div class="drop-message col-md-7 res-m-bttm">
						<p>If you'd like to work with us or have any questions regarding our services, please contact us.</p>
						<div id="sent_info" class="bg-success" style="padding: 10px; border-rdius: 4px; display: none">
						    <p>Your message has been sent successfully.</p>
						</div>
						<form id="contactForm" class="form-quote" method="POST">
								<div class="form-group row">
									<div class="form-field col-md-6 form-m-bttm">
										<input name="name" required type="text" placeholder="Name *" class="form-control required">
									</div>
									<div class="form-field col-md-6">
										<input name="company" type="text" placeholder="Company" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<div class="form-field col-md-6 form-m-bttm">
										<input name="email" type="email" placeholder="Email " class="form-control email">
									</div>
									<div class="form-field col-md-6">
										<input name="phone" type="text" placeholder="Phone " class="form-control">
									</div>
								</div>
								<h4>Services You Are Interested In</h4>
								<div class="form-group row">
									<ul class="form-field clearfix">
										<li class="col-sm-4"><input type="checkbox" name="interest" value="Securities Trading"> <span> Securities Trading</span></li>
										<li class="col-sm-4"><input type="checkbox" name="interest" value="Custodial Services"> <span> Custodial Services</span></li>
										<li class="col-sm-4"><input type="checkbox" name="interest" value="Mutual Funds"> <span> Mutual Funds</span></li>
									</ul>
									<ul class="form-field clearfix">
										<li class="col-sm-4"><input type="checkbox" name="interest" value="Advisory Services"> <span> Advisory Services</span></li>
										<li class="col-sm-4"><input type="checkbox" name="interest" value="Research Services"> <span> Research Services</span></li>
										<li class="col-sm-4"><input type="checkbox" name="interest" value="Direct Market Access"> <span> Direct Market Access</span></li>
									</ul>
										<ul class="form-field clearfix">
										<li class="col-sm-4"><input type="checkbox" name="interest" value="Others"> <span> Others</span></li>
									</ul>
								</div>
								<div class="form-group row">
									<div class="form-field col-md-6">
										<p>Best Time to Reach</p>
										<select name="reach">
											<option value="">Please select</option>
											<option value="09am-12pm">09 AM - 12 PM</option>
											<option value="12pm-03pm">12 PM - 03 PM</option>
											<option value="03pm-06pm">03 PM - 06 PM</option>
										</select>
									</div>
									<div class="form-field col-md-6">
										<p>How Did You Hear About Us</p>
										<select name="hear">
											<option value="">Please select</option>
											<option value="Friends">Friends</option>
											<option value="Facebook">Facebook</option>
											<option value="Google">Google</option>
											<option value="Collegue">Collegue</option>
											<option value="Others">Other</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="form-field col-md-12">
										<textarea name="message" required placeholder="Message *" class="txtarea form-control required"></textarea>
									</div>
								</div>
								<input type="text" class="hidden" name="form-anti-honeypot" value="">
								<div class="g-recaptcha" data-sitekey="6LfMDv8cAAAAAKW4ifr8QfSZHcITqtdB80Wql9NE"></div><br/>
								<button type="submit" class="btn">Submit</button>
								<div class="form-results"></div>
								<br />
								<div id="sent_info_2" class="bg-success" style="padding: 10px; border-rdius: 4px; display: none">
        						    <p>Your message has been sent successfully.</p>
        						</div>
							</form>
					</div>
					
					<div class="contact-details col-md-4 col-md-offset-1">
						<ul class="contact-list">
							<li><em class="fa fa-map" aria-hidden="true"></em>
								<p>
									<span>9 Coull Drive, Mt Pleasant<br>Harare, Zimbabwe.</span>
								</p>
								<div>
									<iframe 
										src="https://www.google.com/maps/d/embed?mid=1nUOdyaC_wAT8l69IIKB9mNcDFYiAj3sN"
										width="100%" 
										height="450" 
										style="border:0;" 
										allowfullscreen="" 
										loading="lazy">
									</iframe>
								</div>
							</li>
							<li><em class="fa fa-phone" aria-hidden="true"></em>
								<span><!--Toll Free : (123) 4567 8910<br>-->
								Telephone : +263-242-301752</span>
							</li>
							<li><em class="fa fa-envelope" aria-hidden="true"></em>
								<span>Email : 
									<a href = "mailto: info@jemina.capital">info@jemina.capital</a>
								</span>
							</li>
							<li>
								<em class="fa fa-clock-o" aria-hidden="true"></em><span>Mon - Fri: 8AM - 5PM </span>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Content -->

	

	<!-- Map -->
	<div class="map-holder map-contact">
		<div id="">

		</div>
	</div>
	<!-- End map -->	
	<!-- Client logo -->
	<!--<div class="section section-logos section-pad-sm bg-light bdr-top">
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
	</div>-->
	<!-- End Section -->

	<!-- Footer Widget-->
	<?php include_once("footer.php"); ?>
	<!-- End Footer Widget -->

	<script src="<?php echo $site ?>price_sheet/api_base.js"></script>
	
	<!-- Google Map Script -->
	<script src="<?php echo $site ?>js/gmaps.js"></script>

	<!-- JavaScript Bundle -->
	<script src="<?php echo $site ?>js/jquery.bundle.js"></script>
	<!-- Theme Script init() -->
	<script src="<?php echo $site ?>js/script.js"></script>
	<script src="<?php echo $site ?>price_sheet/contact_form.js"></script>
	<!-- End script -->

	<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "106211111884379");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v12.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>