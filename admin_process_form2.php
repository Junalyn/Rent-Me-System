<?php

require 'admin_config.php';
include('ad_session.php');

$mode = $_REQUEST["mode"];
if ( $mode == "update_old" ) {  
  $description = trim($_GET['description']);
  $category_id = trim($_GET['category_id']);
  $filename = "";
  $error = FALSE;

  if (is_uploaded_file($_FILES["profile_pic"]["tmp_name"])) {
    $filename = time() . '_' . $_FILES["profile_pic"]["name"];
    $filepath = 'profile_pics/' . $filename;
    if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $filepath)) {
      $error = TRUE;
    }
  } 

  if (!$error) {
    $sql = "UPDATE `categories` SET `description` = :description ,`profile_pic` = :pic"
            . "WHERE category_id = :category_id ";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":description", $description);
      $stmt->bindValue(":pic", $filename);
      $stmt->bindValue(":category_id", $category_id);      

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Category updated successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "No changes made to category.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } 
  header("location:ad_profile.php?pagenum=".$_GET['pagenum']);
} elseif ( $mode == "delete" ) {
   $category_id = intval($_GET['category_id']);
   
   $sql = "DELETE FROM `categories` WHERE category_id = :category_id";
   try {
     
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":category_id", $category_id);
        
       $stmt->execute();  
       $res = $stmt->rowCount();
       if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Category deleted successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Failed to delete category.";
      }
     
   } catch (Exception $ex) {
      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
   }
   
   header("location:ad_profile.php?pagenum=".$_GET['pagenum']);
}
?>