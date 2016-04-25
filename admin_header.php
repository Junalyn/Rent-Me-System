<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('ad_session.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="title" content="test">

    <title><?php echo "Welcome Admin" ?></title>

    <!-- Bootstrap -->
    <link href="dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_style.css" rel="stylesheet">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/bootstrap.js"></script>
    <script src= 'js/jquery-1.11.3-jquery.min.js'></script>
	<script src = 'js/bootstrap.min.js'></script>
    <script src = 'js/jquery-min.js'></script>
  </head>


  <body>


    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" target="_blank"><span class="glyphicon glyphicon-home"></span> You Rent Me</a>
          <ul class="nav navbar-nav navbar-right">
                <li><a href="ad_logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container mainbody">
      <div class="page-header">
        <h1>Rental Records</h1>
      </div>
</body>

</html>