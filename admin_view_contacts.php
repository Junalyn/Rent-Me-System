<?php
require_once 'admin_config.php';
include 'admin_header.php';
include('ad_session.php');

try {
   $sql = "SELECT * FROM users WHERE 1 AND id_user = :id_user";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":id_user", intval($_GET["id_user"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}

?>

<div class="row">
  <ul class="breadcrumb">
      <li><a href="ad_profile.php">Home</a></li>
      <li class="active">View Users</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">View User</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="get" action="admin_process_form.php">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="username"><span class="required">*</span>Username:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" placeholder="UserName" value="<?php echo $results[0]["username"] ?>" id="username" class="form-control" name="username">
                  <span id="first_name_err" class="error"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" for="firstname"><span class="required">*</span>First Name:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" placeholder="First Name" value="<?php echo $results[0]["firstname"] ?>" id="firstname" class="form-control" name="firstname">
                  <span id="first_name_err" class="error"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="middlename">Middle Name:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["middlename"] ?>" placeholder="Middle Name" id="middlename" class="form-control" name="middlename">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="lastname"><span class="required">*</span>Last Name:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["lastname"] ?>" placeholder="Last Name" id="lastname" class="form-control" name="lastname">
                  <span id="lastname_err" class="error"></span>
              </div>
            </div>

   
            <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no"><span class="required">*</span>Contact No:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["contact_no"] ?>" placeholder="Contact Number" id="contact_no" class="form-control" name="contact_no">
                  <span id="contact_no_err" class="error"></span>
              </div>
            </div>
            
    
            <div class="form-group">
              <label class="col-lg-4 control-label" for="address">Address:</label>
              <div class="col-lg-5">
                <textarea id="address" readonly="" name="address" rows="5" class="form-control"><?php echo $results[0]["address"] ?></textarea>
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