<?php
	if(file_exists(__DIR__.'/install.php')){
		die('You must delete install.php before using this site');
	}
	$msg = "";
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$check = getimagesize($_FILES["avatar"]["tmp_name"]);
		if($check !== false) {
			move_uploaded_file($_FILES["avatar"]["tmp_name"], __DIR__.'/images/aboutus_'.$_POST['select'].'.jpg');
			$msg = "Success!";
			} else {
			$msg = "Image invaild";
			}
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edit</title>
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
		<div class="form">
			<h1>Modify</h1>
		<p><?php echo $msg; $msg =""; ?></p>
		<form  method="POST" action="" enctype="multipart/form-data">
			<label for="avatar">Upload a picture</label>
			<input type="file" id="avatar" name="avatar">
			<p>Choose the picture you want to be modified:</p>
			<input type="radio" id="1" name="select" value="1" required>
			<label for="1">1</label>
			<input type="radio" id="2" name="select" value="2">
			<label for="2">2</label>
			<input type="radio" id="3" name="select" value="3">
			<label for="3">3</label>
			<hr style="visibility:hidden">
			<input type="submit" value="Submit">
		</form>
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