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
		<a href="index.html"><img src="images/logo.png" alt="R-Mall logo" title="notin-home"></a>
			<nav class="nav-menu-bar">
				<a class="active" href="index.html">Home</a>
				<a href="mall-notin-aboutus.html">About Us</a>
				<a href="mall-notin-fees.html">Fees</a>
				<a href="mall-notin-myaccount.html">Account</a>
				<a href="mall-notin-browse.html">Browse</a>
				<a href="mall-notin-faqs.html">FAQs</a>
				<a href="mall-notin-contact.html">Contact</a>
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
            if($i > 10) break;
          ?>
				<div class="column">
					<div class="card-box">
						<a href="clothes-notin-home.html?id=<? echo $value['id']; ?>"><img src="images/logo-clothes.png" alt="<? echo $value['name']; ?>" title="<? echo $value['name']; ?>" style="max-width:100%; height: auto"></a>
						<h2><? echo $value['name']; ?></h2>
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
            if($i > 10) break;
          ?>
				<div class="column">
					<div class="card-box">
						<a href="clothes-notin-pdetail-1.html"><img src="images/new1.jpg" alt="Patterned leggings" style="max-width:100%; height: auto"></a>
						<p><a href="clothes-notin-pdetail-1.html"><b style="text-decoration:underline"></b><b><? echo $value['name'] ?></b></a></p>
						<a href="clothes-notin-home.html"><? echo $store[$value['store_id']]['name']; ?></a>
						<p>$<? echo $value['price'];?></p>
					</div>
				</div>
        
        <?php
        $i++;
        } ?>
			</div>
			<div class="title">
				<h1>Featured Stores</h1>
			</div>
			<div class="fixed-list">
				<div class="fixed-column">
					<div class="card-box">
						<a href="food-notin-home.html"><img src="images/logo-book.png" alt="R-Book" title="R-Book" style="max-width:100%; height: auto"></a>
						<h2>R-Book</h2>
					</div>
				</div>
				<div class="fixed-column">
					<div class="card-box">
						<a href="clothes-notin-home.html"><img src="images/logo-pet.png" alt="R-Pet" title="R-Pet" style="max-width:100%; height: auto"></a>
						<h2>R-Pet</h2>
					</div>
				</div>
				<div class="fixed-column">
					<div class="card-box">
						<a href="food-notin-home.html"><img src="images/logo-sport.png" alt="R-Sport" title="R-Sport" style="max-width:100%; height: auto"></a>
						<h2>R-Sport</h2>
					</div>
				</div>
			</div>
			<div class="title">
				<h1>Featured Products</h1>
			</div>
			<div class="fixed-list">
				<div class="fixed-column">
					<div class="card-box">
						<a href="food-notin-detail-2.html"><img src="images/coca-cola.jpg" alt="Coca-Cola" style="max-width:100%; height: auto"></a>
						<p><a href="food-notin-detail-2.html"><b>Coca-Cola</b></a></p>
						<a href="food-notin-home.html">R-Food</a>
						<p>$0.40/kg</p>
					</div>
				</div>
				<div class="fixed-column">
					<div class="card-box">
						<a href="clothes-notin-pdetail-1.html"><img src="images/f1.jpg" alt="Sunglasses" style="max-width:100%; height: auto"></a>
						<p><a href="clothes-notin-pdetail-1.html"><b style="text-decoration:underline">Chloé Eyewear</b><b> Round glasses</b></a></p>
						<a href="clothes-notin-home.html">R-Clothes</a>
						<p>$388</p>
					</div>
				</div>
				<div class="fixed-column">
					<div class="card-box">
						<a href="food-notin-detail-1.html"><img src="images/cherry.jpg" alt="Cherry" style="max-width:100%; height: auto"></a>
						<p><a href="food-notin-detail-1.html"><b>Cherry</b></a></p>
						<a href="food-notin-home.html">R-Food</a>
						<p>$20/kg</p>
					</div>
				</div>
			</div>
		</div>
		<hr style="visibility:hidden">
		<hr>
		<footer class="footer">
			<p>© 2021 - 2021 https://xcsteven.github.io/WPasm1/ - All Rights Reserved.</p>
			<nav class="bottom-nav-bar">
				<a href="mall-notin-tos.html">Terms of Service</a>
				<a href="mall-notin-ppolicy.html">Privacy Policy</a>
			</nav>
		</footer>
		<script src="js/cookie.js"></script>
	</body>
</html>