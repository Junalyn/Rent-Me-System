<?php
session_start();
include('ad_login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: ad_profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<?php
    include 'header2.php';
?>
</head>
<body style="background: #BDC3C7;">
<a href="index.php">
    <img src = 'img/hidden.png' style="opacity: 0;">
</a>

<div class="animated flipInY container">
			<h3><center>Log-in as Admin!</center></h3>

            <hr/>

          	<span><?php echo $error2; ?></span>

          	<form method="post" id="login-form">
	          <div class="login-form">
	            <div class="form-group">
	              <input type="text" class="form-control login-field" name="username" placeholder="Admin Username" required />
	              <label class="login-field-icon fui-user" for="login-name"></label>
	            </div>

	            <div class="form-group">
	              <input type="password" class="form-control login-field" name="password" placeholder="Admin Password" required/>
	              <label class="login-field-icon fui-lock" for="login-pass"></label>
	            </div>

        		<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
					<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN ADMIN
				</button>
                   
	            
	          </div>
      		</form>      

</div>

</body>
</html>