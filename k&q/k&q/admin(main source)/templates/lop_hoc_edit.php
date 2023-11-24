<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Lớp Học</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM lop_hoc WHERE id = '$id' ";
				if ($db->num_rows($sql)) {
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="lop_hoc_code.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label> Khóa Học </label>
								<input type="text" name="khoa_hoc" value="<?php echo $row['Khoa'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Mã Lớp </label>
								<input type="text" name="ma_lop" value="<?php echo $row['MaLop'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Tình Trạng</label>
								<select name="tinh_trang" class="form-control">
									<option value="<?php echo $row['TinhTrang']; ?>"> <?php echo $row['TinhTrang']; ?> </option>
									<option value="Đã Học Xong"> Đã Học Xong </option>
									<option value="Có Điểm Thi"> Có Điểm Thi </option>
									<option value="Đang Học"> Đang Học </option>
									<option value="Dự Kiến"> Dự Kiến </option>
								</select>
							</div>
				<?php
					}
				}
			}
				?>
				<div class="form-group">
					<label> Giáo Viên </label>
					<select name="id_edit" class="form-control ">
						<?php
						$gv = "SELECT * FROM nhan_vien Where ChucVu = 'Giáo Viên'";
						if ($db->num_rows($gv)) {
							$serial_number = 0;
							foreach ($db->fetch_assoc($gv, 0) as $key => $row) {
								echo '<option value="' . $row['id'] . '">  ' . $row['TenNhanVien'] . ' </option>';
							}
						}
						?>
					</select>
				</div>
				<button type="submit" name="update_lop" class="btn btn-primary"> Update</button>
				<a href="<?php echo '' . $_DOMAIN . 'lophoc'; ?>" class="btn btn-danger"> CANCEL </a>
						</form>
		</div>
	</div>
</div>