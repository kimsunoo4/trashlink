<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Tambah Prestasi</h1>
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama Pengaduan <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_pengaduan" value="<?= set_value('nama_pengaduan') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="tanggal" value="<?= set_value('tanggal', today()) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Tingkat <span class="text-danger">*</span></label>
                        <select class="form-control" name="tingkat">
                            <?= get_tingkat_option(set_value('tingkat')) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Penyelenggara <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="penyelenggara" value="<?= set_value('penyelenggara') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Kota <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="kota" value="<?= set_value('kota') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Sertifikat <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" name="sertifikat" />
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="?m=prestasi"><span class="fa fa-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>