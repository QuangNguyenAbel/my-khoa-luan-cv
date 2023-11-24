<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Thêm Học Sinh Vào Lớp</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['add_hs'])) {
				$id = $_POST['id_hs'];
				$sql = "SELECT * FROM khach_hang_dang_ky WHERE id = '$id' ";
				if ($db->num_rows($sql)) {
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="khach_hang_code.php" method="POST">
							<div class="form-group" style="display: none">
								<label>id kh</label>
								<input type="text" name="id_kh" value="<?php echo $row['id'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Họ Tên</label>
								<input type="text" name="hoten" value="<?php echo $row['HoTen'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>email</label>
								<input type="email" name="email" value="<?php echo $row['Email'] ?>" class="form-control">
							</div>

							<div class="form-group">
								<label>SĐT</label>
								<input type="text" name="sdt" value="<?php echo $row['Sdt'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Địa Chỉ</label>
								<input type="text" name="diachi" value="<?php echo $row['DiaChi'] ?>" class="form-control">
							</div>

							<div class="form-group">
								<label>Mã Lớp</label>
								<input type="text" name="ma_lop" value="<?php echo $row['ma_lop']; ?>" readonly class="form-control">
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Thanh Toán</label>
								<input type="text" name="" value="<?php
																	if ($row['ThanhToan'] == 0) {
																		echo '❌';
																	} else {
																		echo '✔';
																	}
																	?>" readonly class="form-control">
							</div>
							<button type="submit" name="add_hs" class="btn btn-primary"> Thêm</button>
							<a href="<?php echo '' . $_DOMAIN . 'quanlykhoahoc'; ?>" class="btn btn-danger"> Hủy </a>
						</form>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>