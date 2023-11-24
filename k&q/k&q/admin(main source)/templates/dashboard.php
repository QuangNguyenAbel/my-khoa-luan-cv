<?php
echo '<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Trang Chủ</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <!-- Earnings (Monthly) Card Example -->
      ';
//tài khoản
if ($data_user['usertype'] == '1') {
  $sql_tk = "SELECT id FROM register";
  $tk = $db->num_rows($sql_tk);
  echo '
	<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
			  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tài Khoản Trong Hệ Thống</div>
                <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $tk . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-cog fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>';
}
//nhân viên
if ($data_user['usertype'] == '1') {
  $sql_nv = "SELECT * FROM register where usertype not in (6)";
  $nv = $db->num_rows($sql_nv);
  echo '<div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nhân viên/giáo viên</div>
                 <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $nv . '</h1>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      ';
}
// học sinh
if ($data_user['usertype'] == '1' || $data_user['usertype'] == '2') {
  $sql_hs = "SELECT * FROM register where usertype=6";
  $hs = $db->num_rows($sql_hs);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Học Viên </div>
                <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $hs . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>';
}
//tin tức chưa duyệt
if ($data_user['usertype'] == '1') {
  $sql = "SELECT * FROM tin_tuc where Trangthai = 0";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tin Tức Chưa Duyệt</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-tasks fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}

