<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Lịch Học</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM lich_hoc WHERE id = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="lich_hoc_code.php" method="POST" enctype=multipart/form-data>
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label> Lớp </label>
								<input type="text" name="edit_lophoc" readonly value="<?php echo $row['Lop'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Giảng Viên </label>
								<input type="text" name="edit_giangvien" value="<?php echo $row['GiaoVien'] ?>" readonly class="form-control">
							</div>
							<div class="form-group">
								<label> Giờ Học </label>
								<input type="text" name="edit_giohoc" value="<?php echo $row['GioHoc'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Ngày Khai Giảng </label>
								<input type="date" name="edit_ngaykhaigiang" value="<?php echo $row['NgayKhaiGiang'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Ngày Kết Thúc </label>
								<input type="date" name="edit_ngayketthuc" value="<?php echo $row['NgayKetThuc'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Ghi Chú </label>
								<input type="text" name="edit_ghichu" value="<?php echo $row['GhiChu'] ?>" class="form-control"> <br>
								<div class="form-group">
									<label> Phòng Học </label>
									<select name="edit_phonghoc" class="form-control ">
										<?php
										$gv = "SELECT * FROM phong_hoc ";
										if ($db->num_rows($gv)) {
											$serial_number = 0;
											foreach ($db->fetch_assoc($gv, 0) as $key => $row) {
												echo '<option value="' . $row['MaPhong'] . '">  ' . $row['MaPhong'] . ' </option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							<button type="submit" name="update_btn" class="btn btn-primary"> Update</button>
							<a href="<?php echo '' . $_DOMAIN . 'lichhoc'; ?>" class="btn btn-danger"> CANCEL </a>
						</form>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>