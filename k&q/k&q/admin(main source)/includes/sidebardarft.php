<?php
//giáo viên
if ($data_user['usertype'] == '5') {
  echo '   
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" style="color: aquamarine" href="' . $_DOMAIN . '">
  <div class="sidebar-brand-icon">
    <i class="fas fa-chalkboard-teacher"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Giảng Viên</div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
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
    <i class="fa fa-check-square"></i>
    <span>Thông Tin Cá Nhân</span></a>
</li>
	   <li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'lophoc_gv">
    <i class="fas fa-school"></i>
    <span>Danh Sách Lớp</span></a>
</li>
<!-- Nav Item - Chấm Công - Điểm Danh -->
	   <li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'tailieu">
    <i class="far fa-folder-open"></i>
    <span>Tài Liệu</span></a>
</li>
    <li class="nav-item">
<a class="nav-link" href="' . $_DOMAIN . 'tintuc">
  <i class="far fa-folder-open"></i>
  <span>Tin Tức</span></a>
</li>
<li class="nav-item">
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
// nhân viên
} else if ($data_user['usertype'] == '3') {
  echo '
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" style="color: aqua"href="' . $_DOMAIN . '">
  <div class="sidebar-brand-icon ">
    <i class="fab fa-black-tie"></i>
  </div>
  <div class="sidebar-brand-text mx-3">NHÂN VIÊN </div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="' . $_DOMAIN . '">
    <i class="fa fa-home"></i>
    <span>TRANG CHỦ</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'profile">
    <i class="fa fa-check-square"></i>
    <span>Thông Tin Cá Nhân</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'lichlamviec">
    <i class="fa fa-calendar"></i>
    <span>Lịch làm việc</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'tintuc">
    <i class="fa fa-newspaper"></i>
    <span>Tin Tức</span></a>
</li>

<!-- Nav Item - Quản Lý Lớp Học -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
    <i class="fas fa-school"></i>
    <span>Lớp Học</span>
  </a>
  <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="' . $_DOMAIN . 'lophoc">Lớp Học</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'lichhoc">Lịch Học</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'phonghoc">Phòng Học</a>
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'lichthi">
    <i class="fa fa-calendar"></i>
    <span>Lịch Thi</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'hopthu">
    <i class="fas fa-mail-bulk"></i>
    <span>Hộp thư</span></a>
</li>
</li>	  
<li class="nav-item">
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
                <a class="dropdown-item" href="../index.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng Xuất
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
          <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Đăng Xuất</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Bạn chắc chắn muốn đăng xuất ? </div>
        <div class="modal-footer">
          <form action="logout.php" method="POST"> 
            <button type="submit" name="logout_btn" class="btn btn-primary">Đăng xuất</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          </form>
        </div>
      </div>
    </div>
  </div>';
  // kế toán
} else if ($data_user['usertype'] == '4') {
  echo '   
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="' . $_DOMAIN . '">
  <div class="sidebar-brand-icon 	">
    <i class="fas fa-funnel-dollar"></i>
  </div>
  <div class="sidebar-brand-text mx-3">KẾ TOÁN</div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">

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
    <i class="fa fa-check-square"></i>
    <span>Thông Tin Cá Nhân</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'lichlamviec">
    <i class="fa fa-calendar"></i>
    <span>Lịch Làm Việc</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'luong">
    <i class="fa fa-calendar"></i>
    <span>Lương nhân sự</span></a>
</li>
	   <li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'khoahoc">
    <i class="fa fa-graduation-cap"></i>
    <span>Khoá Học</span></a>
</li>
<!-- Nav Item - Quản Lý Thu Chi -->
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'doanhthu">
    <i class="fa fa-check-square"></i>
    <span>Báo Cáo Doanh Thu</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'loaithuchi">
    <i class="fa fa-calculator"></i>
    <span>Loại Thu Chi</span></a>
</li>
<li class="nav-item">
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
                  Đăng xuất
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
          <h5 class="modal-title" id="exampleModalLabel">XÁC NHẬN ĐĂNG XUẤT</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Bạn chắc chắn muốn đăng xuất </div>
        <div class="modal-footer">
          <form action="logout.php" method="POST"> 
            <button type="submit" name="logout_btn" class="btn btn-primary">Đăng Xuất</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          </form>
        </div>
      </div>
    </div>
  </div>';
} else if ($data_user['usertype'] == 'Quản Lý') {
  echo '   
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="' . $_DOMAIN . '">
  <div class="sidebar-brand-icon ">
    <i class="fas fa-user-secret"></i>
  </div>
  <div class="sidebar-brand-text mx-3">QUẢN TRỊ <br>HỆ THỐNG</div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
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
    <i class="fa fa-check-square"></i>
    <span>Thông Tin Cá Nhân</span></a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
    <i class="fas fa-laptop-code"></i>
    <span>Quản Lý Nội Dung Website</span>
  </a>
  <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
		<a class="collapse-item" href="' . $_DOMAIN . 'duyet_tailieu">Duyệt Tài Liệu</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'duyet_tin">Duyệt Tin</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'tintuc">Tin Tức</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'thongtin">Thông Tin Website</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'gioithieu">Giới Thiệu</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'tailieu">Tài Liệu</a>
    </div>
  </div>
</li>
<!-- Nav Item - Quản Lý Hệ Thống -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
    <i class="fas fa-fw fa-cog"></i>
    <span>Quản Lý Hệ Thống</span>
  </a>
  <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      
      <a class="collapse-item" href="' . $_DOMAIN . 'taikhoan_nv">Tài Khoản NV</a>
		<a class="collapse-item" href="' . $_DOMAIN . 'taikhoan_gv">Tài Khoản GV</a>
		
      <a class="collapse-item" href="' . $_DOMAIN . 'chucvu">Chức Vụ</a>    
    </div>
  </div>
</li>
<!-- Nav Item - Quản Lý Lớp Học -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
    <i class="fa fa-id-badge"></i>
    <span>Quản Lý Thông Tin</span>
  </a>
  <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="' . $_DOMAIN . 'nhanvien">Nhân Viên/Giáo Viên</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'hocsinh">Học Sinh</a>     
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
    <i class="fas fa-school"></i>
    <span>Quản Lý Lớp Học</span>
  </a>
  <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="' . $_DOMAIN . 'lophoc">Lớp Học</a>
      <a class="collapse-item" href="' . $_DOMAIN . 'lichhoc">Lịch Học</a>
	  <a class="collapse-item" href="' . $_DOMAIN . 'phonghoc">Phòng Học</a>
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link" href="' . $_DOMAIN . 'xemthongke">
    <i class="fas fa-comment-dollar"></i>
    <span>Xem Thu Chi</span></a>
</li>
<li class="nav-item">
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
                <a class="dropdown-item" href="../index.php" data-toggle="modal" data-target="#logoutModal">
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
          <h5 class="modal-title" id="exampleModalLabel">XÁC NHẬN ĐĂNG XUẤT</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Bạn chắc chắn muốn đăng xuất </div>
        <div class="modal-footer">
          <form action="logout.php" method="POST"> 
            <button type="submit" name="logout_btn" class="btn btn-primary">Đăng Xuất</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          </form>
        </div>
      </div>
    </div>
  </div>';
}
