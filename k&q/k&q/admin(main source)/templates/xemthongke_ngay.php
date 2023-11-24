<?php
if (isset($_POST['date'])) {
  $nam = $_POST['nam'];
  $thang = $_POST['thang'];
  $query = "SELECT * FROM thu_chi WHERE Nam = '$nam' AND Thang ='$thang'";
  $chart_data = '';
  if ($db->num_rows($query)) {
    foreach ($db->fetch_assoc($query, 0) as $key => $row) {
      $chart_data .= "{ NgayThang:'" . date("d-m-Y", strtotime($row["NgayThang"])) . "', SoTienThu:" . $row["SoTienThu"] . ", SoTienChi:" . $row["SoTienChi"] . ", }, ";
    }
  }
  $chart_data = substr($chart_data, 0, -2);
}
?>
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Thu Chi</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <form action="xuatpdf.php" method="POST">
        <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'xemthongke'; ?>">Back</a>
        <?php
        if (isset($_POST['date'])) {
        ?>
          <input type="hidden" name="nam" value="<?php echo $_POST['nam']; ?>">
          <input type="hidden" name="thang" value="<?php echo $_POST['thang']; ?>">
          <button type="submit" name="xuat_pdf_ngay" class="btn btn-primary"> Xuất PDF </button>
        <?php
        }
        ?>
      </form>
    </div>
    <div class="table-responsive">
      <div class="card-body">
        <p class="h3 mb-2 text-gray-800" align="center"> Thu chi tháng <?php echo $thang; ?> năm <?php echo $nam; ?></p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Thu</th>
              <th>Chi</th>
              <th>Luỹ Kế</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['date'])) {
              $nam = $_POST['nam'];
              $thang = $_POST['thang'];
              $sql = "SELECT * FROM thu_chi WHERE Nam = '$nam' AND Thang ='$thang'";
              $tong_thu = 0;
              $tong_chi = 0;
              if ($db->num_rows($sql)) {
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $thu = $row['SoTienThu'];
                  $chi = $row['SoTienChi'];
                  $tong_thu = $tong_thu + $thu;
                  $tong_chi = $tong_chi + $chi;
                  $luy_ke = $tong_thu - $tong_chi;
                }
                echo '
                <tr>
              <td> ' . number_format($tong_thu) . ' </td>
              <td> ' . number_format($tong_chi) . '</td>
              <td> ' . number_format($luy_ke) . '</td>
            </tr>
		';
              }
            }
            ?>
          </tbody>
        </table>
        <br>
        <div id="chart">
        </div>
        <p class="h3 mb-2 text-gray-800" align="center"> Thống kê thu chi từng ngày</p>
        <br>
        <p class="h3 mb-2 text-gray-800"> Số Tiền Chi</p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Ngày Tháng</th>
              <th>Loại</th>
              <th>Người</th>
              <th>Nội Dung</th>
              <th>Chi</th>
              <th>Ghi Chú</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['date'])) {
              $nam = $_POST['nam'];
              $thang = $_POST['thang'];
              $query = "SELECT * from thu_chi 
              JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
              JOIN register On register.id=thu_chi.id_nv
              WHERE Nam ='$nam' AND Thang='$thang' AND ThuChi ='Chi'";
              $serial_number = 0;
              if ($db->num_rows($query)) {
                foreach ($db->fetch_assoc($query, 0) as $key => $row) {
                  $serial_number++;
                  $thoigian = $row['NgayThang'];
                  $so_tien_thu = $row['SoTienThu'];
                  $tien_thu = number_format($so_tien_thu);
                  $so_tien_chi = $row['SoTienChi'];
                  $tien_chi = number_format($so_tien_chi);
                  $date = date("d-m-Y", strtotime($thoigian));
                  echo '<tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $date . '</td>
                  <td> ' . $row['TenLoai'] . '</td>
                  <td> ' . $row['username'] . '</td>
                  <td> ' . $row['NoiDung'] . '</td>
                  <td> ' . $tien_thu . '</td>
                  <td> ' . $row['GhiChu'] . '</td>

                </tr>';
                }
              }
            }
            ?>
          </tbody>
        </table>
        <br>
        <br>
        <p class="h3 mb-2 text-gray-800"> Số Tiền Thu</p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Ngày Tháng</th>
              <th>Loại</th>
              <th>Người</th>
              <th>Nội Dung</th>
              <th>Thu</th>
              <th>Ghi Chú</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['date'])) {
              $nam = $_POST['nam'];
              $thang = $_POST['thang'];
              $query = "SELECT * from thu_chi 
              JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
              JOIN register On register.id=thu_chi.id_nv
              WHERE Nam ='$nam' AND Thang='$thang' AND ThuChi ='Thu'";
              $serial_number = 0;
              if ($db->num_rows($query)) {
                foreach ($db->fetch_assoc($query, 0) as $key => $row) {
                  $serial_number++;
                  $thoigian = $row['NgayThang'];
                  $so_tien_thu = $row['SoTienThu'];
                  $tien_thu = number_format($so_tien_thu);
                  $so_tien_chi = $row['SoTienChi'];
                  $tien_chi = number_format($so_tien_chi);
                  $date = date("d-m-Y", strtotime($thoigian));
                  echo '<tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $date . '</td>
                  <td> ' . $row['Loai'] . '</td>
				<td> ' . $row['username'] . '</td>
				<td> ' . $row['NoiDung'] . '</td>
                  <td> ' . $tien_thu . '</td>
                  <td> ' . $row['GhiChu'] . '</td>
                </tr>';
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    Morris.Bar({
      element: 'chart',
      data: [<?php echo $chart_data; ?>],
      xkey: 'NgayThang',
      ykeys: ['SoTienThu', 'SoTienChi'],
      labels: ['Số Tiền Thu', 'Số Tiền Chi'],
      hideHover: 'auto',
      barColors: ['green', 'red'],
      stacked: true
    });
  </script>