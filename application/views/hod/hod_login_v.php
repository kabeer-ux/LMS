<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url('assets/style/login_style.css'); ?>">

	</head>
	<body class="img js-fullheight" style="height:100vh;overflow: hidden; background-image: url(<?php echo base_url('assets/media/misc/login_bg_image.jpg'); ?>);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 text-center mb-5">
					<h2 class="heading-section">
						<img src="<?php echo base_url('assets/media/logo/icon2.png') ?>" width="100px">
						Sialkot College Of Physical Therapy 
					</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="login-wrap p-0">
				      	<h3 class="mb-4 text-center">HOD LOGIN</h3>
				      	<form action="<?php echo base_url('hod/Login/index_do'); ?>" class="signin-form" method="post">
				      		<div class="form-group">
				      			<input type="text" class="form-control" name="user" placeholder="Username" required>
				      		</div>
			            <div class="form-group">
			              <input id="password-field" type="password" name="pass" class="form-control" placeholder="Password" required>
			              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
			            </div>
			            <div class="form-group">
			            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
			            </div>
			            </form>
		      		</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url('assets/js/login_jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/login_popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/login_bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/login_main.js') ?>"></script>

	</body>
</html>

