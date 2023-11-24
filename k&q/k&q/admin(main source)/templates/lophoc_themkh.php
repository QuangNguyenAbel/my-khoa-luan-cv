<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Thêm Học Viên Mới</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['them_cv'])) {
				$id = $_POST['them_id'];
				$sql = "SELECT * FROM lop_hoc WHERE id_lop = '$id' ";
				if ($db->num_rows($sql)) {
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="lop_hoc_code.php" method="POST">
							<div class="form-group">
								<label>Lớp</label>
								<input type="hidden" readonly name="lop" value="<?php echo $id ?>" class="form-control" class="form-control">
								<input type="text" readonly name="" value="<?php echo $row['MaLop'] ?>" class="form-control" class="form-control">
							</div>
							<div class="form-group">
								<label>Họ Tên</label>
								<input type="text" name="ten" value="" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Địa Chỉ</label>
								<input type="text" name="dc" value="" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Số điện thoại</label>
								<input type="text" name="sdt" value="" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Ngày sinh</label>
								<input type="date" name="ns" value="" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Email Đăng Nhập</label>
								<input type="email" name="email" value="" class="form-control" required>
							</div>
							<div><b style="text-align: center;">Lưu ý: Sau khi tạo tài khoản mật khẩu mặc định của học viên sẽ là <u>12345</u></b></div>
							</br>
							<button type="submit" name="add_hv" class="btn btn-primary"> Thêm</button>
				<?php
					}
				}
			}
				?>
				<a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'lophoc'; ?>">Quay Lại</a>
						</form>
		</div>
	</div>
</div>