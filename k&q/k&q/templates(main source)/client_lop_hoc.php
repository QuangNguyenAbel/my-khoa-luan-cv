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
      <li class="breadcrumb-item active" aria-current="page">Lớp Học</li>
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
                  <strong>LỚP HỌC</strong>
                </span>
              </h2>
              <br>
              <p>

              </p>
              <!-- popup -->

              <!-- bảng đăng ký -->
              <div class="card-body" style="font-size: 15px; text-align:center">

                <?php
                if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                  echo '
          <div class="alert alert-success">
            ' . $_SESSION['success'] . '
          </div>';
                  unset($_SESSION['success']);
                }

                if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                  echo '
          <div class="alert alert-danger">
            ' . $_SESSION['status'] . '
          </div>';
                  unset($_SESSION['status']);
                }
                ?>

                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>STT </th>
                        <th>Tên Lớp </th>
                        <th>Môn Học</th>
                        <th>Tên Giảng Viên</th>
                        <th> </th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                     $sql="SELECT * FROM lop_hoc";
					if($db->num_rows($sql))
					{
						$serial_number=0;
						foreach($db->fetch_assoc($sql, 0) as $key => $row)
						{
							$serial_number++;
							echo '
							<tr>
                            <td> '.$serial_number.'</td>
                            <td> '.$row['MaLop'].'</td>
                            <td> '.$row['MonHoc'].'</td>
                            <td> '.$row['MaGV'].'</td>
                            <td>
                              <form action="'.$_DOMAIN.'lichhoc_dshs" method="POST">
                                <input type="hidden" name="ds_id" value="'.$row['id'].'">
                                <button type="submit" style="font-size: 15px; text-align:center" name="edit_ds" class="btn btn-primary"> Xem Danh Sách</button>
                              </form>
                            </td>
                            <td>
                              <form action="'.$_DOMAIN.'lichhoc_xem" method="POST">
                                <input type="hidden" name="edit_id" value="'.$row['id'].'">
                                <button type="submit" style="font-size: 15px; text-align:center" name="edit_cv" class="btn btn-success"> Xem Lịch Học</button>
                              </form>
                            </td>
                          </tr>
							';
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