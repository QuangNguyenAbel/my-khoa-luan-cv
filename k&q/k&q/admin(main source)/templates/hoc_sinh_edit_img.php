<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Học Viên</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_img'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM register WHERE id = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="hoc_sinh_code.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
							<div class="form-group">
								<label>Hình Ảnh</label>
								<input type="file" required name="image" value="<?php echo "<img src=anh_nhan_vien/" . $row['image'] . " />" ?>" class="form-control">
								<img src=anh_nhan_vien/<?php echo $row['img'] ?> height="400" width="300"/></input>
							</div>
							<button type="submit" name="update_img" class="btn btn-primary"> Thay Đổi</button>
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