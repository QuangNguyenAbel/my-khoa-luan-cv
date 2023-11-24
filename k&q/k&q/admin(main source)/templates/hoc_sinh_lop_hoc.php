<!-- Add Button -->
<div class="container-fluid">
    <?php
    if (isset($_POST['edit_btn'])) {
        $user_code = $_POST['user_code'];
        $username = $_POST['username'];
        echo '
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Lớp Của Học Viên ' . $username . ' - ' . $user_code . '  </h1>
        ';
    }
    ?>
    <?php
    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '
          <div class="alert alert-success">
            ' . $_SESSION['success'] . '
          </div>';
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '
          <div class="alert alert-danger">
            ' . $_SESSION['status'] . '
          </div>';
        unset($_SESSION['status']);
    }
    ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'hocvien'; ?>">Quay Lại</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <div class="row">
                        <form action="" method="post">
                            <div class="col-sm-12 col-md-6">
                                <div id="dataTable_filter" class="dataTables_filter">
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>
                    <thead align="center">
                        <tr>
                            <th>STT </th>
                            <th>Mã Lớp </th>
                            <th>Môn Học</th>
                            <th>Ngày Đăng Ký</th>
                            <th>Trạng Thái Lớp</th>
                            <th>Thanh Toán</th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['edit_btn'])) {
                            $id = $_POST['edit_id'];
                            $sql = "SELECT * FROM `chi_tiet_lop_hoc` 
                            JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
                            JOIN trang_thai_lop On lop_hoc.trangthailop=trang_thai_lop.id_ttl
                            JOIN mon_hoc On lop_hoc.id_mh=mon_hoc.id_mon
                            WHERE chi_tiet_lop_hoc.id_hs=$id";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;
                        ?>
                                    <tr>
                                        <td> <?php echo $serial_number; ?></td>
                                        <th><?php echo strip_tags($row['MaLop']);  ?></th>
                                        <th><?php echo $row['ten_monhoc']; ?></th>
                                        <td><?php echo date("d-m-Y", strtotime($row['ngaydk'])); ?></td>
                                        <td> <?php echo strip_tags($row['ten_ttl']); ?></td>
                                        <th><?php
                                            if ($row['thanhtoan'] == 1) {
                                                echo '✔';
                                            } else {
                                                echo '❌';
                                            }
                                            ?></th>
                                        <td>
                                            <form action="<?php echo '' . $_DOMAIN . 'hocvien_chuyenlop' ?>" method="POST">
                                                <input type="hidden" name="id_hv" value="<?php echo $id  ?>">
                                                <input type="hidden" name="id_mh" value="<?php echo $row['id_mh']  ?>">
                                                <input type="hidden" name="ten_mh" value="<?php echo $row['ten_monhoc']?>">
                                                <input type="hidden" name="lop" value="<?php echo $row['id_lop'] ?>">
                                                <button type="submit"
                                                <?php
                                            if ($row['trangthailop'] == 2 || $row['trangthailop'] == 3 ) {
                                                echo '';
                                            } else {
                                                echo 'disabled';
                                            }
                                            ?>
                                                name="chuyen_lop" class="btn btn-info"> Chuyển Lớp </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="them_lop_hoc_dang_ky_code.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $id  ?>">
                                                <input type="hidden" name="lop" value="<?php echo $row['id_lop'] ?>">
                                                <button type="submit" name="delete_lh" class="btn btn-danger"> Xóa </button>
                                            </form>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search_text').keyup(function() {
                var search = $(this).val();
                $.ajax({
                    url: 'khach_hang_code.php',
                    method: 'post',
                    data: {
                        query: search
                    },
                    success: function(response) {
                        $('#dataTable').html(response);
                    }
                });
            });
        });
    </script>