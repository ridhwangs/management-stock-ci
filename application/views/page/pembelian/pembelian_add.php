<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Pembelian Kendaraan Baru</h1>
</div>
    <?php 
        if($this->input->get('status')){
    ?>
        <div class="alert alert-success" role="alert">
        Data berhasil di simpan
        </div>
    <?php
        }
    ?>
<div class="card">
    <div class="card-body">
        <form id="form" method="POST" action="<?= site_url('pembelian/create') ?>">
            <div class="mb-3">
                <label for="cabang" class="form-label">Cabang</label>
                <input type="text" class="form-control" id="cabang" name="cabang" placeholder="Cabang" required>
            </div>
            <div class="mb-3">
                <label for="kode_tipe" class="form-label">Pilih Tipe Kendaraan</label>
                <select class="form-select" id="kode_tipe" name="kode_tipe" aria-label="Nama Tipe Kendaraan">
                    <?php
                        foreach ($data_tipe as $key => $rows) {
                            echo '<option value="'.$rows->kode_tipe.'">'.$rows->nama_tipe.'</option>';
                        } 
                    ?>
                </select>
            </div>
            <div class="mb-3">
                 <label for="kode_warna" class="form-label">Pilih Warna Kendaraan</label>
                <select class="form-select" id="kode_warna" name="kode_warna" aria-label="Nama Warna Kendaraan">
                    <?php
                        foreach ($data_warna as $key => $rows) {
                            echo '<option  value="'.$rows->kode_warna.'">'.$rows->nama_warna.'</option>';
                        } 
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="no_warna" class="form-label">No Rangka</label>
                <input type="text" class="form-control" id="no_warna" name="no_rangka" placeholder="Nomor Rangka Kendaraan" required>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="form" class="btn btn-primary">Submit</button>
    </div>
</div>