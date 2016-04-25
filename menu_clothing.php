<?php
    include 'header.php';
    require_once 'admin_config.php';
?>
<html>
<head>
<title>welcome - <?php print($userRow['username']); ?></title>
</head>

<body>

<div class="animated shake container-fluid" style="margin-top:80px;">
  <div class="container">
<div class="row">
          <?php include('paginate_clothing.php') ?>
            <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title">Items For Rent!</h3>
                        </div>
                        <div class="panel-body">

                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
                            <form action="menu_clothing.php" method="get" >
                              <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
                                <span class="pull-left">  
                                  <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
                                    <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="search by description" id="" class="form-control" name="keyword" style="height: 41px;">
                                  </label>
                                </span>
                                  &nbsp;<button class="btn btn-info">search</button>
                              </div>
                            </form>
                            
                          </div>

                            <?php if (count($results) > 0) { ?>
                            <div class="table-responsive">
                              <table class="table table-striped table-hover table-bordered ">
                                <tbody><tr>
                                    <th>Picture</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Action </th>


                                  </tr>
                                    <?php foreach ($results as $res) { ?>
                                    <tr>

                                      <td style="text-align: center;">
                                          <?php $pic = ($res["profile_pic"] <> "" ) ? $res["profile_pic"] : "no_avatar.png" ?>
                                        <a href="profile_pics/<?php echo $pic ?>" target="_blank">
                                          <img src="profile_pics/<?php echo $pic ?>" alt="" width="50" height="50" >
                                        </a>
                                      </td>
  
                                      <td><?php echo $res["description"]; ?></td>
                                      <td>P <?php echo $res["amount"]; ?></td>
                                      <td style = "text-align: center;">
                                          <!-- ********************** VIEW BUTTON ************************** -->
                                        <a href="view.php.php?item_id=<?php echo $res["item_id"]; ?>">
                                          <button class="btn btn-sm btn-info">
                                            <span class="glyphicon glyphicon-zoom-in"></span> View</button>
                                        </a>&nbsp;

                                          <!-- ********************** RENT BUTTON ************************** -->
                                        <a href="add.php?item_id=<?php echo $res["item_id"]; ?>">
                                          <button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span> Rent Me</button>
                                        </a>&nbsp;

                                      </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="col-lg-12 center">
                          <ul class="pagination pagination-sm">

                            <?php
                            //Show page links
                            for ($i = 1; $i <= $last; $i++) {
                              if ($i == $pagenum) {
                                ?>
                                  <li class="active"><a href="javascript:void(0);" ><?php echo $i ?></a></li>
                                  <?php
                                } else {
                                  ?>
                                  <li><a href="menu_clothing.php?pagenum=<?php echo $i; ?>&keyword=<?php echo $_GET["keyword"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                                  <?php }
                                }
                                  ?>
                          </ul>
                        </div>

                        <?php } else { ?>
                            <div class="well well-lg">No item found.</div>
                        <?php } ?>

                        </div>
                      </div>
           </div>



    <!-- ********************* FOOTER ****************************8 -->    
    <p class="blockquote-reverse" style="margin-top:200px;">
    &copy; Rent Me <br /><br />
    </p>

</div>

</body>
</html>