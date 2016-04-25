<?php
require_once 'admin_config.php';
include('ad_session.php');
?>



<!-- ******************************************** A C C O R D I O N  STARTS HERE ********************************** -->
<html>
<head>
<?php include 'admin_header.php'; ?>
</head>


<body>


<div class="row">
<?php if ($ERROR_MSG <> "") { ?>
    <div class="alert alert-dismissable alert-<?php echo $ERROR_TYPE ?>">
      <button data-dismiss="alert" class="close" type="button">x</button>
      <p><?php echo $ERROR_MSG; ?></p>
    </div>
<?php } ?>



<div class="container">
  <div class="panel-group" id="accordion">



    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Manage Users</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
            
            <!-- ******************************************** 1ST -- A C C O R D I O N  BODY ********************************** -->
            
            <?php include 'admin_index1.php'; ?>
            
            
            <!-- ******************************************** A C C O R D I O N  BODY ********************************** -->
        </div>
      </div>
    </div>
      
      
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Manage Categories</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
          <!-- ******************************************** 2ND ---- A C C O R D I O N  BODY ********************************** -->
            
            <?php include('admin_index2.php') ?>   
            
          <!-- ******************************************** 2ND ---- A C C O R D I O N  BODY ********************************** -->
        </div>
      </div>
    </div>
      
      
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Manage Items</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
        <!-- ******************************************** 3RD ---  A C C O R D I O N BODY ********************************** -->
        
           <?php include('admin_index3.php') ?>  
                    
        </div>
            
            <!-- ******************************************** 3RD  ----   A C C O R D I O N  BODY ********************************** -->

          
          </div>
      </div>


      <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Manage Records</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
          <!-- ******************************************** 4th ---- A C C O R D I O N  BODY ********************************** -->
            
            <?php include('admin_index4.php') ?>   
            
          <!-- ******************************************** 4th ---- A C C O R D I O N  BODY ********************************** -->
        </div>
      </div>
    </div>





    </div>
  </div> 
</div>

<?php include ('admin_footer.php') ?>

</body>
</html>