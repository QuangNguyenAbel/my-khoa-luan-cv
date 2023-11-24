<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Thông Tin Website</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM thongtin_web WHERE stt = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="thong_tin_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['stt'] ?>">
							<div class="form-group">
								<label>Logo</label>
								<input type="file" name="image" value="<?php echo "<img src=anh_nhan_vien/" . $row['logo'] . " />" ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Giờ Làm</label>
								<input type="text" name="glam" value="<?php echo $row['GioLam'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Facebook</label>
								<input type="text" name="fbook" value="<?php echo $row['Facebook'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Youtube</label>
								<input type="text" name="ytube" value="<?php echo $row['Youtube'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Hotline</label>
								<input type="text" name="hline" value="<?php echo $row['Hotline'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Liên Hệ</label>
								<input name="lhe" id="lh" rows="6" value="<?php echo $row['Lienhe'] ?>" class="form-control"></textarea>
							</div>
							<div class="form-group" style="display: none">
								<label>Mã Nhân Viên</label>
								<input type="text" name="mnv" value="<?php echo $row['MaNhanVien'] ?>" class="form-control">
							</div>
							<button type="submit" name="update_btn" class="btn btn-primary"> Cập Nhật</button>
							<a href="<?php echo '' . $_DOMAIN . 'thongtin'; ?>" class="btn btn-danger"> Hủy</a>
						</form>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>
<script>
	CKEDITOR.replace('lh');
</script>