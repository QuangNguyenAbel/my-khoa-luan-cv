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
      <li class="breadcrumb-item active" aria-current="page">Khóa học</li>
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
                  <strong>ĐĂNG KÝ KHÓA HỌC</strong>
                </span>
              </h2>
              <br>
              <p>
              </p>
              <!-- popup -->
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
              <!-- bảng đăng ký -->
              <div class="card-body">
                <?php
                if (isset($_POST['edit_cv'])) {
                  $id = $_POST['edit_id'];
                  $sql = "SELECT lop_hoc.id, mon_hoc.ten_monhoc, lop_hoc.MaLop, nhan_vien.TenNhanVien, 
                  GioHoc, mon_hoc.hocphi, lich_hoc.NgayKhaiGiang,lich_hoc.NgayKetThuc, 
                  lich_hoc.handangky, lop_hoc.soluongdk, lop_hoc.si_so 
                  FROM `lop_hoc` 
                  JOIN lich_hoc on lop_hoc.id = lich_hoc.id_lop 
                  JOIN mon_hoc on mon_hoc.id = lop_hoc.id_mh 
                  JOIN nhan_vien on lop_hoc.id_gv = nhan_vien.id 
                  WHERE  lop_hoc.id = '$id' ";
                  if ($db->num_rows($sql)) {
                    $serial_number = 0;
                    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                ?>
                      <div class="table-responsive">
                        <div class="col-md-12">
                          <div class="card shadow-sm rounded">
                            <div class="card-body">
                              <form action="<?php echo $_DOMAIN; ?>khoahoc_dangky_tt" method="POST" enctype=multipart/form-data>
                                <div class="form-group">
                                  <table class="table table-bordered" style="font-size: 15px; text-align:center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <th>Tên Môn Học </th>
                                        <th>Mã Lớp</th>
                                        <th>Giảng viên</th>
                                        <th>Lịch Học</th>
                                        <th>Học Phí</th>
                                        <th>Ngày Khai Giảng</th>
                                        <th>Ngày Kết Thúc Khoá Học</th>
                                        <th>Hạn Đăng Ký</th>
                                        <th>số lượng</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td> <?php echo $row['ten_monhoc']; ?></td>
                                        <td> <?php echo $row['MaLop']; ?></td>
                                        <td> <?php echo $row['TenNhanVien']; ?></td>
                                        <td> <?php echo $row['GioHoc']; ?></td>
                                        <td> <?php echo number_format($row['hocphi']); ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($row['handangky'])); ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($row['NgayKhaiGiang'])); ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($row['NgayKetThuc'])); ?></td>
                                        <td><?php echo $row['si_so'] . '/' . $row['soluongdk'] ?></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <label for="hoten">Họ tên </label>
                                  <input type="text" class="form-control" name="hoten" id="hoten" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required>
                                  <label for="sdt">Số Điện Thoại</label>
                                  <input type="text" class="form-control" name="sdt" pattern="^(0[0-9]{9}|)$" required>
                                  <label for="email">Email</label>
                                  <input type="text" class="form-control" name="email" pattern="^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$" required>
                                  <label for="diachi">Địa Chỉ</label>
                                  <input type="text" class="form-control" name="diachi" required>
                                </div>
                                <label style="display: none">id_lop</label>
                                <input type="text" class="form-control" name="id_lopdk" style="display: none" readonly value="<?php echo $row['id']; ?>">
                                <label style="display: none">ma lop</label>
                                <input type="text" class="form-control" name="ma_lop" style="display: none" readonly value="<?php echo $row['ma_lop']; ?>">
                                <label style="display: none">Lớp Đăng Ký</label>
                                <input type="text" class="form-control" name="tenlop" style="display: none" readonly value="<?php echo $row['tenlop']; ?>">
                                <label style="display: none">Số Tiền</label>
                                <input style="display: none" type="text" class="form-control" name="hocphi" readonly value="<?php echo $row['hocphi']; ?>">
                                <label>Ngày Đăng Ký</label>
                                <input type="text" class="form-control" name="ngay_dk" readonly value=" <?php echo date("d-m-Y"); ?>">
                                <label style="display: none">Hạn Đăng Ký</label>
                                <input style="display: none" type="text" class="form-control" name="handk" readonly value="<?php echo date("d-m-Y", strtotime($row['handangky'])); ?>"><br>
                                <button type="submit" name="them_kh" class="btn btn-primary">Tiếp Tục</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
              </div>
            </div>
      <?php
                    }
                  }
                } ?>
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