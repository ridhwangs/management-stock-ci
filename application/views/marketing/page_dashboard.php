 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
   
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

 
        <?php
                $no = 0;
                $total_penjualan = 0;
                $tipe = array();
                $qtys = array();
                foreach ($stock as $key => $rows) {
                  $qty = $this->crud_model->read('table_kendaraan', ['kode_tipe' => $rows->kode_tipe,'status' => 'stok'])->num_rows();
               
                  array_push($tipe, $rows->nama_tipe);
                  array_push($qtys, $qty);
                  $no++;
                } 
            ?>
        <?php
          $string_tipe = implode(', ', array_map(function($val){return sprintf("'%s'", $val);}, $tipe));
          $qtys = implode(',', $qtys);
        ?>
      </div>
      <script src="//cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script>
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