<?php
$row = $db->getRow("SELECT * FROM tb_tabungan WHERE id_tabungan='$_GET[ID]'");
?>
<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Ubah Kriteria</h1>
</div>
<form method="POST">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Kode <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="kode" value="<?= $row->id_tabungan ?>" readonly="" />
                    </div>
                    <div class="form-group">
                        <label>Nama Kriteria <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="<?= set_value('nama', $row->nama_pengaduan) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Profil Kriteria <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nilai" value="<?= set_value('nilai', $row->nilai) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Bobot <span class="text-danger"></span></label>
                        <input class="form-control" type="text" name="bobot" value="<?= set_value('bobot', $row->bobot) ?>" />
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