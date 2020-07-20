<?php include('header.php'); ?> 

<div class="content">
  <div class="wrap">
    <div class="content-top" >
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 200px;">
          <div class="panel-heading"><h4>Đăng nhập</h4></div>
          <div class="panel-body">
            <?php include('msgbox.php'); ?>
            <!-- <p class="login-box-msg">Sign in to start your session</p> -->

            <form action="process_login.php" method="post">

              <div class="form-group has-feedback">
                <input name="Email" type="text" size="25" placeholder="Email" class="form-control" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>

              <div class="form-group has-feedback">
                <input name="Password" type="password" size="25" placeholder="Password" class="form-control"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                <p class="login-box-msg" style="padding-top:20px; float: right">Chưa có tài khoản? <a href="registration.php">Đăng kí</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div> 
<?php include('footer.php'); ?>
