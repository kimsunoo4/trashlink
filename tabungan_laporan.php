<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Laporan Tabungan</h1>
</div>
<?php
$awal = set_value('awal', date('Y-01-01'));
$akhir = set_value('akhir', date('Y-m-d'));
?>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="tabungan_laporan" />
            <div class="mr-1">
                <input class="form-control" type="date" name="awal" value="<?= $awal ?>" />
            </div>
            <div class="mr-1">
                <input class="form-control" type="date" name="akhir" value="<?= $akhir ?>" />
            </div>
            <div class="mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="mr-1">
                <button class="btn btn-success"><span class="fa fa-sync"></span> Refresh</button>
            </div>
            <div class="mr-1">
                <a class="btn btn-secondary" href="cetak.php?m=tabungan_laporan&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
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
    </div>
</div>