<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Mở Lớp</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['molop'])) {
				$id = $_POST['id_molop'];
				$sql = "SELECT * FROM mon_hoc WHERE id = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="them_lop_hoc_dang_ky_code.php" method="POST">
							<div class="form-group" style="display: none">
								<label>Mã Lớp</label>
								<input type="text" name="id" value="<?php echo $row['id']; ?>" readonly class="form-control">
							</div>
							<div class="form-group">
								<label>Mã Lớp</label>
								<input type="text" name="ma_lop" value="<?php echo $row['ma_lop']; ?>" readonly class="form-control">
							</div>
							<div class="form-group">
								<label>Môn Học</label>
								<input type="text" name="mon_hoc" value="<?php echo $row['tenmh']; ?>" readonly class="form-control">
							</div>
							<div class="form-group">
								<label>Khóa Học</label>
								<input type="text" name="khoa_hoc" class="form-control" required="">
							</div>
							<?php
							$sql = "SELECT * FROM nhan_vien Where ChucVu = 'Giáo Viên'";
							?>
							<div class="form-group">
								<label> Giáo Viên </label>
								<select name="id_gv" class="form-control ">
									<?php
									if ($db->num_rows($sql)) {
										$serial_number = 0;
										foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
									?>
											<option value="<?php echo $row['id'] ?>"> <?php echo $row['TenNhanVien'] ?> </option>
										<?php
										}
										?>
								</select>
							</div>
						<?php
									} else {
										echo "No Data Available";
									}
						?>
						<button type="submit" name="add_lop" class="btn btn-primary"> Xác Nhận</button>

						<a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'quanlykhoahoc'; ?>">Quay Lại</a>
						</form>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>