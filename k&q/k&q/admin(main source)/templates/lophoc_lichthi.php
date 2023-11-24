<!-- Add Button -->
<style>
    #a {
        color: red;
        font-weight: bold;
    }
</style>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Lịch Thi</h1>
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
        <div class="card-header">
            <form action="<?php echo $_DOMAIN . 'lophoc' ?>" method="POST">
                <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                <button type="submit" name="ds_cv" class="btn btn-info">Quay Lại</button>
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
                            <th style="text-align: center">Loại Lịch </th>
                            <th style="text-align: center">Tên Môn Học </th>
                            <th style="text-align: center">Mã Lớp</th>
                            <th style="text-align: center">Giảng Viên Gác Thi</th>
                            <th style="text-align: center">Ngày Thi</th>
                            <th style="text-align: center">Giờ Thi</th>
                            <th style="text-align: center">Phòng Thi</th>
                            <th <?php if ($data_user['usertype'] == 5) {
                    echo 'hidden';
                  } ?>></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['submit'])) {
                            $id = $_POST['edit_id'];
                            $sql = "SELECT * FROM `lop_hoc` 
                            JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
                            JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
                            JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
                            LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cathi
                            LEFT JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phongthi
                            Left JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
                            Left Join register On lop_hoc.id_gv_thi=register.id
                            LEFT JOIN gio_thi on gio_thi.id_giothi = lop_hoc.id_cathi
                            WHERE lop_hoc.id_lop=$id";

                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;
                                    echo '
                  <tr id="a" >
                  <td> Lịch Thi </td>
                  <td> ' . $row['ten_monhoc'] . '</td>
                  <td> ' . $row['MaLop'] . '</td>
                  <td> ' . $row['username'] . '</td>
                  <td> ' . date("d-m-Y", strtotime($row['ngay_thi'])) . '</td>
                  <td> ' . $row['gio_thi'] . '</td>
                  <td> ' . $row['Phong'] . '</td>';
                  if ($data_user['usertype'] != 5){
                                    echo '<td> 
                  <form action="' . $_DOMAIN . 'lophoc_them_lichthi" method="POST">
                    <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                    <button type="submit" name="edit_cv" class="btn btn-success">Cập Nhật Lịch</button>
                  </form></br>
                      </tr>';}
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