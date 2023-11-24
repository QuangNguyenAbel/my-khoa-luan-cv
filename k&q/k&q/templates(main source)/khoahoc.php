<header>
  <style>
    #a {
      background-color: #4CAF50;
      /* Green */
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    #a {
      background-color: white;
      color: black;
      border: 2px solid red;
    }

    #a:hover {
      background-color: #BA2528;
      color: white;
    }

    th,
    td {
      text-align: center;
    }
  </style>
  <?php

use Dompdf\Css\Color;

 include 'head_f/header.php';
  include 'head_f/slide.php';

  if (isset($_POST['xem'])) {
    $id = $_POST['id'];
    $ten = $_POST['ten'];
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
      <li class="breadcrumb-item"><a href="<?php echo $_DOMAIN; ?>bo_mon">Môn Học</a></li>
      <li class="breadcrumb-item active" aria-current="page">Khóa học <?php echo $ten; ?></li>
    </ol>
  </div>
</div>
<div class="container-fluid pb-4">
  <div class="container">
    <div class="row">
      <div class="">
        <div class="card">
          <div class="card-body">
            <div class="blog-post">
              <p></p>
              <h1></h1>
              <p></p>
              <h2 style="text-align:center"><span style="font-size:32px; color: red">
                  <strong>Khoá Học <?php echo $ten; ?></strong>
                </span>
              </h2>
              <br>
              <p>
              </p>
              <!-- popup -->
              <!-- bảng đăng ký -->
              <div class="card-body" style="font-size: 15px; text-align:center">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>STT </th>
                        <th>Tên Môn Học </th>
                        <th>Mã Lớp</th>
                        <th>Giảng viên</th>
                        <th>Lịch Học</th>
                        <th>Học Phí</th>
                        <th>Ngày Khai Giảng</th>
                        <th>Ngày Kết Thúc KH</th>
                        <th>Hạn Đăng Ký</th>
                        <th>số lượng</th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql   = "SELECT  * 
                      FROM `lop_hoc` 
                      Left outer JOIN lich_hoc on lop_hoc.id_lop = lich_hoc.id_lop 
                      JOIN mon_hoc on mon_hoc.id_mon = lop_hoc.id_mh 
                      JOIN register on lop_hoc.id_gv = register.id 
                      WHERE lop_hoc.trangthailop = 0 and mon_hoc.type = '$id'";
                      if ($db->num_rows($sql)) {
                        $serial_number = 0;
                        foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                          $serial_number++;
                      ?>
                          <tr>
                            <td> <?php echo $serial_number; ?></td>
                            <td> <?php echo $row['ten_monhoc']; ?></td>
                            <td> <?php echo $row['MaLop']; ?></td>
                            <td> <?php echo $row['username']; ?></td>
                            <td> <?php echo $row['GioHoc']; ?></td>
                            <td> <?php echo number_format($row['hocphi']); ?></td>
                            <td><?php echo date("d-m-Y", strtotime($row['handangky'])); ?></td>
                            <td><?php echo date("d-m-Y", strtotime($row['NgayKhaiGiang'])); ?></td>
                            <td><?php echo date("d-m-Y", strtotime($row['NgayKetThuc'])); ?></td>
                            <td><?php echo $row['si_so'] . '/' . $row['soluongdk'] ?></td>
                            <td style="display: none"><?php echo $row['id'] ?></td>
                            <td>
                              <form action="<?php echo $_DOMAIN; ?>khoahoc_dangky" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                <?php
                                if ($row['si_so'] < $row['soluongdk']) {
                                  echo '<button type="submit" name="edit_cv" class="btn btn-success"> Đăng Ký</button>';
                                } else {
                                  echo '<button type="submit" name="edit_cv" disabled class="btn btn-success"> Đăng Ký</button>';
                                }
                                ?>
                              </form>
                          </tr>
                    <?php
                        }
                      } else {
                        echo '<b style="color:#BA2528;font-size:30px" >Khoá học chưa được cập nhật</b>';
                      }
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