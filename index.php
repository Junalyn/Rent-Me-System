<?php
session_start();
require_once("class.user.php");
require_once('createdb.php');
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$username = strip_tags($_POST['txt_uname']);
	$password = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($username,$password))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}

?>
<!DOCTYPE html>
<html>
<title>R E N T - ME </title>
<?php
    include 'header2.php';
?>
<!-- ***********************JAVASCRIPT FOR UPPERCASING THE FIRST LETTER OF THE USERNAME TEXT INPUT -->
<script type="text/javascript">
  function capitalize(textboxid, str) {
      // string with alteast one character
      if (str && str.length >= 1)
      {       
          var firstChar = str.charAt(0);
          var remainingStr = str.slice(1);
          str = firstChar.toUpperCase() + remainingStr;
      }
      document.getElementById(textboxid).value = str;
  }
  </script>
<!-- ***************************END OF JAVASCRIPT -->    
<body style="background: tomato;}">
    
<a href="ad_index.php">
    <img src = 'img/hidden.png' style="opacity: 0;">
</a>


<div class="animated flipInY container">
    <div class="login">
        <div class="login-screen">
          <div class="login-icon">
            <img src="img/icons/svg/retina.svg" alt="Retina">
            <h4>Log-In to start<small>RENTING !</small></h4>
          </div>
				<div id="error">
				  	<?php
				  	    if(isset($error)) 	{    ?>
				       		<div class="alert alert-danger">
				       			<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
				       			<button data-dismiss="alert" class="close" type="button">×</button>
				       		</div>

				  	    <?php 	}   ?>
				</div>

          	<form method="post" id="login-form">
	          <div class="login-form">
	            <div class="form-group">
	              <input type="text" class="form-control login-field" id="username" name="txt_uname" placeholder="Enter your name" id="login-name" required/>
	              <label class="login-field-icon fui-user" for="login-name"></label>
	            </div>

	            <div class="form-group">
	              <input type="password" class="form-control login-field" name="txt_password" placeholder="Password" required/>
	              <label class="login-field-icon fui-lock" for="login-pass"></label>
	            </div>

        		<button type="submit" name="btn-login" class="btn btn-primary btn-lg btn-block">
					<i class="glyphicon glyphicon-log-in"></i> &nbsp; LOG IN
				</button>
                   
	            <a class="login-link" href="sign-up.php">Don't have account yet !  Sign Up Now</a>
	          </div>
      		</form>
        </div>
    </div>
</div>
      

    <script>
      videojs.options.flash.swf = "dist/js/vendors/video-js.swf"
    </script>
</body>
</html>