<?php

require 'admin_config.php';
include('ad_session.php');

$mode = $_REQUEST["mode"];
if ($mode == "add_new" ) {
  $description = trim($_GET['description']);
  $amount = trim($_GET['amount']);
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
    $sql = "INSERT INTO `items` (`description`, `profile_pic`) VALUES ". "( :description, :pic)";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
        $stmt->bindValue(":description", $description);
        $stmt->bindValue(":pic", $filename);

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Item added successfully.";
      } else {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Failed to add Item.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } else {
    $_SESSION["errorType"] = "danger";
    $_SESSION["errorMsg"] = "failed to upload image.";
  }
  header("location:ad_profile.php");
} elseif ( $mode == "update_old" ) {
  
  $description = trim($_GET['description']);

  $item_id = trim($_GET['item_id']);
  $filename = "";
  $error = FALSE;

  if (is_uploaded_file($_FILES["profile_pic"]["tmp_name"])) {
    $filename = time() . '_' . $_FILES["profile_pic"]["name"];
    $filepath = 'profile_pics/' . $filename;
    if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $filepath)) {
      $error = TRUE;
    }
  } else {
     $filename = $_POST['old_pic'];
  }

  if (!$error) {
    $sql = "UPDATE `items` SET `description` = :description, `profile_pic` = :pic  "
            . "WHERE item_id = :item_id ";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":pic", $filename);
      $stmt->bindValue(":description", $description);
     
      $stmt->bindValue(":item_id", $item_id);

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Item updated successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "No changes made to Item.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } else {
    $_SESSION["errorType"] = "danger";
    $_SESSION["errorMsg"] = "Failed to upload image.";
  }
  header("location:ad_profile.php?pagenum=".$_GET['pagenum']);
} elseif ( $mode == "delete" ) {
   $item_id = intval($_GET['item_id']);
   
   $sql = "DELETE FROM `items` WHERE item_id = :item_id";
   try {
     
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":item_id", $item_id);
        
       $stmt->execute();  
       $res = $stmt->rowCount();
       if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Item deleted successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Failed to delete Item.";
      }
     
   } catch (Exception $ex) {
      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
   }
   
   header("location:ad_profile.php?pagenum=".$_GET['pagenum']);
}
?>