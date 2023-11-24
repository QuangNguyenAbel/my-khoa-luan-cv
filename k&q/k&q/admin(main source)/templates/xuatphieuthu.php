<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Xuất Phiếu Thu </h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'quanlythuchi'; ?>">Back</a>
    </div>
    <div class="table-responsive">
      <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT </th>
              <th>Mã Thu </th>
              <th>Ngày Tháng</th>
              <th>Khách Hàng</th>
              <th>SĐT</th>
              <th>Email</th>
              <th>Lớp</th>
              <th>Số Tiền</th>
              <th>Nội Dung</th>
              <th>Người Thu</th>
              <th>Xuất Phiếu Thu</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "
         SELECT thu_tien_hoc.id, thu_tien_hoc.MaThu, thu_tien_hoc.NgayThang, thu_tien_hoc.SoTien, 
thu_tien_hoc.NoiDung, thu_tien_hoc.NguoiThu, thu_tien_hoc.TenKh, thu_tien_hoc.id_kh, khach_hang_dang_ky.Sdt,
khach_hang_dang_ky.Email, khach_hang_dang_ky.ma_lop
              FROM thu_tien_hoc 
              INNER JOIN khach_hang_dang_ky on thu_tien_hoc.id_kh = khach_hang_dang_ky.id 
          ";
            if ($db->num_rows($query)) {
              $serial_number = 0;
              foreach ($db->fetch_assoc($query, 0) as $key => $row) {
                $serial_number++;
                echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['MaThu'] . '</td>
<td> ' . $row['NgayThang'] . '</td>
                  <td> ' . $row['TenKh'] . '</td>
                  <td> ' . $row['Sdt'] . '</td>
<td> ' . $row['Email'] . '</td>
                 <td> ' . $row['ma_lop'] . '</td>
				 <td> ' . number_format($row['SoTien']) . '</td>
                  <td> ' . $row['NoiDung'] . '</td>
<td> ' . $row['NguoiThu'] . '</td>
                  <td>
                    <form action="xuatpdf.php" method="POST">
                      <input type="hidden" name="id_thu" value="' . $row['id'] . '">
                      <input type="submit" name="xuat_phieu_thu" value="Xuất Phiếu Thu" class="btn btn-primary">
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