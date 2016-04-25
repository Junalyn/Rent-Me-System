<?php

require 'admin_config.php';
include('ad_session.php');

$mode = $_REQUEST["mode"];
if ( $mode == "update_old" ) {
  $username = trim($_GET['username']);
  $firstname = trim($_GET['firstname']);
  $middlename = trim($_GET['middlename']);
  $lastname = trim($_GET['lastname']);
  $contact_no = trim($_GET['contact_no']);
  $address = trim($_GET['address']);
  $id_user = trim($_GET['id_user']);
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
    $sql = "UPDATE `users` SET `username` = :username, `firstname` = :firstname, `middlename` = :middlename, `lastname` = :lastname, `address` = :address, `contact_no` = :contact , `profile_pic` = :pic "
            . "WHERE id_user = :id_user ";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":username", $username);
      $stmt->bindValue(":firstname", $firstname);
      $stmt->bindValue(":middlename", $middlename);
      $stmt->bindValue(":lastname", $lastname);
      $stmt->bindValue(":contact", $contact_no);
      $stmt->bindValue(":address", $address); 
      $stmt->bindValue(":pic", $filename);     
      $stmt->bindValue(":id_user", $id_user);

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "User updated successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "No changes made to user.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } 
  header("location:ad_profile.php?pagenum=".$_GET['pagenum']);
} elseif ( $mode == "delete" ) {
   $id_user = intval($_GET['id_user']);
   
   $sql = "DELETE FROM `users` WHERE id_user = :id_user";
   try {
     
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":id_user", $id_user);
        
       $stmt->execute();  
       $res = $stmt->rowCount();
       if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "User deleted successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Failed to delete user.";
      }
     
   } catch (Exception $ex) {
      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
   }
   
   header("location:ad_profile.php?pagenum=".$_GET['pagenum']);
}
?>