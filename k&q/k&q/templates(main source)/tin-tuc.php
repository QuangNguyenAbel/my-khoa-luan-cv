 <?php include 'head_f/header.php';
    include 'head_f/slide.php';

    ?>
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
 <div class="container-fluid py-2">
     <div class="container">
         <ol class="breadcrumb p-0 mb-0">
             <li class="breadcrumb-item"><a href="">Trang Chủ</a></li>
             <li class="breadcrumb-item active" aria-current="page">Tin Tức</li>
         </ol>
     </div>
 </div>
 <div class="container-fluid pb-4">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="card-body p-0">
                             <ul class="list-group list-group-flush">
                                 <?php
                                    $sql1 = "SELECT * FROM tin_tuc where TrangThai=1 order by id_tt desc ";
                                    if ($db->num_rows($sql1)) {
                                        foreach ($db->fetch_assoc($sql1, 0) as $key => $row) { ?>
                                         <li class="list-group-item p-2" style="background: #fefefe;">
                                             <div class="large">
                                                 <img class="mr-3 rounded" src="admin/anh_nhan_vien/<?= $row['img_tt'] ?>" width="250px;" height="160px" align="left" href="" alt="Image">
                                                 <div class="media-body">
                                                     <form action="<?php echo $_DOMAIN; ?>tintuc_chitiet" class="text-dark" method="POST">
                                                         <input type="hidden" name="id" value="<?php echo $row['id_tt']; ?>">
                                                         <button type="submit" name="xem" class="btn btn-default"> <?php echo $row['TuaDe']; ?></button>
                                                     </form>
                                                     <br>
                                                     <div align="right">
                                                         <p class="date-time hidden-xs hidden-sm"><i class="fa fa-calendar" aria-hidden="true"></i> <span style="font-size: 12px; text-align: right; font-style: italic"><?php echo $row["NgayDang"] ?></span>
                                                         </p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </li>
                                 <?php
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