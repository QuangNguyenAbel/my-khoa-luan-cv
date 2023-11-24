<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Tin Tức</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_img'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM tin_tuc WHERE id_tt = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="tin_tuc_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id_tt'] ?>">
							<div class="form-group">
								<label>Hình Ảnh</label>
								<br>
								<input type="file" name="edit_image" value="" class="form-control" required>
								
								<br><img src=anh_nhan_vien/<?php echo $row['img_tt'] ?> width="400px" height="300"/> </input>
							</div>
							<button type="submit" name="update_img" class="btn btn-primary"> Thay đổi</button>
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