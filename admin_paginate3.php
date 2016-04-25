<?php
/*******PAGINATION CODE STARTS*****************/
if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] : 8;


try {
  $keyword3 = trim($_GET["keyword3"]);
  if ($keyword3 <> "" ) {
    $sql = "SELECT * FROM items WHERE 1 AND "
            . " (description LIKE :keyword3) ORDER BY description ";
    $stmt = $DB->prepare($sql);
    
    $stmt->bindValue(":keyword3", $keyword3."%");
    
  } else {
    $sql = "SELECT items.profile_pic, items.description, items.category_id, categories.cat_description, items.amount FROM items, categories WHERE items.category_id= categories.category_id ORDER BY description";
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
  
  if ($keyword3 <> "" ) {
    $stmt->bindValue(":keyword3", $keyword3."%");
   }
   
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>