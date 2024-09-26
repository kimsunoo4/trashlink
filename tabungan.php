<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Tabungan</h1>
</div>
<?php
aktifWarga();
aktifPengepul();
?>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="tabungan" />
            <div class="mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="mr-1">
                <button class="btn btn-success"><span class="fa fa-sync"></span> Refresh</button>
            </div>
            <div class="mr-1" <?= is_hidden('tabungan_tambah') ?>>
                <a class="btn btn-primary" href="?m=tabungan_tambah"><span class="fa fa-plus"></span> Tambah</a>
            </div>
            <div class="mr-1" <?= is_hidden('tabungan_aksi') ?>>
                <a class="btn btn-secondary" href="cetak.php?m=tabungan&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $pg = new Paging();
            $limit = 10;
            $page = _get('page');
            $offset = $pg->get_offset($limit, $page);
            $from = "FROM tb_tabungan t INNER JOIN tb_warga w ON w.id_warga=t.id_warga INNER JOIN tb_pengepul p ON p.id_pengepul=t.id_pengepul";
            $where = "WHERE '%$q%' OR nama_warga LIKE '%$q%'";
            if (isWarga())
                $where .= " AND t.id_warga='$_SESSION[ID]'";
            if (isPengepul())
                $where .= " AND t.id_pengepul='$_SESSION[ID]'";

            $rows = $db->getResults("SELECT * $from $where ORDER BY id_tabungan DESC LIMIT $offset, $limit");
            $jumrec = $db->get_var("SELECT COUNT(*) $from $where");
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
                    <td>
                        <?php if ($row->status_tabungan == 0): ?>
                            <a class="btn btn-sm btn-warning" href="?m=tabungan_ubah&ID=<?= $row->id_tabungan ?>" <?= is_hidden('tabungan_ubah') ?>><span class="fa fa-edit"></span></a>
                        <?php endif ?>
                        <a class="btn btn-sm btn-danger" href="aksi.php?act=tabungan_hapus&ID=<?= $row->id_tabungan ?>" onclick="return confirm('Hapus data?')" <?= is_hidden('tabungan_hapus') ?>><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="card-footer">
        <?= $pg->show("m=tabungan&q=$q&page=", $jumrec, $limit, $page) ?>
    </div>
</div>