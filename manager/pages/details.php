<?php
include('header.php');
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Thông tin tài khoản
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active">Thông tin tài khoản</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Chi tiết</h3>
      </div>
      <div class="box-body">
        <?php
        $th = mysqli_query($con, "select * from tbl_theatre ");
        $theatre = mysqli_fetch_array($th);
        ?>

        <table class="table table-bordered table-hover">
          <tr>
            <td class="col-md-6">Tên tài khoản</td>
            <td class="col-md-6"><?php echo $theatre['name']; ?></td>
          </tr>

        </table>
      </div>
    </div>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Chi tiết rạp</h3>
      </div>
      <div class="box-body" id="screendtls">
        <?php
        $sr = mysqli_query($con, "select * from tbl_screens");
        if (mysqli_num_rows($sr)) {
        ?>
          <table class="table table-bordered table-hover">
            <th class="col-md-1">STT</th>
            <th class="col-md-3">Phòng chiếu</th>
            

            <th class="col-md-3">Giờ chiếu</th>
            <th class="col-md-1">Số chỗ ngồi</th>
            <th class="col-md-1">Giá tiền</th>
            <?php
            $sl = 1;
            while ($screen = mysqli_fetch_array($sr)) {
            ?>
              <tr>
                <td><?php echo $sl; ?></td>
                <td><?php echo $screen['screen_name']; ?></td>
                

                <?php
                $st = mysqli_query($con, "select * from tbl_show_time where screen_id='" . $screen['screen_id'] . "'");
                ?>
                <td>| <?php if (mysqli_num_rows($st)) {
                        while ($stm = mysqli_fetch_array($st)) {
                          echo date('H:i', strtotime($stm['start_time'])) . " | ";
                        }
                      } else {
                        echo "No Show Time Added";
                      }
                      ?></td>
                      
                <td><?php echo $screen['seats']; ?></td>
                <td><?php echo $screen['charge']; ?>.000 Đ</td>
              </tr>
            <?php
              $sl++;
            }
            ?>
          </table>

        <?php
        }
        ?>
      </div>
      <div>
        

      </div>

    </div>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tổng doanh thu: <?php
        $bk = mysqli_query($con, "select * from tbl_bookings ");

        $total_price=0;
        while($book = mysqli_fetch_array($bk)) {
          $total_price += $book['amount'];
        }
        echo  $total_price;
        ?>.000 Đ</h3>
       
      </div>
      
    </div>
  </section>
  <!-- /.content -->
</div>
<?php
include('footer.php');
?>
<script type="text/javascript">
  var screenid;

  function loadScreendtls() {
    $.ajax({
        url: 'get_screen_dtls.php',
        type: 'POST',
        data: 'id=' + <?php echo $_SESSION['theatre']; ?>,
        dataType: 'html'
      })
      .done(function(data) {
        //console.log(data);	
        $('#screendtls').html(data);
      })
      .fail(function() {
        $('#screendtls').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      });
  }
  $(document).ready(function() { // load dynamic bootstrap model

    $(document).on('click', '#getUser', function(e) {

      e.preventDefault();

      $('#dynamic-content').html(''); // leave it blank before ajax call
      $('#modal-loader').show(); // load ajax loader

      $.ajax({
          url: 'add_screen_form.php',
          type: 'POST',
          data: 'id=' + <?php echo $_SESSION['theatre']; ?>,
          dataType: 'html'
        })
        .done(function(data) {
          console.log(data);
          $('#dynamic-content').html('');
          $('#dynamic-content').html(data); // load response 
          $('#modal-loader').hide(); // hide ajax loader	
        })
        .fail(function() {
          $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
        });

    });

  });
  $(document).on('click', '#savescreen', function() {
    name = $('#sname').val();
    seats = $('#sseats').val();
    charge = $('#scharge').val();
    if (name == "" && seats == "" && charge == "") {
      alert("Enter Correct Details");
    } else if (seats == "" && name == "") {
      alert("Enter Correct Details");
    } else if (charge == "" && name == "") {
      alert("Enter Correct Details");
    } else if (charge == "" && seats == "") {
      alert("Enter Correct Details");
    } else if (charge == "") {
      alert("Enter Correct Details");
    } else if (seats == "") {
      alert("Enter Correct Details");
    } else if (name == "") {
      alert("Enter Correct Details");
    } else {
      $.ajax({
          url: 'save_screen.php',
          type: 'POST',
          data: 'theatre=' + <?php echo $_SESSION['theatre']; ?> + '&name=' + name + '&charge=' + charge + '&seats=' + seats,
          dataType: 'html'
        })
        .done(function(data) {
          loadScreendtls();
          $('#view-modal').modal('toggle');
        })
        .fail(function() {
          loadScreendtls();
          $('#view-modal').modal('toggle');
        });
    }

  });

  $(document).on('click', '#getUser2', function(e) {

    screenid = $(this).data("id"); //screen id
  });
  $('#savetime').click(function() {
    s_time = $('#s_time').val();
    s_name = $('#s_name').val();
    if (s_time == "" && s_name == "0") {
      alert("Enter valid details");
    } else if (s_time == "") {
      alert("Enter valid details");
    } else if (s_name == "0") {
      alert("Enter valid details");
    } else {
      $.ajax({
          url: 'save_time.php',
          type: 'POST',
          data: 'screen=' + screenid + '&time=' + s_time + '&sname=' + s_name,
          dataType: 'html'
        })
        .done(function(data) {
          loadScreendtls();
          $('#s_time').val('');
          $('#s_name').val('0');
          $('#view-modal2').modal('toggle');
        })
        .fail(function() {
          loadScreendtls();
          $('#view-modal2').modal('toggle');
        });
    }

  });
</script>