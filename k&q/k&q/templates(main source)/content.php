<div>
    <?php
    // Phân trang content
    // Lấy tham số tab
    if (isset($_GET['tab']))
    {
        $tab = trim(addslashes(htmlspecialchars($_GET['tab'])));
    }
    else
    {
        $tab = '';
    }
 
    // Nếu có tham số tab
    if ($tab != '')
    {
        // Hiển thị template chức năng theo tham số tab
        if ($tab == 'trangchu')
        {
            require_once 'templates/trangchu.php';
        }
        else if ($tab == 'gioithieu')
        {
            require_once 'templates/gioithieu.php';
        }
        else if ($tab == 'lichhoc')
        {
            require_once 'templates/client_lop_hoc.php';
        }
        else if ($tab == 'tailieu')
        {
            require_once 'templates/client_tai_lieu_chon.php';
        }
		else if ($tab == 'tintuc')
        {
            require_once 'templates/tin-tuc.php';
        }
		else if ($tab == 'khoahoc_dangky')
        {
            require_once 'templates/dangkykhoahoc.php';
        }
		else if ($tab == 'lienhe')
        {
            require_once 'templates/lien_he.php';
        }
		else if ($tab == 'khoahoc_dangky_tt')
        {
            require_once 'templates/dangkykhoahoc_tt.php';
        }
		else if ($tab == 'dangky_thanhcong')
        {
            require_once 'templates/dk_success.php';
        }
        else if ($tab == 'dangky_saimatkhau')
        {
            require_once 'templates/dk_saimk.php';
        }
		else if ($tab == 'dangky_thatbai')
        {
            require_once 'templates/dk_fail.php';
        }
        
		else if ($tab == 'lichhoc_dshs')
        {
            require_once 'templates/client_danh_sach_hs.php';
        }
		else if ($tab == 'lichhoc_xem')
        {
            require_once 'templates/client_lich_hoc.php';
        }
		else if ($tab == 'tailieu_xem')
        {
            require_once 'templates/client_tai_lieu.php';
        }
		else if ($tab == 'lienhe_success')
        {
            require_once 'templates/lien_he_success.php';
        }
		else if ($tab == 'tintuc_chitiet')
        {
            require_once 'templates/tin-tucct.php';
        }
        else if ($tab == 'khoahoc_php')
        {
            require_once 'templates/khoahoc_php.php';
        }
        else if ($tab == 'khoahoc')
        {
            require_once 'templates/khoahoc.php';
        }
        else if ($tab == 'bo_mon')
        {
            require_once 'templates/bo_mon.php';
        }
        else if ($tab == 'dangky')
        {
            require_once 'templates/dangky.php';
        }
        else if ($tab == 'dangky_tt')
        {
            require_once 'templates/dangky_tt.php';
        }
		else if ($tab == 'bomon_tt')
        {
            require_once 'templates/bo_mon_tt.php';
        }
		else if ($tab == 'setting')
        {
            require_once 'templates/setting.php';
        }
        else if ($tab == 'setting')
        {
            require_once 'templates/setting.php';
        }
		
    }
    // Ngược lại không có tham số tab
    else
    {
        require_once 'templates/trangchu.php';
    }
 
    ?>
</div><!-- div.content -->