<?php
require_once 'admin_config.php';
include 'admin_header.php';
include 'admin_paginate1.php';
include('ad_session.php');
?>



<?php if ($ERROR_MSG <> "") { ?>
    <div class="alert alert-dismissable alert-<?php echo $ERROR_TYPE ?>">
        <button data-dismiss="alert" class="close" type="button">×</button>
            <p><?php echo $ERROR_MSG; ?></p>
    </div>
<?php } ?>


<!-- ******************************************** A C C O R D I O N  STARTS HERE ********************************** -->

<div class="container">
  <div class="panel-group" id="accordion">


    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Manage Users</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
            
            <!-- ******************************************** 1ST -- A C C O R D I O N  BODY ********************************** -->
                    <div class="row">
                    

                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title">Users Record</h3>
                        </div>
                        <div class="panel-body">

                          <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
                            <form action="admin_index.php" method="get" >
                            <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
                              <span class="pull-left">  
                                <label class="col-lg-12 control-label" for="keyword2" style="padding-right: 0;">
                                  <input type="text" value="<?php echo $_GET["keyword2"]; ?>" placeholder="search by first name" id="" class="form-control" name="keyword2" style="height: 41px;">
                                </label>
                                </span>
                              <button class="btn btn-info">search</button>
                            </div>
                            </form>
                            <div class="pull-right" ><a href="admin_contacts.php"><button class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Add New Contact</button></a></div>
                          </div>

                          <div class="clearfix"></div>
                    <?php if (count($results) > 0) { ?>
                            <div class="table-responsive">
                              <table class="table table-striped table-hover table-bordered ">
                                <tbody><tr>
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Contact No. </th>
                                    <th>Action </th>

                                  </tr>
                      <?php foreach ($results as $res) { ?>
                                    <tr>
                                      <!-- <td style="text-align: center;">
                                    <?php $pic = ($res["profile_pic"] <> "" ) ? $res["profile_pic"] : "no_avatar.png" ?>
                                        <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="50" height="50" ></a>
                                      </td> *******************PROFILE PICTURE FIELD!-->

                                      <td><?php echo $res["username"]; ?></td>
                                      <td><?php echo $res["firstname"]; ?></td>
                                      <td><?php echo $res["middlename"]; ?></td>
                                      <td><?php echo $res["lastname"]; ?></td>
                                      <td><?php echo $res["contact_no"]; ?></td>
                                      <td>
                                          <!-- ********************** VIEW BUTTON ************************** -->
                                        <a href="admin_view_contacts.php?cid=<?php echo $res["id_user"]; ?>"><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-zoom-in"></span> View</button></a>&nbsp;

                                          <!-- ********************** EDIT BUTTON ************************** -->
                                        <a href="admin_contacts.php?m=update&cid=<?php echo $res["id_user"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>&nbsp;

                                          <!-- ********************** DELETE BUTTON ************************** -->
                                        <a href="admin_process_form.php?mode=delete&cid=<?php echo $res["id_user"]; ?>&keyword2=<?php echo $_GET["keyword2"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button></a>&nbsp;
                                      </td>
                                    </tr>
                      <?php } ?>
                                </tbody></table>
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
                                    <li><a href="admin_index.php?pagenum=<?php echo $i; ?>&keyword2=<?php echo $_GET["keyword2"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                                    <?php
                                  }
                                }
                                ?>
                              </ul>
                            </div>

                              <?php } else { ?>
                            <div class="well well-lg">No contacts found.</div>
                    <?php } ?>
                        </div>
                      </div>
                    </div>
            
            
            <!-- ******************************************** A C C O R D I O N  BODY ********************************** -->
        </div>
      </div>
    </div>
      
      
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Manage Categories</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		 <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
                            <form action="admin_index.php" method="get" >
                            <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
                              <span class="pull-left">  
                                <label class="col-lg-12 control-label" for="keyword2" style="padding-right: 0;">
                                  <input type="text" value="<?php echo $_GET["keyword2"]; ?>" placeholder="search by description" id="" class="form-control" name="keyword2" style="height: 41px;">
                                </label>
                                </span>
                              <button class="btn btn-info">search</button>
                            </div>
                            </form>
                            <div class="pull-right" ><a href="admin_contacts2.php"><button class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Add New Category</button></a></div>
                          </div>
          <!-- ******************************************** 2ND  A C C O R D I O N BODY ********************************** -->
           
            <?php include('admin_paginate2.php') ?>
                    <div class="row">

                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title">Category Records</h3>
                        </div>
                        <div class="panel-body">

                          <div class="clearfix"></div>
                            <?php if (count($results) > 0) { ?>
                            <div class="table-responsive">
                              <table class="table table-striped table-hover table-bordered ">
                                <tbody><tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Action </th>

                                  </tr>
                                    <?php foreach ($results as $res) { ?>
                                    <tr>
  
                                      <td><?php echo $res["category_id"]; ?></td>
                                      <td><?php echo $res["description"]; ?></td>
                                      <td>
                                          <!-- ********************** VIEW BUTTON ************************** -->
                                        <a href="admin_view_contacts2.php?category_id=<?php echo $res["category_id"]; ?>"><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-zoom-in"></span> View</button></a>&nbsp;

                                          <!-- ********************** EDIT BUTTON ************************** -->
                                        <a href="admin_contacts2.php?m=update&category_id=<?php echo $res["category_id"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>&nbsp;

                                          <!-- ********************** DELETE BUTTON ************************** -->
                                        <a href="admin_process_form2.php?mode=delete&category_id=<?php echo $res["category_id"]; ?>&keyword2=<?php echo $_GET["keyword2"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')">
                                          <button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button>
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
                                    <li><a href="admin_index.php?pagenum=<?php echo $i; ?>&keyword2=<?php echo $_GET["keyword2"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                                    <?php
                                  }
                                }
                                ?>
                              </ul>
                            </div>

                              <?php } else { ?>
                            <div class="well well-lg">No contacts found.</div>
                    <?php } ?>
                        </div>
                      </div>
                    </div>
            
            
            <!-- ******************************************** 2ND ---- A C C O R D I O N  BODY ********************************** -->
        </div>
      </div>
    </div>
      
      
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Manage Items</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
        <!-- ******************************************** 3RD ---  A C C O R D I O N BODY ********************************** -->
        <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title">Item Record</h3>
                        </div>
                        <div class="panel-body">

                          <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
                            <form action="admin_index.php" method="get" >
                            <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
                              <span class="pull-left">  
                                <label class="col-lg-12 control-label" for="keyword3" style="padding-right: 0;">
                                  <input type="text" value="<?php echo $_GET["keyword3"]; ?>" placeholder="search by description" id="" class="form-control" name="keyword3" style="height: 41px;">
                                </label>
                                </span>
                              <button class="btn btn-info">search</button>
                            </div>
                            </form>
                            <div class="pull-right" ><a href="admin_contacts3.php"><button class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Add New Items</button></a></div>
                          </div>

                          <div class="clearfix"></div>
                    <?php if (count($results) > 0) { ?>
                            <div class="table-responsive">
                              <table class="table table-striped table-hover table-bordered ">
                                <tbody><tr>
                                    <th>Picture</th>
                                    <th>Description</th>
                                    <th>Quantity</th>                                    
                                    <th>Action </th>

                                  </tr>
                                  <?php foreach ($results as $res) { ?>
                                    <tr>
                                       <td style="text-align: center;">
                                    <?php $pic = ($res["profile_pic"] <> "" ) ? $res["profile_pic"] : "no_avatar.png" ?>
                                        <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="50" height="50" ></a>
                                      </td>

                                      <td><?php echo $res["description"]; ?></td>
                                      <td><?php echo $res["quantity"]; ?></td>

                                      
                                      <td>
                                          <!-- ********************** VIEW BUTTON ************************** -->
                                        <a href="admin_view_contacts3.php?item_id=<?php echo $res["item_id"]; ?>"><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-zoom-in"></span> View</button></a>&nbsp;

                                          <!-- ********************** EDIT BUTTON ************************** -->
                                        <a href="admin_contacts3.php?m=update&item_id=<?php echo $res["item_id"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>&nbsp;

                                          <!-- ********************** DELETE BUTTON ************************** -->
                                        <a href="admin_process_form3.php?mode=delete&item_id=<?php echo $res["item_id"]; ?>&keyword3=<?php echo $_GET["keyword3"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')">
                                          <button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button>
                                        </a>&nbsp;
                                      </td>
                                    </tr>
                                  <?php } ?>
                                </tbody></table>
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
                                    <li><a href="admin_index.php?pagenum=<?php echo $i; ?>&keyword3=<?php echo $_GET["keyword3"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                                    <?php
                                  }
                                }
                                ?>
                              </ul>
                            </div>

                              <?php } else { ?>
                            <div class="well well-lg">No contacts found.</div>
                    <?php } ?>
                        </div>
                      </div>
                    </div>
            
            <!-- ******************************************** 3RD  ----   A C C O R D I O N  BODY ********************************** -->

          
          </div>
      </div>
    </div>
  </div> 
</div>

<?php include ('admin_footer.php') ?>