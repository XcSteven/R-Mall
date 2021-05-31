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
		<title>R-Food</title>
		<link rel="stylesheet" href="css/food-style.css">
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<body>
		<body style="background-color:#F5F5DC">
		<header class="head">
			<a href="food-home.php"><img src="images/logo-food.png" alt="logo-food"></a>
			<nav class="head-navbar">
				<a href="index.php">R-Mall</a>
				<a href="food-home.php">Home</a>
				<a href="food-aboutus.html">About Us</a>
				<div class="dropdown">
					<div class="dropbtn">Products</div>
					<div class="dropdown-content">
						<a href="food-category.html">Browse Products by Categories</a>
						<a href="food-createdtime.php">Browse Products by Created Time</a>
					</div>	
				</div>
				<a href="food-contact.html">Contact</a>				
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
				<h1>New Products</h1>
			</div>
			<div class="list">
				<?php 
					$i = 0;
					foreach($product as $mkey => $value){
						if($i == 5) break;
				?>
				<div class="column">
					<div class="box">
						<a href="food-detail-1.html"><img src="images/cherry1.jpg" alt="<?php echo $value['name'] ?>"></a>
						<p><a href="food-detail-1.html"><b style="text-decoration:underline"></b><b><?php echo $value['name'] ?></b></a></p>
						<p>$<?php echo $value['price'];?></p>
					</div>
				</div>
				<?php 
					$i++;
				} ?>
			</div>
			<hr>
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
					<div class="box">
						<a href="food-detail-2.html"><img src="images/vinamilk.jpg" alt="<?php echo $value['name'] ?>"></a>
						<p><a href="food-detail-2.html"><b style="text-decoration:underline"></b><b><?php echo $value['name'] ?></b></a></p>
						<p>$<?php echo $value['price'];?></p>
					</div>
				</div>
				<?php 
					$i++;
				}} ?>
			</div>
		</div>
		<hr>
        <footer class="foot">
			<p>© 2021 - 2021 https://xcsteven.github.io/WPasm1/food-home.php - All Rights Reserved.</p>
			<nav class="foot-navbar">
				<a href="food-tos.html">Term of Service</a>
				<a href="food-pprivacy.html">Privacy Policy</a>	
			</nav>
        </footer>
		<script src="js/cookie.js"></script>
	</body>
</html>