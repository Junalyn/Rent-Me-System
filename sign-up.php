<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
	 $username = strip_tags($_POST['txt_uname']);
    $firstname = strip_tags($_POST['txt_fname']);
    $middlename = strip_tags($_POST['txt_mname']);
    $lastname = strip_tags($_POST['txt_lname']);
	 $password = strip_tags($_POST['txt_upass']);    
    $address = strip_tags($_POST['address']);    
    $contact_no = strip_tags($_POST['contact_no']);
    
	
	if($username=="")	{
		$error[] = "provide username !";	
	}
    else if($firstname=="")	{
		$error[] = "provide first name !";	
	}
    else if($lastname=="")	{
		$error[] = "provide last name !";	
	}
	else if($contact_no=="")	{
		$error[] = "provide contact number !";	
	}
	else if($password=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($password) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT username, contact_no FROM users WHERE username=:username OR contact_no=:contact_no");
			$stmt->execute(array(':username'=>$username, ':contact_no'=>$contact_no));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['username']==$username) {
				$error[] = "sorry username already taken !";
			}
			else if($row['contact_no']==$contact_no) {
				$error[] = "sorry contact number id already taken !";
			}
			else
			{
				if($user->register($username, $firstname, $middlename, $lastname,$password,$address,$contact_no)){	
					$user->redirect('sign-up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}



?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sign Up </title>
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

</head>
<body style="background: tomato;">



<div class="container">
    	
        <form method="post" class="animated zoomIn">
            <h2 class="form-signin-heading">Sign up.</h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; You are successfully registered. Please <a href='index.php'>login</a> here
                 </div>
                 <?php
			}
			?>
            <div class="login-form">
            <!-- ****USERNAME FIELD -->
            <div class="form-group">
            <input type="text" class="form-control login-field" id="username" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $username;}?>" />
            </div>
            
            <!-- ****FIRSTNAME FIELD -->
            <div class="form-group">
            <input type="text" class="form-control login-field" id="firstname" onkeyup="javascript:capitalize(this.id, this.value);" name="txt_fname" placeholder="Enter First Name" value="<?php if(isset($error)){echo $firstname;}?>" />
            </div>
            
            <!-- ****MIDDLENAME FIELD -->
            <div class="form-group">
            <input type="text" class="form-control login-field" id="middlename" onkeyup="javascript:capitalize(this.id, this.value);" name="txt_mname" placeholder="Enter Middle Name" value="<?php if(isset($error)){echo $middlename;}?>" />
            </div>
            
            <!-- ****LASTNAME FIELD -->
            <div class="form-group">
            <input type="text" class="form-control login-field" id="lastname" onkeyup="javascript:capitalize(this.id, this.value);" name="txt_lname" placeholder="Enter Last Name" value="<?php if(isset($error)){echo $lastname;}?>" />
            </div>
            
            <!-- ****PASSWORD FIELD -->
            <div class="form-group">
            	<input type="password" class="form-control login-field" name="txt_upass" placeholder="Enter Password" />
            </div>
            
            <!-- ****ADDRESS FIELD -->
            <div class="form-group">
            	<input type="text" class="form-control login-field" name="address" placeholder="Enter Full Address" />
            </div>
            
            <!-- ****CONTACT NUMBER FIELD -->
            <div class="form-group">
            	<input type="number" class="form-control login-field" name="contact_no" placeholder="Enter Contact Number" />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <label>Have an account ? <a href="index.php">Sign In</a></label>
        </form>
       </div>
</div>
</body>
</html>