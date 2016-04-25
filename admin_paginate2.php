<?php
/*******PAGINATION CODE STARTS*****************/
if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] : 8;


try {
  $keyword2 = trim($_GET["keyword2"]);
  if ($keyword2 <> "" ) {
    $sql = "SELECT * FROM categories WHERE 1 AND "
            . " (description LIKE :keyword2) ORDER BY cat_description ";
    $stmt = $DB->prepare($sql);
    
    $stmt->bindValue(":keyword2", $keyword2."%");
    
  } else {
    $sql = "SELECT * FROM categories WHERE 1 ORDER BY cat_description ";
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
  
  if ($keyword2 <> "" ) {
    $stmt->bindValue(":keyword2", $keyword2."%");
   }
   
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>