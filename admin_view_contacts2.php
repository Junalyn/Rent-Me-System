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
      <li class="active">View Categories</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">View Category</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="get" action="admin_process_form2.php">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="category_id"><span class="required">*</span>Category ID:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" placeholder="Category ID" value="<?php echo $results[0]["category_id"] ?>" id="category_id" class="form-control" name="category_id">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="description">Description:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["description"] ?>" placeholder="Middle Name" id="description" class="form-control" name="description">
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