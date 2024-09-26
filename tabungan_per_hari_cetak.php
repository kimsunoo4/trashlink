<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Laporan Tabungan Per Hari</h1>
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
            <th>Jumlah</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->getResults("SELECT DATE(tanggal) AS tanggal, SUM(jumlah) AS jumlah FROM tb_tabungan WHERE DATE(tanggal)>='$awal' AND DATE(tanggal)<='$akhir' GROUP BY date(tanggal)");
    $no = 0;
    $total = 0;
    foreach ($rows as $row) : $total += $row->jumlah ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= angka($row->jumlah) ?> kg</td>
        </tr>
    <?php endforeach ?>
    <tr>
        <td colspan="2">Total</td>
        <td><?= angka($total) ?> kg</td>
    </tr>
</table>