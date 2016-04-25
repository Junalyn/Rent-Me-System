<?php
/*******PAGINATION CODE STARTS*****************/
if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] : 8;


try {
  $keyword4 = trim($_GET["keyword4"]);
  if ($keyword4 <> "" ) {
    $sql = "SELECT * FROM records WHERE 1 AND "
            . " (id_records LIKE :keyword4) ORDER BY id_records ";
    $stmt = $DB->prepare($sql);
    
    $stmt->bindValue(":keyword4", $keyword4."%");
    
  } else {
    $sql = "SELECT * FROM records WHERE 1 ORDER BY id_records ";
    $stmt = $DB->prepare($sql);
  }
  
  $stmt->execute();
  $total_count = count($stmt->fetchAll());

  $last = ceil($total_count / $page_limit);

  if ($pagenum < 1) {
    $pagenum = 1;
  } elseif ($pagenum > $last) {
    $pagenum = $last;
  }

  $lower_limit = ($pagenum - 1) * $page_limit;
  $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;


  $sql2 = $sql . " limit " . ($lower_limit) . " ,  " . ($page_limit) . " ";
  
  $stmt = $DB->prepare($sql2);
  
  if ($keyword4 <> "" ) {
    $stmt->bindValue(":keyword4", $keyword4."%");
   }
   
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>