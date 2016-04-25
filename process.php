<?php
include 'header.php';
require_once 'admin_config.php';

$mode = $_REQUEST["mode"];
if ($mode == "add_new" ) {

  $cat_description = trim($_GET['cat_description']);
  $user = trim($_GET['user']);
  $date_borrowed = trim($_GET['date_borrowed']);
  $amount = trim($_GET['amount']);
  $time = trim($_GET['time']);  
  $error = FALSE;

  if (!$error) {
    $sql = "INSERT INTO `records` (`cat_description`, `user` , `date_borrowed`, `amount`, `time`) 
    VALUES ". "(:cat_description, :user, :date_borrowed, :amount, :time)";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
        $stmt->bindValue(":cat_description", $cat_description);
        $stmt->bindValue(":user", $user);
        $stmt->bindValue(":date_borrowed", $date_borrowed);
        $stmt->bindValue(":amount", $amount);
        $stmt->bindValue(":time", $time);        

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Record added successfully.";
      } else {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Failed to add record.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } else {
    $_SESSION["errorType"] = "danger";
    $_SESSION["errorMsg"] = "failed to upload image.";
  }
  header("location:item_view.php");
} 
?>