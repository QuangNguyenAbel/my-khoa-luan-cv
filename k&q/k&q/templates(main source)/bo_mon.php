<header>
  <style>
    #a {
      background-color: #4CAF50;
      /* Green */
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    #a {
      background-color: white;
      color: black;
      border: 2px solid red;
    }

    #a:hover {
      background-color: #BA2528;
      color: white;
    }

    th,
    td {
      text-align: center;
    }
  </style>
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
                  <strong>MÔN HỌC</strong>
                </span>
              </h2>
              
              <!-- popup -->
              <!-- bảng đăng ký -->
              <div class="card-body" style=" text-align:center">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>STT </th>
                        <th>Tên Bộ Môn </th>
                        <th> </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sql   = "SELECT * FROM bo_mon";
                        if ($db->num_rows($sql)) {
                          $serial_number = 0;
                          foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                            $serial_number++;
                      ?>
                            <tr>
                              <td> <?php echo $serial_number; ?></td>
                              <td> <?php echo $row['ten_bomon']; ?></td>
                              <td>
                                <form action="<?php echo $_DOMAIN; ?>bomon_tt" method="POST">
                                  <input type="hidden" name="id" value="<?php echo $row['id_bo_mon']; ?>">
                                  <?php
                                  echo '<button type="submit" name="xem" class="btn btn-info">Xem Thông Tin Môn Học</button>';
                                  ?>
                                </form>
                          </td>
                                <td>
                                <form action="<?php echo $_DOMAIN; ?>khoahoc" method="POST">
                                  <input type="hidden" name="id" value="<?php echo $row['id_bo_mon']; ?>">
                                  <input type="hidden" name="ten" value="<?php echo $row['ten_bomon']; ?>">
                                  <?php
                                  echo '<button type="submit" name="xem" class="btn btn-primary">Xem Khoá Học</button>';
                                  ?>
                                </form>
                            </tr>
                             
                            
                      <?php
                          }
                        } else {
                          echo "No record found";
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