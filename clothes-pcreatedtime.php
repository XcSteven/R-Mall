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

	function newest($array){
		$date = array_column($array, 'created_time');
		array_multisort($date, SORT_DESC, $array);
		return $array;
	}

    function oldest($array){
		$date = array_column($array, 'created_time');
		array_multisort($date, SORT_ASC, $array);
		return $array;
	}





	$product_dir = __DIR__.'/csv/products.csv';
	$product_newest = newest(read_csv($product_dir));
	$product_oldest = oldest(read_csv($product_dir));

?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Product - Created Time</title>
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
				<a href="clothes-home.html">Clothes Store</a>
                <a href="clothes-aboutus.html">About Us</a>
				<div class="selectlist">
					<div class="dropbtn">Products</div>
					<div class="selectlist-content">
						<a href="clothes-pcategory.html">Browse by Categories</a>
						<a class="active" href="clothes-pcreatedtime.html">Browse by Created Time</a>
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
		<div class="products-general">
			<div class="products">
			<h1>Browse Products by Created Time</h1>
			</div>
			<div class="form">
				<form method="get" action="clothes-pcreatedtime.php" onsubmit="return checkSubmit()">
					<label for="sort_by">Created Time:</label>
					<select id="sort_by" name="sort_by">
						<option value="newest">Newest to Oldest</option>
						<option value="oldest">Oldest to Newest</option>
					</select>
					<input type='submit' value='Sort' name='act'>
				</form>
			</div>
			<div class="plist">
				<?php 
					if ($_GET['sort_by'] == 'newest') { 
						$i = 0;
						foreach($product_newest as $mkey => $value){
							if($value['store_id'] == "22"){
				?>
				<div class="pcolumn">
					<div class="pcard-box">
						<a href="clothes-pdetail-2.html"><img src="images/new10.jpg" alt="<?php echo $value['name'] ?>" style="max-width:100%; height: auto"></a>
						<a href="clothes-pdetail-2.html"><p><b style="text-decoration:underline"></b><b><?php echo $value['name'] ?></b></p></a>
						<p><i>This is a short description about the product.</i></p>
						<p>Price: $<?php echo $value['price'];?></p>
						<p>Created Date: <?php echo date("d/m/Y", $value['created_time']);?></p>
					</div>
				</div>
				<?php 
				$i++;
			}}}
			elseif ($_GET['sort_by'] == 'oldest') { 
				$i = 0;
				foreach($product_oldest as $mkey => $value){
					if($value['store_id'] == "22"){
			?>
		<div class="pcolumn">
			<div class="pcard-box">
				<a href="clothes-pdetail-2.html"><img src="images/new10.jpg" alt="<?php echo $value['name'] ?>" style="max-width:100%; height: auto"></a>
				<a href="clothes-pdetail-2.html"><p><b style="text-decoration:underline"></b><b><?php echo $value['name'] ?></b></p></a>
				<p><i>This is a short description about the product.</i></p>
				<p>Price: $<?php echo $value['price'];?></p>
				<p>Created Date: <?php echo date("d/m/Y", $value['created_time']);?></p>
			</div>
		</div>
		<?php 
		$i++;
	}}}
	?>

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
		<script src="js/clothes-pcreatedtime.js"></script>
	</body>
</html>
