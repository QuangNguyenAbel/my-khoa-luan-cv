<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Sửa Phòng Học</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['edit_cv'])) {
				$id = $_POST['edit_id'];
				$sql = "SELECT * FROM `phong_hoc` JOIN tinh_trang_phong on phong_hoc.id_ttp = tinh_trang_phong.id_ttp
				 WHERE id_phong = '$id' ";
				if ($db->num_rows($sql)) {
					$serial_number = 0;
					foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
			?>
						<form action="phong_hoc_code.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $row['id_phong'] ?>">
							<div class="form-group">
								<label> Phòng </label>
								<input type="text" name="edit_ma_phong" value="<?php echo $row['Phong'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Sức Chứa </label>
								<input type="text" name="suc_chua" value="<?php echo $row['suc_chua'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Tình Trạng Phòng </label>
								<select name="ttp" class="form-control ">
									<?php
									echo '<option hidden value="' . $row['id_ttp'] . ' " > ' . $row['TinhTrangPhong'] . '  </option>';
									$sql = "SELECT * FROM tinh_trang_phong";
									if ($db->num_rows($sql)) {
										foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
											echo '<option value="' . $row['id_ttp'] . ' " > ' . $row['TinhTrangPhong'] . '  </option>';
										}
									}
									?>
								</select>
							</div>

							<button type="submit" name="update_cv" class="btn btn-primary">Thay Đổi</button>
							<a href="<?php echo '' . $_DOMAIN . 'phonghoc'; ?>" class="btn btn-danger"> Hủy </a>
						</form>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</div>