<?php
require_once 'admin_config.php';
include 'admin_header.php';
include('ad_session.php');
try {
   $sql = "SELECT * FROM categories WHERE 1 AND category_id = :category_id";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":category_id", intval($_GET["category_id"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>

<div class="row">
  <ul class="breadcrumb">
      <li><a href="ad_profile.php">Home</a></li>
      <li class="active"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> Categories</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> New Item</h3>
      </div>
      <div class="panel-body">

        <form class="form-horizontal" enctype="multipart/form-data" method="get" action="admin_process_form2.php">
          <input type="hidden" name="mode" value="<?php echo ($_GET["m"] == "update") ? "update_old" : "add_new"; ?>" >
          <input type="hidden" name="category_id" value="<?php echo intval($results[0]["category_id"]); ?>" >
          <input type="hidden" name="pagenum" value="<?php echo $_GET["pagenum"]; ?>" >
          <fieldset>

            <div class="form-group">
              <label class="col-lg-4 control-label" for="description"><span class = 'required'>*</span>Description :</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["description"] ?>" placeholder="Description Here" id="description" class="form-control" name="description">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-lg-5 col-lg-offset-4">
                <button class="btn btn-primary" type="submit">Submit</button> 
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