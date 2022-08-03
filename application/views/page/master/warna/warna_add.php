<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Warna Kendaraan Baru</h1>
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
        <form id="form" method="POST" action="<?= site_url('master/create/warna') ?>">
            <div class="form-group">
                <label for="nama_warna">Nama Warna</label>
                <input name="nama_warna" type="text" class="form-control" id="nama_warna" aria-describedby="nama_warna" autofocus>
                <small id="nama_warna" class="form-text text-muted">Warna Kendaraan wajib di isi.</small>
            </div>
            
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="form" class="btn btn-sm btn-primary">Submit</button>
        <a href="<?= site_url('master/warna'); ?>" class="btn btn-sm btn-danger">Kembali</a>
    </div>
</div>