<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Lịch Sử Tác Động Hệ Thống</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form action="<?php echo $_DOMAIN . 'history' ?>" method="post">
                <div>
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label for="search">Tìm kiếm
                            <input type="text" name="search" class="form-control" placeholder="" aria-controls="dataTable">
                        </label>&nbsp;
                        <label>Loại Tài Khoản</label>
                        <select style="border-radius: 5px; border-style:ridge" name="usertype">
                            <option value="1">Tất Cả</option>
                            <?php
                            $sql = "SELECT * from chuc_vu";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    echo '
                                <option value="usertype=' . $row['id_cv'] . ' " > ' . $row['TenChucVu'] . '  </option>
                                        ';
                                }
                            }
                            ?>
                        </select>&nbsp;

                        <label>Hành Động</label>
                        <select style="border-radius: 5px; border-style:ridge" name="action">
                            <option value="1">Tất Cả</option>
                            <?php
                            $sql = "SELECT * from history_action";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    echo '
                                <option value="action=' . $row['id_act'] . ' " > ' . $row['action_name'] . '  </option>
                                        ';
                                }
                            }
                            ?>
                        </select>&nbsp;
                        <label>Ngày</label>
                        <select style="border-radius: 5px; border-style:ridge" name="date">
                            <option value="1">Tất Cả</option>
                            <?php
                            $sql = "SELECT DISTINCT date FROM `history` where 20 order by id desc";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                            ?>
                                    <option value="<?php echo "date='" . $row['date'] . "'"; ?>">
                                        <?php echo $row['date']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>&nbsp;
                        <label><i class="fa fa-sort"></i></label>
                        <select style="border-radius: 5px; border-style:ridge" name="tt">
                            <option value="ORDER By history.id DESC">Mới Nhất</option>
                            <option value="ORDER By history.id ASC">Cũ Nhất</option>
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
                            <th>Người Dùng</th>
                            <th>Loại Người Dùng</th>
                            <th>Hành Động </th>
                            <th>Dữ Liệu </th>
                            <th>Ngày</th>
                            <th>Giờ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['submit'])) {
                            $search=$_POST['search'];
                            $a = $_POST['usertype'];
                            $b = $_POST['action'];
                            $c = $_POST['date'];
                            $tt = $_POST['tt'];
                            $sql = "select * from history JOIN chuc_vu on history.usertype=chuc_vu.id_cv JOIN history_action 
                            ON history.action = history_action.id_act where $a and $b and $c and user like '%$search%' $tt";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;
                                    echo '
                            <tr>
                            <td> ' . $serial_number . '</td>
                            <td> ' . $row['user'] . '</td>
                            <td> ' . $row['TenChucVu'] . '</td>
                            <td> ' . $row['action_name'] . '</td>
                            <td> ' . $row['data'] . '</td>
                            <td> ' . $row['date'] . '</td>
                            <td> ' . $row['time'] . '</td>
                            </tr>
		';
                                }
                            } else {
                                echo "<b>Không tìm thấy dữ liệu</b>";
                            }
                        } else {
                            $sql = "select * from history JOIN chuc_vu on history.usertype=chuc_vu.id_cv JOIN history_action 
                            ON history.action = history_action.id_act ORDER By history.id DESC LIMIT 100";
                            if ($db->num_rows($sql)) {
                                $serial_number = 0;
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                    $serial_number++;
                                    echo '
                    <tr>
                    <td> ' . $serial_number . '</td>
                    <td> ' . $row['user'] . '</td>
                    <td> ' . $row['TenChucVu'] . '</td>
                    <td> ' . $row['action_name'] . '</td>
                    <td> ' . $row['data'] . '</td>
                    <td> ' . $row['date'] . '</td>
                    <td> ' . $row['time'] . '</td>
                    </tr>
		                    ';
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