 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penjualan Kendaraan</h1>
 
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th width="1%" scope="col-sm-1">No.</th>
              <th width="1%" scope="col-sm-1">Tanggal</th>
              <th width="1%" scope="col">Cabang</th>
              <th scope="col">No Rangka</th>
              <th scope="col">Nama Tipe</th>
              <th scope="col">Warna</th>
              <th scope="col">Nama Marketing</th>
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
                                <td>'.date('d/m/Y', strtotime($rows->tanggal_jual)).'</td>
                                <td>'.$rows->cabang.'</td>
                                <td>'.$rows->no_rangka.'</td>
                                <td>'.$nama_tipe->nama_tipe.'</td>
                                <td>'.$warna->nama_warna.'</td>
                                <td>'.$marketing->nama_lengkap.'</td>
                            </tr>';
                } 
            ?>
           
          </tbody>
        </table>
      </div>