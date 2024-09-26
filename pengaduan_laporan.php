<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Laporan Pengaduan</h1>
</div>
<?php
$awal = set_value('awal', date('Y-01-01'));
$akhir = set_value('akhir', date('Y-m-d'));
?>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="pengaduan_laporan" />
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
                <a class="btn btn-secondary" href="cetak.php?m=pengaduan_laporan&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
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
                    <th>Deskripsi</th>
                    <th>Status</th>                    
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->getResults("SELECT * FROM tb_pengaduan p INNER JOIN tb_warga w ON w.id_warga=p.id_warga WHERE nama_pengaduan LIKE '%$q%' AND DATE(waktu_pengaduan)>='$awal' AND DATE(waktu_pengaduan)<='$akhir' ORDER BY id_pengaduan DESC");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->waktu_pengaduan ?></td>
                    <td><?= $row->nama_pengaduan ?></td>
                    <td><?= $row->nama_warga ?></td>
                    <td><?= $row->alamat_pengaduan ?></td>
                    <td><?= $row->detail_pengaduan ?></td>
                    <td><?= statusPengaduan($row->status_pengaduan) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>