<?php include('header.php'); ?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css" />

<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>

<?php
include('form.php');
$frm = new formBuilder;
?>

<div class="content" style="margin-top: 100px">
  <div class="wrap">
    <div class="content-top">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">Đăng kí</div>
          <div class="panel-body">
            <form action="process_registration.php" method="post" id="form1">
              <div class="form-group has-feedback">
                <input name="name" type="text" size="25" placeholder="Tên" class="form-control" />
                <?php $frm->validate("name", array("required", "label" => "tên", "regexp" => "name")); // Validating form using form builder written in form.php 
                ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input name="age" type="text" size="25" placeholder="Tuổi" class="form-control" />
                <?php $frm->validate("age", array("required", "label" => "tuổi", "regexp" => "age")); // Validating form using form builder written in form.php 
                ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <select name="gender" class="form-control">
                  <option value>Giới tính</option>
                  <option>Nam</option>
                  <option>Nữ</option>
                </select>
                <?php $frm->validate("gender", array("required", "label" => "giới tính")); // Validating form using form builder written in form.php 
                ?>  
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input name="phone" type="text" size="25" placeholder="Số điện thoại" class="form-control" />
                <?php $frm->validate("phone", array("required", "label" => "số điện thoại", "regexp" => "mobile")); // Validating form using form builder written in form.php 
                ?>
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input name="email" type="text" size="25" placeholder="Email" class="form-control" />
                <?php $frm->validate("email", array("required", "label" => "email", "email")); // Validating form using form builder written in form.php 
                ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input name="password" type="password" size="25" placeholder="Mật khẩu" class="form-control" />
                <?php $frm->validate("password", array("required", "label" => "mật khẩu", "min" => "6")); // Validating form using form builder written in form.php 
                ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input name="cpassword" type="password" size="25" placeholder="Xác nhận mật khẩu" class="form-control" />
                <?php $frm->validate("cpassword", array("required", "label" => "xác nhận mật khẩu", "min" => "6", "identical" => "password Password")); // Validating form using form builder written in form.php 
                ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Đăng kí</button>
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
<script>
  <?php $frm->applyvalidations("form1"); ?>
</script>