<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <?php
  if ($data_user['usertype'] == '1') {
    echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="' . $_DOMAIN . '">
    <div class="sidebar-brand-icon ">
      <i class="fas fa-user-secret"></i>
    </div>
    <div class="sidebar-brand-text mx-3">QUẢN LÝ <br>HỆ THỐNG</div>
  </a>';
  } else if ($data_user['usertype'] == '2') {
    echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" style="" href="' . $_DOMAIN . '">
  <div class="sidebar-brand-icon">
    <i class="fas fa-book"></i>
  </div>
  <div class="sidebar-brand-text mx-3">QUẢN LÝ <br>ĐÀO TẠO</div>
</a>';
  } else if ($data_user['usertype'] == '3') {
    echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" style="color: aqua"href="' . $_DOMAIN . '">
    <div class="sidebar-brand-icon ">
      <i class="fab fa-black-tie"></i>
    </div>
    <div class="sidebar-brand-text mx-3">NHÂN VIÊN </div>
  </a>';
  } else if ($data_user['usertype'] == '4') {
    echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="' . $_DOMAIN . '">
    <div class="sidebar-brand-icon 	">
      <i class="fas fa-funnel-dollar"></i>
    </div>
    <div class="sidebar-brand-text mx-3">KẾ TOÁN</div>
  </a>';
  } else if ($data_user['usertype'] == '5') {
    echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" style="color: aquamarine" href="' . $_DOMAIN . '">
  <div class="sidebar-brand-icon">
    <i class="fas fa-chalkboard-teacher"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Giảng Viên</div>
</a>';
  } else if ($data_user['usertype'] == '6') {
    echo '<a class="sidebar-brand d-flex align-items-center justify-content-center" style="color: aquamarine" href="' . $_DOMAIN . '">
  <div class="sidebar-brand-icon">
    <i class="fas fa-chalkboard-teacher"></i>
  </div>
  <div class="sidebar-brand-text mx-3">HỌC VIÊN</div>
</a>';
  }
  ?>

  <!-- Trang chủ, thông tin cá nhân -->
  <?php
  echo '<hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="' . $_DOMAIN . '">
      <i class="fa fa-home"></i>
      <span>Trang Chủ</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'profile">
      <i class="fa fa-id-card"></i>
      <span>Thông Tin Cá Nhân</span></a>
  </li>';
  ?>
  <?php
  // tài liệu
  if ($data_user['usertype'] != '6') {
    echo '<li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'thongbao_noibo">
      <i class="fas fa-envelope"></i>
      <span>Thông Báo Nội Bộ</span></a>
  </li>';
  }
  ?>
  <?php
  // chức năng user quản lý hệ thống
  if ($data_user['usertype'] == '1') {
    echo '
    <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
    <i class="fas fa-laptop-code"></i>
    <span>Quản Lý Nội Dung Website</span>
  </a>
  <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="' . $_DOMAIN . 'thongtin">Thông Tin Website</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'gioithieu">Giới Thiệu</a>
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
    <i class="fas fa-fw fa-cog"></i>
    <span>Quản Lý Hệ Thống</span>
  </a>
  <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      
      <a class="collapse-item" href="' . $_DOMAIN . 'taikhoan">Tài Khoản</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'chucvu">Chức Vụ</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'history">Lịch Sử Hệ Thống</a>   
    </div>
  </div>
</li>

    ';
  }
  ?>
  <?php
  if ($data_user['usertype'] == '4') {
    echo '
    <li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'thanhtoan_dshv">
    <i class="fa fa-newspaper" aria-hidden="true"></i>
      <span>Thanh Toán Học Phí</span></a>
    </li>
  ';
  }
  if ($data_user['usertype'] == '1' || $data_user['usertype'] == '2') {
    echo '
    <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
    <i class="fa fa-id-badge"></i>
    <span>Quản Lý Thông Tin</span>
  </a>
  <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="' . $_DOMAIN . 'nhanvien">Nhân Viên/Giáo Viên</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'hocvien">Học Viên</a>     
    </div>
  </div>
</li>
    ';
  }
  ?>
  <?php
  if ( $data_user['usertype'] == '3') {
    echo '
    
    <li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'hocvien">
      <i class="fas fa-user"></i>
      <span>Thông Tin Học Viên</span></a>
  </li>
    ';
  }
  ?>
  <?php
  if ($data_user['usertype'] == '2' || $data_user['usertype'] == '3') {
    echo '
    
    <li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'taikhoan">
      <i class="fas fa-user"></i>
      <span>Tài Khoản Học Viên</span></a>
  </li>
    <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
    <i class="fas fa-school"></i>
    <span>Đào Tạo</span>
  </a>
  <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="' . $_DOMAIN . 'lophoc">Lớp Học</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'lophoc_cu">Lớp Học Cũ</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'ca_hoc">Ca Học</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'trangthailop">Trạng Thái Lớp</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'nienkhoa">Niên Khoá</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'phonghoc">Phòng Học</a>
    </div>
  </div>
</li>';
  }
  ?>
  <?php
  //khoá học
  if ($data_user['usertype'] == '2' || $data_user['usertype'] == '3') {
    echo '<li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'khoahoc">
      <i class="fas fa-book"></i>
      <span>Khoá Học</span></a>
  </li> 
  <li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'khoa_thilai">
      <i class="fas fa-book"></i>
      <span>Khoá Thi Lại</span></a>
  </li> 
    ';
  }
  ?>
  <?php
  //lịch biểu và duyệt tài liệu
  if ($data_user['usertype'] == '2') {
    /*echo '<li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'lich_bieu">
      <i class="fas fa-calendar"></i>
      <span>Lịch Biểu</span></a>
  </li>';*/
    echo '<li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'duyet_tailieu">
      <i class="fas fa-file"></i>
      <span>Duyệt Tài Liệu</span></a>
  </li>';
  }
  ?>
  <?php
  //duyệt tin
  if ($data_user['usertype'] == '1' || $data_user['usertype'] == '2') {
    echo '
    <li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'duyet_tin">
    <i class="fas fa-check"></i>
    <span>Duyệt Tin</span></a>
</li>
    ';
  }
  ?>

  <?php
  //tin tức
  if ($data_user['usertype'] == '1' || $data_user['usertype'] == '3' || $data_user['usertype'] == '2') {
    echo '
    <li class="nav-item">
<a class="nav-link" href="' . $_DOMAIN . 'tintuc">
<i class="fa fa-newspaper" aria-hidden="true"></i>
  <span>Tin Tức</span></a>
</li>
    ';
  }
  ?>
  <?php
  // tài liệu
  if ($data_user['usertype'] == '2' || $data_user['usertype'] == '5') {
    echo '<li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'tailieu">
      <i class="fas fa-archive"></i>
      <span>Tài Liệu</span></a>
  </li>';
  }
  ?>
  <?php
  //doanh thu và loại thu chi
  if ($data_user['usertype'] == '4') {
    echo '<li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'doanhthu">
      <i class="fa fa-check-square"></i>
      <span>Báo Cáo Doanh Thu</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'loaithuchi">
      <i class="fa fa-calculator"></i>
      <span>Loại Thu Chi</span></a>
  </li>    
    ';
  }
  ?>


  <?php
  //lịch dạy và lớp dạy
  if ($data_user['usertype'] == '5') {
    echo '<li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'lophoc">
      <i class="fas fa-school"></i>
      <span>Danh Sách Lớp</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'lichday">
      <i class="fa fa-calendar"></i>
      <span>Lịch Dạy</span></a>
  </li> 
  <li class="nav-item">
    <a class="nav-link" href="' . $_DOMAIN . 'lichxemthi">
      <i class="fa fa-calendar"></i>
      <span>Lịch Xem Thi</span></a>
  </li>     
    ';
  }
  ?>

  <?php
  //môn học
  if ($data_user['usertype'] == '2' || $data_user['usertype'] == '3') {
    echo '
    <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
    <i class="fas fa-fw fa-book"></i>
    <span>Bộ Môn</span>
  </a>
  <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="' . $_DOMAIN . 'monhoc">Môn Học</a>
		  <a class="collapse-item" href="' . $_DOMAIN . 'bo_mon">Bộ Môn</a> 
		  <a class="collapse-item" href="' . $_DOMAIN . 'linhvuc">Lĩnh Vực</a> 
    </div>
  </div> 
    ';
  }
  ?>
  <?php
  //xem thu chi
  if ($data_user['usertype'] == '1' || $data_user['usertype'] == '3') {
    echo '
    <li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'hopthu">
    <i class="fas fa-mail-bulk"></i>
    <span>Hộp thư</span></a>
</li>
    ';
  }
  ?>

  <?php
  //xem thu chi
  if ($data_user['usertype'] == '1' || $data_user['usertype'] == '2') {
    echo '
    <li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'xemthongke">
    <i class="fas fa-comment-dollar"></i>
    <span>Xem Thu Chi</span></a>
</li>
    ';
  }
  ?>

  <?php
  //học viên
  if ($data_user['usertype'] == '6') {
    echo '
    <li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'lichhoc">
    <i class="fas fa-calendar"></i>
    <span>Xem Lịch Học</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'lichthi">
    <i class="fas fa-calendar"></i>
    <span>Xem Lịch Thi</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'tailieu">
    <i class="fas fa-book"></i>
    <span>Xem Tài Liệu</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'xemdiem">
    <i class="fas fa-address-card"></i>
    <span>Xem Điểm</span></a>
</li>';

          echo '<li class="nav-item">
          <a class="nav-link" href="' . $_DOMAIN . 'dangky_thilai">
            <i class="fas fa-comment-dollar"></i>
            <span>Đăng Ký Thi Lại</span></a>
          </li>';
    echo '
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'xemcongno">
    <i class="fas fa-comment-dollar"></i>
    <span>Xem Công Nợ</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'thanhtoan_hocphi">
    <i class="fas fa-comment-dollar"></i>
    <span>Thanh Toán Học Phí</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'dangkykhoahoc">
    <i class="fas fa-comment-dollar"></i>
    <span>Đăng Ký Khoá Học</span></a>
</li>
    ';
  }
  ?>

  <?php
  echo '<li class="nav-item">
    <a class="nav-link" href="../test.php" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-exclamation-circle"></i>
      <span>Đăng Xuất</span></a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
              ' . $data_user['username'] . '
            </span>
            <img class="img-profile rounded-circle" src="anh_nhan_vien/logo.png">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- End of Topbar -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Xác Nhận Đăng Xuất </div>
          <div class="modal-footer">
            <form action="logout.php" method="POST">
              <button type="submit" name="logout_btn" class="btn btn-primary">Đăng Xuất</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
            </form>
          </div>
        </div>
      </div>
    </div>';
  ?>