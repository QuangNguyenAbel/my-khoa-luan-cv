<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Tin Tức</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM tin_tuc WHERE id_tt = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="tin_tuc_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id_tt'] ?>">
							<div class="form-group">
								<label>Tựa Đề</label>
								<input type="text" name="edit_tuade" value="<?php echo $row['TuaDe'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Ảnh</label><br>
									<?php echo '<img src="anh_nhan_vien/' . $row['img_tt'] . '" width="400px;" height="300px" alt="Image">' ?>
							</div>
							<div class="form-group">
								<label>Tin Tức</label>
								<textarea name="edit_tintuc" id="tt" rows="15" class="form-control"><?php echo $row['TinTuc'] ?></textarea>
							</div>
							<div class="form-group">
								<label>URL</label>
								<input type="text" name="edit_url" value="<?php echo $row['url'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Tên URL</label>
								<input type="text" name="edit_ten_url" value="<?php echo $row['ten_url'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Ngày Đăng</label>
								<input type="text" name="edit_ngay_dang" readonly value="<?php echo $row['NgayDang'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Nhân Viên Đăng Tin</label>
								<input type="text" name="edit_manv" readonly value="<?php echo $row['id_nv'] ?>" class="form-control">
							</div>
							<button type="submit" name="update_btn" class="btn btn-primary"> Thay đổi</button>
							<a href="<?php echo '' . $_DOMAIN . 'tintuc'; ?>" class="btn btn-danger"> Hủy </a>
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
	CKEDITOR.replace('tt');
</script>