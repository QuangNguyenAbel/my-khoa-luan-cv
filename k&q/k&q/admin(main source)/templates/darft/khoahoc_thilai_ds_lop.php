<!-- Add Button -->

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sách lớp thi lại</h1>
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
            <a class="btn btn-info" href="<?php echo '' . $_DOMAIN . 'khoahoc_thilai'; ?>">Quay Lại</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <div class="row">
                        <form action="" method="post">
                            <div class="col-sm-12 col-md-6">
                                <div id="dataTable_filter" class="dataTables_filter">

                                </div>
                            </div>
                        </form>
                    </div>
                    <thead align="center">
                        <tr>
                            <th style="text-align: center">STT </th>
                            <th style="text-align: center">Tên Môn Học </th>
                            <th style="text-align: center">Mã Lớp</th>
                            <th style="text-align: center">Niên Khoá </th>
                            <th style="text-align: center">Giảng Viên</th>
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th <?php if ($data_user['usertype'] == 5) {
                                    echo 'hidden';
                                } ?>></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['xemds_lop'])) {
                            $id_mon = $_POST['id_mon'];
                            $sql = "SELECT * FROM `lop_hoc` 
                            JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
                            JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
                            JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
                            Join register On lop_hoc.id_gv_thi=register.id
                            JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phongthi
                            WHERE lop_hoc.trangthailop='14' AND nien_khoa.trangthai_nk=4 and lop_hoc.id_mh=$id_mon";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;
                                    echo '
                                        <tr>
                                        <td> ' . $serial_number . '</td>
                                        <td> ' . $row['ten_monhoc'] . '</td>
                                        <td> ' . $row['MaLop'] . '</td>
                                        <td> ' . $row['ten_nk'] . '</td>
                                        <td> ' . $row['username'] . '</td>
                                        <td> ' . $row['da_dk'] . '</td>
                                        <td> ' . $row['ten_ttl'] . '</td>  ';
                                    echo '
                                        <td>
                                        <form action="' . $_DOMAIN . 'khoahoc_thilai_ds_lop_edit_lichthi" method="POST">
                                            <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                                            <button type="submit" name="submit" class="btn btn-warning"> Lịch Thi</button>
                                        </form>
                                        </td>
                                        <td> 
                                            <form action="' . $_DOMAIN . 'khoahoc_thilai_ds_lop_dshs" method="POST">
                                            <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                                            <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                                            </form>
                                            ';
                                    echo '<td> 
                                            <form action="' . $_DOMAIN . 'khoahoc_thilai_ds_lop_edit_tt" method="POST">
                                                <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                                                <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                                            </form></br>
                                            <form action="khoahoc_thilai_ds_lop_code.php" method="POST">
                                                <input type="hidden" name="delete_id" value="' . $row['id_lop'] . '">
                                                <button type="submit" name="delete_cv" class="btn btn-danger">Xóa</button>
                                            </form>
                                            </td></tr>';
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
                    url: 'tai_lieu_code.php',
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