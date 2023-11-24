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
                                    <strong>ĐĂNG KÝ TÀI KHOẢN THÀNH CÔNG</strong></span></h2>
                            <p style="text-align:center">Để đăng ký khoá học vui lòng đăng nhập vào tài khoản vừa tạo.</p>
                            <p style="text-align:center">Xin cám ơn!!!</p>
                            <h2 style="text-align:center"><span style="text-align: left"></span><br>
                            </h2>
                            <p>
                            </p>
                            <!-- popup -->
                            <!-- bảng đăng ký -->
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