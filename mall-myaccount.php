<?php
	if(file_exists(__DIR__.'/install.php')){
		die('You must delete install.php before using this site');
	}
	$account_file = __DIR__.'/../account.json';
	if(!session_id()){
		session_start();
	}
	if(!array_key_exists('is_loggon', $_SESSION)){
		header("Location: ./mall-login.php");
		exit();
	} else {
		$account_list = file_get_contents($account_file);
		$account_list = json_decode($account_list, 1);
		$myacc = $account_list[$_SESSION['email']];
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>My Account</title>
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
				<a class="active" href="mall-myaccount.php">Account</a>
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
		<div class="form">
			<h1>Account</h1>
			<p><b>Full name: </b><?php echo $myacc['fname'].' '.$myacc['lname'];?></p>
			<p><b>Email address: </b><?php echo $myacc['email'];?></p>
			<p><b>Phone number: </b><?php echo $myacc['phone'];?></p>
			<p><b>Profile Picture:</b><br><br>
			<img src="images/users/<?php echo ($myacc['avatar'] != "") ? $myacc['avatar'] : 'images/users/avatar.png'; ?>" alt="Profile Picture" style="border: solid; width:40%; margin:auto; display:block">
			</p>
			<a href="index.php" onclick="deleteInfo()">Sign Out</a>
		</div>
		<hr>
		<footer class="footer">
			<p><?php echo file_get_contents(__DIR__."/content/copyright.txt")?></p>
			<nav class="bottom-nav-bar">
				<a href="mall-info.php?page=tos">Terms of Service</a>
				<a href="mall-info.php?page=privacy">Privacy Policy</a>
			</nav>
		</footer>
		<script src="js/mall-account.js"></script>
		<script src="js/cookie.js"></script>
	</body>
</html>