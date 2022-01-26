<?php
$a = 'admin123';
//echo md5($a);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login:: SCPT</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/admin_login.css'); ?>">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/media/logo/icon2.png'); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="page">
	<div class="left">
		<img src="<?php echo base_url('assets/media/logo/icon2.png'); ?>">
	</div>
	<div class="right">
		<div class="card">
			<form method="post" action="<?php echo base_url('admin/Login/index_do'); ?>">
				<h2> LMS Admin Login </h2>
				<div class="form-group">
					<label for="user">Username</label>
					<input type="text" name="user" id="user">
				</div>

				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" name="pass" id="pass">
				</div>

				<button type="submit"> Login </button>
			</form>
		</div>
	</div>
</div>


</body>
</html>