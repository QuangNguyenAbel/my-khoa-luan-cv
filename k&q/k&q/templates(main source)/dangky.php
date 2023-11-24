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
                                    <strong>ĐĂNG KÝ TÀI KHOẢN</strong>
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
                                                        <label for="text">Họ Tên</label>
                                                        <input type="text" class="form-control" name="ten" required>
                                                        <label for="text">Địa Chỉ</label>
                                                        <input type="text" class="form-control" name="diachi" required>
                                                        <label for="text">Số điện thoại</label>
                                                        <input type="number" class="form-control" pattern="^(0[0-9]{9}|)$" name="sdt" required>
                                                        <label for="text">Ngày sinh</label>
                                                        <input type="date" class="form-control" name="ns" required>
                                                        <label for="email">Email Đăng Nhập</label>
                                                        <input type="text" class="form-control" name="email" 
                                                        pattern="^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$" required>
                                                        <label for="diachi">Mật Khẩu</label>
                                                        <input type="password" class="form-control" 
                                                        pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                                                        placeholder="Tối thiểu 8 ký tự, ít nhất 1 chữ cái viết hoa, 1 chữ cái viết thường, 1 số và 1 ký tự đặc biệt"
                                                        name="matkhau" required>
                                                        <label for="diachi">Nhập Lại Mật Khẩu</label>
                                                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="matkhau_nl" required>
                                                    </div>
                                                    <button type="submit" name="add" class="btn btn-primary">Đăng Ký</button>
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