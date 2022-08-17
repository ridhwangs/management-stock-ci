<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Laporan Penjualan PDF</title>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
</head>
<body>
<h3 class="text-center bg-info">Laporan Penjualan</h3>
<table class="styled-table">
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
                        <td>'.$rows->tanggal_jual.'</td>
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
</body>
</html>