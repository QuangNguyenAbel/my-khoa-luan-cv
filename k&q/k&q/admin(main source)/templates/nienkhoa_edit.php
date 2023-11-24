<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Trạng thái Lớp</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_cv'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM `nien_khoa` JOIN trang_thai_lop On trang_thai_lop.id_ttl = nien_khoa.trangthai_nk
				 WHERE id_nk  = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
						$serial_number++;
						echo '<form action="nienkhoa_code.php" method="POST">
						<input type="hidden" name="edit_id" value="' . $row['id_nk'] . '">
						<div class="form-group">
							<label> Tên Niên Khoá </label>
							<input type="text" name="ten_nk" value="' . $row['ten_nk'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Năm </label>
							<input type="text" name="nam_nk" value="' . $row['nam_nk'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Bắt Đầu Đăng Ký </label>
							<input type="date" name="NgayChoDangKy" value="' . $row['NgayChoDangKy'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Hạn Đăng Ký </label>
							<input type="date" name="HanDangKy" value="' . $row['HanDangKy'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Ngày Khai Giảng	</label>
							<input type="date" name="NgayKhaiGiang" value="' . $row['NgayKhaiGiang'] . '" class="form-control">
						</div>
						<div class="form-group">
							<label> Ngày Kết Thúc</label>
							<input type="date" name="NgayKetThuc" value="' . $row['NgayKetThuc'] . '" class="form-control">
						</div>';
						echo '<div class="form-group">
									<label> Trạng Thái Niên Khoá </label>
									<select name="tt_nk" class="form-control ">
									<option value="' . $row['id_ttl'] . '">' . $row['ten_ttl'] . '</option>';
						$sql1 = "SELECT * FROM trang_thai_lop where id_ttl in (1,2,4,7)";
						if ($db->num_rows($sql)) {
							foreach ($db->fetch_assoc($sql1, 0) as $key => $row) {
								echo '<option value="' . $row['id_ttl'] . '">' . $row['ten_ttl'] . '</option>';
							}
						}
						echo '
						</select>
                                    </div>
						<button type="submit" name="update_cv" class="btn btn-primary"> Thay Đổi</button>
						<a href="' . $_DOMAIN . 'nienkhoa" class="btn btn-danger"> Hủy </a>
					</form>';
					}
				}
			}
			?>
		</div>
	</div>
</div>