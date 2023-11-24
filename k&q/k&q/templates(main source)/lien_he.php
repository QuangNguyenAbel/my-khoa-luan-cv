<?php
include 'head_f/header.php';
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
      <li class="breadcrumb-item"><a href="<?php echo $_DOMAIN; ?>trangchu">Trang Chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">GỬI THÔNG TIN LIÊN HỆ</li>
    </ol>
  </div>
</div>
<div class="container-fluid pb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="">
          <div class="">
            <div class="blog-post">
              <p></p>
              <h1></h1>
              <p></p>
              <h2 style="text-align:center"><span style="font-size:32px; color: red">
                  <strong>GỬI THÔNG TIN LIÊN HỆ</strong>
                </span>
              </h2>
              <p>
              </p>
              <!-- popup -->
              <!-- bảng đăng ký -->
              <div class="table-responsive">
                <div class="col-md-12">
                  <div class="card shadow-sm rounded">
                    <div class="card-body">
                      <form action="lien_hecode.php" method="POST">
                        <div class="modal-body">
                          <div class="form-group" for="ho_ten">Họ tên
                            <input name="ho_ten" type="text" required="" class="form-control" id="ho_ten" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required>
                          </div>
                          <div class="form-group" for="sdt">
                            <label>Số điện thoại</label>
                            <input name="sdt" type="text" required="" class="form-control" id="sdt" pattern="^(0[0-9]{9}|)$" required>
                          </div>
                          <div class="form-group" for="mail">Mail
                            <input name="mail" type="text" required="" class="form-control" id="mail" pattern="^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$" required>
                          </div>
                          <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="noidung" cols="20" rows="6" id="noidung" class="form-control" required=""></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="add_phanhoi" class="btn btn-primary">Gửi</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="">
          <div id="rate">
            <div class="container">
              <h4 class="heading text-center">LIÊN HỆ</h4>
              <div class="row">
                <div class="col-md-14">
                  <ul>
                    <li>
                      <div class="row">
                        <div class="col-md-1">
                          <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="col-md-11">
                          <p class="text-rate"><strong style="color: #e74c3c">Cách Thức Liên Hệ</strong><br></p>
                          <p class="text-rate">- Học viên có bất kỳ thắc mắc nào cần giải đáp hãy gửi qua form thông tin ở trang liên hệ này. </p>
                          <p class="text-rate">- Học viên có thể gọi điện về số điện thoại của trung tâm để bên dưới hoặc đến trực tiếp trung tâm để tư vấn và giải đáp thắc mắc cho quý học viên. </p>
                          <p class="text-rate"> <strong>Giờ làm việc</strong> : 8:00-20:30 hàng ngày</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-md-1">
                          <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="col-md-11">
                          <p class="text-rate"><strong style="color: #e74c3c">Địa chỉ</strong><br></p>
                          <p class="text-rate"> 572 Âu Cơ P.10 Quận.Tân Bình TP.HCM</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-md-1">
                          <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="col-md-11">
                          <p class="text-rate"><strong style="color: #e74c3c">Số Điện Thoại:</strong></p>
                          <p class="text-rate"> 0877227747 - 0877227202</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-md-1">
                          <i class="fas fa-at"></i>
                        </div>
                        <div class="col-md-11">
                          <p class="text-rate"><strong style="color: #e74c3c">Email:</strong> tinhocK&Qs@gmail.com </p>
                        </div>
                      </div>
                    </li>
                  </ul>
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
</div>
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
<?php include 'head_f/footer.php';
?>