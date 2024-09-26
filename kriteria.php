<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kriteria</h1>
</div>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="prestasi" />
            <div class="mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="mr-1">
                <button class="btn btn-success"><span class="fa fa-sync"></span> Refresh</a>
            </div>
            <div class="mr-1">
                <a class="btn btn-primary" href="?m=prestasi_tambah"><span class="fa fa-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0">
            <thead>
                <tr class="nw">
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Profil Kriteria</th>
                    <th>Nilai Bobot</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = _get('q');
            $rows = $db->get_results("SELECT * FROM tb_prestasi 
        WHERE id_prestasi LIKE '%$q%' OR nama_pengaduan LIKE '%$q%' 
        ORDER BY id_prestasi");

            foreach ($rows as $row) : ?>
                <tr>

                    <td><?= $row->id_prestasi ?></td>
                    <td><?= $row->nama_pengaduan ?></td>
                    <td><?= $row->nilai ?></td>
                    <td><?= $row->bobot ?></td>
                    <td class="nw">
                        <a class="btn btn-sm btn-warning" href="?m=prestasi_ubah&amp;ID=<?= $row->id_prestasi ?>"><span class="fa fa-edit"></span></a>
                        <a class="btn btn-sm btn-danger" href="aksi.php?act=prestasi_hapus&amp;ID=<?= $row->id_prestasi ?>" onclick="return confirm('Hapus data?')"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </table>
    </div>
</div>