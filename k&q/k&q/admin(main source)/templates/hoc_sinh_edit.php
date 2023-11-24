<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Học Viên</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM register Left join trinh_do
				on register.granduate=trinh_do.id_trinhdo WHERE id = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="hoc_sinh_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label>Mã Nhân Viên</label>
								<input type="text" name="ma_nhan_vien" value="<?php echo $row['user_code']; ?> " class="form-control">
							</div>
							<div class="form-group">
								<label>Tên Nhân Viên</label>
								<input type="text" name="ten_nhan_vien" value="<?php echo $row['username'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Địa Chỉ</label>
								<input type="text" name="dia_chi" value="<?php echo $row['address'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Số Điện Thoại</label>
								<input type="text" name="sdt" value="<?php echo $row['phone'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" value="<?php echo $row['email'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Ngày Sinh</label>
								<input type="date" name="ngay_sinh" value="<?php echo $row['birth'] ?>" class="form-control">
							</div>

							<div class="form-group">
								<label> Trình Độ Chuyên Môn </label>
								<select name="trinh_do" class="form-control ">
									<option value="<?php echo $row['granduate'] ?>"><?php echo $row['TrinhDo'] ?> </option>
									<?php
									$sql = "SELECT * FROM trinh_do";
									if ($db->num_rows($sql)) { {
											foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
									?>
												<option value="<?php echo $row['id_trinhdo'] ?>"> <?php echo $row['TrinhDo'] ?> </option>
											<?php
											}
											?>
								</select>
							</div>
					<?php
										}
									} else {
										echo "No Data Available";
									}
					?>
					<button type="submit" name="update_btn" class="btn btn-primary"> Thay Đổi</button>
					<a href="<?php echo '' . $_DOMAIN . 'hocvien'; ?>" class="btn btn-danger"> Hủy </a>
						</form>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>