 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Master Warna Kendaraan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a href="<?= site_url('master/warna/add'); ?>" class="btn btn-sm btn-outline-secondary">
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
              <th scope="col">Nama Warna</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $no = 1;
                foreach ($data as $key => $rows) {
                    echo ' <tr>
                                <td>'.$no++.'</td>
                                <td>'.$rows->nama_warna.'</td>
                           </tr>';
                } 
            ?>
           
          </tbody>
        </table>
      </div>