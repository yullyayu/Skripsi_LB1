<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SI LB 1| Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Business Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
	</script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?php echo base_url()."assets/"; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo base_url()."assets/"; ?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body>
<div class="signupform">
	<div class="container">
		<div class="agile_info">
			<div class="w3l_form">
				<div class="left_grid_info">
					<h1>SISTEM LAPORAN BULANAN(LB1)</h1>
					<img src="<?php echo base_url()."assets/"; ?>image/gambar2.jpg" alt="" />
				</div>
			</div>
			<div class="w3_info">
				<h2>Login Form</h2>
				<form action="<?php echo site_url('login/auth')?>" method="post">
					<label>EMAIL</label>
					<div class="input-group">
						<span class="fa fa-user" aria-hidden="true"></span>
						<input type="email" name="email" id="email" placeholder="Enter Email"> 
					</div>
					<label>Password</label>
					<div class="input-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<input type="Password" name="password" id="password" placeholder="Enter Password" required="">
					</div> 
						<button class="btn btn-primary btn-block" type="submit">Login</button >
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>