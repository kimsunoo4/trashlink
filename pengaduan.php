<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Pengaduan</h1>
</div>
<?php
aktifWarga()
?>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="pengaduan" />
            <div class="mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="mr-1">
                <button class="btn btn-success"><span class="fa fa-sync"></span> Refresh</button>
            </div>
            <div class="mr-1" <?= is_hidden('pengaduan_tambah') ?>>
                <a class="btn btn-primary" href="?m=pengaduan_tambah"><span class="fa fa-plus"></span> Tambah</a>
            </div>
            <div class="mr-1" <?= is_hidden('pengaduan_aksi') ?>>
                <a class="btn btn-secondary" href="cetak.php?m=pengaduan&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Waktu</th>
                    <th>Judul</th>
                    <th>Warga</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $where = '';
            if (isWarga())
                $where .= " AND w.id_warga='$_SESSION[ID]'";
            $rows = $db->getResults("SELECT * FROM tb_pengaduan p INNER JOIN tb_warga w ON w.id_warga=p.id_warga WHERE nama_pengaduan LIKE '%$q%' $where ORDER BY id_pengaduan DESC");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->waktu_pengaduan ?></td>
                    <td><?= $row->nama_pengaduan ?></td>
                    <td><?= $row->nama_warga ?></td>
                    <td><?= $row->alamat_pengaduan ?></td>
                    <td>
                        <img src="<?= get_image_url($row->foto_pengaduan, 'pengaduan/small_') ?>" height="100" />
                    </td>
                    <td><?= $row->detail_pengaduan ?></td>
                    <td><?= statusPengaduan($row->status_pengaduan) ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="?m=pengaduan_ubah&ID=<?= $row->id_pengaduan ?>" <?= is_hidden('pengaduan_ubah') ?>><span class="fa fa-edit"></span></a>
                        <a class="btn btn-sm btn-danger" href="aksi.php?act=pengaduan_hapus&ID=<?= $row->id_pengaduan ?>" onclick="return confirm('Hapus data?')" <?= is_hidden('pengaduan_hapus') ?>><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>