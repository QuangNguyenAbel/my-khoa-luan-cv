<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <script src="js\fontawesome.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/phantrang.css">
  <link rel="shortcut icon" type="image/jpg" href="img/logo-img/icon.jpg">
  <style>
    .breadcrumb {
      background-color: #ffffff
        /* box-shadow: 0 2px 3px rgb(209, 209, 209); */
    }

    .lienket {
      display: inline-block;
      padding: 5px 10px;
      color: #fff;
      background: red;
      margin: 10px 0;
      font-weight: 600;
    }

    .img-tua {
      text-align: center;
      font-size: 12px;
      color: red;
    }
  </style>
  <title>Trung Tâm Tin Học K&Q</title>
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
  <div id="home">
    <nav class="navbar navbar-expand-md navbar-white bg-white fixed-top">
      <?php
      $sql = "SELECT * FROM thongtin_web";
      if ($db->num_rows($sql)) {
        foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
          echo '<a class="navbar-brand" href="index.php"> <img style="height:60px;transition: ease 0.3s;" src="admin/anh_nhan_vien/' . $row['logo'] . '"  alt="logo"> </a>';
        }
      }
      ?>
      <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="<?php echo $_DOMAIN; ?>trangchu">Trang chủ</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $_DOMAIN; ?>gioithieu">Giới thiệu</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $_DOMAIN; ?>bo_mon">Môn Học</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $_DOMAIN; ?>tintuc">Tin Tức</a></li>
          </li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $_DOMAIN; ?>lienhe">Liên Hệ</a></li>
          <li class="nav-item">
            <a class="nav-link" style="font-weight: bolder; color:#dc3545" href="<?php echo $_DOMAIN; ?>dangky">Đăng Ký</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="./admin/">
          <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Đăng nhập</button>
        </form>
      </div>
    </nav>
  </div>