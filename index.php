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
				if(array_key_exists('featured', $temp[$csv[0]])){
					if($temp[$csv[0]]['featured'] == "FALSE"){
						$temp[$csv[0]]['featured'] = false;
					} else {
						$temp[$csv[0]]['featured'] = true;
					}
				}
				if(array_key_exists('featured_in_mall', $temp[$csv[0]])){
					if($temp[$csv[0]]['featured_in_mall'] == "FALSE"){
						$temp[$csv[0]]['featured_in_mall'] = false;
					} else {
						$temp[$csv[0]]['featured_in_mall'] = true;
					}
				}
			}
		}
	return $temp;
	}
	function sort_list($array){
		$date = array_column($array, 'created_time');
		array_multisort($date, SORT_DESC, $array);
		return $array;
	}
	$store_dir = __DIR__.'/csv/stores.csv';
	$product_dir = __DIR__.'/csv/products.csv';
	$categories_dir = __DIR__.'/csv/categories.csv';
	$store = sort_list(read_csv($store_dir));
	$product = sort_list(read_csv($product_dir));
	$categories = read_csv($categories_dir);
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Home</title>
		<link rel="stylesheet" href="css/mall-style.css">
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<body>
		<body style="background-color:#f5f5dc">
		<header class="header">
		<a href="index.php"><img src="images/logo.png" alt="R-Mall logo" title="Home"></a>
			<nav class="nav-menu-bar">
				<a class="active" href="index.php">Home</a>
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
		<div class="main" style="overflow-x: hidden">
			<div class="title">
				<h1>New Stores</h1>
			</div>
			<div class="list">
				<?php 
					$i = 0;
					foreach($store as $mkey => $value){
						if($i > 9) break;
				?>
				<div class="column">
					<div class="card-box">
						<a href="clothes-home.php?id=<?php echo $value['id']; ?>"><img src="images/logo-clothes.png" alt="<?php echo $value['name']; ?>" title="<?php echo $value['name']; ?>" style="max-width:100%; height: auto"></a>
						<h2><?php echo $value['name']; ?></h2>
					</div>
				</div>
				<?php 
			$i++;
			} ?>
			</div>
			<div class="title">
				<h1>New Products</h1>
			</div>
			<div class="list">
				<?php 
					$i = 0;
					foreach($product as $mkey => $value){
						if($i > 9) break;
				?>
				<div class="column">
					<div class="card-box">
						<a href="clothes-pdetail-1.html"><img src="images/new1.jpg" alt="<?php echo $value['name'] ?>" style="max-width:100%; height: auto"></a>
						<p><a href="clothes-pdetail-1.html"><b style="text-decoration:underline"></b><b><?php echo $value['name'] ?></b></a></p>
						<a href="clothes-home.php"><?php echo $store[$value['store_id']]['name']; ?></a>
						<p>$<?php echo $value['price'];?></p>
					</div>
				</div>
				<?php 
			$i++;
			} ?>
			</div>
			<div class="title">
				<h1>Featured Stores</h1>
			</div>
			<div class="list">
				<?php
					$i = 0;
					foreach($store as $mkey => $value){
						if($i > 9) break;
						if($value['featured']){
				?>
				<div class="column">
					<div class="card-box">
						<a href="food-home.php?id=<?php echo $value['id']; ?>"><img src="images/logo-food.png" alt="<?php echo $value['name']; ?>" title="<?php echo $value['name']; ?>" style="max-width:100%; height: auto"></a>
						<h2><?php echo $value['name']; ?></h2>
					</div>
				</div>	
				<?php 
				$i++;
				}} ?>
			</div>
			<div class="title">
				<h1>Featured Products</h1>
			</div>
			<div class="list">
				<?php
					$i = 0;
					foreach($product as $mkey => $value){
						if($i > 9) break;
						if($value['featured_in_mall']){
				?>
				<div class="column">
					<div class="card-box">
						<a href="food-detail-1.html"><img src="images/coca-cola.jpg" alt="Coca-Cola" style="max-width:100%; height: auto"></a>
						<p><a href="food-detail-1.html"><b><?php echo $value['name'] ?></b></a></p>
						<a href="food-home.php"><?php echo $store[$value['store_id']]['name']; ?></a>
						<p>$<?php echo $value['price'];?></p>
					</div>
				</div>
				<?php 
					$i++;
				}} ?>
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