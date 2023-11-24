<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Hóa Đơn</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'thanhtoan_dshv'; ?>">Quay Lại</a>
    </div>
    <div class="table-responsive">
      <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT </th>
              <th>Mã Thu</th>
              <th>Tên Khách Hàng</th>
              <th>Ngày</th>
              <th>Số Tiền</th>
              <th>Nhân Viên Thu</th>
              <th>Mã Nhân Viên</th>
              <th>Nội Dung</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['xem_hd'])) {
              $id_kh = $_POST['id_kh'];
              $sql = "SELECT * FROM `hoa_don` 
              JOIN register On register.id = hoa_don.id_hs Where id_hs='$id_kh'";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $thoigian = $row['NgayThang'];
                  $date = date("d-m-Y", strtotime($thoigian));
                  $serial_number++;
                  echo '
              <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['MaThu'] . '</td>
                  <td> ' . $row['username'] . '</td>
                  <td> ' . $date . '</td>
                  <td> ' . number_format($row['SoTien']) . '</td>
                  <td> ' . $row['nv_thu'] . '</td>
                  <td> ' . $row['ma_nv'] . '</td>
                  <td> ' . $row['NoiDung'] . '</td>
                  <td>
                  <form action="' . $_DOMAIN . 'thanhtoan_ct_hoadon" method="POST">
                          <input type="hidden" name="id" value="' . $row['id_hd'] . '">
                          <input type="hidden" name="MaThu" value="' . $row['MaThu'] . '">
                          <input type="hidden" name="user_code" value="' . $row['user_code'] . '">
                          <input type="hidden" name="username" value="' . $row['username'] . '">
                          <button type="submit"  name="xem" class="btn btn-info">Xem Chi Tiết Hoá Đơn</button>
                        </form> 
                  </td>
                  <td>
                  <form action="xuatpdf.php" method="POST">
                          <input type="hidden" name="id_hd" value="' . $row['id_hd'] . '">
                          <input type="hidden" name="id_hv" value="' . $row['id'] . '">
                          <button type="submit"  name="xuat_phieu_thu" class="btn btn-success">Xuất</button>
                        </form> 
                  </td>
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