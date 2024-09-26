<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Pengepul</h1>
</div>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="pengepul" />
            <div class="mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="mr-1">
                <button class="btn btn-success"><span class="fa fa-sync"></span> Refresh</button>
            </div>
            <div class="mr-1" <?= is_hidden('pengepul_tambah') ?>>
                <a class="btn btn-primary" href="?m=pengepul_tambah"><span class="fa fa-plus"></span> Tambah</a>
            </div>
            <div class="mr-1" <?= is_hidden('pengepul_aksi') ?>>
                <a class="btn btn-secondary" href="cetak.php?m=pengepul&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telpon</th>
                    <th>User</th>
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
            $from = "FROM tb_pengepul ";
            $where = "WHERE '%$q%' OR nama_pengepul LIKE '%$q%'";
            $rows = $db->getResults("SELECT * $from $where ORDER BY id_pengepul DESC LIMIT $offset, $limit");
            $jumrec = $db->get_var("SELECT COUNT(*) $from $where");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->nama_pengepul ?></td>
                    <td><?= $row->alamat ?></td>
                    <td><?= $row->email ?></td>
                    <td><?= $row->telpon ?></td>
                    <td><?= $row->user ?></td>
                    <td><?= statusWarga($row->status_pengepul) ?></td>
                    <td>
                        <a class="btn btn-sm btn-info" href="?m=pengepul_show&ID=<?= $row->id_pengepul ?>" <?= is_hidden('pengepul_show') ?>><span class="fa fa-eye"></span></a>
                        <a class="btn btn-sm btn-warning" href="?m=pengepul_ubah&ID=<?= $row->id_pengepul ?>" <?= is_hidden('pengepul_ubah') ?>><span class="fa fa-edit"></span></a>
                        <a class="btn btn-sm btn-danger" href="aksi.php?act=pengepul_hapus&ID=<?= $row->id_pengepul ?>" onclick="return confirm('Hapus data?')" <?= is_hidden('pengepul_hapus') ?>><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="card-footer">
        <?= $pg->show("m=pengepul&q=$q&page=", $jumrec, $limit, $page) ?>
    </div>
</div>