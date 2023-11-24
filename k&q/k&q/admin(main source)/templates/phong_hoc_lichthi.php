<!-- Add Button -->
<style>
    #a {
        color: red;
        font-weight: bold;
    }
</style>
<div class="container-fluid">
    <?php
    if (isset($_POST['submit'])) {
        $id = $_POST['edit_id'];
        $phong = $_POST['phong'];
        echo '<h1 class="h3 mb-2 text-gray-800">Lịch Thi Của Phòng <b>' . $phong . '</b> </h1>';
    }
    ?>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <form action="<?php echo $_DOMAIN . 'phonghoc' ?>" method="POST">
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
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">Mã Lớp</th>
                            <th style="text-align: center">Ngày Thi</th>
                            <th style="text-align: center">Giờ Thi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['submit'])) {
                            $id = $_POST['edit_id'];
                            $phong = $_POST['phong'];
                            $sql = "SELECT * from phong_hoc 
                            JOIN lop_hoc on lop_hoc.id_phongthi = phong_hoc.id_phong 
                            JOIN nien_khoa on lop_hoc.Khoa = nien_khoa.id_nk
                            JOIN gio_thi On lop_hoc.id_cathi = gio_thi.id_giothi
                            WHERE trangthailop in (4,5) and phong_hoc.id_phong=$id order by ngay_thi asc";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;
                                    echo '
                                    <tr>
                                    <td> '.$serial_number.' </td>
                                    <td> ' . $row['MaLop'] . '</td>
                                    <td> ' . date("d-m-Y", strtotime($row['ngay_thi'])) . '</td>
                                    <td> ' . $row['gio_thi'] . '</td>';
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