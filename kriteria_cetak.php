<h1>Kriteria</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Kriteria</th>
            <th>Batas Bawah</th>
            <th>Batas Tengah</th>
            <th>Batas Atas</th>
            <th>Nama Bawah</th>
            <th>Nama Tengah</th>
            <th>Nama Atas</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->getResults("SELECT * FROM tb_tabungan WHERE nama_pengaduan LIKE '%$q%' ORDER BY id_tabungan");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->id_tabungan ?></td>
            <td><?= $row->nama_pengaduan ?></td>
            <td><?= $row->batas_bawah ?></td>
            <td><?= $row->batas_tengah ?></td>
            <td><?= $row->batas_atas ?></td>
            <td><?= $row->nama_bawah ?></td>
            <td><?= $row->nama_tengah ?></td>
            <td><?= $row->nama_atas ?></td>
        </tr>
    <?php endforeach; ?>
</table>