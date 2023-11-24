<div class="container-fluid">
	<!--DataTables -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Mở Lớp Thi Lại</h6>
		</div>
		<div class="card-body">
			<?php
			if (isset($_POST['molop'])) {
				$id_mon = $_POST['id_mon'];
                $dem = $_POST['dem'];
			?>
						<form action="khoahoc_thilai_code.php" method="POST">
							<input type="" name="id_mh" value="<?php echo $id_mon?>">
                            <?php
                            $sql1 = "SELECT * FROM `chi_tiet_lop_hoc` 
                            JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
                            JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
                            JOIN register on register.id=chi_tiet_lop_hoc.id_hs
                            WHERE chi_tiet_lop_hoc.thi_lai=1 and lop_hoc.id_mh=$id_mon and co_lop_thilai = 0 order by MaLop asc";
                            if ($db->num_rows($sql1)) {
                                foreach ($db->fetch_assoc($sql1, 0) as $key => $row) {
                                echo '
							<input type="hidden" name="Khoa" value="'.$row['Khoa'].'">
							<input type="hidden" name="id_hs[]" value="'.$row['id_hs'].'">
							<input type="hidden" name="id_lop[]" value="'.$row['id_lop'].'">';
                                }
                            }
                            ?>
							<div class="form-group">
								<label> Mã Lớp </label>
								<input type="text"  name="MaLop" value="" class="form-control">
							</div>
                            <div class="form-group">
								<label> Sỉ Số </label>
								<input type="text"  name="si_so" value="<?php echo $dem; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label> Ngày Thi </label>
								<input type="date"  name="ngay_thi" value="" class="form-control">
							</div>
							<div class="form-group">
								<label> Giờ Thi </label>
								<select name="gio_thi" class="form-control ">
									<?php
									$sql = "SELECT * FROM gio_thi ";
									if ($db->num_rows($sql)) { {
											foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
									?>
												<option value="<?php echo $row['id_giothi'] ?>"> <?php echo $row['gio_thi'] ?> </option>
									<?php
											}
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label> Phòng Thi </label>
								<select name="id_phongthi" class="form-control ">
									<?php
									$sql = "SELECT * FROM phong_hoc";
									if ($db->num_rows($sql)) { {
											foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
									?>
												<option value="<?php echo $row['id_phong'] ?>"> 
                                                <?php echo $row['Phong'].'- Sức Chứa: '.$row['suc_chua'] ?> </option>
									<?php
											}
										}
									}
									?>
								</select>
							</div>
                            <div class="form-group">
								<label> Giảng Viên Gác Thi </label>
								<select name="id_gv" class="form-control ">
									<?php
									$sql = "SELECT * from register where usertype=5";
									if ($db->num_rows($sql)) { {
											foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
									?>
												<option value="<?php echo $row['id'] ?>"> <?php echo $row['username'] ?> </option>
									<?php
											}
										}
									}
									?>
								</select>
							</div>
							<button type="submit" name="molop_thilai" class="btn btn-primary"> Mở Lớp</button>
							<a href="<?php echo '' . $_DOMAIN . 'khoahoc_thilai'; ?>" class="btn btn-danger"> Hủy </a>
						</form>
			<?php
					}
			?>
		</div>
	</div>
</div>