<div class="container-fluid">
<?php 
if (isset($_POST['xem'])) {
    $MaThu = $_POST['MaThu'];
    $user_code = $_POST['user_code'];
    $username = $_POST['username'];
    echo'<h1 class="h3 mb-2 text-gray-800">Hóa Đơn '.$MaThu.' - Học Viên: '.$username.' -  Mã Học Viên: '.$user_code.'</h1>';
}
?>  
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
              <th>Lớp Học</th>
              <th>Học Phí Lớp</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['xem'])) {
              $id_hd = $_POST['id'];
              $sql = "SELECT * from hoa_don_ct 
              JOIN hoa_don On hoa_don.id_hd=hoa_don_ct.id_hoadon
              JOIN lop_hoc On lop_hoc.id_lop=hoa_don_ct.id_lop_ct_hd
              WHERE id_hoadon='$id_hd' ";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $thoigian = $row['NgayThang'];
                  $date = date("d-m-Y", strtotime($thoigian));
                  $serial_number++;
                  echo '
              <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['MaLop'] . '</td>
                  <td> ' . number_format($row['ct_hocphi']) . '</td>
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