<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Công Nợ Học Viên</h1>
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
            <form action="<?php echo $_DOMAIN . 'xemcongno' ?>" method="post">
                <div class="">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label for="search">Tìm kiếm
                            <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                        </label>&nbsp;
                        <label>Bộ Môn</label>
                        <select style="border-radius: 5px; border-style:ridge" name="chucvu">
                            <option value="1">Tất Cả</option>
                            <?php
                            $sql = "SELECT * FROM bo_mon";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    echo '
                                <option value="type=' . $row['id_bo_mon'] . ' " > ' . $row['ten_bomon'] . '  </option>
                                        ';
                                }
                            }
                            ?>
                        </select>&nbsp;
                        <label>Thanh Toán</label>
                        <select style="border-radius: 5px; border-style:ridge" name="status">
                            <option value="1">Tất Cả</option>
                            <option value="thanhtoan=1">✔</option>
                            <option value="thanhtoan=0">❌</option>
                        </select>&nbsp;
                        <label><i class="fa fa-sort"></i></label>
                        <select style="border-radius: 5px; border-style:ridge" name="tt">
                            <option value="ORDER By id_ct_lop ASC">Cũ Nhất</option>
                            <option value="ORDER By id_ct_lop DESC">Mới Nhất</option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-success"> Lọc </button>
                    </div>
                </div>
            </form>
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
                            <th>STT</th>
                            <th>Lớp</th>
                            <th>Môn Học</th>
                            <th>Ngày Đăng Ký</th>
                            <th>Thanh Toán</th>
                            <th>Trạng Thái Lớp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['submit'])) {
                            $a = $_POST['chucvu'];
                            $search = $_POST['search'];
                            $tt = $_POST['tt'];
                            $status = $_POST['status'];
                            $id = $data_user['id'];
                            $sql = "SELECT * FROM `chi_tiet_lop_hoc` 
                            JOIN register On register.id = chi_tiet_lop_hoc.id_hs
                            JOIN lop_hoc On lop_hoc.id_lop = chi_tiet_lop_hoc.id_lop
                            Join trang_thai_lop on trang_thai_lop.id_ttl = lop_hoc.trangthailop
                            JOIN mon_hoc On mon_hoc.id_mon = lop_hoc.id_mh
                            Join bo_mon on bo_mon.id_bo_mon = mon_hoc.type
                            where id_hs=$id and (($a and $status and MaLop like '%$search%') 
                            or ($a and $status and ten_monhoc like '%$search%')) $tt";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;
                        ?>
                                    <tr>
                                        <th><?php echo $serial_number; ?> </th>
                                        <th><?php echo $row['MaLop']; ?></th>
                                        <td> <?php echo $row['ten_monhoc']; ?></td>
                                        <td> <?php echo $row['ngaydk']; ?></td>
                                        <td>
                                            <?php
                                            if ($row['thanhtoan'] == 1) {
                                                echo '✔';
                                            } else {
                                                echo '❌';
                                            }
                                            ?></td>
                                        <td><?php echo $row['ten_ttl']; ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                echo '<b>Không tìm thấy dữ liệu</b>';
                            }
                        } else {
                            $id = $data_user['id'];
                            $sql = "SELECT * FROM `chi_tiet_lop_hoc` 
                            JOIN register On register.id = chi_tiet_lop_hoc.id_hs
                            JOIN lop_hoc On lop_hoc.id_lop = chi_tiet_lop_hoc.id_lop
                            Join trang_thai_lop on trang_thai_lop.id_ttl = lop_hoc.trangthailop
                            JOIN mon_hoc On mon_hoc.id_mon = lop_hoc.id_mh
                            where id_hs=$id";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;

                                ?>
                                    <tr>
                                        <th><?php echo $serial_number; ?> </th>
                                        <th><?php echo $row['MaLop']; ?></th>
                                        <td> <?php echo $row['ten_monhoc']; ?></td>
                                        <td> <?php echo $row['ngaydk']; ?></td>
                                        <td>
                                            <?php
                                            if ($row['thanhtoan'] == 1) {
                                                echo '✔';
                                            } else {
                                                echo '❌';
                                            }
                                            ?></td>
                                        <td><?php echo $row['ten_ttl']; ?></td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        // 
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
                    url: 'tin_tuc_code.php',
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
    <script>
        CKEDITOR.replace('editor1');
    </script>