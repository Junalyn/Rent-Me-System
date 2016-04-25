<?php
include 'header.php';
require_once 'admin_config.php';

try {
   $sql = "SELECT * FROM items WHERE 1 AND item_id = :item_id";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":item_id", intval($_GET["item_id"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>
<head>
<title>welcome - <?php print($userRow['username']); ?></title>
</head>
<div class="container" style="margin-top:80px;">
<div class="row">
  <ul class="breadcrumb">
      <li><a href="item_view.php">Browse Categories</a></li>
      <li class="active">Rent Item</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Rent Item</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="get" action="process.php">
          <input type="hidden" name="mode" value="<?php echo ($_GET["m"] == "update") ? "update_old" : "add_new"; ?>" >
          <input type="hidden" name="id_records" value="<?php echo intval($results[0]["id_records"]); ?>" >
          <input type="hidden" name="pagenum" value="<?php echo $_GET["pagenum"]; ?>" >
          <fieldset>
            <!-- ********************* PROFILE PICTURE  ******************************* -->
             <div class="form-group">
              <label class="col-lg-4 control-label" for="profile_pic">Profile picture:</label>
              <div class="col-lg-5">
                <?php $pic = ($results[0]["profile_pic"] <> "" ) ? $results[0]["profile_pic"] : "no_avatar.png" ?>
                <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="100" height="100" class="thumbnail" ></a>
              </div>
            </div>

            <div class="form-group has-success">
              <label class="col-lg-4 control-label" for="user">Username:</label>
              <div class="col-lg-5">
                <input type="text"  value="<?php print($userRow['username']) ?>" placeholder="UserName" name="user" class="form-control" >
              </div>
            </div>   

            <div class="form-group has-success">
              <label class="col-lg-4 control-label" for="cat_description">Description:</label>
              <div class="col-lg-5">
                <input type="text"  value="<?php echo $results[0]["description"] ?>" placeholder="Description" id="cat_description" class="form-control" name="cat_description">
              </div>
            </div>

            <div class="form-group has-success">
              <label class="col-lg-4 control-label" for="amount">Amount:</label>
              <div class="col-lg-5">
                <input type="number"  value="<?php echo $results[0]["amount"] ?>" placeholder="Amount" id="amount" class="form-control" name="amount">
              </div>
            </div> 

            <div class="form-group has-success">
              <label class="col-lg-4 control-label" for="date_borrowed">Date Borrowed:</label>
              <div class="col-lg-5">
                <input type='text'  class="form-control" name = "date_borrowed" placeholder= "date" value="<?php echo date("Y/m/d")?>" />
              </div>
            </div> 

            <div class="form-group has-success">
              <label class="col-lg-4 control-label" for="time">Time Borrowed:</label>
              <div class="col-lg-5">
                <input type="text"  id='datetimepicker' placeholder="Time" class="form-control" name="time" value = "<?php echo date("h:i:s:a")?>">
              </div>
            </div>
	
            <div class="form-group ">
              <div class="col-lg-5 col-lg-offset-4">
                <button class="btn btn-block btn-lg btn-inverse" type="submit">Rent Now!</button>
              </div>
            </div>

            
              
          </fieldset>
        </form>

      </div>
    </div>
  </div>
</div>