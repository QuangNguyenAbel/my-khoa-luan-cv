<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
require_once 'core/init.php';
if (isset($_POST['xuat_pdf_ngay'])) {
  $nam = trim(addslashes(htmlspecialchars($_POST['nam'])));
  $thang = trim(addslashes(htmlspecialchars($_POST['thang'])));
  $query = "SELECT * FROM thu_chi 
  INNER JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
  WHERE Nam = '$nam' AND Thang ='$thang'";
  $query2 = "SELECT * FROM thu_chi 
  INNER JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
  WHERE Nam = '$nam' AND Thang ='$thang' AND ThuChi='Chi'";
  $query3 = "SELECT * FROM thu_chi 
  INNER JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
  WHERE Nam = '$nam' AND Thang ='$thang' AND ThuChi='Thu'";
  $document = new Dompdf();
  $tong_thu = 0;
  $tong_chi = 0;
  $output = '
		<style>
			h1,h2,h3{
				font-family: DejaVu Sans, sans-serif; 
			}
			table{
				font-family: DejaVu Sans, sans-serif; 
				border-collapse: collapse;
				width:100%;
			}
			td,th{
				border: 1px solid #dddddd;
				text-align:left;
				padding:8px;
			}
			tr:nth-child(even){
				background-color:#dddddd;
			}
		</style>
		<h1>BÁO CÁO THU CHI THÁNG ' . $thang . ' NĂM ' . $nam . '</h1>
		
		<br>
		<h2>TỔNG THU CHI TRONG THÁNG </h2>
		<table>
        <thead>
          <tr>         
           <th>Thu</th> 
           <th>Chi</th>
           <th>Lũy Kế</th>        
          </tr>
        </thead>
        <tbody>	
		';
  if ($db->num_rows($query)) {
    $serial_number = 0;
    foreach ($db->fetch_assoc($query, 0) as $key => $row) {
      $serial_number++;
      $thu = $row['SoTienThu'];
      $chi = $row['SoTienChi'];
      $tong_thu = $tong_thu + $thu;
      $tong_chi = $tong_chi + $chi;
      $luy_ke = $tong_thu - $tong_chi;
    }
  }
  $tien_thu = number_format($tong_thu);
  $tien_chi = number_format($tong_chi);
  $luy_ke1 = number_format($luy_ke);
  $output .= '
			<tr>
				  <td>' . $tien_thu . '</td>
                  <td>' . $tien_chi . '</td> 
                  <td>' . $luy_ke1 . '</td>                
				</tr>
		  </tbody>	
		  </table>
		<br>
		<h2>THU CHI THEO TỪNG NGÀY</h2>
		<h2>Số Tiền Chi</h2>
		<table >
		  	 <thead align="center">
		      <tr>
		       <th >STT</th>
		       <th >Ngày Tháng</th>           
               <th >Loại</th>                                                 
               <th >Nội Dung</th>
               <th >Chi</th>              
               <th>Ghi Chú</th> 	                            
		      </tr> 
		      </thead>
		      <tbody> ';
  $serial_number = 0;
  if ($db->num_rows($query2)) {
    $serial_number = 0;
    foreach ($db->fetch_assoc($query2, 0) as $key => $row) {
      $serial_number++;
      $thoigian = $row['NgayThang'];
      $so_tien_thu = $row['SoTienThu'];
      $tien_thu = number_format($so_tien_thu);
      $so_tien_chi = $row['SoTienChi'];
      $tien_chi = number_format($so_tien_chi);
      $date = date("d-m-Y", strtotime($thoigian));
      $output .= '
				<tr>
					<td> ' . $serial_number . '</td>
                    <td> ' . $date . '</td>
                    <td> ' . $row['TenLoai'] . '</td>                
                    <td> ' . $row['NoiDung'] . ' </td>
                    <td> ' . $tien_chi . ' </td>
                    <td> ' . $row['GhiChu'] . ' </td>
				</tr>
			';
    }
  }
  $output .= '
		<br>
		</tbody>
		</table >
		<h2>Số Tiền Thu</h2>
		<table >
		  	 <thead align="center">
		      <tr>
		       <th >STT</th>
		       <th >Ngày Tháng</th>           
               <th >Loại</th>                                                 
               <th >Nội Dung</th>
               <th >Thu</th>              
               <th>Ghi Chú</th> 	                            
		      </tr> 
		      </thead>
		      <tbody> ';
  if ($db->num_rows($query3)) {
    $stt = 0;
    foreach ($db->fetch_assoc($query3, 0) as $key => $row) {
      $stt++;
      $thoigian = $row['NgayThang'];
      $so_tien_thu = $row['SoTienThu'];
      $tien_thu = number_format($so_tien_thu);
      $so_tien_chi = $row['SoTienChi'];
      $tien_chi = number_format($so_tien_chi);
      $date = date("d-m-Y", strtotime($thoigian));
      $output .= '
				<tr>
					<td> ' . $serial_number . '</td>
                    <td> ' . $date . '</td>
                    <td> ' . $row['Loai'] . '</td>                
                    <td> ' . $row['NoiDung'] . ' </td>
                    <td> ' . $tien_thu . ' </td>
                    <td> ' . $row['GhiChu'] . ' </td>
				</tr>
			';
    }
  }
  $output .= '
		</tbody>
		</table >
		';
  $document->loadHtml($output);
  $document->setPaper('A4', 'landscape');
  $document->render();
  $document->stream("thu_chi_theo_ngay", array("Attachment" => 1));
}
if (isset($_POST['xuat_pdf_loai'])) {
  $nam = trim(addslashes(htmlspecialchars($_POST['nam'])));
  $thang = trim(addslashes(htmlspecialchars($_POST['thang'])));
  $query = "SELECT * FROM thu_chi 
  JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
  JOIN register On register.id=thu_chi.id_nv
  WHERE Nam = '$nam' AND Thang ='$thang'";
  $query2 = "SELECT TenLoai, sum(LuyKe) as LuyKe,Nam,Thang from thu_chi 
  JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
  JOIN register On register.id=thu_chi.id_nv
  WHERE Nam ='$nam' AND Thang='$thang' group by Loai";
  $document = new Dompdf();
  $tong_thu = 0;
  $tong_chi = 0;
  $output = '
    <style>
      h1,h2,h3{
        font-family: DejaVu Sans, sans-serif; 
      }

      table{
        font-family: DejaVu Sans, sans-serif; 
        border-collapse: collapse;
        width:100%;
      }
      td,th{

        border: 1px solid #dddddd;
        text-align:left;
        padding:8px;
      }
      tr:nth-child(even){
        background-color:#dddddd;
      }
    </style>
    <h1>BÁO CÁO THU CHI THÁNG ' . $thang . ' NĂM ' . $nam . '</h1>
    
    <br>
    <h2>TỔNG THU CHI TRONG THÁNG </h2>
    <table>
        <thead>
          <tr>         
           <th>Thu</th> 
           <th>Chi</th>
           <th>Lũy Kế</th>        
          </tr>
        </thead>
        <tbody> 
    ';
  if ($db->num_rows($query)) {
    foreach ($db->fetch_assoc($query, 0) as $key => $row) {
      $thu = $row['SoTienThu'];
      $chi = $row['SoTienChi'];
      $tong_thu = $tong_thu + $thu;
      $tong_chi = $tong_chi + $chi;
      $luy_ke = $tong_thu - $tong_chi;
    }
  }
  $tien_thu = number_format($tong_thu);
  $tien_chi = number_format($tong_chi);
  $luy_ke1 = number_format($luy_ke);
  $output .= '
      <tr>
          <td>' . $tien_thu . '</td>
                  <td>' . $tien_chi . '</td> 
                  <td>' . $luy_ke1 . '</td>                
        </tr>
      </tbody>  
      </table>
      <br>
      <h2>TỔNG THU CHI THEO LOẠI</h2>
      <table >
         <thead align="center">
          <tr>
           <th>Loại </th>
           <th>Số Tiền</th>               
          </tr> 
          </thead>
          <tbody>          
    ';
  if ($db->num_rows($query2)) {
    foreach ($db->fetch_assoc($query2, 0) as $key => $row) {
      $loai = $row['TenLoai'];
      $luy_ke = $row['LuyKe'];
      $luy_ke1 = number_format($luy_ke);
      $output .= '
        <tr>              
            <td>' . $loai . '</td>
            <td>' . $luy_ke1 . '</td>         
        </tr>
      ';
    }
  }
  $output .= '
    </tbody>
    </table>
    ';
  $document->loadHtml($output);
  $document->setPaper('A4', 'landscape');
  $document->render();
  $document->stream("thu_chi_theo_loai", array("Attachment" => 1));
}
if (isset($_POST['xuat_phieu_chi'])) {
  $id = $_POST['id_chi'];
  $query = "SELECT * FROM thu_chi 
  JOIN loai_thu_chi On loai_thu_chi.id_loaithuchi=thu_chi.loai 
  JOIN register On register.id=thu_chi.id_nv 
  WHERE thu_chi.id_thuchi ='$id'";
  $document = new Dompdf();
  $output = '
    <style>
      h1,h2,h3,h4,h5,h6{
        font-family: DejaVu Sans, sans-serif; 
      }

      table{
        font-family: DejaVu Sans, sans-serif; 
        border-collapse: collapse;
        width:100%;
      }
      td,th{
        border: 1px solid #dddddd;
        text-align:left;
        padding:8px;
      }
      
      tr:nth-child(even){
        background-color:#dddddd;
      }
    </style>
    <h3 >Trung Tâm Tin Học K&Q</h3>  
    <h3 >Địa Chỉ: Số 572 Âu Cơ P.10 Q.Tân Bình TP.HCM</h3> 
    <h3 >SĐT:  0877227202</h3>
    <h1 align="center">PHIẾU CHI</h1>  
    <br>
  ';
  if ($db->num_rows($query)) {
    foreach ($db->fetch_assoc($query, 0) as $key => $row) {
      $ngay = $row['NgayThang'];
      $loai = $row['TenLoai'];
      $noi_dung = $row['NoiDung'];
      $so_tien_chi = $row['SoTienChi'];
      $nguoi_chi = $row['username'];
      $date = date("d-m-Y", strtotime($ngay));

    }
  }
  $output .= '
  <table>
  <thead align="center">
    <tr>
      <th>Ngày:</th>
      <th>' . $date . '</th>
    </tr>
    <tr>
      <th>Loại Chi:</th>
      <th>' . $loai . '</th>
    </tr>
    <tr>
      <th>Lý Do Chi: </th>
      <th>' . $noi_dung . '</th>
    </tr>
    <tr>
      <th>Số Tiền Chi: </th>
      <th>' . number_format($so_tien_chi) . '</th>
    </tr>
    <tr>
      <th>Người Chi: </th>
      <th>' . $nguoi_chi . '</th>
    </tr>
    
  </thead>
</table>
<br><br><br>
<h3>
Ký nhận:
</h3>
      <table >
        <thead>
          <tr>
            <th>
              <h4 align="center">Người Lập Phiếu </h4> 
            </th>
          </tr> 
          <tr>
            <th>
            <br><br><br><br><br><br>
            </th>
          </tr>
          <tr>
            <th>
            <h4 align="center">' . $nguoi_chi . '</h4>
            </th>
          </tr>     
        </thead>
      </table>
    ';
  $document->loadHtml($output);
  $document->setPaper('A4', 'portrait');
  $document->render();
  $document->stream("thu_chi_theo_ngay", array("Attachment" => 0));
}
if (isset($_POST['xuat_phieu_thu'])) {
  $id_hd = trim(addslashes(htmlspecialchars($_POST['id_hd'])));
  $id_hv = trim(addslashes(htmlspecialchars($_POST['id_hv'])));
  $sql = "SELECT * FROM `hoa_don` 
  JOIN register On register.id = hoa_don.id_hs Where id_hd='$id_hd'";
  $query="SELECT * from hoa_don_ct 
  JOIN hoa_don On hoa_don.id_hd=hoa_don_ct.id_hoadon
  JOIN lop_hoc On lop_hoc.id_lop=hoa_don_ct.id_lop_ct_hd
  WHERE id_hoadon='$id_hd' ";
  $document = new Dompdf();
  $output = '
    <style>
    table{
      font-family: DejaVu Sans, sans-serif; 
      border-collapse: collapse;
      width:100%;
    }
    td,th{
      border: 1px solid #dddddd;
      text-align:left;
      padding:8px;
    }
      #a{
        background-color:#dddddd;
      }
      h1,h2,h3,h5,b{
        font-family: DejaVu Sans, sans-serif; 
      }
      table{
        font-family: DejaVu Sans, sans-serif; 
        border-collapse: collapse;
        width:100%;
        border:none;
      }
      tr:nth-child(even){
      }
    </style>
    <h3 >Trung Tâm Tin Học K&Q</h3>  
    <h3 >Địa Chỉ: Số 572 Âu Cơ P.10 Q.Tân Bình TP.HCM</h3> 
    <h3 >SĐT:  0877227202</h3>
    <h1 align="center">PHIẾU THU</h1>  
  ';
  if ($db->num_rows($sql)) {
    $serial_number = 0;
    foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
      $serial_number++;
      $ngay = $row['NgayThang'];
      $date=date("d-m-Y", strtotime($ngay));
      $ten_kh = $row['username'];
      $ma = $row['user_code'];
      $sdt = $row['phone'];
      $diachi = $row['address'];
      $email = $row['email'];;
    }
  }
  $output .= '
      <table>
      <thead align="center">
        <tr>
          <th id="a" align="left">Tên Học Viên:</th>
          <th align="left">'.$ten_kh.'</th>
          <th id="a" align="left">Mã Học Viên:</th>
          <th align="left">'.$ma.'</th>
        </tr>
        <tr>
          <th id="a" align="left">Số Điện Thoại:</th>
          <th align="left">'.$sdt.'</th>
          <th id="a"align="left">Địa Chỉ:</th>
          <th align="left">'.$diachi.'</th>
        </tr>
        <tr>
          <th id="a" align="left">Email:</th>
          <th align="left">'.$email.'</th>
          <th id="a" align="left">Ngày Thu:</th>
          <th align="left">'.$date.'</th>
        </tr>
      </thead>
    </table>';
      $output .='	
      <h2> Chi Tiết Hoá Đơn </h2>
      <table>
          <thead>
            <tr>   
            <th></th>STT</th>      
             <th>Lớp Học</th> 
             <th>Học Phí</th>
            </tr>
          </thead>
          <tbody>	
      ';
    if ($db->num_rows($query)) {
      $serial_number = 0;
      foreach ($db->fetch_assoc($query, 0) as $key => $row) {
        $serial_number++;
        $output .= '
        <tr>
            <td>' . $serial_number . '</td>
            <td> ' . $row['MaLop'] . '</td>
            <td> ' . number_format($row['ct_hocphi']) . '</td>                   
          </tr>';
        
      }
    }
    if ($db->num_rows($sql)) {
      foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
        $output .= '
        <tr>
            <td></td>
            <td id="a" ><b>Tổng:</b></td>
            <td> ' . number_format($row['SoTien']) . '</td>                   
          </tr>
          </tbody>	
        </table>
        <br>
      <br>
      <br>
      <table >
        <thead align="center">
          <tr>
            <th>Người Nộp</th>
            <th>Người Thu Tiền</th>
          </tr>
          <tr>
            <th><br><br><br><br><br></th>
            <th><br><br><br><br><br></th>
          </tr>
        </thead>
        <tbody align="center">
          <tr>
          <td>' . $row['username'] . '</td>
          <td>' . $row['nv_thu'] . '</td>
          </tr>
        </tbody>
      </table>';
        
      }
    }
    $output .='
    ';
	  $output .='
      
    ';
  $document->loadHtml($output);
  $document->setPaper('A4', 'portrait');
  $document->render();
  $document->stream("phieu_thu", array("Attachment" => 0));
}
