<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Tambah Pengaduan</h1>
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Judul Pengaduan <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_pengaduan" value="<?= set_value('nama_pengaduan') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Foto <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" name="foto_pengaduan" />
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="alamat_pengaduan" value="<?= set_value('alamat_pengaduan') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" name="detail_pengaduan"><?= set_value('detail_pengaduan') ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="?m=pengaduan"><span class="fa fa-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>