<header>
    <?php include 'head_f/header.php';
    include 'head_f/slide.php';
    ?>
    <script type="text/javascript">
        if (self === top) {
            var antiClickjack = document.getElementById("antiClickjack");
            antiClickjack.parentNode.removeChild(antiClickjack);
        } else {
            top.location = self.location;
        }
    </script>
</header>
<div class="container-fluid py-2">
    <div class="container">
        <ol class="breadcrumb p-0 mb-0">
            <li class="breadcrumb-item"><a href="<?php echo $_DOMAIN; ?>trangchu">Trang Chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $_DOMAIN; ?>lichhoc">Lịch Học</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lịch Học Chi Tiết</li>
        </ol>
    </div>
</div>
<div class="container-fluid pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="blog-post">
                            <p></p>
                            <h1></h1>
                            <p></p>
                            <h2 style="text-align:center"><span style="font-size:32px; color: red">
                                    <strong>LỊCH HỌC</strong>
                                </span>
                            </h2>
                            <br>
                            <p>
                            </p>
                            <!-- popup -->
                            <!-- bảng đăng ký -->
                            <div class="card-body" style="font-size: 15px; text-align:center">
                                <?php
                                if (isset($_POST['edit_cv'])) {
                                    $id = $_POST['edit_id'];
                                    $sql = "SELECT * FROM lich_hoc WHERE id_lop = '$id' ";
                                    if ($db->num_rows($sql)) {
                                        $serial_number = 0;
                                        foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                            $serial_number++;
                                            echo '
											<div class="table-responsive">
                                            <div class="col-md-12">
                                                <div class="card shadow-sm rounded">
                                                    <div class="card-body">
                                                        <form action="dangky_code.php" method="POST" enctype=multipart/form-data>
                                                            <div class="form-group">
                                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Lớp </th>
                                                                            <th>Giảng viên </th>
                                                                            <th>Giờ học </th>
                                                                            <th>Phòng học </th>
                                                                            <th>Ngày Khai Giảng</th>
                                                                            <th>Ngày Kết Thúc</th>
                                                                            <th>Ghi Chú</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <tr>
                                                                            <td> ' . $row['Lop'] . '</td>
                                                                            <td> ' . $row['GiaoVien'] . '</td>
                                                                            <td> ' . $row['GioHoc'] . '</td>
                                                                            <td> ' . $row['PhongHoc'] . '</td>
                                                                            <td>' . date("d-m-Y", strtotime($row['NgayKhaiGiang'])) . '</td>
                                                                            <td>' . date("d-m-Y", strtotime($row['NgayKetThuc'])) . '</td>
                                                                            <td>' . $row['GhiChu'] . '</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                    </tbody>
                    </table>
											';
                                        }
                                    }
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
include 'head_f/footer.php';
?>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>
<script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>