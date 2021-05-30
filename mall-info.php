<?php
	if(file_exists(__DIR__.'/install.php')){
		die('You must delete install.php before using this site');
	}
	$type = $_GET['page'];
	$green = ['tos','privacy', 'copyright'];
	if(!in_array($type, $green)){
		$content = "";
		header("Location: ./mall-dashboard.php");
    exit();
	} else {
		$dir_c = __DIR__."/content/".$type.".txt";
		$content = file_get_contents($dir_c);
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Terms of Service</title>
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
		<div class="pptos">
			<?php echo $content; ?>
		</div>
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