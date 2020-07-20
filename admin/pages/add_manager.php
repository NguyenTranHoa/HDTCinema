<?php
include('header.php');
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css" />

<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
<!-- =============================================== -->
<?php
include('../../form.php');
$frm = new formBuilder;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Thêm quản lý
    </h1>
    <ol class="breadcrumb">
      <li><a href="add_manager.php"><i class="fa fa-home"></i>Trang chủ</a></li>
      <li class="active">Thêm quản lý</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <?php include('../../msgbox.php'); ?>
        <form action="process_add_theater.php" method="post" id="form1">
          <div class="form-group">
            <label class="control-label">Tên</label>
            <input type="text" name="name" class="form-control" />
            <?php $frm->validate("name", array("required", "label" => "tên")); // Validating form using form builder written in form.php 
            ?>
          </div>
          
          <div class="form-group">
            <label class="control-label">Tài khoản</label>
            <input type="text" name="username" class="form-control">
            <?php $frm->validate("username", array("required", "label" => "tên tài khoản")); // Validating form using form builder written in form.php 
            ?>
          </div>

          <div class="form-group">
            <label class="control-label">Mật khẩu</label>
            <input type="text" name="password" class="form-control">
            <?php $frm->validate("password", array("required", "label" => "mật khẩu")); // Validating form using form builder written in form.php 
            ?>
          </div>
          
          <div class="form-group">
            <button class="btn btn-success">Thêm</button>
          </div>
          
        </form>
      </div>

    </div>


  </section>

</div>
<?php
include('footer.php');
?>