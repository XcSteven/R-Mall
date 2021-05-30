<?php
	if(file_exists(__DIR__.'/install.php')){
		die('You must delete install.php before using this site');
	}
	$type = $_GET['page'];
	$msg = "";
	$green = ['tos','privacy', 'copyright'];
	if(!in_array($type, $green)){
		header("Location: ./mall-dashboard.php");
		exit();
	}
	$dir_c = __DIR__."/content/".$type.".txt";
	$content = file_get_contents($dir_c);
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$type = $_POST['type'];
		$content_p = $_POST['content'];
		$content = $content_p;
		file_put_contents($dir_c, $content_p);
		$msg = 'Success';
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
		<div class="pptos">
			<h2>Modify</h2>
      <p>
     <?php echo $msg; $msg =""; ?>
      </p>
      <form  method="POST" action="">
        
        <textarea name="content" rows="10" style="width: 99%"><?php echo $content; ?></textarea>
        <input value="<?php echo $_GET['page'];?>" hidden name="type">
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