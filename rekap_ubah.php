<?php
$row = $db->getRow("SELECT * FROM tb_tabungan WHERE id_tabungan='$_GET[ID]'");
?>
<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Ubah Tabungan</h1>
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama Pengaduan <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_pengaduan" value="<?= set_value('nama_pengaduan', $row->nama_pengaduan) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="tanggal" value="<?= set_value('tanggal', $row->tanggal) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Tingkat <span class="text-danger">*</span></label>
                        <select class="form-control" name="tingkat">
                            <?= get_tingkat_option(set_value('tingkat', $row->tingkat)) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Penyelenggara <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="penyelenggara" value="<?= set_value('penyelenggara', $row->penyelenggara) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Kota <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="kota" value="<?= set_value('kota', $row->kota) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Sertifikat <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" name="sertifikat" />
                        <p class="form-text"><?= getFile('tabungan', $row->sertifikat) ?></p>
                    </div>
                    <div class="form-group">
                        <label>Validasi <span class="text-danger">*</span></label>
                        <select class="form-control" name="validasi">
                            <?= get_validasi_option(set_value('validasi', $row->validasi)) ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="?m=rekap"><span class="fa fa-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>