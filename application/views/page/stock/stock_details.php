 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">View Tipe Kendaraan</h1>
 
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th width="1%" scope="col-sm-1">No.</th>
              <th width="1%" scope="col-sm-1">Tanggal</th>
              <th width="1%" scope="col">Cabang</th>
              <th scope="col">No Rangka</th>
              <th scope="col">Warna</th>
              <th width="1%" scope="col-sm-1">#</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $no = 1;
                foreach ($data as $key => $rows) {
                    $warna = $this->crud_model->read('warna_kendaraan', ['kode_warna' => $rows->kode_warna])->row();
                    echo ' <tr>
                                <td>'.$no++.'</td>
<<<<<<< HEAD
                                <td>'.$rows->tanggal_order.'</td>
=======
                                <td>'.date('d/m/Y', strtotime($rows->tanggal_order)).'</td>
>>>>>>> e12d46772a846915d05d1ee8c8d6b20f5295e8c0
                                <td>'.$rows->cabang.'</td>
                                <td>'.$rows->no_rangka.'</td>
                                <td>'.$warna->nama_warna.'</td>
                                
                                <td><a href="'.site_url('stock/view/'.$rows->id_kendaraan).'" class="btn btn-sm btn-primary">Update</a></td>
                            </tr>';
                } 
            ?>
           
          </tbody>
        </table>
      </div>