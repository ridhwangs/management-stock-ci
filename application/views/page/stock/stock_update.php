<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Status kendaraan</h1>
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
        <form id="form" method="POST" action="<?= site_url('stock/update') ?>">
            <input type="hidden" name="id_kendaraan" value="<?= $this->uri->segment(3); ?>">
            
            <div class="mb-3">
                <label for="cabang" class="form-label">Cabang</label>
                <select class="form-select" id="cabang" name="cabang" aria-label="Babang Kendaraan">
                    <option value="ARS">ARS</option>
                    <option value="SDR">SDR</option>
                    <option value="CRB">CRB</option>
                    <option value="IDM">IDM</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kode_tipe" class="form-label">Pilih Tipe Kendaraan</label>
                <select class="form-select" id="kode_tipe" name="kode_tipe" aria-label="Nama Tipe Kendaraan" disabled>
                    <?php
                        foreach ($data_tipe as $key => $rows) {
                            echo '<option value="'.$rows->kode_tipe.'">'.$rows->nama_tipe.'</option>';
                        } 
                    ?>
                </select>
            </div>
            <div class="mb-3">
                 <label for="kode_warna" class="form-label">Pilih Warna Kendaraan</label>
                <select class="form-select" id="kode_warna" name="kode_warna" aria-label="Nama Warna Kendaraan" disabled>
                    <?php
                        foreach ($data_warna as $key => $rows) {
                            echo '<option  value="'.$rows->kode_warna.'">'.$rows->nama_warna.'</option>';
                        } 
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="no_warna" class="form-label">No Rangka</label>
                <input type="text" class="form-control" id="no_warna" name="no_rangka" placeholder="Nomor Rangka Kendaraan" value="<?= $data->no_rangka; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                 <select class="form-select" id="status" name="status" aria-label="Status">
                    <option value="stok">Stok</option>
                    <option value="terjual">Terjual</option>
                </select>
            </div>
            <div class="mb-3" id="div_marketing">
                <label for="id_marketing" class="form-label">Pilih Marketing</label>
                <select class="form-select" id="id_marketing" name="id_marketing" aria-label="Marketing">
                    <?php
                        foreach ($data_marketing as $key => $rows) {
                            echo '<option  value="'.$rows->id_marketing.'">'.$rows->nama_lengkap.'</option>';
                        } 
                    ?>
                </select>
            </div>
            <div class="mb-3" id="div_tanggal_penjualan">
            <label for="tanggal_jual" class="form-label">Tanggal Penjualan</label>
            <input type="date" class="form-control" id="tanggal_jual" name="tanggal_jual" placeholder="Tanggal Penjualan">
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" form="form" class="btn btn-primary">Submit</button>
        <a href="<?= site_url('master/tipe'); ?>" class="btn btn-danger">Kembali</a>
    </div>
</div>
<script>
    $("#div_marketing").hide();
    $("#div_tanggal_penjualan").hide();
    $("#kode_tipe").val("<?= $data->kode_tipe; ?>");
    $("#kode_warna").val("<?= $data->kode_warna; ?>");
    $('#status').on('change', function() {
        if(this.value == "terjual"){
            $("#div_marketing").show();
            $("#div_tanggal_penjualan").show();
        }else{
            $("#div_marketing").hide();
            $("#div_tanggal_penjualan").hide();
        }
       
    });
</script>