<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Giới Thiệu Web</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM gioi_thieu WHERE id = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="gioi_thieu_code.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="modal-body">
								<div class="form-group">
									<label for="ten_chuc_vu">Content</label>
									<textarea class="form-control" id="ct" name="content" rows="4" cols="50"
									value="<?php echo $row['Content']; ?>" required></textarea>
								</div>
							</div>
							<button type="submit" name="update_btn" class="btn btn-primary"> Thay Đổi</button>
							<a href="<?php echo '' . $_DOMAIN . 'gioithieu'; ?>" class="btn btn-danger"> Hủy </a>
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
	CKEDITOR.replace('ct');
</script>