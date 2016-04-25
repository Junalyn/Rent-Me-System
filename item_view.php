<?php
    include 'header.php';
?>
<html>
<head>
<title>welcome - <?php print($userRow['username']); ?></title>
</head>

<body>

<div class="animated zoomInDown container-fluid" style="margin-top:80px;">
	
    <div class="container">
        <?php
        include("index2.html");
        ?>
  
    </div>

</div>

</body>
</html>