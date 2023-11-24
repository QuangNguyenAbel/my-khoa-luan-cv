<header>
  <?php include 'head_f/header.php';
  include 'head_f/slide.php';
  ?>
  <script type="text/javascript">
    if (self === top) {
      var antiClickjack = document.getElementById("antiClickjack");
      antiClickjack.parentNode.removeChild(antiClickjack);
    } else {
      top.location = self.location;
    }
  </script>
</header>
<div class="container-fluid py-2">
  <div class="container">
    <ol class="breadcrumb p-0 mb-0">
      <li class="breadcrumb-item"><a href="<?php echo $_DOMAIN; ?>trangchu">Trang Chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $_DOMAIN; ?>lichhoc">Lịch Học</a>
      <li class="breadcrumb-item active" aria-current="page">Danh Sách Học Viên</li>
    </ol>
  </div>
</div>
<div class="container-fluid pb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="blog-post">
              <p></p>
              <h1></h1>
              <p></p>
              <h2 style="text-align:center"><span style="font-size:32px; color: red">
                  <strong>DANH SÁCH HỌC VIÊN</strong>
                </span>
              </h2>
              <br>
              <p>
              </p>
              <!-- popup -->
              <!-- bảng đăng ký -->
              <div class="table-responsive" style="font-size: 15px; text-align:center">
                <div class="card-body">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>STT </th>
                        <th>Mã Học Sinh</th>
                        <th>Tên Học Sinh</th>
                        <th>Lớp </th>
                        <th>Điểm</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_POST['edit_ds'])) {
                        $id_lop = $_POST['ds_id'];
                        $sql = "SELECT  * FROM hoc_sinh Where id_lop='$id_lop'";

                        if ($db->num_rows($sql)) {
                          $serial_number = 0;
                          foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                            $serial_number++;
                            echo '
							<tr>
                            <td> ' . $serial_number . '</td>
                            <td> HS-' . $row['id'] . '</td>
                            <td> ' . $row['TenHocSinh'] . '</td>
                            <td> ' . $row['Lop'] . '</td>
                            <td> ' . $row['Diem'] . '</td>
                          </tr>
							';
                          }
                        }
                      }
                      ?>
                      <?php
                      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                        echo '
          <div class="alert alert-success">
            ' . $_SESSION['success'] . '
          </div>';
                        unset($_SESSION['success']);
                      }
                      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                        echo '
          <div class="alert alert-danger">
            ' . $_SESSION['status'] . '
          </div>';
                        unset($_SESSION['status']);
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php
include 'head_f/footer.php';
?>
<script>
  $(document).ready(function() {
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 30,
      responsive: {
        0: {
          items: 1
        },
        1000: {
          items: 4
        }
      }
    });
  });
</script>
<script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>