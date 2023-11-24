<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Tài Liệu</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_file'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM tai_lieu WHERE id_tailieu = '$id' ";
				if ($db->num_rows($sql)) {
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="tai_lieu_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id_tailieu'] ?>">
							<div class="form-group">
								<label>File</label>
								<input type="file" name="edit_image" required value="" class="form-control">
								<?php echo "anh_nhan_vien/" . $row['file'] . " " ?>
							</div>
							<button type="submit" name="update_file" class="btn btn-primary"> Thay Đổi</button>
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