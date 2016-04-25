<?php

require 'admin_config.php';
include('ad_session.php');

$mode = $_REQUEST["mode"];
if ( $mode == "update_old" ) {  
  $item_id = trim($_GET['item_id']);
  $category_id = trim($_GET['category_id']);
  $id_user = trim($_GET['id_user']);
  $date_borrowed = trim($_GET['date_borrowed']);
  $time = trim($_GET['time']);
  $amount = trim($_GET['amount']);
  $date_returned = trim($_GET['date_returned']);
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
    $sql = "UPDATE `records` SET `item_id` = :item_id, `category_id` = :category_id, `id_user` = :id_user", `date_borrowed` = :date_borrowed", `time` = :time", `amount` = :amount", `date_returned` = :date_returned"
            . "WHERE id_records = :id_records ";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
        $stmt->bindValue(":item_id", $item_id);
        $stmt->bindValue(":category_id", $category_id);
        $stmt->bindValue(":id_user", $id_user);
        $stmt->bindValue(":date_borrowed", $date_borrowed);
        $stmt->bindValue(":time", $time);
        $stmt->bindValue(":amount", $amount);
        $stmt->bindValue(":date_returned", $date_returned);
        $stmt->bindValue(":id_records", $id_records);

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Record updated successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "No changes made to Record.";
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
   $id_records = intval($_GET['id_records']);
   
   $sql = "DELETE FROM `records` WHERE id_records = :id_records";
   try {
     
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":id_records", $id_records);
        
       $stmt->execute();  
       $res = $stmt->rowCount();
       if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Record deleted successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Failed to delete record.";
      }
     
   } catch (Exception $ex) {
      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
   }
   
   header("location:ad_profile.php?pagenum=".$_GET['pagenum']);
}
?>