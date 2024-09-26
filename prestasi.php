<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Prestasi</h1>
</div>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="prestasi" />
            <div class="mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="mr-1">
                <button class="btn btn-success"><span class="fa fa-sync"></span> Refresh</button>
            </div>
            <div class="mr-1" <?= is_hidden('prestasi_aksi') ?>>
                <a class="btn btn-primary" href="?m=prestasi_tambah"><span class="fa fa-plus"></span> Tambah</a>
            </div>
            <div class="mr-1" <?= is_hidden('prestasi_aksi') ?>>
                <a class="btn btn-secondary" href="cetak.php?m=prestasi&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
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
                    <th <?= is_hidden('prestasi_aksi') ?>>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $where = '';
            if (isWarga())
                $where .= " AND id_warga='$_SESSION[ID]'";
            $rows = $db->get_results("SELECT * FROM tb_prestasi WHERE '%$q%' OR nama_pengaduan LIKE '%$q%' $where ORDER BY id_prestasi");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->nama_pengaduan ?></td>
                    <td><?= $row->tanggal ?></td>
                    <td><?= $row->tingkat ?></td>
                    <td><?= $row->penyelenggara ?></td>
                    <td><?= $row->kota ?></td>
                    <td><?= getFile('prestasi', $row->sertifikat) ?></td>
                    <td <?= is_hidden('prestasi_aksi') ?>>
                        <a class="btn btn-sm btn-warning" href="?m=prestasi_ubah&ID=<?= $row->id_prestasi ?>"><span class="fa fa-edit"></span></a>
                        <a class="btn btn-sm btn-danger" href="aksi.php?act=prestasi_hapus&ID=<?= $row->id_prestasi ?>" onclick="return confirm('Hapus data?')"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>