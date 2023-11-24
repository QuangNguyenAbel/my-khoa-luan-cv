<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Khách Hàng</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM khach_hang_dang_ky WHERE id = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="khach_hang_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label>Họ Tên</label>
								<input type="text" name="edit_hoten" value="<?php echo $row['HoTen'] ?>" class="form-control">
								<label>Lớp Học</label>
								<input type="text" name="edit_lophoc" value="<?php echo $row['ma_lop'] ?>" class="form-control" readonly>
								<label>Số Điện Thoại</label>
								<input type="text" name="edit_sdt" value="<?php echo $row['Sdt'] ?>" class="form-control">
								<label>Email</label>
								<input type="text" name="edit_email" value="<?php echo $row['Email'] ?>" class="form-control">
								<label>Địa Chỉ</label>
								<input type="text" name="edit_diachi" value="<?php echo $row['DiaChi'] ?>" class="form-control">
								<label>Thanh Toán</label>
								<select class="form-control" name="edit_thanhtoan">
									<option value="<?php echo $row['ThanhToan'] ?>"><?php
																					if ($row['ThanhToan'] == 0) {
																						echo '❌';
																					} else {
																						echo '✔';
																					}
																					?></option>
									<option value="0">✔</option>
									<option value="1">❌</option>
								</select>
							</div>
							<button type="submit" name="update_btn" class="btn btn-primary"> Thay Đổi</button>
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