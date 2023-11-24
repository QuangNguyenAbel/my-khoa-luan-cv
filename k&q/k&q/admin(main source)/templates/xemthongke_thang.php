<?php
if (isset($_POST['chart'])) {
  $nam = $_POST['nam'];
  $thang = $_POST['thang'];
  $sql = "SELECT TenLoai, sum(LuyKe) as LuyKe,Nam,Thang from thu_chi 
  JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai
  WHERE Nam ='$nam' AND Thang='$thang' 
  group by TenLoai";
  $chart_data = '';
  if ($db->num_rows($sql)) {
    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
      $chart_data .= "{ Loai:'" . $row["TenLoai"] . "', LuyKe:" . $row["LuyKe"] . ", }, ";
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
      <form action="<?php echo '' . $_DOMAIN . 'xemthongke_ngay'; ?>" method="POST">
        <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'xemthongke'; ?>">Quay Lại</a>
        <?php
        if (isset($_POST['chart'])) {
        ?>
          <input type="hidden" name="nam" value="<?php echo $_POST['nam']; ?>">
          <input type="hidden" name="thang" value="<?php echo $_POST['thang']; ?>">
          <button type="submit" name="date" class="btn btn-primary"> Thu Chi Theo Ngày </button>
      </form>
      <br>
      <form action="xuatpdf.php" method="POST">
        <input type="hidden" name="nam" value="<?php echo $_POST['nam']; ?>">
        <input type="hidden" name="thang" value="<?php echo $_POST['thang']; ?>">
        <button type="submit" name="xuat_pdf_loai" class="btn btn-primary"> Xuất PDF </button>
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
            if (isset($_POST['chart'])) {
              $nam = $_POST['nam'];
              $thang = $_POST['thang'];
              $query = "SELECT * FROM thu_chi WHERE Nam = '$nam' AND Thang ='$thang'";
              $tong_thu = 0;
              $tong_chi = 0;
              if ($db->num_rows($query)) {
                foreach ($db->fetch_assoc($query, 0) as $key => $row) {
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
        <p class="h3 mb-2 text-gray-800" align="center"> Số Tiền Dư</p>
        <?php
        if (isset($_POST['chart'])) {
          $nam = $_POST['nam'];
          $thang = $_POST['thang'];
          $query1 = "SELECT * FROM thu_chi WHERE Nam = '$nam' AND Thang <='$thang'";
          $query2 = "SELECT * FROM thu_chi WHERE Nam < '$nam' ";
          $luy_ke = 0;
          $luy_ke_nam = 0;
          if ($db->num_rows($query2)) {
            foreach ($db->fetch_assoc($query2, 0) as $key => $row) {
              $luy_ke_nam = $luy_ke_nam + $row['LuyKe'];
            }
          }
          foreach ($db->fetch_assoc($query1, 0) as $key => $row) {
            $luy_ke = $luy_ke + $row['LuyKe'];
          }
          $so_du = $luy_ke_nam + $luy_ke;
          echo '<p class="h3 mb-2 text-gray-800" align="center">' . number_format($so_du) . '</p>';
        }
        ?>
        <div id="chart">
        </div>
        <br>
        <p class="h3 mb-2 text-gray-800" align="center"> Thống kê thu chi theo loại</p>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Loại</th>
              <th>Số Tiền</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['chart'])) {
              $nam = $_POST['nam'];
              $thang = $_POST['thang'];
              $sql = "SELECT TenLoai, sum(LuyKe) as LuyKe,Nam,Thang from thu_chi 
              JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai
              WHERE Nam ='$nam' AND Thang='$thang' group by id_loaithuchi";
              if ($db->num_rows($sql)) {
                $serial_number = 0;
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  $loai = $row['TenLoai'];
                  $luy_ke = $row['LuyKe'];
                  echo '
                <tr>
                  <td>' . $loai . '</td>
				          <td>' . number_format($luy_ke) . '</td>
                </tr>
		';
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
      xkey: 'Loai',
      ykeys: ['LuyKe'],
      labels: ['Số Tiền'],
      hideHover: 'auto',
      barColors: ['green', 'red'],
      stacked: true
    });
  </script>
  