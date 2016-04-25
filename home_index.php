<html>
<body>

<div class="row demo-tiles">
    <div class="col-sm-5">
          <div class="tile">
            <img src="img/icons/svg/book.svg" alt="Book">
                <h5>Username: </h5> 
                  <span class="fui-user"></span> <?php print($userRow["username"]) ?>
                <br>
                <h5>Full Name: </h5>
                  <span class="fui-star-2"></span> <?php echo ($userRow["firstname"]) . " " . ($userRow["middlename"]) . " " . ($userRow["lastname"]); ?>
                <br>
                <h5>Contact No.: </h5>
                  <span class="fui-bubble"></span>  <?php echo ($userRow["contact_no"])?>
                <br>
                <h5>Address: </h5>
                  <span class="fui-home"></span> <?php echo ($userRow["address"]) ; ?>
                <br>
          </div>
    </div>

    <div class="col-sm-7">
          <div class="tile">
                <h5>Username: </h5> 
                  <span class="fui-user"></span> <?php print($userRow["username"]) ?>
                <br>
                <h5>Full Name: </h5>
                  <span class="fui-star-2"></span> <?php echo ($userRow["firstname"]) . " " . ($userRow["middlename"]) . " " . ($userRow["lastname"]); ?>
                <br>
                <h5>Contact No.: </h5>
                  <span class="fui-bubble"></span>  <?php echo ($userRow["contact_no"])?>
                <br>
                <h5>Address: </h5>
                  <span class="fui-home"></span> <?php echo ($userRow["address"]) ; ?>
                <br>
          </div>
    </div>
</div>

</body>
</html>