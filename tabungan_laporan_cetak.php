<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Laporan Tabungan</h1>
</div>
<?php
$awal = set_value('awal', date('Y-01-01'));
$akhir = set_value('akhir', date('Y-m-d'));
?>

<table class="table table-bordered table-hover table-striped m-0">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Warga</th>
            <th>Pengepul</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->getResults("SELECT * FROM tb_tabungan t INNER JOIN tb_warga w ON w.id_warga=t.id_warga INNER JOIN tb_pengepul p ON p.id_pengepul=t.id_pengepul WHERE (nama_warga LIKE '%$q%' OR nama_pengepul LIKE '%$q%') AND DATE(tanggal)>='$awal' AND DATE(tanggal)<='$akhir' ORDER BY id_tabungan DESC");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= $row->nama_warga ?></td>
            <td><?= $row->nama_pengepul ?></td>
            <td><?= $row->jumlah ?></td>
            <td><?= $row->ket_tabungan ?></td>
            <td><?= statusTabungan($row->status_tabungan) ?></td>
        </tr>
    <?php endforeach ?>
</table>