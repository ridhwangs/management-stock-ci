 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stok Kendaraan</h1>
 
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th width="3%" scope="col">#</th>
              <th scope="col">NAMA TIPE</th>
              <th scope="col">Qty</th>
              <th scope="col">Safety Stock</th>
              <th scope="col">Reoder Point</th>
              <th width="1%" scope="col">#</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $no = 0;
                $total_penjualan = 0;
                foreach ($data as $key => $rows) {
                  $no++;
                    $qty = $this->crud_model->read('table_kendaraan', ['kode_tipe' => $rows->kode_tipe,'status' => 'stok'])->num_rows();
                    $qTerjual =  $this->crud_model->read('table_kendaraan',['status' => 'terjual','kode_tipe' => $rows->kode_tipe])->num_rows();
                    $lead_time = 7 + 2;
                    $total_penjualan = $qTerjual;
                    if($qTerjual == 0){
                      $rata_rata_penjualan = 0;
                    }else{
                      
                      $rata_rata_penjualan = $total_penjualan / $qTerjual;
                    }
                    $lead_time_demand = $lead_time * $rata_rata_penjualan;
                    $safety_stock = ($total_penjualan * 12) - $rata_rata_penjualan * $lead_time;
                    echo ' <tr>
                                <td>'.$no.'</td>
                                <td>'.$rows->nama_tipe.'</td>
                                <td>'.$qty.'</td>
                                <td>'.$rata_rata_penjualan.'</td>
                                <td></td>
                                <td><a href="'.site_url('stock/details/'.$rows->kode_tipe).'" class="btn btn-sm btn-primary">View</a></td>
                            </tr>';
                } 
            ?>
           
          </tbody>
        </table>
      </div>