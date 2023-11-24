<!-- Add Button -->

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Lớp Học Cũ</h1>
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
            <form action="<?php echo $_DOMAIN . 'lophoc_cu' ?>" method="post">
                <div class="">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label for="search">Tìm kiếm
                            <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                        </label>&nbsp;
                        <label>Bộ Môn</label>
                        <select style="border-radius: 5px; border-style:ridge" name="bo_mon">
                            <option value="1">Tất Cả</option>
                            <?php
                            $sql = "SELECT * FROM bo_mon";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    echo '
                                <option value="mon_hoc.type=' . $row['id_bo_mon'] . ' " > ' . $row['ten_bomon'] . '  </option>
                                        ';
                                }
                            }
                            ?>
                        </select>&nbsp;
                        <label>Niên Khoá</label>
                        <select style="border-radius: 5px; border-style:ridge" name="nk">
                            <option value="1">Tất Cả</option>
                            <?php
                            $sql = "SELECT *  FROM `nien_khoa` ";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                            ?>
                                    <option value="<?php echo "lop_hoc.Khoa='" . $row['id_nk'] . "'"; ?>">
                                        <?php echo $row['ten_nk']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>&nbsp;
                        <label><i class="fa fa-sort"></i></label>
                        <select style="border-radius: 5px; border-style:ridge" name="tt">
                            <option value="ORDER By id_lop ASC">Cũ Nhất</option>
                            <option value="ORDER By id_lop DESC">Mới Nhất</option>
                        </select>&nbsp;
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
                            <th style="text-align: center">STT </th>
                            <th style="text-align: center">Tên Môn Học </th>
                            <th style="text-align: center">Mã Lớp</th>
                            <th style="text-align: center">Niên Khoá </th>
                            <th style="text-align: center">Giảng Viên</th>
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['submit'])) {
                            $search = $_POST['search'];
                            $tt = $_POST['tt'];
                            $bo_mon = $_POST['bo_mon'];
                            $nk = $_POST['nk'];
                            $sql = "SELECT * FROM `lop_hoc` 
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cahoc
              JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phonghoc
              Left JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
              Join register On lop_hoc.id_gv=register.id
              WHERE trangthailop  IN (7) AND nien_khoa.trangthai_nk=4 
              and (($bo_mon and $nk and MaLop like '%$search%') 
              or ($bo_mon and $nk and register.username like '%$search%')
              or ($bo_mon and $nk and mon_hoc.ten_monhoc like '%$search%')) $tt";

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
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td>  
                  <td> 
                    <form action="' . $_DOMAIN . 'lophoc_cu_dshv" method="POST">
                      <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                    </form></td>
                    <td> 
                    <form action="' . $_DOMAIN . 'lophoc_cu_edit" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                    </form></td></tr>';
                                }
                            } else {
                                echo '<b>Không tìm thấy dữ liệu</b>';
                            }
                        } else {
                            $sql = "SELECT * FROM `lop_hoc` 
              JOIN nien_khoa On nien_khoa.id_nk=lop_hoc.Khoa 
              JOIN trang_thai_lop ON trang_thai_lop.id_ttl=lop_hoc.trangthailop
              JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
              LEFT JOIN ca_hoc On ca_hoc.id_ca=lop_hoc.id_cahoc
              LEFT JOIN bo_mon On bo_mon.id_bo_mon=mon_hoc.id_mon
              Join register On lop_hoc.id_gv=register.id
              JOIN phong_hoc On phong_hoc.id_phong=lop_hoc.id_phonghoc
              WHERE trangthailop IN (7) AND nien_khoa.trangthai_nk=4 order by id_lop desc";
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
                  <td> ' . $row['da_dk'] . '/' . $row['si_so'] . '</td>
                  <td> ' . $row['ten_ttl'] . '</td> 
                  <td> 
                    <form action="' . $_DOMAIN . 'lophoc_cu_dshv" method="POST">
                      <input type="hidden" name="ds_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="ds_cv" class="btn btn-primary">Danh sách</button>
                    </form></td>
                    <td> 
                    <form action="' . $_DOMAIN . 'lophoc_cu_edit" method="POST">
                      <input type="hidden" name="edit_id" value="' . $row['id_lop'] . '">
                      <button type="submit" name="edit_cv" class="btn btn-success">Sửa</button>
                    </form></td>
                  </tr>';
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