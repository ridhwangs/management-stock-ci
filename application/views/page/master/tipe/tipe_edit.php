<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Tipe Kendaraan Baru</h1>
</div>
<div class="card">
    <div class="card-body">
        <form id="form" method="POST" action="<?= site_url('master/update/tipe') ?>">
            <input type="hidden" name="kode_tipe" value="<?= $data->kode_tipe ?>">
            <div class="form-group">
                <label for="nama_tipe">Nama Tipe</label>
                <input name="nama_tipe" type="text" value="<?= $data->nama_tipe; ?>" class="form-control" id="nama_tipe" aria-describedby="nama_tipe" autofocus required>
                <small id="nama_tipe" class="form-text text-muted">Tipe Kendaraan wajib di isi.</small>
            </div>
            <div class="form-group">
                <label for="reorderpoint">Reorder Point</label>
                <input name="reorderpoint" type="text" class="form-control" value="<?= $data->reorderpoint; ?>" id="reorderpoint" aria-describedby="reorderpoint" autofocus required>
            </div>
            
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="form" class="btn btn-sm btn-primary">Submit</button>
        <a href="<?= site_url('master/tipe'); ?>" class="btn btn-sm btn-danger">Kembali</a>
    </div>
</div>