<?php
require_once 'admin_config.php';
include 'admin_header.php';
include('ad_session.php');

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

<div class="row">
  <ul class="breadcrumb">
      <li><a href="ad_profile.php">Home</a></li>
      <li class="active">View Item</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">View Items</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="get" action="admin_process_form3.php">
          <fieldset>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="description">Description:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["description"] ?>" placeholder="Description" id="description" class="form-control" name="description">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="amount"><span class="required">*</span>Amount:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["amount"] ?>" placeholder="Amount" id="amount" class="form-control" name="amount">
              </div>
            </div>
            
            <!-- ********************* PROFILE PICTURE  ******************************* -->
             <div class="form-group">
              <label class="col-lg-4 control-label" for="profile_pic">Profile picture:</label>
              <div class="col-lg-5">
                <?php $pic = ($results[0]["profile_pic"] <> "" ) ? $results[0]["profile_pic"] : "no_avatar.png" ?>
                <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="100" height="100" class="thumbnail" ></a>
              </div>
            </div>

              
          </fieldset>
        </form>

      </div>
    </div>
  </div>
<?php
include 'admin_footer.php';
?>