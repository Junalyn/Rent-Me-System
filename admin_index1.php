<div class="row">

    <?php include('admin_paginate1.php') ?>

      <div class="panel panel-primary">
          <div class="panel-heading">
              <h3 class="panel-title">Users Record</h3>
          </div>


          <div class="panel-body">

              <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
                  <form action="ad_profile.php" method="get" >
                      <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
                        <span class="pull-left">  
                          <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
                            <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="search by first name" id="" class="form-control" name="keyword" style="height: 41px;">
                          </label>
                          </span>
                        &nbsp;&nbsp;<button class="btn btn-info"> search</button>
                      </div>
                  </form>                            
              </div>

              <?php if (count($results) > 0) { ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered ">
                            <tbody>
                              <tr>
                                <th>User Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Contact No. </th>
                                <th>Address</th>
                                <th>Action </th>
                              </tr>

                          <?php foreach ($results as $res) { ?>
                              
                              <tr>
                                <td><?php echo $res["username"]; ?></td>
                                <td><?php echo $res["firstname"]; ?></td>
                                <td><?php echo $res["middlename"]; ?></td>
                                <td><?php echo $res["lastname"]; ?></td>
                                <td><?php echo $res["contact_no"]; ?></td>
                                <td><?php echo $res["address"]; ?></td>

                                <td>
                                      <!-- ********************** VIEW BUTTON ************************** -->
                                    <a href="admin_view_contacts.php?id_user=<?php echo $res["id_user"]; ?>">
                                      <button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-zoom-in"></span> View</button></a>&nbsp;

                                      <!-- ********************** EDIT BUTTON ************************** -->
                                    <a href="admin_contacts.php?m=update&id_user=<?php echo $res["id_user"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>">
                                      <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>&nbsp;

                                      <!-- ********************** DELETE BUTTON ************************** -->
                                    <a href="admin_process_form.php?mode=delete&id_user=<?php echo $res["id_user"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')">
                                      <button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button></a>&nbsp;
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
                                    <li><a href="ad_profile.php?pagenum=<?php echo $i; ?>&keyword=<?php echo $_GET["keyword"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                                    <?php
                                  }
                                }
                                ?>
                          </ul>
                      </div>

                <?php } 

                else { ?>
                    <div class="well well-lg">No user found.</div>
                <?php } ?>
                
            </div>
        </div>
  </div>