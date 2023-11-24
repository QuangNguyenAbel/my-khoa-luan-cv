<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Tài Liệu</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM tai_lieu JOIN register on register.id=tai_lieu.id_nv 
				JOIN lop_hoc On lop_hoc.id_lop=tai_lieu.id_lop WHERE id_tailieu = '$id' ";
				if ($db->num_rows($sql)) {
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="tai_lieu_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id_tailieu'] ?>">
							<div class="form-group">
								<label>Tựa Đề</label>
								<input type="text" name="edit_tuade" value="<?php echo $row['TuaDe'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Tóm Tắt</label>
								<input type="text" name="edit_tomtat" value="<?php echo $row['TomTat'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Ngày Đăng</label>
								<input type="text" name="edit_ngay_dang" readonly value="<?php echo $row['NgayDang'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Mã Nhân Viên</label>
								<input type="text" name="edit_manv" readonly value="<?php echo $row['username'] ?>" class="form-control">
							</div>
							<button type="submit" name="update_btn" class="btn btn-primary"> Thay Đổi</button>
							<a href="<?php echo '' . $_DOMAIN . 'tailieu'; ?>" class="btn btn-danger"> Hủy </a>
						</form>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>