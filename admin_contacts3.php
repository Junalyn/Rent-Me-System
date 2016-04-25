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
      <li class="active"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> Item</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> New Item</h3>
      </div>
      <div class="panel-body">

        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="get" action="admin_process_form3.php">
          <input type="hidden" name="mode" value="<?php echo ($_GET["m"] == "update") ? "update_old" : "add_new"; ?>" >
          <input type="hidden" name="item_id" value="<?php echo intval($results[0]["item_id"]); ?>" >
          <input type="hidden" name="pagenum" value="<?php echo $_GET["pagenum"]; ?>" >
          <fieldset>

            <!-- ************************ PROFILE PICTURE ********************* -->
            <div class="form-group">
              <label class="col-lg-4 control-label" for="profile_pic">Profile picture:</label>
            <div class="col-lg-5">
                <input type="file"  id="profile_pic" class="form-control file" name="profile_pic"><span id="profile_pic_err" class="error"></span>
                <span class="help-block">Must be jpg, jpeg, png, gif, bmp image only.</span>
              </div>
            </div>
            
            
            <div class="form-group">
              <div class="col-lg-1 col-lg-offset-4">
                <?php $pic = ($results[0]["profile_pic"] <> "" ) ? $results[0]["profile_pic"] : "no_avatar.png" ?>
                <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="100" height="100" class="thumbnail" ></a>
              </div>
            </div>
            <?php 
           
            ?>

            <div class="form-group">
              <label class="col-lg-4 control-label" for="description">Description:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["description"] ?>" placeholder="description" id="" class="form-control" name="description">
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
   
   var profile_pic =  $.trim( $("#profile_pic").val());

    if (profile_pic.length > 0) {
        var exts = ['jpg','jpeg','png','gif', 'bmp'];
    var get_ext = profile_pic.split('.');
    get_ext = get_ext.reverse();
        
       
        if ($.inArray ( get_ext[0].toLowerCase(), exts ) <= -1 ){
          $("#profile_pic_err").html("Must me jpg, jpeg, png, gif, bmp image only..");
          $('#profile_pic_err').fadeIn("fast"); 
        }
       
    }
    
  if(errCnt > 0) return false; else return true;
}
</script>
<?php
include 'admin_footer.php';
?>