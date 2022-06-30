 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stok Kendaraan</h1>
 
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th width="3%" scope="col">#</th>
              <th scope="col">NAMA TIPE</th>
              <th scope="col">Stock</th>
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
                      echo ' <tr>
                          <td>'.$no.'</td>
                          <td>'.$rows->nama_tipe.'</td>
                          <td>'.$qty.'</td>
                          <td>'.$rows->safetystock.'</td>
                          <td>'.$rows->reorderpoint.'</td>
                          <td><a href="'.site_url('stock/details/'.$rows->kode_tipe).'" class="btn btn-sm btn-primary">View</a></td>
                      </tr>';
                } 
            ?>
           
          </tbody>
        </table>
      </div>