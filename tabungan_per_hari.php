<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Laporan Tabungan Per Hari</h1>
</div>
<?php
$awal = set_value('awal', date('Y-01-01'));
$akhir = set_value('akhir', date('Y-m-d'));
?>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="tabungan_per_hari" />
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
                <a class="btn btn-secondary" href="cetak.php?m=tabungan_per_hari&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
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
    </div>
</div>