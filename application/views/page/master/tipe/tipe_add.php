<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Tipe Kendaraan Baru</h1>
</div>
<?php 
    if(!empty($this->input->get('message'))){
?>
    <div class="alert alert-success" role="alert">
        <?= $this->input->get('message'); ?>
    </div>
<?php
    }
?>
<div class="card">
    <div class="card-body">
        <form id="form" method="POST" action="<?= site_url('master/create/tipe') ?>">
            <div class="form-group">
                <label for="nama_tipe">Nama Tipe</label>
                <input name="nama_tipe" type="text" class="form-control" id="nama_tipe" aria-describedby="nama_tipe" autofocus>
                <small id="nama_tipe" class="form-text text-muted">Tipe Kendaraan wajib di isi.</small>
            </div>
            <div class="form-group">
                <label for="lead_time">Lead Time</label>
                <input name="lead_time" type="number" class="form-control" id="lead_time">
            </div>
            <div class="form-group">
                <label for="lead_time_terlama">Lead Time Terlama</label>
                <input name="lead_time_terlama" type="number" class="form-control" id="lead_time_terlama">
            </div>
            <div class="form-group">
                <label for="rata_rata_penjualan_harian">Rata Rata Penjualan Harian</label>
                <input name="rata_rata_penjualan_harian" type="number" class="form-control" id="rata_rata_penjualan_harian">
            </div>
            <div class="form-group">
                <label for="penjualan_harian_tertinggi">Penjualan Harian Tertinggi</label>
                <input name="penjualan_harian_tertinggi" type="number" class="form-control" id="penjualan_harian_tertinggi">
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="form" class="btn btn-sm btn-primary">Submit</button>
        <a href="<?= site_url('master/tipe'); ?>" class="btn btn-sm btn-danger">Kembali</a>
    </div>
</div>