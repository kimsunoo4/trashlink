<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Konsultasi</h1>
</div>
<form method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Pilih Kriteria</strong>
                </div>
                <div class="card-body">
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <div class="form-group">
                            <label><?= $val->nama_pengaduan ?></label>
                            <select class="form-control" name="id_subtabungan[<?= $key ?>]">
                                <?= get_subtabungan_option($key, isset($_POST['id_subtabungan']) ? $_POST['id_subtabungan'][$key] : '') ?>
                            </select>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-signal"></span> Hitung</button>
                </div>
            </div>
        </div>
    </div>
    <?php if ($_POST) include 'konsultasi_hasil.php'; ?>
</form>