<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Saldo</h1>
</div>
<?php
aktifWarga();
aktifPengepul();
?>
<p class="alert alert-info">
    Saldo Anda: <?= angka($db->get_var("SELECT saldo FROM tb_saldo WHERE id_warga='$_SESSION[ID]' ORDER BY id_saldo DESC LIMIT 1")) ?>
</p>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="saldo" />
            <div class="mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="mr-1">
                <button class="btn btn-success"><span class="fa fa-sync"></span> Refresh</button>
            </div>
            <div class="mr-1" <?= is_hidden('saldo_tarik') ?>>
                <a class="btn btn-primary" href="?m=saldo_tarik"><span class="fa fa-plus"></span> Tarik Saldo</a>
            </div>
            <div class="mr-1" <?= is_hidden('saldo_aksi') ?>>
                <a class="btn btn-secondary" href="cetak.php?m=saldo&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $pg = new Paging();
            $limit = 10;
            $page = _get('page');
            $offset = $pg->get_offset($limit, $page);
            $from = "FROM tb_saldo t INNER JOIN tb_warga w ON w.id_warga=t.id_warga";
            $where = "WHERE '%$q%' OR nama_warga LIKE '%$q%' AND t.id_warga='$_SESSION[ID]'";
            $rows = $db->getResults("SELECT * $from $where ORDER BY id_saldo DESC LIMIT $offset, $limit");
            $jumrec = $db->get_var("SELECT COUNT(*) $from $where");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->waktu ?></td>
                    <td><?= angka($row->debet) ?></td>
                    <td><?= angka($row->kredit) ?></td>
                    <td><?= angka($row->saldo) ?></td>
                    <td><?= $row->keterangan ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="card-footer">
        <?= $pg->show("m=saldo&q=$q&page=", $jumrec, $limit, $page) ?>
    </div>
</div>