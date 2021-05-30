<?php
	if(file_exists(__DIR__.'/install.php')){
		die('You must delete install.php before using this site');
	}
	$msg = "";
	$account_file = __DIR__.'/../account.json';
	if(!session_id()){
		session_start();
	}
	if(array_key_exists('is_loggon', $_SESSION)){
		header("Location: ./mall-dashboard.php");
	exit();
	}
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$account_list = file_get_contents($account_file);
		$account_list = json_decode($account_list, 1);
		if($account_list[$_POST['email']]['pass'] == hash('SHA512', $_POST['pass'])){
			$_SESSION['is_loggon'] = true;
			$_SESSION['email'] = $_POST['email'];
			if($account_list[$_POST['email']]['is_admin']){
				$_SESSION['is_admin'] = true;
				header("Location: ./mall-dashboard.php");
			} else {
			}
		} else {
			$msg = "Password is not correct"; 
		}
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Log In</title>
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
		<div class="login">
			<form method="POST">
        <p>
          <?php echo $msg; $msg = "";?>
        </p>
				<label for="email">Email</label>
				<input type="email" id="email" name="email" pattern="^[^(\.)][a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}" required>
				<label for="pass">Passsword</label>
				<input type="password" id="pass" name="pass" required>
				<input type="submit" value="Sign In" onclick="GetEmail()">
				<hr style="visibility:hidden">
				<a href="mall-register.php">Sign Up</a>
				<a href="mall-forgotpass.html">Forgot Passsword?</a>
			</form>
		</div>
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