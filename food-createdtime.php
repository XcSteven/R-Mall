<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Product - Created Time</title>
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
        <div class="main">
			<div class="form">
				<h1>Browse Products by Created Time</h1>
                <form method="get" action="display_products.php" onsubmit="return checkSubmit()">
                    <select id="order" name= "order">
                        <option value='oldest'>Oldest order</option>
                        <option value='newest'>Newest order</option>
                    </select>
                    <input type='submit' value='View' name='act'>
                </form>
            </div>
            <form method="post" action="">
                <div id="div_pagination">
                    <input type="hidden" name="row" value="<?php echo $row; ?>">
                    <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                    <input type="submit" class="button" name="but_prev" value="Previous">
                    <input type="submit" class="button" name="but_next" value="Next">
                </div>
            </form>
        </div>
        <hr>
        <footer class="foot">
			<p>© 2021 - 2021 https://xcsteven.github.io/WPasm1/food-home.php - All Rights Reserved.</p>
			<nav class="foot-navbar">
				<a href="food-tos.html">Term of Service</a>
				<a href="food-notin-pprivacy.html">Privacy Policy</a>	
			</nav>
        </footer>
        <script src="js/cookie.js"></script>
        <script src="js/time_sort.js"></script>
	</body>
</html>