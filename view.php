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
      <li><a href="item_view.php">Home</a></li>
      <li class="active">View Item</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">View Item</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="get" action="admin_process_form.php">
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
              <label class="col-lg-4 control-label" for="description">Description:</label>
              <div class="col-lg-5">
                <input type="text" disabled value="<?php echo $results[0]["description"] ?>" placeholder="Description" id="description" class="form-control" name="middlename">
              </div>
            </div>

            <div class="form-group has-success">
              <label class="col-lg-4 control-label" for="amount">Amount:</label>
              <div class="col-lg-5">
                <input type="number" disabled value="<?php echo $results[0]["amount"] ?>" placeholder="Amount" id="amount" class="form-control" name="amount">
              </div>
            </div> 

              
          </fieldset>
        </form>

      </div>
    </div>
  </div>
</div>
