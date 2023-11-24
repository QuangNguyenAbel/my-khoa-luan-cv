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
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $_DOMAIN; ?>tailieu">Tài Liệu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tài Liệu</li>
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
                                    <strong>TÀI LIỆU</strong>
                                </span>
                            </h2>
                            <br>
                            <p>
                            </p>
                            <!-- popup -->
                            <!-- bảng đăng ký -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="col-md-12">
                                        <div class="card shadow-sm rounded">
                                            <div class="card-body">
                                                <form action="dangky_code.php" method="POST" enctype=multipart/form-data>
                                                    <div class="form-group">
                                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Tựa Đề </th>
                                                                    <th>Lớp </th>
                                                                    <th>File </th>
                                                                    <th>Tóm Tắt</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (isset($_POST['xem_tl'])) {

                                                                    $id = $_POST['lop'];
                                                                    $pass = trim(addslashes(htmlspecialchars(md5($_POST['pass']))));
                                                                    $sql = "SELECT * FROM tai_lieu WHERE id = '$id' and ma='$pass'  ";
                                                                    if ($db->num_rows($sql)) {
                                                                        foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                                                            echo '
                                                                            <tr>
                                                                                <th>' . $row['TuaDe'] . '</th>
                                                                                <th>' . $row['lop'] . '</th>
                                                                                <td> <a href="admin/anh_nhan_vien/' .$row['file'].'">Tài Liệu</a></td>
                                                                                <td> 
																				<?php echo ' . $row['TomTat'] . '; ?></td>
                                                                            </tr>
										';
                                                                        }
                                                                    } else {
                                                                        echo '<h2 style="text-align:center"><span style="font-size:32px; color: #8B0000">
                                    <strong>BẠN ĐÃ NHẬP SAI MẬT KHẨU!</strong><br>
                                    </span>';
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