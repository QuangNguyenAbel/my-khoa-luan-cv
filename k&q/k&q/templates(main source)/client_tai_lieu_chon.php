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
                                    <strong>Tài Liệu</strong>
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
                                                <form action="<?php echo $_DOMAIN; ?>tailieu_xem" method="POST" enctype=multipart/form-data>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label> Mã Lớp Học</label>
                                                            <select name="lop" class="form-control ">
                                                                <?php
                                                                $sql = "SELECT * FROM tai_lieu where TrangThai=1  ";
                                                                if ($db->num_rows($sql)) {
                                                                    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                                                                        echo '
                                                                        <option value="' . $row['id'] . '">
																		' . $row['lop'] .'-' . $row['TuaDe'] .'</option>
										';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label for="pass">Nhập Mã</label>
                                                        <input type="password" class="form-control" name="pass" required>
                                                        <br>
                                                        <button type="submit" name="xem_tl" class="btn btn-primary">Xem Tài Liệu</button>
                                                </form>
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