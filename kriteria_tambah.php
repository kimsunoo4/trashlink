<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Tambah Kriteria</h1>
</div>
<form method="POST">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Kode <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="id_tabungan" value="<?= set_value('id_tabungan', kode_oto('id_tabungan', 'tb_tabungan', 'C', 2)) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nama Kriteria <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_pengaduan" value="<?= set_value('nama_pengaduan') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Profil Kriteria <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nilai" value="<?= set_value('nilai') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nilai Bobot <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="bobot" value="<?= set_value('bobot') ?>" />
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="?m=tabungan"><span class="fa fa-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>