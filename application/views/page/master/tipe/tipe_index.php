
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Master Tipe Kendaraan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a href="<?= site_url('master/tipe/add'); ?>" class="btn btn-sm btn-outline-secondary">
            Tambah Data
          </a>
        </div>
      </div>

      <div class="table-responsive">
        <?php
          if(!empty($this->input->get('message'))): 
        ?>
        <div class="alert alert-success" role="alert">
          <?= $this->input->get('message') ?>
        </div>
        <?php endif; ?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th width="1%" scope="col-sm-1">No.</th>
              <th scope="col">Nama Tipe</th>
              <th scope="col">Reorder Point</th>
              <th colspan="1" width="1%" scope="col-sm-1">#</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $no = 1;
                foreach ($data as $key => $rows) {
                    echo ' <tr>
                                <td>'.$no++.'</td>
                                <td>'.$rows->nama_tipe.'</td>
                                <td>'.$rows->reorderpoint.'</td>
                                <td><a href="'.site_url('master/tipe/update/'. $rows->kode_tipe).'" class="btn btn-sm btn-primary">Edit</a></td>
                            </tr>';
                } 
            ?>
           
          </tbody>
        </table>
      </div>