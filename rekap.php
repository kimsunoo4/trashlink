<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Rekap Tabungan</h1>
</div>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="rekap" />
            <div class="mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="mr-1">
                <button class="btn btn-success"><span class="fa fa-sync"></span> Refresh</button>
            </div>
            <div class="mr-1">
                <a class="btn btn-secondary" href="cetak.php?m=tabungan&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Nama Pengaduan</th>
                    <th>Tanggal</th>
                    <th>Tingkat</th>
                    <th>Nama Penyelenggara</th>
                    <th>Kota</th>
                    <th>Sertifikat</th>
                    <th>Validasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $where = '';
            $rows = $db->getResults("SELECT * FROM tb_tabungan p INNER JOIN tb_warga m ON m.id_warga=p.id_warga WHERE '%$q%' OR nama_pengaduan LIKE '%$q%' $where ORDER BY id_tabungan");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->id_warga ?></td>
                    <td><?= $row->nama_warga ?></td>
                    <td><?= $row->nama_pengaduan ?></td>
                    <td><?= $row->tanggal ?></td>
                    <td><?= $row->tingkat ?></td>
                    <td><?= $row->penyelenggara ?></td>
                    <td><?= $row->kota ?></td>
                    <td><?= getFile('tabungan', $row->sertifikat) ?></td>
                    <td><?= $row->validasi ? '&check;' : '' ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="?m=rekap_ubah&ID=<?= $row->id_tabungan ?>"><span class="fa fa-edit"></span></a>
                        <a class="btn btn-sm btn-danger" href="aksi.php?act=rekap_hapus&ID=<?= $row->id_tabungan ?>" onclick="return confirm('Hapus data?')"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>