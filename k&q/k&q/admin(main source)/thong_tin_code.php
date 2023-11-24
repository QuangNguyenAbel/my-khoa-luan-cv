<?php 
require_once 'core/init.php';
if(isset($_POST['update_btn']))
 {
    $id =trim(addslashes(htmlspecialchars($_POST['edit_id'])));
    $image = $_FILES['image']['name'];
    $giolam = trim(addslashes(htmlspecialchars($_POST['glam'])));
    $facebook = trim(addslashes(htmlspecialchars($_POST['fbook'])));
    $youtube =  trim(addslashes(htmlspecialchars($_POST['ytube'])));
    $hotline =trim(addslashes(htmlspecialchars($_POST['hline'])));
    $lienhe = trim(addslashes(htmlspecialchars($_POST['lhe'])));
    $MaNhanVien = trim(addslashes(htmlspecialchars($_POST['mnv'])));   
    $sql	= "
    UPDATE thongtin_web 
    SET logo ='$image',
        GioLam ='$giolam', 
        Facebook='$facebook', 
        Youtube='$youtube', 
        Hotline='$hotline', 
        Lienhe='$lienhe', 
        MaNhanVien='$mnv'
    WHERE stt ='$id'";
    $query_run = $db->query($sql);
    if (!$query_run) {
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_nhan_vien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Sửa Thành Công";
 		new Redirect($_DOMAIN.'thongtin');
    } else {
      $_SESSION['status']= "Sửa Thất Bại";
 		new Redirect($_DOMAIN.'thongtin');
    }
 }
