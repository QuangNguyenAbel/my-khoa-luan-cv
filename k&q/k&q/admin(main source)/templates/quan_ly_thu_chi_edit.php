<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa </h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM `thu_chi` 
				JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
				JOIN register On register.id=thu_chi.id_nv WHERE id_thuchi = '$id' ";
				if ($db->num_rows($sql)) {
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
						$thoigian = $row['NgayThang'];
						$date = date("d-m-Y", strtotime($thoigian));
						echo '<form action="quan_ly_thu_chi_code.php" method="POST">
						<input type="hidden" name="edit_id" value="' . $row['id_thuchi'] . '">
						<div class="form-group">
							<label> Ngày Tháng </label>
							<input type="text" name="ngay_thang" disabled value="' . $row['NgayThang'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Thu/Chi </label>
							<input type="text" name="thu_chi" disabled value="' . $row['ThuChi'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Loại </label>
							<input type="text" name="loai" readonly value="' . $row['TenLoai'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Nội Dung </label>
							<input type="text" name="noi_dung" value="' . $row['NoiDung'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Số Tiền Chi</label>
							<input type="text" name="tien_chi" value="' . $row['SoTienChi'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Ghi Chú</label>
							<input type="text" name="ghi_chu" value=" ' . $row['GhiChu'] . '" class="form-control">
						</div>
						<button type="submit" name="update_btn" class="btn btn-primary"> Sửa</button>
						<a href="' . $_DOMAIN . 'doanhthu" class="btn btn-danger"> Hủy </a>
					</form>';
					}
				}
			}
			?>
		</div>
	</div>
</div>