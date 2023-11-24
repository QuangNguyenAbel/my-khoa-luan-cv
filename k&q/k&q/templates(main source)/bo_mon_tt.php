<header>
    <script type="text/javascript">
        if (self === top) {
            var antiClickjack = document.getElementById("antiClickjack");
            antiClickjack.parentNode.removeChild(antiClickjack);
        } else {
            top.location = self.location;
        }
    </script>
</header>
<?php include 'head_f/header.php';
include 'head_f/slide.php';
?>
<div class="container-fluid py-2">
    <div class="container">
        <ol class="breadcrumb p-0 mb-0">
            <li class="breadcrumb-item"><a href="<?php echo $_DOMAIN; ?>trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $_DOMAIN; ?>bo_mon">Môn Học</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết </li>
        </ol>
    </div>
</div>
<div class="container-fluid pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="blog-post">
                        <?php
                        if (isset($_POST['xem'])) {
                            $id = $_POST['id'];
                            $sql   = "SELECT * 
                      FROM bo_mon where id_bo_mon='$id'";
                            if ($db->num_rows($sql)) {
                                foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                        ?>
                                    <h2 style="text-align: center;" class="blog-post-title"><?= $row['ten_bomon'];  ?></h2>
                                   
                                    <?php echo $row['gioithieu_bm']; ?>
                                    
                        <?php
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