//tài liệu chưa duyệt
if ($data_user['usertype'] == '2') {
  $sql = "SELECT * FROM tai_lieu where TrangThai = 0";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tài Liệu Chưa Duyệt</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-tasks fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//thư chưa phản hồi
if ($data_user['usertype'] == '1' || $data_user['usertype'] == '3') {
  $sql = "SELECT * FROM phan_hoi where trangthai = 0";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Thư Chưa Phản Hồi</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-envelope fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//lớp học
if ($data_user['usertype'] == '2' || $data_user['usertype'] == '3') {
  $sql_lop = "SELECT * FROM lop_hoc where trangthailop in (4,5,6)";
  $lop = $db->num_rows($sql_lop);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lớp Học</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $lop . '</h1>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-building fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      ';
}
//lớp học cũ
if ($data_user['usertype'] == '2' || $data_user['usertype'] == '3') {
  $sql_lop = "SELECT * FROM lop_hoc where trangthailop in (7)";
  $lop = $db->num_rows($sql_lop);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lớp Học Cũ</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $lop . '</h1>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-building fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      ';
}
//khoá học
if ($data_user['usertype'] == '2' || $data_user['usertype'] == '3') {
  $sql = "SELECT * FROM lop_hoc where trangthailop in (1,2,3)";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Khoá Học</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//Thông Báo Nội Bộ Chung
if ($data_user['usertype'] != '6') {
  $sql = "SELECT * FROM `thong_bao_nb` WHERE thong_bao_nb.loai_tbnb = 1";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Thông Báo Nội Bộ Chung</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//Thông Báo Nội Bộ Cá Nhân
if ($data_user['usertype'] != '6') {
  $id=$data_user['id'];
  $sql = "SELECT * FROM `thong_bao_nb` WHERE thong_bao_nb.loai_tbnb = 2 and thong_bao_nb.id_nv_nhan='$id'";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Thông Báo Nội Bộ Của Bạn</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//học viên đăng ký khoá học đợt này
if ($data_user['usertype'] == '4') {
  $sql = "SELECT  DISTINCT id_hs FROM `chi_tiet_lop_hoc` 
  JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
  WHERE lop_hoc.trangthailop IN (1,2,3) ";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Học Viên Đăng Ký Khoá Học</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//học viên đã thanh toán
if ($data_user['usertype'] == '4') {
  $sql = "SELECT  DISTINCT id_hs FROM `chi_tiet_lop_hoc` 
  JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
  WHERE lop_hoc.trangthailop IN (1,2,3) and chi_tiet_lop_hoc.thanhtoan=1";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Học Viên Đã Thanh Toán</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//học viên chưa thanh toán
if ($data_user['usertype'] == '4') {
  $sql = "SELECT id_hs FROM `chi_tiet_lop_hoc` 
  JOIN lop_hoc On lop_hoc.id_lop=chi_tiet_lop_hoc.id_lop
  WHERE lop_hoc.trangthailop IN (1,2,3) and chi_tiet_lop_hoc.thanhtoan=0";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Học Viên Chưa Thanh Toán</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//số tiền thu
if ($data_user['usertype'] == '4') {
  $sql_thu = "SELECT sum(SoTienThu) FROM thu_chi";
  foreach ($db->fetch_assoc($sql_thu, 0) as $key => $row_thu) {
    echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số Tiền Thu</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . number_format($row_thu['sum(SoTienThu)']) . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    
';
  }
}
//số tiền chi
if ($data_user['usertype'] == '4') {
  $sql_chi = "SELECT sum(SoTienChi) FROM thu_chi";
  foreach ($db->fetch_assoc($sql_chi, 0) as $key => $row_chi) {
    echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số Tiền Chi </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . number_format($row_chi['sum(SoTienChi)']) . '</h1>
                  </div>
                  <div class="col">
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>';
  }
}
//môn học
if ($data_user['usertype'] == '2' || $data_user['usertype'] == '3') {
  $sql = "SELECT * FROM mon_hoc";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Môn Học</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
    $sql = "SELECT * FROM bo_mon";
    $result = $db->num_rows($sql);
    echo '<div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info  text-uppercase mb-1">Bộ Môn</div>
                 <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
                </div>
                <div class="col-auto">
                  <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      ';
}
//lớp dạy
if ($data_user['usertype'] == '5') {
  $id=$data_user['id'];
  $sql = "SELECT lop_hoc.id_lop FROM lop_hoc JOIN register on register.id = lop_hoc.id_gv 
  WHERE register.id=$id and lop_hoc.trangthailop IN (4,5,6) ";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số Lớp Đang Dạy</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//khoá học sắp dạy
if ($data_user['usertype'] == '5') {
  $id=$data_user['id'];
  $sql = "SELECT lop_hoc.id_lop FROM lop_hoc JOIN register on register.id = lop_hoc.id_gv 
  WHERE register.id=$id and lop_hoc.trangthailop IN (1,2,3) ";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số Khoá Học Sắp Dạy</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//lớp cũ đã dạy
if ($data_user['usertype'] == '5') {
  $id=$data_user['id'];
  $sql = "SELECT lop_hoc.id_lop FROM lop_hoc JOIN register on register.id = lop_hoc.id_gv 
  WHERE register.id=$id and lop_hoc.trangthailop IN (7) ";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số Lớp Cũ Đã Dạy</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//Số Học Viên Đang Dạy
if ($data_user['usertype'] == '5') {
  $id=$data_user['id'];
  $sql = "SELECT lop_hoc.id_lop FROM lop_hoc JOIN register on register.id = lop_hoc.id_gv 
  WHERE register.id=$id and lop_hoc.trangthailop IN (7) ";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số Học Viên Đang Dạy</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//đang học
if ($data_user['usertype'] == '6') {
  $sql = "SELECT * FROM mon_hoc";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Môn Học</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//lịch thi
if ($data_user['usertype'] == '6') {
  $sql = "SELECT * FROM mon_hoc";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Môn Học</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//công nợ chưa trả
if ($data_user['usertype'] == '6') {
  $sql = "SELECT * FROM mon_hoc";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Môn Học</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
//công nợ đã trả
if ($data_user['usertype'] == '6') {
  $sql = "SELECT * FROM mon_hoc";
  $result = $db->num_rows($sql);
  echo '<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Môn Học</div>
               <h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $result . '</h1>
              </div>
              <div class="col-auto">
                <i class="fas fa-book fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    ';
}
echo '
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
';
