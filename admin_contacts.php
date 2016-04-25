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
      <li class="active"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> Users</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> User Information</h3>
      </div>
      <div class="panel-body">

        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="get" action="admin_process_form.php">
          <input type="hidden" name="mode" value="<?php echo ($_GET["m"] == "update") ? "update_old" : "add_new"; ?>" >
          <input type="hidden" name="id_user" value="<?php echo intval($results[0]["id_user"]); ?>" >
          <input type="hidden" name="pagenum" value="<?php echo $_GET["pagenum"]; ?>" >
          <fieldset>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="username"><span class="required">*</span>Username:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["username"] ?>" placeholder="First Name" id="username" class="form-control" name="username">
              </div>
            </div>


            <div class="form-group">
              <label class="col-lg-4 control-label" for="firstname"><span class="required">*</span>First Name:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["firstname"] ?>" placeholder="First Name" id="firstname" class="form-control" name="firstname">
                  <span id="first_name_err" class="error"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="middlename">Middle Name:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["middlename"] ?>" placeholder="Middle Name" id="middlename" class="form-control" name="middlename">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="lastname"><span class="required">*</span>Last Name:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["lastname"] ?>" placeholder="Last Name" id="lastname" class="form-control" name="lastname">
                  <span id="last_name_err" class="error"></span>
              </div>
            </div>

            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no"><span class="required">*</span>Contact No.:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["contact_no"] ?>" placeholder="Contact Number" id="contact_no" class="form-control" name="contact_no">
                  <span id="contact_no_err" class="error"></span>
                  <span class="help-block">Maximum of 11 digits only and only numbers.</span>
              </div>
            </div>
          
 
            <div class="form-group">
              <label class="col-lg-4 control-label" for="address">Address:</label>
              <div class="col-lg-5">
                <textarea id="address" name="address" rows="3" class="form-control"><?php echo $results[0]["address"] ?></textarea>
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

<script type="text/javascript">
$(document).ready(function() {
  
  // the fade out effect on hover
  $('.error').hover(function() {
    $(this).fadeOut(200);  
  });
  
  
  $("#contact_form").submit(function() {
    $('.error').fadeOut(200);  
    if(!validateForm()) {
            // go to the top of form first
            $(window).scrollTop($("#contact_form").offset().top);
      return false;
    }     
    return true;
    });

});

function validateForm() {
   var errCnt = 0;
   
   var first_name = $.trim( $("#first_name").val());
     var last_name = $.trim( $("#last_name").val());
   var email_id = $.trim( $("#email_id").val());
   var contact_no1 = $.trim( $("#contact_no1").val());
   var contact_no2 = $.trim( $("#contact_no2").val());
     
   var profile_pic =  $.trim( $("#profile_pic").val());

  // validate name
  if (first_name == "" ) {
    $("#first_name_err").html("Enter your first name.");
    $('#first_name_err').fadeIn("fast"); 
    errCnt++;
  }  else if (first_name.length <= 2 ) {
    $("#first_name_err").html("Enter atleast 3 letter.");
    $('#first_name_err').fadeIn("fast"); 
    errCnt++;
  }
    
    if (last_name == "" ) {
    $("#last_name_err").html("Enter your last name.");
    $('#last_name_err').fadeIn("fast"); 
    errCnt++;
  }  else if (last_name.length <= 2 ) {
    $("#last_name_err").html("Enter atleast 3 letter.");
    $('#last_name_err').fadeIn("fast"); 
    errCnt++;
  }
    
    if (!isValidEmail(email_id)) {
    $("#email_id_err").html("Enter valid email.");
    $('#email_id_err').fadeIn("fast"); 
    errCnt++;
  }
    
    if (contact_no == "" ) {
    $("#contact_no_err").html("Enter first contact number.");
    $('#contact_no_err').fadeIn("fast"); 
    errCnt++;
  }  else if (contact_no.length <= 9 || contact_no.length > 10 ) {
    $("#contact_no_err").html("Enter 10 digits only.");
    $('#contact_no_err').fadeIn("fast"); 
    errCnt++;
  } else if ( !$.isNumeric(contact_no) ) {
    $("#contact_no_err").html("Must be digits only.");
    $('#contact_no_err').fadeIn("fast"); 
    errCnt++;
  }
    
    
  if(errCnt > 0) return false; else return true;
}
<?php
include 'admin_footer.php';
?>