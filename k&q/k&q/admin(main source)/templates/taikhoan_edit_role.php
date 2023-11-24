<div class="container-fluid">
    <!--DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa Tài Khoản</h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['id'];
                $quyen = $_POST['quyen'];
                $ten_quyen = $_POST['ten_quyen'];
                $sql = "SELECT register.id,chuc_vu.TenChucVu,register.id,register.email,register.username,register.status 
				from register join chuc_vu on chuc_vu.id_cv=register.usertype where register.id = '$id' ";
                if ($db->num_rows($sql)) {
                    $serial_number = 0;
                    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
            ?>
                        <form action="register_code.php" method="POST">
                            <input type="text" name="edit_id" value="<?php echo $row['id'] ?>" hidden class="form-control">
                            <div class="form-group">
								<label> Username </label>
								<input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" readonly>
							</div>
                            <div class="form-group">
                                <?php
                                $sql = "SELECT * FROM chuc_vu";
                                if ($db->num_rows($sql)) {
                                ?>
                                    <div class="form-group">
                                        <label> Loại Tài Khoản </label>
                                        <select name="update_usertype" class="form-control ">
                                        <option hidden value="<?php echo $quyen ?>"> <?php echo $ten_quyen; ?></option>
                                            <?php
                                            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                            ?>
                                                <option value="<?php echo $row['id_cv'] ?>"> <?php echo $row['TenChucVu'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                <?php
                                } else {
                                    echo "No Data Available";
                                }
                                ?>
                            </div>
                            <button type="submit" name="updatebtn_role" class="btn btn-primary"> Thay Đổi</button>
                            <a href="<?php echo '' . $_DOMAIN . 'taikhoan'; ?>" class="btn btn-danger"> Hủy </a>
                        </form>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</div>