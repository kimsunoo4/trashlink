<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Laporan Pengaduan Per Bulan</h1>
</div>
<?php
$awal = set_value('awal', date('Y-01-01'));
$akhir = set_value('akhir', date('Y-m-d'));
?>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="pengaduan_per_bulan" />
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
                <a class="btn btn-secondary" href="cetak.php?m=pengaduan_per_bulan&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->getResults("SELECT MAX(waktu_pengaduan) AS tanggal, COUNT(*) AS jumlah FROM tb_pengaduan WHERE DATE(waktu_pengaduan)>='$awal' AND DATE(waktu_pengaduan)<='$akhir' GROUP BY YEAR(waktu_pengaduan), MONTH(waktu_pengaduan)");
            $no = 0;
            $total = 0;
            foreach ($rows as $row) : $total += $row->jumlah ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= date('M Y', strtotime($row->tanggal)) ?></td>
                    <td><?= angka($row->jumlah) ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="2">Total</td>
                <td><?= angka($total) ?></td>
            </tr>
        </table>
    </div>
</div>