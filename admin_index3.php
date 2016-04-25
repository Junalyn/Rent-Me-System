<div class="row">
          <?php include('admin_paginate3.php') ?>
            <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title">Item Records</h3>
                        </div>
                        <div class="panel-body">

                        <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
                            <form action="ad_profile.php" method="get" >
                              <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
                                <span class="pull-left">  
                                  <label class="col-lg-12 control-label" for="keyword3" style="padding-right: 0;">
                                    <input type="text" value="<?php echo $_GET["keyword3"]; ?>" placeholder="search by item description" id="" class="form-control" name="keyword3" style="height: 41px;">
                                  </label>
                                </span>
                                  &nbsp;<button class="btn btn-info">search</button>
                              </div>
                            </form>
                            <div class="pull-right" ><a href="admin_contacts3.php"><button class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Add New item</button></a></div>
                          </div>

                            <?php if (count($results) > 0) { ?>
                            <div class="table-responsive">
                              <table class="table table-striped table-hover table-bordered ">
                                <tbody><tr>
                                    <th>Picture</th>
                                    <th>Description</th>
                                    <th>Category</th>
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
                                      <td><?php echo $res["cat_description"];?></td>
                                      <td>P <?php echo $res["amount"]; ?></td>
                                      <td>
                                          <!-- ********************** VIEW BUTTON ************************** -->
                                        <a href="admin_view_contacts3.php?item_id=<?php echo $res["item_id"]; ?>">
                                          <button class="btn btn-sm btn-info">
                                            <span class="glyphicon glyphicon-zoom-in"></span> View</button>
                                        </a>&nbsp;

                                          <!-- ********************** DELETE BUTTON ************************** -->
                                        <a href="admin_process_form3.php?mode=delete&item_id=<?php echo $res["item_id"]; ?>&keyword3=<?php echo $_GET["keyword3"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')">
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
                                  <li><a href="ad_profile.php?pagenum=<?php echo $i; ?>&keyword3=<?php echo $_GET["keyword3"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
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