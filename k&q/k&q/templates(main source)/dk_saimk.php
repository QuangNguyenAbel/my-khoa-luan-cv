<header>
    <?php
    include 'head_f/header.php';
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
            <li class="breadcrumb-item active" aria-current="page">Khóa học</li>
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
                                    <strong>ĐĂNG KÝ TÀI KHOẢN THẤT BẠI</strong></span></h2>
                            <p style="text-align:center">Mật khẩu không khớp nhau. Vui lòng đăng ký lại</p>
                            <p style="text-align:center">Xin cám ơn!!!</p>
                            <h2 style="text-align:center"><span style="text-align: left"></span><br>
                            </h2>
                            <p>
                            </p>
                            <!-- popup -->
                            <!-- bảng đăng ký -->
                            <div class="card-body">
                                <?php
                                if (isset($_POST['edit_cv'])) {
                                    $id = $_POST['edit_id'];
                                    $query = "SELECT * FROM mon_hoc WHERE id = '$id' ";
                                    $query_run = mysqli_query($connection, $query);
                                    foreach ($query_run as $row) {
                                ?>
                                        <div class="table-responsive">
                                            <div class="col-md-12">
                                                <div class="card shadow-sm rounded">
                                                    <div class="card-body">
                                                        <form action="dangky_code.php" method="POST" enctype=multipart/form-data>
                                                            <div class="form-group">
                                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tên Môn Học </th>
                                                                            <th>Tên Lớp</th>
                                                                            <th>Lịch Học</th>
                                                                            <th>Học Phí</th>
                                                                            <th>Địa Chỉ</th>
                                                                            <th>Ngày Khai Giảng</th>
                                                                            <th>Hạn Đăng Ký</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td> <?php echo $row['tenmh']; ?></td>
                                                                            <td> <?php echo $row['tenlop']; ?></td>
                                                                            <td> <?php echo $row['lichhoc']; ?></td>
                                                                            <td> <?php echo $row['hocphi']; ?></td>
                                                                            <td> <?php echo $row['diachi']; ?></td>
                                                                            <td><?php echo date("d-m-Y", strtotime($row['handangky'])); ?></td>
                                                                            <td><?php echo date("d-m-Y", strtotime($row['ngaykhaigiang'])); ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <label for="">Họ tên</label>
                                                                <input type="text" class="form-control" name="hoten">
                                                                <label for="">Số Điện Thoại</label>
                                                                <input type="text" class="form-control" name="sdt">
                                                                <label for="">Email</label>
                                                                <input type="text" class="form-control" name="email">
                                                                <label for="">Địa Chỉ</label>
                                                                <input type="text" class="form-control" name="diachi">
                                                            </div>
                                                            <label style="display: none">Lớp Đăng Ký</label>
                                                            <input type="text" class="form-control" name="tenlop" style="display: none" readonly value="<?php echo $row['tenlop']; ?>">
                                                            <label style="display: none">Số Tiền</label>
                                                            <input style="display: none" type="text" class="form-control" name="hocphi" readonly value="<?php echo $row['hocphi']; ?>">
                                                            <label style="display: none">Hạn Đăng Ký</label>
                                                            <input style="display: none" type="text" class="form-control" name="handk" readonly value="<?php echo date("d-m-Y", strtotime($row['ngaykhaigiang'])); ?>">
                                                            <button type="submit" name="them_kh" class="btn btn-primary">Đăng Ký</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                            </div>
                        </div>
                <?php
                                    }
                                }
                ?>
                </tbody>
                </table>
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