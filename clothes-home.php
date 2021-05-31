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
                if(array_key_exists('featured_in_store', $temp[$csv[0]])){
                        if($temp[$csv[0]]['featured_in_store'] == "FALSE"){
                            $temp[$csv[0]]['featured_in_store'] = false;
                        } else {
                            $temp[$csv[0]]['featured_in_store'] = true;
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
		<title>Clothes Store</title>
		<link rel="stylesheet" href="css/clothes-style.css">
		<link rel="stylesheet" href="css/mall-style.css">
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<body>
		<body style="background-color:#F5F5DC">
		<header class="header">
			<a href="clothes-home.html"><img src="images/logo-clothes.png" alt="R-Clothes logo" title="Home"></a>
			<nav class="header-navbar">
				<a href="index.php">R-Mall</a>
				<a class="active" href="clothes-home.html">Clothes Store</a>
                <a href="clothes-aboutus.html">About Us</a>
				<div class="selectlist">
					<div class="dropbtn">Products</div>
					<div class="selectlist-content">
						<a href="clothes-pcategory.html">Browse by Categories</a>
						<a href="clothes-pcreatedtime.php">Browse by Created Time</a>
					</div>
				</div>
				<a href="clothes-contact.html">Contact</a>
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
			<div class="products">
				<h1>New Products</h1>
			</div>
			<div class="list">
				<?php 
					$i = 0;
					foreach($product as $mkey => $value){
						if($i > 4) break;
						if($value['store_id'] == "22"){
				?>
				<div class="column">
					<div class="card-box">
						<a href="clothes-pdetail-1.html"><img src="images/new3.jpg" alt="<?php echo $value['name'] ?>" style="max-width:100%; height: auto"></a>
						<p><a href="clothes-pdetail-1.html"><b style="text-decoration:underline"></b><b><?php echo $value['name'] ?></b></a></p>
						<p>$<?php echo $value['price'];?></p>
					</div>
				</div>
				<?php 
				$i++;
			}} ?>
			</div>
			<div class="products">
				<h1>Featured Products</h1>
			</div>
			<div class="list">
				<?php
					$i = 0;
					foreach($product as $mkey => $value){
						if($i > 9) break;
						if($value['featured_in_store']){
				?>
				<div class="column">
					<div class="card-box">
						<a href="clothes-pdetail-2.html"><img src="images/new10.jpg" alt="<?php echo $value['name'] ?>" style="max-width:100%; height: auto"></a>
						<p><a href="clothes-pdetail-2.html"><b><?php echo $value['name'] ?></b></a></p>
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
			<p>© 2021 - 2021 https://xcsteven.github.io/R-Mall/clothes-home.php - All Rights Reserved.</p>	
			<nav class="footer-navbar">
				<a href="clothes-tos.html">Term of Service</a>	
				<a href="clothes-ppolicy.html">Privacy Policy</a>
			</nav>
		</footer>
		<script src="js/cookie.js"></script>
	</body>
</html>