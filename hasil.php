<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Data Perangkingan</h1>
</div>
<div class="card mb-3">
    <div class="card-header">
        <form class="form-inline">
            <input type="hidden" name="m" value="hasil" />
            <div class="mr-1">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="mr-1">
                <button class="btn btn-success"><span class="fa fa-sync"></span> Refresh</button>
            </div>
            <div class="mr-1">
                <a class="btn btn-secondary" href="cetak.php?m=hitung&q=<?= _get('q') ?>" target="_blank"><span class="fa fa-print"></span> Cetak</a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped m-0">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
            $rows = $db->getResults("SELECT * FROM tb_warga ORDER BY rank");
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row->rank ?></td>
                    <td><?= $row->id_warga ?></td>
                    <td><?= $row->nama_warga ?></td>
                    <td><?= round($row->total, 4) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>