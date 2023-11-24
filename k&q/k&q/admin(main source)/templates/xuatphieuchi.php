<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Xuất Phiếu Chi</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'doanhthu'; ?>">Back</a>
    </div>
    <div class="table-responsive">
      <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT </th>
              <th>Ngày Tháng</th>
              <th>Loại</th>
              <th>Người</th>
              <th>Nội Dung</th>
              <th>Số Tiền</th>
              <th>Xuất Phiếu Thu</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT  * FROM thu_chi 
            JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
            JOIN register On register.id=thu_chi.id_nv
               Where ThuChi ='Chi'";
            if ($db->num_rows($query)) {
              $serial_number = 0;
              foreach ($db->fetch_assoc($query, 0) as $key => $row) {
                $serial_number++;
                echo '
                <tr>
                  <td>' . $serial_number . '</td>
				  <td>' . $row['NgayThang'] . '</td>
				  <td>' . $row['TenLoai'] . '</td>
				  <td>' . $row['username'] . '</td>
				  <td>' . $row['NoiDung'] . '</td>
				  <td>' . number_format($row['SoTienChi']) . '</td>
				  <td>
                    <form action="xuatpdf.php" method="POST">
                      <input type="hidden" name="id_chi" value="' . $row['id_thuchi'] . '">
                      <input type="submit" name="xuat_phieu_chi" value="Xuất Phiếu Chi" class="btn btn-primary">
                    </form>
                  </td>
                </tr>
		';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>