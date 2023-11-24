<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Quản Lý Thu Chi</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?php
      if ($data_user['usertype'] == '4') {
        echo '<a class="btn btn-info"  href="' . $_DOMAIN . 'doanhthu" >Back</a>';

      } else {
      }
      ?>
    </div>
    <div class="table-responsive">
      <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT </th>
              <th>Năm</th>
              <th>Show</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT  distinct Nam FROM thu_chi  ";
            if ($db->num_rows($sql)) {
              $serial_number = 0;
              foreach ($db->fetch_assoc($sql, 0) as $key => $row) {
                $serial_number++;
                echo '
                <tr>
                  <td> ' . $serial_number . '</td>
                  <td> ' . $row['Nam'] . '</td>                  
                  <td>
                      <form action="' . $_DOMAIN . 'xemthongke_nam_quy" method="POST">
                        <input type="hidden" name="nam" value="' . $row['Nam'] . '">
                        <input type="submit" name="nam_id" value="Show " class="btn btn-primary">
                        
                      </form>
                  </td>
            </tr>
		';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>