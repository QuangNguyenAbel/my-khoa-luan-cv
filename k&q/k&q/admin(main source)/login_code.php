<?php
// Kết nối database và thông tin chung
require_once 'core/init.php';
// Nếu có tồn tại phương thức post
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Xử lý các giá trị 
    $user_signin = trim(htmlspecialchars(addslashes($_POST['email'])));
    $pass_signin = trim(htmlspecialchars(addslashes($_POST['password'])));
    // Các biến xử lý thông báo
    $show_alert = '<script>$("#formSignin .alert").removeClass("hidden");</script>';
    $hide_alert = '<script>$("#formSignin .alert").addClass("hidden");</script>';
    $success = '<script>$("#formSignin .alert").attr("class", "alert alert-success");</script>';
    // Nếu giá trị rỗng
    if ($user_signin == '' || $pass_signin == '') {
        $_SESSION['status'] = 'Vui lòng điền đầy đủ thông tin.';
        new Redirect($_DOMAIN);
    }
    // Ngược lại
    else {
        $sql_check_user_exist = "SELECT email FROM register WHERE email = '$user_signin'";
        // Nếu tồn tại username
        if ($db->num_rows($sql_check_user_exist)) {
            $pass_signin = md5($pass_signin);
            $sql_check_signin = "SELECT email, password FROM register WHERE email = '$user_signin' AND password = '$pass_signin'";
            if ($db->num_rows($sql_check_signin)) {
                $sql_check_stt = "SELECT email, password, status FROM register WHERE email = '$user_signin' AND password = '$pass_signin' AND status = '0'";
                // Nếu username và password khớp và tài khoản không bị khoá (status = 0)
                if ($db->num_rows($sql_check_stt)) {
                    // Lưu session
                    $session->send($user_signin);
                    $action = '1';
                    $data = '';
                    $date = date("d-m-Y");
                    $time = date("H:i:s");
                    $query = "INSERT INTO history(user,usertype,action,data,date,time) 
                    VALUES((SELECT username from register  WHERE email='$user_signin'),
                    (SELECT usertype from register  WHERE email='$user_signin'),'$action','$data','$date','$time')";
                    $query_run = $db->query($query);
                    $db->close(); // Giải phóng
                    new Redirect($_DOMAIN); // Trở về trang index
                } else {
                    $_SESSION['status'] = 'Tài khoản của bạn đã bị khoá, vui lòng liên hệ quản trị viện để biết thêm thông tin chi tiết.';
                    new Redirect($_DOMAIN);
                }
            } else {
                $_SESSION['status'] = 'Mật khẩu không chính xác.';
                new Redirect($_DOMAIN);
            }
        }
        // Ngược lại không tồn tại username
        else {
            $_SESSION['status'] = 'Tên đăng nhập không tồn tại.';
            new Redirect($_DOMAIN);
        }
    }
}
// Ngược lại không tồn tại phương thức post
else {
    new Redirect($_DOMAIN); // Trở về trang index
}
