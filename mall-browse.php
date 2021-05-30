<?php
	if(file_exists(__DIR__.'/install.php')){
		die('You must delete install.php before using this site');
	}
	function read_csv($file){
		$temp = array();
		$file = fopen($file,"r");
		$key =  fgetcsv($file);
		while(!feof($file)) {
			$csv = fgetcsv($file);    
			if($csv & $csv[1] != "" & gettype($csv) == "array"){
				foreach($csv as $pkey => $data){ 
					$temp[$csv[0]][$key[$pkey]] = $data;
				}
				if(array_key_exists('created_time', $temp[$csv[0]])){
					$temp[$csv[0]]['created_time'] = strtotime($temp[$csv[0]]['created_time']);
				}
			}
		}
		return $temp;
	}
	function sort_list($array){
		$date = array_column($array, 'name');
		array_multisort($date, SORT_ASC, $array);
		return $array;
	}
	$store_dir = __DIR__.'/csv/stores.csv';
	$store = sort_list(read_csv($store_dir));
	$cdir = __DIR__.'/csv/categories.csv';
	$clist = read_csv($cdir);
	if(!isset($_GET['id'])){
		$_GET['id'] = -1;
		$ala = true;
	} else {
		$ala = false;
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Browse</title>
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
				<a href="mall-myaccount.html">Account</a>
				<a class="active" href="mall-browse.html">Browse</a>
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
			<button class="browse" onclick="window.location='mall-browse.php'">By Name</button>
			<div class="dropdown">
				<button class="browse-dropdown">By Category</button>
				<div class="dropdown-content">
					<?php foreach($clist as $key => $value){
					?>
					<a href="?id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a>
					<?php }?>
				</div>
			</div>
			<div class="list-browse">
				<?php foreach($store as $key => $value){
					if($value['category_id'] == $_GET['id'] | $ala){
				?>
				<div class="column-browse" style="text-align: center">
					<div class="card-box-border">
						<h2><?php echo $value['name'];?></h2>
						<a href="clothes-home.html"><img src="images/logo-clothes.png" alt="R-Clothes" style="max-width:100%; height: auto" title="R-Clothes"></a>
						<hr style="visibility:hidden"><hr style="visibility:hidden">
					</div>
					<hr style="visibility:hidden">
				</div>
				<?php } } ?>
			</div>
		</div>
		<hr style="visibility:hidden">
		<footer class="footer">
		<hr>
			<p>© 2021 - 2021 https://xcsteven.github.io/WPasm1/ - All Rights Reserved.</p>
			<nav class="bottom-nav-bar">
				<a href="mall-tos.html">Terms of Service</a>
				<a href="mall-ppolicy.html">Privacy Policy</a>
			</nav>
		</footer>
		<script src="js/cookie.js"></script>
	</body>
</html>