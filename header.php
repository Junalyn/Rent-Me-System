<?php

  require_once("session.php");
  
  require_once("class.user.php");
  $auth_user = new USER();
  
  
  $id_user = $_SESSION['user_session'];
  
  $stmt = $auth_user->runQuery("SELECT * FROM users WHERE id_user=:id_user");
  $stmt->execute(array(":id_user"=>$id_user));
  
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<html>
<head>

<link rel="shortcut icon" href="img/icon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/style.css" type="text/css"  />
<link rel="stylesheet" href="css/animate.css" type="text/css"  />

<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel= "stylesheet" href = 'css/bootstrap-datetimepicker.css'
<link rel = "stylesheet" href = "css/bootstrap-theme.min.css">

<script src = 'js/bootstrap.min.js'></script>
<script src = 'js/jquery-min.js'></script>
<script src = 'js/js.js'></script>
<script src = 'js/boostrap-datetimepicker.min.js'></script>
<script type="text/javascript" src="js/moment.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/catalog.css" />
<script src="js/snap.svg-min.js"></script>


  <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

<nav class=" animated slideInDown navbar navbar-inverse navbar-embossed navbar-fixed-top">
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
            <li><a href="home.php">My Profile</a></li>
            <li class="active"><a href="item_view.php">Browse the catalog</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
</nav>
</style>
</head>
</html>
