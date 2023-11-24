<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Thông Báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="thongbao_noibo_code.php" method="POST" enctype=multipart/form-data>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tựa Đề </label>
                        <input type="text" name="tua_de" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea class="form-control" id="editor1" name="nd" rows="4" cols="50" required></textarea>
                    </div>
                    <input class="form-control" hidden readonly name="ma_nhan_vien" value=" <?php echo $data_user['id'] ?>">
                    <input class="form-control" hidden name="id_nv_nhan" value="">
                    <input class="form-control" hidden name="ten_nv_nhan" value="">
                    <input class="form-control" hidden name="loai" value="1">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_tb" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thông Báo Nội Bộ</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php 
            if($data_user['usertype']==1 || $data_user['usertype']==2)
            {
                echo '<button type="button" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Thêm Thông Báo Chung
            </button></br>';
            }
            ?>
            <form action="<?php echo $_DOMAIN . 'thongbao_noibo' ?>" method="post">
                <div>
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label for="search">Tìm kiếm
                            <input type="text" name="search" class="form-control" placeholder="" aria-controls="dataTable">
                        </label>&nbsp;
                        <label>Loại Thông Báo</label>
                        <select style="border-radius: 5px; border-style:ridge" name="loai_tbnb">
                            <option value="1">Tất Cả</option>
                            <?php
                            $sql = "SELECT * from loai_tb";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    echo '
                                <option value="loai_tbnb=' . $row['id_loai_tb'] . ' " > ' . $row['ten_loai_tb'] . '  </option>
                                        ';
                                }
                            }
                            ?>
                        </select>&nbsp;
                        <label><i class="fas fa-filter"></i></label>
                        <select style="border-radius: 5px; border-style:ridge" name="my">
                            <option value="1">Tất Cả</option>
                            <?php
                            echo '<option value="id_nv_nhan=' . $data_user['id'] . ' ">Thông Báo Của Tôi</option>';
                            ?>
                        </select>&nbsp;
                        <label>Ngày</label>
                        <select style="border-radius: 5px; border-style:ridge" name="date">
                            <option value="1">Tất Cả</option>
                            <?php
                            $sql = "SELECT DISTINCT ngay_tbnb FROM `thong_bao_nb` where 20 order by id_tbnb desc";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                            ?>
                                    <option value="<?php echo "ngay_tbnb='" . $row['ngay_tbnb'] . "'"; ?>">
                                        <?php echo date("d-m-Y", strtotime($row['ngay_tbnb'])); ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>&nbsp;
                        <label><i class="fa fa-sort"></i></label>
                        <select style="border-radius: 5px; border-style:ridge" name="tt">
                            <option value="ORDER By id_tbnb DESC">Mới Nhất</option>
                            <option value="ORDER By id_tbnb ASC">Cũ Nhất</option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-success"> Lọc </button>
                    </div>
                </div>
            </form>
            <div>
            </div>
        </div>

        <div class="card-body">
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT </th>
                            <th>Tựa Đề</th>
                            <th>Ngày Đăng</th>
                            <th>Nhân Viên Nhận</th>
                            <th>Loại Thông Báo</th>
                            <th>Nhân Viên Đăng</th>
                            <th></th>
                            <?php 
                                if($data_user['usertype']==1||$data_user['usertype']==2)
                                {
                                    echo '<th></th>
                                    ';
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id=$data_user['id'];
                        if (isset($_POST['submit'])) {
                            $my = $_POST['my'];
                            $search = $_POST['search'];
                            $a = $_POST['loai_tbnb'];
                            $c = $_POST['date'];
                            $tt = $_POST['tt'];
                            if ($data_user['usertype'] == 1 || $data_user['usertype'] == 2){
                                $sql = "SELECT * FROM `thong_bao_nb` 
                            LEFT JOIN register On register.id=thong_bao_nb.id_nv_tb 
                            JOIN loai_tb On loai_tb.id_loai_tb=thong_bao_nb.loai_tbnb
                            where ($a and $c and $my and tua_de like '%$search%')
                            Or ($a and $c and $my and username like '%$search%')
                            or ($a and $c and $my and ten_nv_nhan like '%$search%') $tt";
                            }
                            else{
                                $sql = "SELECT * FROM `thong_bao_nb` 
                            LEFT JOIN register On register.id=thong_bao_nb.id_nv_tb 
                            JOIN loai_tb On loai_tb.id_loai_tb=thong_bao_nb.loai_tbnb
                            where thong_bao_nb.id_nv_nhan in($id,0) and (($a and $c and $my and tua_de like '%$search%')
                            Or ($a and $c and $my and username like '%$search%')
                            or ($a and $c and $my and ten_nv_nhan like '%$search%')) $tt";
                            }
                            
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;
                                    echo '
                                    <tr>
                                    <td> ' . $serial_number . '</td>
                                    <td> ' . $row['tua_de'] . '</td>
                                    <td> ' . date("d-m-Y", strtotime($row['ngay_tbnb'])) . '</td>
                                    <td> ' . $row['ten_nv_nhan'] . '</td>
                                    <td> ' . $row['ten_loai_tb'] . '</td>
                                    <td> ' . $row['username'] . '</td>
                                    ';
                                    if ($data_user['usertype'] == 1 || $data_user['usertype'] == 2) {
                                        echo '<td>
                        <form action=" ' . $_DOMAIN . 'thongbao_noibo_edit" method="POST">
                          <input type="hidden" name="edit_id" value="' . $row['id_tbnb'] . '">
                          <button type="submit" name="edit_btn" class="btn btn-success"> Xem</button>
                        </form>
                      </td>
                      <td>
                        <form action="thongbao_noibo_code.php" method="POST">
                          <input type="hidden" name="delete_id" value="' . $row['id_tbnb'] . '">
                          <button type="submit" name="delete_btn" class="btn btn-danger"> Xóa</button>
                        </form>
                      </td>
                      ';
                                    }else{
                                        echo'<td>
                                        <form action=" ' . $_DOMAIN . 'thongbao_noibo_xem" method="POST">
                                          <input type="hidden" name="edit_id" value="' . $row['id_tbnb'] . '">
                                          <button type="submit" name="edit_btn" class="btn btn-success">Xem</button>
                                        </form>
                                      </td>';
                                    }
                                    echo '</tr>';

                                }
                            } else {
                                echo "<b>Không tìm thấy dữ liệu</b>";
                            }
                        } else {
                            if ($data_user['usertype'] == 1 || $data_user['usertype'] == 2){
                                $sql = "SELECT * FROM `thong_bao_nb` 
                                LEFT JOIN register On register.id=thong_bao_nb.id_nv_tb 
                                JOIN loai_tb On loai_tb.id_loai_tb=thong_bao_nb.loai_tbnb order by id_tbnb desc
                                 ";
                            }
                            else{
                                $sql = "SELECT * FROM `thong_bao_nb` 
                                LEFT JOIN register On register.id=thong_bao_nb.id_nv_tb 
                                JOIN loai_tb On loai_tb.id_loai_tb=thong_bao_nb.loai_tbnb where thong_bao_nb.id_nv_nhan in($id,0)
                                order by id_tbnb desc
                                 ";
                            }
                           
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;
                                    echo '
                    <tr>
                    <td> ' . $serial_number . '</td>
                    <td> ' . $row['tua_de'] . '</td>
                    <td> ' . date("d-m-Y", strtotime($row['ngay_tbnb'])) . '</td>
                    <td> ' . $row['ten_nv_nhan'] . '</td>
                    <td> ' . $row['ten_loai_tb'] . '</td>
                    <td> ' . $row['username'] . '</td>';

                                    if ($data_user['usertype'] == 1 || $data_user['usertype'] == 2) {
                                        echo '<td>
                        <form action=" ' . $_DOMAIN . 'thongbao_noibo_edit" method="POST">
                          <input type="hidden" name="edit_id" value="' . $row['id_tbnb'] . '">
                          <button type="submit" name="edit_btn" class="btn btn-success"> Xem</button>
                        </form>
                      </td>
                      <td>
                        <form action="thongbao_noibo_code.php" method="POST">
                          <input type="hidden" name="delete_id" value="' . $row['id_tbnb'] . '">
                          <button type="submit" name="delete_btn" class="btn btn-danger"> Xóa</button>
                        </form>
                      </td>
                      ';
                                    }else{
                                        echo'<td>
                                        <form action=" ' . $_DOMAIN . 'thongbao_noibo_xem" method="POST">
                                          <input type="hidden" name="edit_id" value="' . $row['id_tbnb'] . '">
                                          <button type="submit" name="edit_btn" class="btn btn-success">Xem</button>
                                        </form>
                                      </td>';
                                    }
                                    echo '</tr>';
                                }
                            }
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('editor1');
    </script>