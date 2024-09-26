<h1>Hasil Perhitungan</h1>
<table>
    <thead>
        <tr>
            <th>Rank</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Total</th>
        </tr>
    </thead>
    <?php
    if (_get('warga'))
        $rows = $db->getResults("SELECT * FROM tb_warga WHERE id_warga IN ('" . implode("','", _get('warga')) . "') ORDER BY rank");
    else
        $rows = $db->getResults("SELECT * FROM tb_warga  ORDER BY rank");
    $no = 1;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->id_warga ?></td>
            <td><?= $row->nama_warga ?></td>
            <td><?= round($row->total, 4) ?></td>
        </tr>
    <?php endforeach ?>
</table>