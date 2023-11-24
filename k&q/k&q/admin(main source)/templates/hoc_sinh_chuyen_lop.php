<div class="container-fluid">
    <!--DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Chuyển Lớp</h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['chuyen_lop'])) {
                $id_hv = $_POST['id_hv'];
                $lop = $_POST['lop'];
                $ten_mh = $_POST['ten_mh'];
                $id_mh = $_POST['id_mh'];
                $sql = "SELECT * FROM `chi_tiet_lop_hoc` 
                JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
                JOIN trang_thai_lop On lop_hoc.trangthailop=trang_thai_lop.id_ttl
                JOIN mon_hoc On lop_hoc.id_mh=mon_hoc.id_mon
                JOIN register On register.id=chi_tiet_lop_hoc.id_hs
                WHERE chi_tiet_lop_hoc.id_hs=$id_hv and chi_tiet_lop_hoc.id_lop =$lop";
                if ($db->num_rows($sql)) {
                    $serial_number = 0;
                    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
            ?>
                        <form action="them_lop_hoc_dang_ky_code.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_lop_old" value="<?php echo $row['id_lop'] ?>">
                            <input type="hidden" name="id_ct_lop" value="<?php echo $row['id_ct_lop'] ?>">
                            <div class="form-group">
                                <label>Tên Học Viên</label>
                                <input type="text" readonly name="ten_nhan_vien" value="<?php echo $row['username'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mã Học Viên</label>
                                <input type="text" readonly name="dia_chi" value="<?php echo $row['user_code'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Lớp Chuyển </label>
                                <select name="id_lop_new" class="form-control ">
                                    <option hidden value="<?php echo $row['id_lop'] ?>"><?php echo $row['MaLop'] . '-' . $row['ten_monhoc'] ?> </option>
                                    <?php
                                    $sql = "SELECT * FROM lop_hoc 
                                    JOIN mon_hoc On lop_hoc.id_mh=mon_hoc.id_mon
                                    where id_mh=$id_mh and trangthailop in (2,3)";
                                    if ($db->num_rows($sql)) { {
                                            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    ?>
                                                <option value="<?php echo $row['id_lop'] ?>"> <?php echo $row['MaLop'] . '-' . $row['ten_monhoc'] ?> </option>
                                            <?php
                                            }
                                            ?>
                                </select>
                            </div>
                    <?php
                                        }
                                    } else {
                                        echo "No Data Available";
                                    }
                    ?>
                    <button type="submit" name="chuyen_lop" class="btn btn-primary"> Thay Đổi</button>
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