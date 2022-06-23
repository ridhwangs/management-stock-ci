<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Tipe Kendaraan Baru</h1>
</div>
<div class="card">
    <div class="card-body">
        <form id="form" method="POST" action="<?= site_url('master/create/tipe') ?>">
            <div class="form-group">
                <label for="nama_tipe">Nama Tipe</label>
                <input name="nama_tipe" type="text" class="form-control" id="nama_tipe" aria-describedby="nama_tipe" autofocus required>
                <small id="nama_tipe" class="form-text text-muted">Tipe Kendaraan wajib di isi.</small>
            </div>
            <div class="form-group">
                <label for="safetystock">Safety Stock</label>
                <input name="safetystock" type="text" class="form-control" id="safetystock" aria-describedby="safetystock" autofocus required>
            </div>
            <div class="form-group">
                <label for="reorderpoint">Reorder Point</label>
                <input name="reorderpoint" type="text" class="form-control" id="reorderpoint" aria-describedby="reorderpoint" autofocus required>
            </div>
            
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="form" class="btn btn-sm btn-primary">Submit</button>
        <a href="<?= site_url('master/tipe'); ?>" class="btn btn-sm btn-danger">Kembali</a>
    </div>
</div>