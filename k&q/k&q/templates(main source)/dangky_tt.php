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
                                    <strong>ĐĂNG KÝ TÀI KHOẢN - THÔNG TIN CÁ NHÂN</strong>
                                </span>
                            </h2>
                            <br>
                            <p>
                            </p>
                            <!-- popup -->
                            <?php
                            if (isset($_POST['tieptheo'])) {
                                $ten = trim(addslashes(htmlspecialchars($_POST['ten'])));
                                $email = trim(addslashes(htmlspecialchars($_POST['email'])));
                                $matkhau = trim(addslashes(htmlspecialchars(md5($_POST['matkhau']))));
                                $matkhau_nl = trim(addslashes(htmlspecialchars(md5($_POST['matkhau_nl']))));
                                $query = " 
                                INSERT INTO register(email,username,password,usertype,status) 
                                VALUES('$email','$ten','$matkhau','6','0')";
                                $query_run = $db->query($query);
                                if ($matkhau == $matkhau_nl) {
                                    if (!$db->query($sql)) {
                                        $sql1 = "SELECT register.id,register.email,chuc_vu.TenChucVu,register.username FROM register JOIN chuc_vu on chuc_vu.id = register.usertype 
                                            ORDER BY register.id desc limit 1 ";
                                        if ($db->num_rows($sql1)) {
                                            foreach ($db->fetch_assoc($sql1, 0) as $key => $row) {
                                                mt_srand(mktime(1));
                                                $ma='HV-'.(mt_rand()); 
                                                $id = $row['id'];
                                                echo '<div class="table-responsive">
                                        <div class="col-md-12">
                                            <div class="card shadow-sm rounded">
                                                <div class="card-body">
                                                    <form action="dangky_code.php" method="POST" enctype=multipart/form-data>
                                                        <div class="form-group">
                                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Email </th>
                                                                        <th>Tên</th>
                                                                        <th>Loại Tài Khoản</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td> ' . $row['email'] . '</td>
                                                                        <td> ' . $row['username'] . '</td>
                                                                        <td> ' . $row['TenChucVu'] . '</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div>
                                                <label for="hoten">Họ tên </label>
                                                <input type="text"  class="form-control" name="hoten" required value="' . $row['username'] . '">
                                                <label for="ns">Ngày Sinh </label>
                                                <input type="date"  class="form-control" name="ns" required value="">
                                                <label for="sdt">Số Điện Thoại</label>
                                                <input type="number"  class="form-control" name="sdt" pattern="^(0[0-9]{9}|)$" required>
                                                <label for="diachi">Địa Chỉ</label>
                                                <input type="text" class="form-control" name="diachi" value=" " >
                                                <input type="text" hidden class="form-control" name="mahs" value='.$ma.' >
                                                <input  type="text" hidden class="form-control" name="id_tk" value="' . $row['id'] . '" readonly>
                                            </div><br><br>
                                            <div class="row">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4"><button type="submit" name="them_hs" class="btn btn-primary">Đăng Ký</button></div>
                                                <div class="col-sm-4"></div>
                                            </div>
                                            </form>';
                                            }
                                        }
                                    } else {
                                        new Redirect($_DOMAIN . 'taotk_thatbai');
                                    }
                                } else {
                                    new Redirect($_DOMAIN . 'saimatkhau');
                                }
                            }
                            ?>
                            <!-- bảng đăng ký -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
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