<!-- Add Button -->
<style>
    #a {
        color: red;
        font-weight: bold;
    }
</style>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Xem điểm</h1>
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
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">Tên Môn Học </th>
                            <th style="text-align: center">Mã Lớp</th>
                            <th style="text-align: center">Giảng Viên Dạy</th>
                            <th style="text-align: center">Điểm Số</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $data_user['id'];
                        $sql = "SELECT * FROM chi_tiet_lop_hoc
                        JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
                        JOIN mon_hoc On mon_hoc.id_mon=lop_hoc.id_mh
                        JOIN register On lop_hoc.id_gv=register.id
                        WHERE chi_tiet_lop_hoc.id_hs=$id order by chi_tiet_lop_hoc.id_ct_lop desc";

                        if ($db->num_rows($sql)) {
                            $serial_number = 0;
                            foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                $serial_number++;
                                echo '
                  <tr  >
                  <td> ' . $serial_number . ' </td>
                  <td> ' . $row['ten_monhoc'] . '</td>
                  <td> ' . $row['MaLop'] . '</td>
                  <td> ' . $row['username'] . '</td>
                  <td id="a"> ' . $row['diem'] . '</td>';
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