<?php
	if(file_exists(__DIR__.'/install.php')){
		die('You must delete install.php before using this site');
	}
	if(!session_id()){
		session_start();
	}
	if(!array_key_exists('is_admin', $_SESSION)){
		if(array_key_exists('is_loggon', $_SESSION)){
			header("Location: ./mall-myaccount.php");
		} else {
			header("Location: ./mall-login.php");
		}
	exit();
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<link rel="stylesheet" href="css/mall-style.css">
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<body>
		<body style="background-color:#f5f5dc">
		<header class="header">
		<a href="index.php"><img src="images/logo.png" alt="R-Mall logo" title="Home"></a>
			<nav class="nav-menu-bar">
				<a href="index.php">Home</a>
				<a href="mall-aboutus.html">About Us</a>
				<a href="mall-fees.html">Fees</a>
				<a href="mall-myaccount.php">Account</a>
				<a href="mall-browse.php">Browse</a>
				<a href="mall-faqs.html">FAQs</a>
				<a href="mall-contact.html">Contact</a>
			</nav>
		</header>
		<hr>
		<div id="cookie" class="cookie">
			<h1 style="text-align:center">I use cookies</h1>
			<p>My website uses cookies necessary for its basic functioning. By continuing browsing, you consent to my use of cookies and other technologies.</p>
			<button id="cookie_accept">I understand</button>
			<a href="https://gdpr-info.eu/">Learn more</a>
		</div>
		<div class="main">
			<div class="abtus-content">
			<h2>DASHBOARD</h2>
				<div class="profile">
					<div class="dash-column">
						<div class="prof-card">
							<h2>Copyright</h2>
							<a href="mall-dashboard-edit.php?page=copyright">Modify</a>
						</div>
					</div>
					<div class="dash-column">
						<div class="prof-card">
							<h2>Terms of Service</h2>
							<a href="mall-dashboard-edit.php?page=tos">Modify</a>
						</div>
					</div>
					<div class="dash-column">
						<div class="prof-card">
							<h2>Privacy Policy</h2>
							<a href="mall-dashboard-edit.php?page=privacy"> Modify</a>
						</div>
					</div>
					<div class="dash-column">
						<div class="prof-card">
							<h2>About Us</h2>
							<a href="mall-aboutus-edit.php"> Modify</a>
						</div>
					</div>
				</div>
				<hr style="visibility:hidden">
			</div>
		</div>
		<hr style="visibility:hidden">
		<hr>
		<footer class="footer">
			<p><?php echo file_get_contents(__DIR__."/content/copyright.txt")?></p>
			<nav class="bottom-nav-bar">
				<a href="mall-info.php?page=tos">Terms of Service</a>
				<a href="mall-info.php?page=privacy">Privacy Policy</a>
			</nav>
		</footer>
		<script src="js/cookie.js"></script>
	</body>
</html>