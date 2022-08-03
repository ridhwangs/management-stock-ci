 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
   
      </div>
      <div class="alert alert-warning" role="alert" id="alert_order">
          <span id="qty_order">0</span> stok kendaraan yang harus di order
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
      <script src="//cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script>
        <?php if($no > 0): ?>
          $("#qty_order").html('<?= $no; ?>');
          $("#alert_order").show();
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