<?php
require_once 'admin_config.php';
include 'admin_header.php';
include 'ad_session.php';

try {
   $sql = "SELECT * FROM items WHERE 1 AND id_records = :id_records";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":id_records", intval($_GET["id_records"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}

?>

<div class="row">
  <ul class="breadcrumb">
      <li><a href="ad_profile.php">Home</a></li>
      <li class="active">View Records</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">View Record</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="get" action="admin_process_form4.php">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="id_records"><span class="required">*</span>Record ID:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" placeholder="Record ID" value="<?php echo $results[0]["id_records"] ?>" id="id_records" class="form-control" name="id_records">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" for="item_id">Item ID :</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["item_id"] ?>" placeholder="Item ID Here" id="item_id" class="form-control" name="item_id">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="category_id">Category ID :</label>
              <div class="col-lg-5">
                <input type="number" readonly="" value="<?php echo $results[0]["category_id"] ?>" placeholder="Category ID Here" id="category_id" class="form-control" name="category_id">
              </div>
            </div>   

            <div class="form-group">
              <label class="col-lg-4 control-label" for="user">User ID:</label>
              <div class="col-lg-5">
                <input type="number" readonly="" value="<?php echo $results[0]["user"] ?>" placeholder="User ID" id="user" class="form-control" name="user">
              </div>
            </div>     

            <div class="form-group">
              <label class="col-lg-4 control-label" for="date_borrowed">Date Borrowed:</label>
              <div class="col-lg-5">
                <input type="number" readonly="" value="<?php echo $results[0]["date_borrowed"] ?>" placeholder="Date Borrowed" id="date_borrowed" class="form-control" name="date_borrowed">
              </div>
            </div> 

            <div class="form-group">
              <label class="col-lg-4 control-label" for="time">Time:</label>
              <div class="col-lg-5">
                <input type="number" readonly="" value="<?php echo $results[0]["time"] ?>" placeholder="time" id="" class="form-control" name="time">
              </div>
            </div> 

            <div class="form-group">
              <label class="col-lg-4 control-label" for="date_returned">Date Returned:</label>
              <div class="col-lg-5">
                <input type="number" readonly="" value="<?php echo $results[0]["date_returned"] ?>" placeholder="Date Returned" id="date_returned" class="form-control" name="date_returned">
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