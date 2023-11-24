<div class="">
    <?php
    // Phân trang content
    // Lấy tham số tab
    if (isset($_GET['tab'])) {
        $tab = trim(addslashes(htmlspecialchars($_GET['tab'])));
    }
 else {
        $tab = '';
    }

    // Nếu có tham số tab
    if ($tab != '') {
        if ($tab == 'profile') {
            require_once 'templates/profile.php';
        }
 
        else if ($tab == 'chucvu' && $data_user['usertype'] ==1 ) {
            require_once 'templates/chuc_vu.php';
        }

 
        else if ($tab == 'chucvu_edit' && $data_user['usertype'] ==1  ) {
            require_once 'templates/chuc_vu_edit.php';
        }

 
        else if ($tab == 'lophoc_thongbao'&& $data_user['usertype'] ==5) {
            require_once 'templates/lophoc_thongbao.php';
        }

 
        else if ($tab == 'lichday' && $data_user['usertype'] ==5 ) {
            require_once 'templates/lophoc_tc_lichday.php';
        }
 
        else if ($tab == 'tailieu' && $data_user['usertype'] ==5 ||$tab == 'tailieu' && $data_user['usertype'] ==2
        ||$tab == 'tailieu' && $data_user['usertype'] ==6) {
            require_once 'templates/tai_lieu.php';
        }
 
        else if ($tab == 'doimatkhau') {
            require_once 'templates/profile_doimk.php';
        }
 
        else if ($tab == 'thanhtoan_dshv' && $data_user['usertype'] ==4) {
            require_once 'templates/khach_hang.php';
        }
 
        else if ($tab == 'thanhtoan_hoadon' && $data_user['usertype'] ==4) {
            require_once 'templates/khach_hang_kt_hoa_don.php';
        }
        else if ($tab == 'thanhtoan_ct_hoadon'&& $data_user['usertype'] ==4) {
            require_once 'templates/khach_hang_kt_ct_hoa_don.php';
        }
        else if ($tab == 'thanhtoan'&& $data_user['usertype'] ==4) {
            require_once 'templates/khach_hang_kt_thu_tien.php';
        }
        else if ($tab == 'doanhthu'&& $data_user['usertype'] ==4) {
            require_once 'templates/quanlythuchi.php';
        }
        else if ($tab == 'xemthongke' && $data_user['usertype'] ==1 ||$tab == 'xemthongke' && $data_user['usertype'] ==2
        ||$tab == 'xemthongke' && $data_user['usertype'] ==4) {
            require_once 'templates/xemthongke.php';
        }
        else if ($tab == 'xemthongke_nam_quy' && $data_user['usertype'] ==1 ||$tab == 'xemthongke_nam_quy' && $data_user['usertype'] ==2
        ||$tab == 'xemthongke_nam_quy' && $data_user['usertype'] ==4) {
            require_once 'templates/xemthongke_nam_quy.php';
        }
        else if ($tab == 'xemthongke_thang' && $data_user['usertype'] ==1 ||$tab == 'xemthongke_thang' && $data_user['usertype'] ==2
        ||$tab == 'xemthongke_thang' && $data_user['usertype'] ==4) {
            require_once 'templates/xemthongke_thang.php';
        }
        else if ($tab == 'xemthongke_ngay' && $data_user['usertype'] ==1 ||$tab == 'xemthongke_ngay' && $data_user['usertype'] ==2
        ||$tab == 'xemthongke_ngay' && $data_user['usertype'] ==4) {
            require_once 'templates/xemthongke_ngay.php';
        }
        else if ($tab == 'xuatphieuchi'&& $data_user['usertype'] ==4) {
            require_once 'templates/xuatphieuchi.php';
        }
        else if ($tab == 'xuatphieuthu'&& $data_user['usertype'] ==4) {
            require_once 'templates/xuatphieuthu.php';
        }
        else if ($tab == 'loaithuchi'&& $data_user['usertype'] ==4) {
            require_once 'templates/loaithuchi.php';
        }
        else if ($tab == 'loaithuchi_edit'&& $data_user['usertype'] ==4) {
            require_once 'templates/loaithuchi_edit.php';
        }
        else if ($tab == 'doanhthu_edit'&& $data_user['usertype'] ==4) {
            require_once 'templates/quan_ly_thu_chi_edit.php';
        }
        else if ($tab == 'tintuc' && $data_user['usertype'] ==3 ||$tab == 'tintuc' && $data_user['usertype'] ==2
        ||$tab == 'tintuc' && $data_user['usertype'] ==1) {
            require_once 'templates/tin_tuc.php';
        }
        else if ($tab == 'tintuc_edit' && $data_user['usertype'] ==3 ||$tab == 'tintuc_edit' && $data_user['usertype'] ==2
        ||$tab == 'tintuc_edit' && $data_user['usertype'] ==1) {
            require_once 'templates/tin_tuc_edit.php';
        }
        else if ($tab == 'tailieu_edit' && $data_user['usertype'] ==5 ||$tab == 'tailieu_edit' && $data_user['usertype'] ==2) {
            require_once 'templates/tai_lieu_edit.php';
        }
        else if ($tab == 'hocvien' && $data_user['usertype'] ==2||$tab == 'hocvien' && $data_user['usertype'] ==3
        ||$tab == 'hocvien' && $data_user['usertype'] ==1) {
            require_once 'templates/hoc_sinh.php';
        }
        else if ($tab == 'hocvien_chuyenlop' && $data_user['usertype'] ==2||$tab == 'hocvien_chuyenlop' && $data_user['usertype'] ==3
        ||$tab == 'hocvien_chuyenlop' && $data_user['usertype'] ==1) {
            require_once 'templates/hoc_sinh_chuyen_lop.php';
        }
        else if ($tab == 'hocvien_lophoc' && $data_user['usertype'] ==2||$tab == 'hocvien_lophoc' && $data_user['usertype'] ==3
        ||$tab == 'hocvien_lophoc' && $data_user['usertype'] ==1) {
            require_once 'templates/hoc_sinh_lop_hoc.php';
        }
        else if ($tab == 'hocvien_edit' && $data_user['usertype'] ==2||$tab == 'hocvien_edit' && $data_user['usertype'] ==3
        ||$tab == 'hocvien_edit' && $data_user['usertype'] ==1) {
            require_once 'templates/hoc_sinh_edit.php';
        }
        else if ($tab == 'hocvien_edit_img' && $data_user['usertype'] ==2||$tab == 'hocvien_edit_img' && $data_user['usertype'] ==3
        ||$tab == 'hocvien_edit_img' && $data_user['usertype'] ==1) {
            require_once 'templates/hoc_sinh_edit_img.php';
        }
        else if ($tab == 'lophoc' && $data_user['usertype'] ==5 ||$tab == 'lophoc' && $data_user['usertype'] ==2
        ||$tab == 'lophoc' && $data_user['usertype'] ==3 ) {
            require_once 'templates/lop_hoc.php';
        }
        else if ($tab == 'lophoc_cu' && $data_user['usertype'] ==2||$tab == 'lophoc_cu' && $data_user['usertype'] ==3 ) {
            require_once 'templates/lop_hoc_cu.php';
        }
        else if ($tab == 'lophoc_cu_edit' && $data_user['usertype'] ==2||$tab == 'lophoc_cu_edit' && $data_user['usertype'] ==3) {
            require_once 'templates/lop_hoc_cu_edit.php';
        }
        else if ($tab == 'lophoc_cu_dshv' && $data_user['usertype'] ==2||$tab == 'lophoc_cu_dshv' && $data_user['usertype'] ==3) {
            require_once 'templates/lop_hoc_cu_dshv.php';
        }
         else if ($tab == 'lophoc_them_hv') {
            require_once 'templates/lophoc_themkh.php';
        }
        else if ($tab == 'lophoc_them_lichthi' && $data_user['usertype'] ==2||$tab == 'lophoc_them_lichthi' && $data_user['usertype'] ==3) {
                    require_once 'templates/lophoc_them_lichthi.php';
                }
        else if ($tab == 'lophoc_lichthi' && $data_user['usertype'] ==5 ||$tab == 'lophoc_lichthi' && $data_user['usertype'] ==2
                ||$tab == 'lophoc_lichthi' && $data_user['usertype'] ==3) {
                    require_once 'templates/lophoc_lichthi.php';
                }
        else if ($tab == 'lophoc_dshv' && $data_user['usertype'] ==5 ||$tab == 'lophoc_dshv' && $data_user['usertype'] ==2
                ||$tab == 'lophoc_dshv' && $data_user['usertype'] ==3) {
                    require_once 'templates/lophoc_dskh.php';
                }
        else if ($tab == 'lophoc_edit' && $data_user['usertype'] ==2||$tab == 'lophoc_edit' && $data_user['usertype'] ==3) {
                    require_once 'templates/lophoc_edit.php';
                }
        else if ($tab == 'lophoc_edit_tt' && $data_user['usertype'] ==2||$tab == 'lophoc_edit_tt' && $data_user['usertype'] ==3) {
                    require_once 'templates/lophoc_edit_tt.php';
                }
        else if ($tab == 'lophoc_lichhoc' && $data_user['usertype'] ==5 ||$tab == 'lophoc_lichhoc' && $data_user['usertype'] ==2
                ||$tab == 'lophoc_lichhoc' && $data_user['usertype'] ==3) {
                    require_once 'templates/lophoc_lichhoc.php';
                }
        else if ($tab == 'lichhoc') {
            require_once 'templates/lich_hoc.php';
        }
        else if ($tab == 'lichthi') {
                    require_once 'templates/lich_thi.php';
                }
        else if ($tab == 'lichhoc_edit') {
                    require_once 'templates/lich_hoc_edit.php';
                }
        else if ($tab == 'lophoc_ds') {
                    require_once 'templates/lophoc_ds.php';
                }
        else if ($tab == 'lophoc_ds_nhapdiem'&& $data_user['usertype'] ==5) {
                    require_once 'templates/lophoc_ds_nhapdiem.php';
                }
        else if ($tab == 'lophoc_ds_diemdanh'&& $data_user['usertype'] ==5) {
                    require_once 'templates/lophoc_ds_diemdanh.php';
                }
        else if ($tab == 'phonghoc'&& $data_user['usertype'] ==2||$tab == 'phonghoc'&& $data_user['usertype'] ==3) {
                    require_once 'templates/phong_hoc.php';
                }
        else if ($tab == 'phonghoc_lichhoc'&& $data_user['usertype'] ==2||$tab == 'phonghoc_lichhoc'&& $data_user['usertype'] ==3) {
                    require_once 'templates/phong_hoc_lichhoc.php';
                }
        else if ($tab == 'phonghoc_lichthi'&& $data_user['usertype'] ==2||$tab == 'phonghoc_lichthi'&& $data_user['usertype'] ==3) {
                    require_once 'templates/phong_hoc_lichthi.php';
                }
        else if ($tab == 'phonghoc_lichkhoahoc'&& $data_user['usertype'] ==2||$tab == 'phonghoc_lichkhoahoc'&& $data_user['usertype'] ==3) {
                    require_once 'templates/phong_hoc_lichkhoahoc.php';
                }
        else if ($tab == 'phonghoc_edit'&& $data_user['usertype'] ==2||$tab == 'phonghoc_edit'&& $data_user['usertype'] ==3) {
                    require_once 'templates/phong_hoc_edit.php';
                }
        else if ($tab == 'khoahoc'&& $data_user['usertype'] ==2||$tab == 'khoahoc'&& $data_user['usertype'] ==3) {
                    require_once 'templates/quanlykhoahoc.php';
                }
        else if ($tab == 'khoahoc_edit'&& $data_user['usertype'] ==2||$tab == 'khoahoc_edit'&& $data_user['usertype'] ==3) {
                    require_once 'templates/quanlykhoahoc_edit.php';
                }
        else if ($tab == 'khoahoc_edit_tt'&& $data_user['usertype'] ==2||$tab == 'khoahoc_edit_tt'&& $data_user['usertype'] ==3) {
                    require_once 'templates/quanlykhoahoc_edit_tt.php';
                }
        else if ($tab == 'khoahoc_themhs'&& $data_user['usertype'] ==2||$tab == 'khoahoc_themhs'&& $data_user['usertype'] ==3) {
                    require_once 'templates/quanlykhoahoc_themkh.php';
                }
        else if ($tab == 'khoahoc_dshs'&& $data_user['usertype'] ==2||$tab == 'khoahoc_dshs'&& $data_user['usertype'] ==3) {
                    require_once 'templates/quanlykhoahoc_dskh.php';
                }
        else if ($tab == 'dangkykhoahoc') {
                    require_once 'templates/quanlykhoahoc_hocvien.php';
                }
        else if ($tab == 'hopthu'&& $data_user['usertype'] ==2 ||$tab == 'hopthu'&& $data_user['usertype'] ==1) {
                    require_once 'templates/hopthu.php';
                }
        else if ($tab == 'duyet_tin'&& $data_user['usertype'] ==2 ||$tab == 'duyet_tin'&& $data_user['usertype'] ==1 ) {
                    require_once 'templates/duyet_tin.php';
                }
        else if ($tab == 'duyet_tin_tt'&& $data_user['usertype'] ==2||$tab == 'duyet_tin_tt'&& $data_user['usertype'] ==1) {
                    require_once 'templates/duyet_tin_tt.php';
                }
        else if ($tab == 'duyet_tailieu'&& $data_user['usertype'] ==2) {
                    require_once 'templates/duyet_tailieu.php';
                }
        else if ($tab == 'duyet_tailieu_tt'&& $data_user['usertype'] ==2) {
                    require_once 'templates/duyet_tailieu_tt.php';
                }
        else if ($tab == 'thongtin'&& $data_user['usertype'] ==1) {
                    require_once 'templates/thong_tin.php';
                }
        else if ($tab == 'thongtin_edit'&& $data_user['usertype'] ==1) {
                    require_once 'templates/thong_tin_edit.php';
                }
        else if ($tab == 'gioithieu'&& $data_user['usertype'] ==1) {
                    require_once 'templates/gioi_thieu.php';
                }
        else if ($tab == 'gioithieu_edit'&& $data_user['usertype'] ==1) {
                    require_once 'templates/gioi_thieu_edit.php';
                }
        else if ($tab == 'nhanvien'&& $data_user['usertype'] ==1 ||$tab == 'nhanvien' && $data_user['usertype'] ==2) {
                    require_once 'templates/nhanvien.php';
                }
        else if ($tab == 'nhanvien_tb'&& $data_user['usertype'] ==1 ||$tab == 'nhanvien_tb' && $data_user['usertype'] ==2) {
                    require_once 'templates/nhanvien_tb.php';
                }
        else if ($tab == 'nhanvien_edit'&& $data_user['usertype'] ==1 ||$tab == 'nhanvien_edit' && $data_user['usertype'] ==2) {
                    require_once 'templates/nhanvien_edit.php';
                }
        else if ($tab == 'taikhoan'&& $data_user['usertype'] ==1 ||$tab == 'taikhoan' && $data_user['usertype'] ==2
                ||$tab == 'taikhoan' && $data_user['usertype'] ==3) {
                    require_once 'templates/taikhoan.php';
                }
        else if ($tab == 'taikhoan_edit'&& $data_user['usertype'] ==1 ||$tab == 'taikhoan_edit' && $data_user['usertype'] ==2
                ||$tab == 'taikhoan_edit' && $data_user['usertype'] ==3) {
                    require_once 'templates/taikhoan_edit.php';
                }
        else if ($tab == 'taikhoan_edit_role'&& $data_user['usertype'] ==1) {
                    require_once 'templates/taikhoan_edit_role.php';
                }
        else if ($tab == 'taikhoan_edit_pass'&& $data_user['usertype'] ==1 ||$tab == 'taikhoan_edit_pass' && $data_user['usertype'] ==2
                ||$tab == 'taikhoan_edit_pass' && $data_user['usertype'] ==3) {
                    require_once 'templates/taikhoan_edit_pass.php';
                }
        else if ($tab == 'taikhoan_gv') {
                    require_once 'templates/taikhoan_gv.php';
                }
        else if ($tab == 'taikhoan_gv_edit') {
                    require_once 'templates/taikhoan_gv_edit.php';
                }
        else if ($tab == 'tintuc_edit_img' && $data_user['usertype'] ==3 ||$tab == 'tintuc_edit_img' && $data_user['usertype'] ==2
        ||$tab == 'tintuc_edit_img' && $data_user['usertype'] ==1) {
                    require_once 'templates/tintuc_edit_img.php';
                }
        else if ($tab == 'tailieu_edit_file' && $data_user['usertype'] ==3 ||$tab == 'tailieu_edit_file' && $data_user['usertype'] ==2
        ||$tab == 'tintuc_edit_img' && $data_user['usertype'] ==1) {
                    require_once 'templates/tai_lieu_edit_file.php';
                }
        else if ($tab == 'nhanvien_edit_img'&& $data_user['usertype'] ==1 ||$tab == 'nhanvien_edit_img' && $data_user['usertype'] ==2) {
                    require_once 'templates/nhanvien_edit_img.php';
                }
        else if ($tab == 'lichxemthi' && $data_user['usertype'] ==5) {
                    require_once 'templates/lophoc_tc_lichthi.php';
                }
        else if ($tab == 'monhoc'&& $data_user['usertype'] ==3 ||$tab == 'monhoc' && $data_user['usertype'] ==2) {
                    require_once 'templates/mon_hoc.php';
                }
        else if ($tab == 'monhoc_edit'&& $data_user['usertype'] ==3 ||$tab == 'monhoc_edit' && $data_user['usertype'] ==2) {
                    require_once 'templates/mon_hoc_edit.php';
                }
        else if ($tab == 'bo_mon'&& $data_user['usertype'] ==3 ||$tab == 'bo_mon' && $data_user['usertype'] ==2) {
                    require_once 'templates/bo_mon.php';
                }
        else if ($tab == 'bo_mon_edit'&& $data_user['usertype'] ==3 ||$tab == 'bo_mon_edit' && $data_user['usertype'] ==2) {
                    require_once 'templates/bo_mon_edit.php';
                }
        else if ($tab == 'bo_mon_them_gv'&& $data_user['usertype'] ==3 ||$tab == 'bo_mon_them_gv' && $data_user['usertype'] ==2) {
                    require_once 'templates/bo_mon_themgv.php';
                }
        else if ($tab == 'bo_mon_xem_gv'&& $data_user['usertype'] ==3 ||$tab == 'bo_mon_xem_gv' && $data_user['usertype'] ==2) {
                    require_once 'templates/bo_mon_dsgv.php';
                }
        else if ($tab == 'xemdiem') {
                    require_once 'templates/xemdiem.php';
                }
        else if ($tab == 'dangkykhoahoc') {
                    require_once 'templates/dangkykhoahoc.php';
                }

        else if (($tab == 'nienkhoa' && $data_user['usertype'] ==2) ||($tab == 'nienkhoa' && $data_user['usertype'] ==3)) {
            require_once 'templates/nienkhoa.php';
        }
 
        else if ($tab == 'nienkhoa_edit' && $data_user['usertype'] ==2) {
            require_once 'templates/nienkhoa_edit.php';
        }

        else if ($tab == 'ca_hoc' && $data_user['usertype'] ==2 ||$tab == 'ca_hoc' && $data_user['usertype'] ==3) {
            require_once 'templates/ca_hoc.php';
        }

        else if ($tab == 'ca_hoc_edit' && $data_user['usertype'] ==2) {
            require_once 'templates/ca_hoc_edit.php';
        }

        else if ($tab == 'trangthailop' && $data_user['usertype'] ==2 || $tab == 'trangthailop' && $data_user['usertype'] ==3) {
            require_once 'templates/trangthailop.php';
        }

        else if ($tab == 'trangthailop_edit'&& $data_user['usertype'] ==2) {
            require_once 'templates/trangthailop_edit.php';
        }

        else if ($tab == 'thongbao_noibo' && $data_user['usertype'] ==1 || $tab == 'thongbao_noibo' && $data_user['usertype'] ==2
        || $tab == 'thongbao_noibo' && $data_user['usertype'] ==3 || $tab == 'thongbao_noibo' && $data_user['usertype'] ==5
        || $tab == 'thongbao_noibo' && $data_user['usertype'] ==4){
            require_once 'templates/thongbao_noibo.php';
        }

        else if ($tab == 'thongbao_noibo_edit') {
            require_once 'templates/thongbao_noibo_edit.php';
        }

        else if ($tab == 'thongbao_noibo_xem' && $data_user['usertype'] ==1 || $tab == 'thongbao_noibo_xem' && $data_user['usertype'] ==2
        || $tab == 'thongbao_noibo_xem' && $data_user['usertype'] ==3 || $tab == 'thongbao_noibo_xem' && $data_user['usertype'] ==5
        || $tab == 'thongbao_noibo_xem' && $data_user['usertype'] ==4) {
            require_once 'templates/thongbao_noibo_xem.php';
        }

        else if ($tab == 'xemcongno') {
            require_once 'templates/xemcongno.php';
        }

        else if ($tab == 'thanhtoan_hocphi') {
            require_once 'templates/thanhtoan_hocphi.php';
        }

        else if ($tab == 'dangky_thilai') {
            require_once 'templates/dangky_thilai.php';
        }

        else if ($tab == 'khoa_thilai' && $data_user['usertype'] ==2|| $tab == 'khoa_thilai' && $data_user['usertype'] ==3) {
            require_once 'templates/quanlykhoa_thilai.php';
        }
 
        else if ($tab == 'khoa_thilai_edit' && $data_user['usertype'] ==2|| $tab == 'khoa_thilai_edit' && $data_user['usertype'] ==3) {
            require_once 'templates/quanlykhoa_thilai_edit.php';
        }

        else if ($tab == 'khoa_thilai_edit_tt' && $data_user['usertype'] ==2|| $tab == 'khoa_thilai_edit_tt' && $data_user['usertype'] ==3) {
            require_once 'templates/quanlykhoa_thilai_edit_tt.php';
        }

        else if ($tab == 'khoa_thilai_themhs' && $data_user['usertype'] ==2|| $tab == 'khoa_thilai_themhs' && $data_user['usertype'] ==3) {
            require_once 'templates/quanlykhoa_thilai_themkh.php';
        }

        else if ($tab == 'khoa_thilai_dshs' && $data_user['usertype'] ==2|| $tab == 'khoa_thilai_dshs' && $data_user['usertype'] ==3) {
            require_once 'templates/quanlykhoa_thilai_dskh.php';
        }
 
        else if ($tab == 'linhvuc' && $data_user['usertype'] ==2|| $tab == 'linhvuc' && $data_user['usertype'] ==3) {
            require_once 'templates/linh_vuc.php';
        }
        else if ($tab == 'linhvuc_edit' && $data_user['usertype'] ==2|| $tab == 'linhvuc_edit' && $data_user['usertype'] ==3) {
                    require_once 'templates/linh_vuc_edit.php';
        }

        else if ($tab == 'history'&& $data_user['usertype'] ==1) {
            require_once 'templates/history.php';
        }

        }
    else {
        require_once 'templates/dashboard.php';
    }

    ?>
</div><!-- div.content -->