<?php
	$config_dir =__DIR__.'/../../config.csv';
	if(file_exists($config_dir)){
    echo 'Your site had been configuratured';
	} else {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if($_POST['username'] != "" & $_POST['password'] != ""){
				if($_POST['password'] != $_POST['retype_password']){
					$list = array(
						array('username', $_POST['username']),
						array('password', hash('SHA512',$_POST['password']))
					);
					$fp = fopen($config_dir, 'w');
					foreach ($list as $fields) {
						fputcsv($fp, $fields);
					}
					fclose($fp);
					echo 'Success !';
				} else {
					echo 'Retype password not correct';
				}  
			}
		} else {
?>
<form method="post" action="">
	<label>Username</label>
	<input name="username" placeholder="Username" type="text"><br>
	<label>Password</label>
	<input name="password" type="password"><br>
	<label>Retype password</label>
	<input name="password" type="password">
	<button type="submit">Submit</button>
	<button type="reset">Reset</button>
</form>
<?php
	}
	}
?>