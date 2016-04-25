<?php
    include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>welcome - <?php print($userRow['username']); ?></title>
</head>

<body style="background: white;}">
<div class = 'container'>
<div class = 'row'>
<nav class="animated slideInDown navbar navbar-inverse navbar-embossed navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Rent Me</a>
        </div>


        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">My Profile</a></li>
            <li><a href="item_view.php">Browse the catalog</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                 <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['username']; ?>&nbsp;
                    <span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                <li><a href="home.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->

      </div>
</nav>

     
<!-- *********************************** C O N T A I N E R   STARTS HERE *************************** -->    
<div class="animated slideInDown container-fluid" style="margin-top:80px;">
  
    <div class="container">
        
        <h1>
            <a href="home.php"><span class="glyphicon glyphicon-home"></span>  User Home Page</a> &nbsp; 
        </h1>
        <hr />

       <p><?php include ('home_index.php') ?> </p>
       
        
        <p class="blockquote-reverse" style="margin-top:200px;">
        &copy; Rent Me <br /><br />
        </p>
    
    </div>

</div>
<!-- *********************************** C O N T A I N E R   ENDS HERE *************************** -->    

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>