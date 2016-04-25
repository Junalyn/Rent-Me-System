<div class="row">
    <?php include('admin_paginate2.php') ?>
       <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Category Records</h3>
            </div>
            
            <div class="panel-body">

                <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
                    <form action="ad_profile.php" method="get" >
                      <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
                        <span class="pull-left">  
                          <label class="col-lg-12 control-label" for="keyword2" style="padding-right: 0;">
                            <input type="text" value="<?php echo $_GET["keyword2"]; ?>" placeholder="search by item description" id="" class="form-control" name="keyword2" style="height: 41px;">
                          </label>
                        </span>
                          &nbsp;<button class="btn btn-info">search</button>
                      </div>
                    </form>                    
                  </div>

                <?php if (count($results) > 0) { ?>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered ">
                      <tbody>
                        <tr>
                          <th>Category ID</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>

                          <?php foreach ($results as $res) { ?>

                        <tr>  
                          <td><?php echo $res["category_id"]; ?></td>
                          <td><?php echo $res["cat_description"]; ?></td>

                          <td>
                                <!-- ********************** VIEW BUTTON ************************** -->
                              <a href="admin_view_contacts2.php?category_id=<?php echo $res["category_id"]; ?>">
                                <button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-zoom-in"></span> View</button>
                              </a>&nbsp;
                              
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
                                    } 
                                    else {
                                    ?>
                                    <li><a href="ad_profile.php?pagenum=<?php echo $i; ?>&keyword2=<?php echo $_GET["keyword2"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                                    <?php
                                  }
                                }
                                ?>
                          </ul>
                      </div>

                <?php } 

                        else { ?>
                            <div class="well well-lg">No category found.</div>
                        <?php } ?>

              </div>
        </div>
</div>