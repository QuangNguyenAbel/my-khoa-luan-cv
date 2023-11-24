<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Thêm Học Viên Mới</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['them_cv'])) {
				$id = $_POST['them_id'];
				$sql = "SELECT * FROM lop_hoc WHERE id_lop = '$id' ";
				if ($db->num_rows($sql)) {
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="them_lop_hoc_dang_ky_code.php" method="POST">
							<div class="form-group">
								<label>Lớp</label>
								<input type="hidden" readonly name="lop" value="<?php echo $id ?>" class="form-control" class="form-control">
								<input type="text" readonly name="" value="<?php echo $row['MaLop'] ?>" class="form-control" class="form-control">
							</div>
							<div class="form-group">
								<label>Mã Học Viên</label>
								<input type="text" name="ma_hv" value="" class="form-control" required>
							</div>
							</br>
							<button type="submit" name="add_hv" class="btn btn-primary">Thêm</button>
				<?php
					}
				}
			}
				?>
				<a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'khoahoc'; ?>">Quay Lại</a>
						</form>
		</div>
	</div>
</div>