 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Marketing</h1>
   
</div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3>Laporan Penjualan bulan <?= date('F Y') ?></h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm" style="white-space: nowrap;">
                  <thead>
                    <tr>
                      <th width="1%" scope="col-sm-1">No.</th>
                      <th width="1%" scope="col-sm-1">Tanggal</th>
                      <th width="1%" scope="col">Cabang</th>
                      <th scope="col">No Rangka</th>
                      <th scope="col">Nama Tipe</th>
                      <th scope="col">Warna</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                      $no = 1;
                      foreach ($data as $key => $rows) {
                        $nama_tipe = $this->crud_model->read('tipe_kendaraan', ['kode_tipe' => $rows->kode_tipe])->row();
                        $warna = $this->crud_model->read('warna_kendaraan', ['kode_warna' => $rows->kode_warna])->row();
                        $marketing = $this->crud_model->read('marketing', ['id_marketing' => $rows->id_marketing])->row();
                        echo ' <tr>
                                      <td>'.$no++.'</td>
                                      <td>'.$rows->tanggal_jual.'</td>
                                      <td>'.$rows->cabang.'</td>
                                      <td>'.$rows->no_rangka.'</td>
                                      <td>'.$nama_tipe->nama_tipe.'</td>
                                      <td>'.$warna->nama_warna.'</td>
                                  </tr>';
                      } 
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="6">Total Unit Terjual <?= $no-1; ?></th>
                  </tr>
                </tfoot>
                </table>
              </div>
            </div>
            <?php
              if($no <= 10): 
            ?>
            <div class="card-footer">
              <p style="color:red;">Anda belum mencapai target penjualan bulan ini</p>
            </div>
            <?php else: ?>
              <div class="card-footer">
              <p style="color:green;">Anda sudah mencapai target penjualan bulan ini</p>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
   
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