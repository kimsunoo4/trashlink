<h1>Laporan Data Pengaduan</h1>
<table class="table table-bordered table-hover table-striped m-0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pengaduan</th>
            <th>Tanggal</th>
            <th>Tingkat</th>
            <th>Nama Penyelenggara</th>
            <th>Kota</th>
            <th>Sertifikat</th>
            <th>Deskripsi Pengaduan</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $where = '';
    if (isWarga())
        $where .= " AND id_warga='$_SESSION[ID]'";
    $rows = $db->getResults("SELECT * FROM tb_pengaduan WHERE nama_pengaduan LIKE '%$q%' $where ORDER BY id_pengaduan");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->nama_pengaduan ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= $row->tingkat ?></td>
            <td><?= $row->penyelenggara ?></td>
            <td><?= $row->kota ?></td>
            <td><?= getFile('pengaduan', $row->file) ?></td>
            <td><?= $row->deskripsi ?></td>
        </tr>
    <?php endforeach ?>
</table>