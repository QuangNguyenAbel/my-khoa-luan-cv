<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Thu Chi</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'xemthongke'; ?>">Back</a>
    </div>
    <div class="table-responsive">
      <div class="card-body">
        <?php
        if (isset($_POST['nam_id'])) {
          $nam = $_POST['nam'];
          echo '<p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi năm  ' . $nam . ' </p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Thu</th>
              <th>Chi</th>
              <th>Luỹ Kế</th>
            </tr>
          </thead>
          <tbody>';
        }
        ?>
        <?php
        if (isset($_POST['nam_id'])) {
          $nam = $_POST['nam'];
          $sql = "SELECT * FROM thu_chi WHERE Nam = '$nam'";
          $tong_thu = 0;
          $tong_chi = 0;
          if ($db->num_rows($sql)) {
            $serial_number = 0;
            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              $serial_number++;
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
        <?php
        if (isset($_POST['nam_id'])) {
          $nam = $_POST['nam'];
          $sql = "SELECT * FROM thu_chi WHERE Nam = '$nam'";
          $tong_thu = 0;
          $tong_chi = 0;
          if ($db->num_rows($sql)) {
            $serial_number = 0;
            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
              $quy = $row['Quy'];
              $serial_number++;
              $thu = $row['SoTienThu'];
              $chi = $row['SoTienChi'];
              $tong_thu = $tong_thu + $thu;
              $tong_chi = $tong_chi + $chi;
              $luy_ke = $tong_thu - $tong_chi;
            }
            if ($quy == 4) {
              echo '<p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi quý 4 </p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Thu</th>
              <th>Chi</th>
              <th>Luỹ Kế</th>
            </tr>
          </thead>
          <tbody>';
            } elseif ($quy == 3) {
              echo '<p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi quý 3 </p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Thu</th>
              <th>Chi</th>
              <th>Luỹ Kế</th>
            </tr>
          </thead>
          <tbody>';
            } elseif ($quy == 2) {
              echo '<p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi quý 2 </p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Thu</th>
              <th>Chi</th>
              <th>Luỹ Kế</th>
            </tr>
          </thead>
          <tbody>';
            } else {
              echo '<p class="h3 mb-2 text-gray-800" align="center">Tổng thu chi quý 1 </p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Thu</th>
              <th>Chi</th>
              <th>Luỹ Kế</th>
            </tr>
          </thead>
          <tbody>';
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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tháng</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['nam_id'])) {
              $nam = $_POST['nam'];
              $sql = "SELECT distinct Thang FROM thu_chi WHERE Nam = '$nam'";
              if ($db->num_rows($sql)) {
                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                  echo '
                 <tr>
                  <td> ' . $row['Thang'] . '</td>
                  <td>
                    <form action="' . $_DOMAIN . 'xemthongke_thang" method="POST">
                      <input type="hidden" name="nam" value="' . $nam . '">
                      <input type="hidden" name="thang" value="' . $row['Thang'] . '">
                      <input type="submit" name="chart" value="Xem" class="btn btn-primary">
                    </form>
                  </td>
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