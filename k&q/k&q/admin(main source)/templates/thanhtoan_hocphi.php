<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thanh Toán Học Phí</h1>
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
        
        </div>
        <div class="card-body">
            <form action="khach_hang_kt_code.php" method="POST" enctype="multipart/form-data">
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
                                <th></th>
                                <th>Lớp</th>
                                <th>Môn Học</th>
                                <th>Ngày Đăng Ký</th>
                                <th>Thanh Toán</th>
                                <th>Trạng Thái Lớp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                                        <th>
                                            <?php
                                                if($row['trangthailop']==2 || $row['trangthailop']==3)
                                                {
                                                    echo '
                                            <input type="checkbox" name="id_lop[]" value=""></input>
                                                    ';
                                                }
                                                else{
                                                    echo '<b><input type="checkbox" disabled name="id_lop[]" value=""></input></b>';
                                                }
                                            ?>
                                        </th>
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
                            // 
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <span>
                        <button type="submit" name="thanhtoan" class="btn btn-primary" style="float: right;"> Thanh Toán </button>
                    </span>
                    <span>
                        <button type="submit" name="thanhtoan_all" class="btn btn-info" style="float: right;"> Thanh Toán Tất Cả </button>
                    </span>
                </div>
        </div>

        </form>
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