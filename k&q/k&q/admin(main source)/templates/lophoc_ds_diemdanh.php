<style>
  #a{
    position: sticky;
    top: 0;
    left: 0;
    flex-grow: 0;
  flex-shrink: 0;
  background: #4e73df;
  color: white;
  
  }
</style>
<div class="container-fluid">
  <!--DataTables -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <?php
      if (isset($_POST['diem_danh'])) {
        $id = $_POST['edit_id'];
        $ma = $_POST['ma_lop'];
        $so_bh = $_POST['so_bh'];
        if($so_bh==1){
          echo '<h6 class="m-0 font-weight-bold text-primary"> Điểm Danh Lớp ' . $ma . '</h6>
        </div>
        <div class="card-body" >
        <form action="hoc_sinh_code.php" method="POST">
              <input type="hidden" name="id_lop" value="' . $id . '">
              <div class="form-group">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <th></th>
                <th></th>
              ';
        }else{
          echo '<h6 class="m-0 font-weight-bold text-primary"> Điểm Danh Lớp ' . $ma . '</h6>
        </div>
        <div class="card-body" style="overflow-x:auto;display: inline-flex;">
        <form action="hoc_sinh_code.php" method="POST">
              <input type="hidden" name="id_lop" value="' . $id . '">
              <div class="form-group">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <th></th>
                <th></th>
              ';
        }
        
        if ($so_bh == 15) {
          echo '
              <th><b>Buổi 1</b></th>
              <th><b>Buổi 2</b></th>
              <th><b>Buổi 3</b></th>
              <th><b>Buổi 4</b></th>
              <th><b>Buổi 5</b></th>
              <th><b>Buổi 6</b></th>
              <th><b>Buổi 7</b></th>
              <th><b>Buổi 8</b></th>
              <th><b>Buổi 9</b></th>
              <th><b>Buổi 10</b></th>
              <th><b>Buổi 11</b></th>
              <th><b>Buổi 12</b></th>
              <th><b>Buổi 13</b></th>
              <th><b>Buổi 14</b></th>
              <th><b>Buổi 15</b></th>
              <th><b class="text-danger">Thi</b></th>
              </tr>';
        } elseif ($so_bh == 4) {
          echo '<th><b>Buổi 1</b></th>
          <th><b>Buổi 2</b></th>
          <th><b>Buổi 3</b></th>
          <th><b>Buổi 4</b></th>
          <th><b class="text-danger">Thi</b></th>
          </tr>';
        }elseif ($so_bh == 1) {
          echo '
          <th><b class="text-danger">Thi</b></th>
          </tr>';
        } elseif ($so_bh == 5) {
          echo '<th><b>Buổi 1</b></th>
          <th><b>Buổi 2</b></th>
          <th><b>Buổi 3</b></th>
          <th><b>Buổi 4</b></th>
          <th><b>Buổi 5</b></th>
          <th><b class="text-danger">Thi</b></th>
          </tr>';
        } elseif ($so_bh == 6) {
          echo '<th><b>Buổi 1</b></th>
          <th><b>Buổi 2</b></th>
          <th><b>Buổi 3</b></th>
          <th><b>Buổi 4</b></th>
          <th><b>Buổi 5</b></th>
          <th><b>Buổi 6</b></th>
          <th><b class="text-danger">Thi</b></th>
          </tr>';
        } elseif ($so_bh == 8) {
          echo '<th><b>Buổi 1</b></th>
          <th><b>Buổi 2</b></th>
          <th><b>Buổi 3</b></th>
          <th><b>Buổi 4</b></th>
          <th><b>Buổi 5</b></th>
          <th><b>Buổi 6</b></th>
          <th><b>Buổi 7</b></th>
          <th><b>Buổi 8</b></th>
          <th><b class="text-danger">Thi</b></th>
          </tr>';
        } elseif ($so_bh == 10) {
          echo '<th><b>Buổi 1</b></th>
          <th><b>Buổi 2</b></th>
          <th><b>Buổi 3</b></th>
          <th><b>Buổi 4</b></th>
          <th><b>Buổi 5</b></th>
          <th><b>Buổi 6</b></th>
          <th><b>Buổi 7</b></th>
          <th><b>Buổi 8</b></th>
          <th><b>Buổi 9</b></th>
          <th><b>Buổi 10</b></th>
          <th><b class="text-danger">Thi</b></th>
          </tr>';
        } elseif ($so_bh == 12) {
          echo '<th><b>Buổi 1</b></th>
          <th><b>Buổi 2</b></th>
          <th><b>Buổi 3</b></th>
          <th><b>Buổi 4</b></th>
          <th><b>Buổi 5</b></th>
          <th><b>Buổi 6</b></th>
          <th><b>Buổi 7</b></th>
          <th><b>Buổi 8</b></th>
          <th><b>Buổi 9</b></th>
          <th><b>Buổi 10</b></th>
          <th><b>Buổi 11</b></th>
          <th><b>Buổi 12</b></th>
          <th><b class="text-danger">Thi</b></th>
          </tr>';
        }
        $date="SELECT * FROM `lop_hoc` where id_lop=$id";
        if ($db->num_rows($date)) {
          foreach ($db->fetch_assoc($date, 0) as $key => $row) {
            if($row['so_bh']==15){
              echo'
              <tr>
              <td id="a"><b>Tên Học Viên</b></td>
              <td id=""><b>Mã Học Viên</b></td>
                <td><input type="date" name="d1" value="'.$row['d1'].'" class="form-control" ></td>
                <td><input type="date" name="d2" value="'.$row['d2'].'" class="form-control" ></td>
                <td><input type="date" name="d3" value="'.$row['d3'].'" class="form-control" ></td>
                <td><input type="date" name="d4" value="'.$row['d4'].'" class="form-control" ></td>
                <td><input type="date" name="d5" value="'.$row['d5'].'" class="form-control" ></td>
                <td><input type="date" name="d6" value="'.$row['d6'].'" class="form-control" ></td>
                <td><input type="date" name="d7" value="'.$row['d7'].'" class="form-control" ></td>
                <td><input type="date" name="d8" value="'.$row['d8'].'" class="form-control" ></td>
                <td><input type="date" name="d9" value="'.$row['d9'].'" class="form-control" ></td>
                <td><input type="date" name="d10" value="'.$row['d10'].'" class="form-control" ></td>
                <td><input type="date" name="d11" value="'.$row['d11'].'" class="form-control" ></td>
                <td><input type="date" name="d12" value="'.$row['d12'].'" class="form-control" ></td>
                <td><input type="date" name="d13" value="'.$row['d13'].'" class="form-control" ></td>
                <td><input type="date" name="d14" value="'.$row['d14'].'" class="form-control" ></td>
                <td><input type="date" name="d15" value="'.$row['d15'].'" class="form-control" ></td>
                <td><input readonly type="date" name="" value="'.$row['ngay_thi'].'" class="form-control" ></td>
              </tr>
              ';
            }elseif($row['so_bh']==4){
              echo'
              <tr>
              <td id="a"><b>Tên Học Viên</b></td>
              <td id=""><b>Mã Học Viên</b></td>
                <td><input type="date" name="d1" value="'.$row['d1'].'" class="form-control" ></td>
                <td><input type="date" name="d2" value="'.$row['d2'].'" class="form-control" ></td>
                <td><input type="date" name="d3" value="'.$row['d3'].'" class="form-control" ></td>
                <td><input type="date" name="d4" value="'.$row['d4'].'" class="form-control" ></td>
                <td><input readonly type="date" name="" value="'.$row['ngay_thi'].'" class="form-control" ></td>
              </tr>
              ';
            }
            elseif($row['so_bh']==1){
              echo'
              <tr>
              <td id="a"><b>Tên Học Viên</b></td>
              <td id=""><b>Mã Học Viên</b></td>
                <td><input readonly type="date" name="" value="'.$row['ngay_thi'].'" class="form-control" ></td>
              </tr>
              ';
            }
            elseif($row['so_bh']==5){
              echo'
              <tr>
              <td id="a"><b>Tên Học Viên</b></td>
              <td id=""><b>Mã Học Viên</b></td>
                <td><input type="date" name="d1" value="'.$row['d1'].'" class="form-control" ></td>
                <td><input type="date" name="d2" value="'.$row['d2'].'" class="form-control" ></td>
                <td><input type="date" name="d3" value="'.$row['d3'].'" class="form-control" ></td>
                <td><input type="date" name="d4" value="'.$row['d4'].'" class="form-control" ></td>
                <td><input type="date" name="d5" value="'.$row['d5'].'" class="form-control" ></td>
                <td><input readonly type="date" name="" value="'.$row['ngay_thi'].'" class="form-control" ></td>
  
              </tr>
              ';
            }
            elseif($row['so_bh']==6){
              echo'
              <tr>
              <td id="a"><b>Tên Học Viên</b></td>
              <td id=""><b>Mã Học Viên</b></td>
                <td><input type="date" name="d1" value="'.$row['d1'].'" class="form-control" ></td>
                <td><input type="date" name="d2" value="'.$row['d2'].'" class="form-control" ></td>
                <td><input type="date" name="d3" value="'.$row['d3'].'" class="form-control" ></td>
                <td><input type="date" name="d4" value="'.$row['d4'].'" class="form-control" ></td>
                <td><input type="date" name="d5" value="'.$row['d5'].'" class="form-control" ></td>
                <td><input type="date" name="d6" value="'.$row['d6'].'" class="form-control" ></td>
                <td><input readonly type="date" name="" value="'.$row['ngay_thi'].'" class="form-control" ></td>
              </tr>
              ';
            }
            elseif($row['so_bh']==8){
              echo'
              <tr>
              <td id="a"><b>Tên Học Viên</b></td>
              <td id=""><b>Mã Học Viên</b></td>
                <td><input type="date" name="d1" value="'.$row['d1'].'" class="form-control" ></td>
                <td><input type="date" name="d2" value="'.$row['d2'].'" class="form-control" ></td>
                <td><input type="date" name="d3" value="'.$row['d3'].'" class="form-control" ></td>
                <td><input type="date" name="d4" value="'.$row['d4'].'" class="form-control" ></td>
                <td><input type="date" name="d5" value="'.$row['d5'].'" class="form-control" ></td>
                <td><input type="date" name="d6" value="'.$row['d6'].'" class="form-control" ></td>
                <td><input type="date" name="d7" value="'.$row['d7'].'" class="form-control" ></td>
                <td><input type="date" name="d8" value="'.$row['d8'].'" class="form-control" ></td>
                <td><input readonly type="date" name="" value="'.$row['ngay_thi'].'" class="form-control" ></td>
              </tr>
              ';
            }
            elseif($row['so_bh']==10){
              echo'
              <tr>
              <td id="a"><b>Tên Học Viên</b></td>
              <td id=""><b>Mã Học Viên</b></td>
                <td><input type="date" name="d1" value="'.$row['d1'].'" class="form-control" ></td>
                <td><input type="date" name="d2" value="'.$row['d2'].'" class="form-control" ></td>
                <td><input type="date" name="d3" value="'.$row['d3'].'" class="form-control" ></td>
                <td><input type="date" name="d4" value="'.$row['d4'].'" class="form-control" ></td>
                <td><input type="date" name="d5" value="'.$row['d5'].'" class="form-control" ></td>
                <td><input type="date" name="d6" value="'.$row['d6'].'" class="form-control" ></td>
                <td><input type="date" name="d7" value="'.$row['d7'].'" class="form-control" ></td>
                <td><input type="date" name="d8" value="'.$row['d8'].'" class="form-control" ></td>
                <td><input type="date" name="d9" value="'.$row['d9'].'" class="form-control" ></td>
                <td><input type="date" name="d10" value="'.$row['d10'].'" class="form-control" ></td>
                <td><input readonly type="date" name="" value="'.$row['ngay_thi'].'" class="form-control" ></td>
              </tr>
              ';
            }
            elseif($row['so_bh']==12){
              echo'
              <tr>
                <td id="a"><b>Tên Học Viên</b></td>
                <td id=""><b>Mã Học Viên</b></td>
                <td><input type="date" name="d1" value="'.$row['d1'].'" class="form-control" ></td>
                <td><input type="date" name="d2" value="'.$row['d2'].'" class="form-control" ></td>
                <td><input type="date" name="d3" value="'.$row['d3'].'" class="form-control" ></td>
                <td><input type="date" name="d4" value="'.$row['d4'].'" class="form-control" ></td>
                <td><input type="date" name="d5" value="'.$row['d5'].'" class="form-control" ></td>
                <td><input type="date" name="d6" value="'.$row['d6'].'" class="form-control" ></td>
                <td><input type="date" name="d7" value="'.$row['d7'].'" class="form-control" ></td>
                <td><input type="date" name="d8" value="'.$row['d8'].'" class="form-control" ></td>
                <td><input type="date" name="d9" value="'.$row['d9'].'" class="form-control" ></td>
                <td><input type="date" name="d10" value="'.$row['d10'].'" class="form-control" ></td>
                <td><input type="date" name="d11" value="'.$row['d11'].'" class="form-control" ></td>
                <td><input type="date" name="d12" value="'.$row['d12'].'" class="form-control" ></td>
                <td><input readonly type="date" name="" value="'.$row['ngay_thi'].'" class="form-control"></td>
              </tr>
              ';
            }
          }
        }
        $sql = "SELECT * FROM `lop_hoc` 
				JOIN chi_tiet_lop_hoc On chi_tiet_lop_hoc.id_lop=lop_hoc.id_lop
        JOIN register on register.id=chi_tiet_lop_hoc.id_hs
				WHERE chi_tiet_lop_hoc.id_lop = '$id' ";
        if ($db->num_rows($sql)) {
          foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
          if($row['so_bh']==15){
            echo'
            <tr>
              <td id="a">
                <input type="hidden" name="id_hv[]" value="'.$row['id'].'">
                <b> '.$row['username'].'</b>
              </td>
              <td id="">
                <p>'.$row['user_code'].'</p>
              </td>';
              //1
              echo '<td>
              <input type="" class="form-control" name="dd1[]" value="'.$row['1'].'">
              </td>';
              //2
              echo '<td>
              <input type="" class="form-control" name="dd2[]" value="'.$row['2'].'">
              </td>';
              //3
              echo '<td>
              <input type="" class="form-control" name="dd3[]" value="'.$row['3'].'">
              </td>';
              //4
              echo '<td>
              <input type="" class="form-control" name="dd4[]" value="'.$row['4'].'">
              </td>';
              //5
              echo '<td>
              <input type="" class="form-control" name="dd5[]" value="'.$row['5'].'">
              </td>';
              //6
              echo '<td>
              <input type="" class="form-control" name="dd6[]" value="'.$row['6'].'">
              </td>';
              //7
              echo '<td>
              <input type="" class="form-control" name="dd7[]" value="'.$row['7'].'">
              </td>';
              //8
              echo '<td>
              <input type="" class="form-control" name="dd8[]" value="'.$row['8'].'">
              </td>';
              //9
              echo '<td>
              <input type="" class="form-control" name="dd9[]" value="'.$row['9'].'">
              </td>';
              //10
              echo '<td>
              <input type="" class="form-control" name="dd10[]" value="'.$row['10'].'">
              </td>';
              //11
              echo '<td>
              <input type="" class="form-control" name="dd11[]" value="'.$row['11'].'">
              </td>';
              //12
              echo '<td>
              <input type="" class="form-control" name="dd12[]" value="'.$row['12'].'">
              </td>';
              //13
              echo '<td>
              <input type="" class="form-control" name="dd13[]" value="'.$row['13'].'">
              </td>';
              //14
              echo '<td>
              <input type="" class="form-control" name="dd14[]" value="'.$row['14'].'">
              </td>';
              //15
              echo '<td>
              <input type="" class="form-control" name="dd15[]" value="'.$row['15'].'">
              </td>';
              echo '<td>
              <input type="" class="form-control" name="thi[]" value="'.$row['thi'].'">
              </td>';
              echo'
            </tr>';
          }elseif($row['so_bh']==4){
            echo'
            <tr>
              <td id="a">
                <input type="hidden" name="id_hv[]" value="'.$row['id'].'">
                <b> '.$row['username'].'</b>
              </td>
              <td id="">
                <p>'.$row['user_code'].'</p>
              </td>';
              //1
              echo '<td>
              <input type="" class="form-control" name="dd1[]" value="'.$row['1'].'">
              </td>';
              //2
              echo '<td>
              <input type="" class="form-control" name="dd2[]" value="'.$row['2'].'">
              </td>';
              //3
              echo '<td>
              <input type="" class="form-control" name="dd3[]" value="'.$row['3'].'">
              </td>';
              //4
              echo '<td>
              <input type="" class="form-control" name="dd4[]" value="'.$row['4'].'">
              </td>';
              echo '<td>
              <input type="" class="form-control" name="thi[]" value="'.$row['thi'].'">
              </td>';
              echo'
            </tr>';
            
          }elseif($row['so_bh']==1){
            echo'
            <tr>
              <td id="a">
                <input type="hidden" name="id_hv[]" value="'.$row['id'].'">
                <b> '.$row['username'].'</b>
              </td>
              <td id="">
                <p>'.$row['user_code'].'</p>
              </td>';
              echo '<td>
              <input type="" class="form-control" name="thi[]" value="'.$row['thi'].'">
              </td>';
              echo'
            </tr>';
            
          }elseif($row['so_bh']==5){
            echo'
            <tr>
              <td id="a">
                <input type="hidden" name="id_hv[]" value="'.$row['id'].'">
                <b> '.$row['username'].'</b>
              </td>
              <td id="">
                <p>'.$row['user_code'].'</p>
              </td>';
              //1
              echo '<td>
              <input type="" class="form-control" name="dd1[]" value="'.$row['1'].'">
              </td>';
              //2
              echo '<td>
              <input type="" class="form-control" name="dd2[]" value="'.$row['2'].'">
              </td>';
              //3
              echo '<td>
              <input type="" class="form-control" name="dd3[]" value="'.$row['3'].'">
              </td>';
              //4
              echo '<td>
              <input type="" class="form-control" name="dd4[]" value="'.$row['4'].'">
              </td>';
              //5
              echo '<td>
              <input type="" class="form-control" name="dd5[]" value="'.$row['5'].'">
              </td>';
              echo '<td>
              <input type="" class="form-control" name="thi[]" value="'.$row['thi'].'">
              </td>';
              echo'
            </tr>';
          }elseif($row['so_bh']==6){
            echo'
            <tr>
              <td id="a">
                <input type="hidden" name="id_hv[]" value="'.$row['id'].'">
                <b> '.$row['username'].'</b>
              </td>
              <td id="">
                <p>'.$row['user_code'].'</p>
              </td>';
              //1
              echo '<td>
              <input type="" class="form-control" name="dd1[]" value="'.$row['1'].'">
              </td>';
              //2
              echo '<td>
              <input type="" class="form-control" name="dd2[]" value="'.$row['2'].'">
              </td>';
              //3
              echo '<td>
              <input type="" class="form-control" name="dd3[]" value="'.$row['3'].'">
              </td>';
              //4
              echo '<td>
              <input type="" class="form-control" name="dd4[]" value="'.$row['4'].'">
              </td>';
              //5
              echo '<td>
              <input type="" class="form-control" name="dd5[]" value="'.$row['5'].'">
              </td>';
              //6
              echo '<td>
              <input type="" class="form-control" name="dd6[]" value="'.$row['6'].'">
              </td>';
              echo '<td>
              <input type="" class="form-control" name="thi[]" value="'.$row['thi'].'">
              </td>';
              echo'
            </tr>';
          }elseif($row['so_bh']==8){
            echo'
            <tr>
              <td id="a">
                <input type="hidden" name="id_hv[]" value="'.$row['id'].'">
                <b> '.$row['username'].'</b>
              </td>
              <td id="">
                <p>'.$row['user_code'].'</p>
              </td>';
              //1
              echo '<td>
              <input type="" class="form-control" name="dd1[]" value="'.$row['1'].'">
              </td>';
              //2
              echo '<td>
              <input type="" class="form-control" name="dd2[]" value="'.$row['2'].'">
              </td>';
              //3
              echo '<td>
              <input type="" class="form-control" name="dd3[]" value="'.$row['3'].'">
              </td>';
              //4
              echo '<td>
              <input type="" class="form-control" name="dd4[]" value="'.$row['4'].'">
              </td>';
              //5
              echo '<td>
              <input type="" class="form-control" name="dd5[]" value="'.$row['5'].'">
              </td>';
              //6
              echo '<td>
              <input type="" class="form-control" name="dd6[]" value="'.$row['6'].'">
              </td>';
              //7
              echo '<td>
              <input type="" class="form-control" name="dd7[]" value="'.$row['7'].'">
              </td>';
              //8
              echo '<td>
              <input type="" class="form-control" name="dd8[]" value="'.$row['8'].'">
              </td>';
              echo '<td>
              <input type="" class="form-control" name="thi[]" value="'.$row['thi'].'">
              </td>';
              echo'
            </tr>';
          }elseif($row['so_bh']==10){
            echo'
            <tr>
              <td id="a">
                <input type="hidden" name="id_hv[]" value="'.$row['id'].'">
                <b> '.$row['username'].'</b>
              </td>
              <td id="">
                <p>'.$row['user_code'].'</p>
              </td>';
              //1
              echo '<td>
              <input type="" class="form-control" name="dd1[]" value="'.$row['1'].'">
              </td>';
              //2
              echo '<td>
              <input type="" class="form-control" name="dd2[]" value="'.$row['2'].'">
              </td>';
              //3
              echo '<td>
              <input type="" class="form-control" name="dd3[]" value="'.$row['3'].'">
              </td>';
              //4
              echo '<td>
              <input type="" class="form-control" name="dd4[]" value="'.$row['4'].'">
              </td>';
              //5
              echo '<td>
              <input type="" class="form-control" name="dd5[]" value="'.$row['5'].'">
              </td>';
              //6
              echo '<td>
              <input type="" class="form-control" name="dd6[]" value="'.$row['6'].'">
              </td>';
              //7
              echo '<td>
              <input type="" class="form-control" name="dd7[]" value="'.$row['7'].'">
              </td>';
              //8
              echo '<td>
              <input type="" class="form-control" name="dd8[]" value="'.$row['8'].'">
              </td>';
              //9
              echo '<td>
              <input type="" class="form-control" name="dd9[]" value="'.$row['9'].'">
              </td>';
              //10
              echo '<td>
              <input type="" class="form-control" name="dd10[]" value="'.$row['10'].'">
              </td>';
              echo '<td>
              <input type="" class="form-control" name="thi[]" value="'.$row['thi'].'">
              </td>';
              echo'
            </tr>';
          }elseif($row['so_bh']==12){
            echo'
            <tr>
              <td id="a">
                <input type="hidden" name="id_hv[]" value="'.$row['id'].'">
                <b> '.$row['username'].'</b>
              </td>
              <td id="">
                <p>'.$row['user_code'].'</p>
              </td>';
              //1
              echo '<td>
              <input type="" class="form-control" name="dd1[]" value="'.$row['1'].'">
              </td>';
              //2
              echo '<td>
              <input type="" class="form-control" name="dd2[]" value="'.$row['2'].'">
              </td>';
              //3
              echo '<td>
              <input type="" class="form-control" name="dd3[]" value="'.$row['3'].'">
              </td>';
              //4
              echo '<td>
              <input type="" class="form-control" name="dd4[]" value="'.$row['4'].'">
              </td>';
              //5
              echo '<td>
              <input type="" class="form-control" name="dd5[]" value="'.$row['5'].'">
              </td>';
              //6
              echo '<td>
              <input type="" class="form-control" name="dd6[]" value="'.$row['6'].'">
              </td>';
              //7
              echo '<td>
              <input type="" class="form-control" name="dd7[]" value="'.$row['7'].'">
              </td>';
              //8
              echo '<td>
              <input type="" class="form-control" name="dd8[]" value="'.$row['8'].'">
              </td>';
              //9
              echo '<td>
              <input type="" class="form-control" name="dd9[]" value="'.$row['9'].'">
              </td>';
              //10
              echo '<td>
              <input type="" class="form-control" name="dd10[]" value="'.$row['10'].'">
              </td>';
              //11
              echo '<td>
              <input type="" class="form-control" name="dd11[]" value="'.$row['11'].'">
              </td>';
              //12
              echo '<td>
              <input type="" class="form-control" name="dd12[]" value="'.$row['12'].'">
              </td>';
              echo '<td>
              <input type="" class="form-control" name="thi[]" value="'.$row['thi'].'">
              </td>';
              echo'
            </tr>';
          }
            
          }
        }
        if($so_bh==1){
          echo '
      </table>
        
        <br>
        <div class="card-footer"><button type="submit" name="diem_danh_thi" class="btn btn-primary"> Thay Đổi</button>
        <a href="' . $_DOMAIN . 'lophoc" class="btn btn-danger"> Hủy </a>
      </form></div>
';
        }elseif($so_bh==4){
          echo '
      </table>
        
        <br>
        <div class="card-footer"><button type="submit" name="diem_danh4" class="btn btn-primary"> Thay Đổi</button>
        <a href="' . $_DOMAIN . 'lophoc" class="btn btn-danger"> Hủy </a>
      </form></div>
';
        }
        elseif($so_bh==5){
          echo '
      </table>
        
        <br>
        <div class="card-footer"><button type="submit" name="diem_danh5" class="btn btn-primary"> Thay Đổi</button>
        <a href="' . $_DOMAIN . 'lophoc" class="btn btn-danger"> Hủy </a>
      </form></div>
';
        }
        elseif($so_bh==6){
          echo '
      </table>
        
        <br>
        <div class="card-footer"><button type="submit" name="diem_danh6" class="btn btn-primary"> Thay Đổi</button>
        <a href="' . $_DOMAIN . 'lophoc" class="btn btn-danger"> Hủy </a>
      </form></div>
';
        }
        elseif($so_bh==8){
          echo '
      </table>
        
        <br>
        <div class="card-footer"><button type="submit" name="diem_danh8" class="btn btn-primary"> Thay Đổi</button>
        <a href="' . $_DOMAIN . 'lophoc" class="btn btn-danger"> Hủy </a>
      </form></div>
';
        }
        elseif($so_bh==15){
          echo '
      </table>
        
        <br>
        <div class="card-footer"><button type="submit" name="diem_danh15" class="btn btn-primary"> Thay Đổi</button>
        <a href="' . $_DOMAIN . 'lophoc" class="btn btn-danger"> Hủy </a>
      </form></div>
';
        }
        elseif($so_bh==10){
          echo '
      </table>
        
        <br>
        <div class="card-footer"><button type="submit" name="diem_danh10" class="btn btn-primary"> Thay Đổi</button>
        <a href="' . $_DOMAIN . 'lophoc" class="btn btn-danger"> Hủy </a>
      </form></div>
';
        }
        elseif($so_bh==12){
          echo '
      </table>
        
        <br>
        <div class="card-footer"><button type="submit" name="diem_danh12" class="btn btn-primary"> Thay Đổi</button>
        <a href="' . $_DOMAIN . 'lophoc" class="btn btn-danger"> Hủy </a>
      </form></div>
';
        }
        
      }
      ?>
    </div>



  </div>
</div>
</div>
<?php

?>