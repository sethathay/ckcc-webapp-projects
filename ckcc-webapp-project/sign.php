<!DOCTYPE html>
<html>
<head>
	<title>Sign In Account</title>
	<meta charset="UTF-8"/>
	<link rel="shortcut icon" href="img/logo.gif"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/sign.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/sigin.js"></script>
</head>
	<body>
		<div class="container-fluid mab-bg-image">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 mab-broad">
						<h2 class="mab-padding-margin">Sign In</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 mab-bg">
						<form action = "checklogin.php" method="POST" id="form_sign_in" name="signin" onsubmit="return(validateForm());">
							<div class="form-group">
								<img src="img/fb_img.png" class="img-responsive"/>
								<input type="text" class="mab-form" id="user" placeholder="Username" name="username">
								<p id="user-validate"></p>
								<input type="password" class="mab-form" id="pass" placeholder="Password" name = "password">
								<p id="pass-validate"></p>
								<input type="submit" class="mab-btn" onclick="showMessage()" value="Sign in">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>