 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
  </div>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      <h2>Stock Kendaraan yang harus di order</h2>
       
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th width="3%" scope="col">#</th>
              <th scope="col">NAMA TIPE</th>
              <th scope="col">Stock</th>
             
              <th scope="col">Reoder Point</th>
              <th width="1%" scope="col">#</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $no = 0;
                $total_penjualan = 0;
                $tipe = array();
                $qtys = array();
                foreach ($stock as $key => $rows) {
                  $qty = $this->crud_model->read('table_kendaraan', ['kode_tipe' => $rows->kode_tipe,'status' => 'stok'])->num_rows();
               
                  array_push($tipe, $rows->nama_tipe);
                  array_push($qtys, $qty);
                    if($rows->reorderpoint > $qty){
                      $no++;
                  
                      echo ' <tr>
                          <td>'.$no.'</td>
                          <td>'.$rows->nama_tipe.'</td>
                          <td>'.$qty.'</td>
                         
                          <td>'.$rows->reorderpoint.'</td>
                          <td><a href="'.site_url('stock/details/'.$rows->kode_tipe).'" class="btn btn-sm btn-primary">View</a></td>
                      </tr>';
                    }  
                    
                } 
            ?>
           
          </tbody>
        </table>
        <?php
          $string_tipe = implode(', ', array_map(function($val){return sprintf("'%s'", $val);}, $tipe));
          $qtys = implode(',', $qtys);
        ?>
      </div>
  
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" id="waitDialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-bell"></i> Stok Kendaraan yang harus di order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th width="3%" scope="col">#</th>
              <th scope="col">NAMA TIPE</th>
              <th scope="col">Stock</th>
             
              <th scope="col">Reoder Point</th>
              <th width="1%" scope="col">#</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $no = 0;
                $total_penjualan = 0;
                $tipe = array();
                $qtys = array();
                foreach ($stock as $key => $rows) {
                  $qty = $this->crud_model->read('table_kendaraan', ['kode_tipe' => $rows->kode_tipe,'status' => 'stok'])->num_rows();
               
                  array_push($tipe, $rows->nama_tipe);
                  array_push($qtys, $qty);
                    if($rows->reorderpoint > $qty){
                      $no++;
                  
                      echo ' <tr>
                          <td>'.$no.'</td>
                          <td>'.$rows->nama_tipe.'</td>
                          <td>'.$qty.'</td>
                         
                          <td>'.$rows->reorderpoint.'</td>
                          <td><a href="'.site_url('stock/details/'.$rows->kode_tipe).'" class="btn btn-sm btn-primary">View</a></td>
                      </tr>';
                    }  
                    
                } 
            ?>
           
          </tbody>
        </table>
        <?php
          $string_tipe = implode(', ', array_map(function($val){return sprintf("'%s'", $val);}, $tipe));
          $qtys = implode(',', $qtys);
        ?>
      </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>  

      <script src="//cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script>

        <?php if($no > 0): ?>
          $("#qty_order").html('<?= $no; ?>');
          $("#alert_order").show();
          var myModal = document.getElementById('staticBackdrop');
          var modal = bootstrap.Modal.getOrCreateInstance(myModal);
          modal.show();
        <?php else: ?>
          $("#alert_order").hide();
        <?php endif; ?>
      
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [
            <?= $string_tipe; ?>
          ],
          datasets: [{
            data: [
              <?= $qtys; ?>
            ],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false
          }
        }
      });
      </script>