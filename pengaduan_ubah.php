<?php
$row = $db->getRow("SELECT * FROM tb_pengaduan WHERE id_pengaduan='$_GET[ID]'");
?>
<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Ubah Pengaduan</h1>
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Judul Pengaduan <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_pengaduan" value="<?= set_value('nama_pengaduan', $row->nama_pengaduan) ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Foto <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" name="foto_pengaduan" disabled />
                        <div class="form-text">
                            <img src="<?= get_image_url($row->foto_pengaduan, 'pengaduan/small_') ?>" height="100" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="alamat_pengaduan" value="<?= set_value('alamat_pengaduan', $row->alamat_pengaduan) ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" name="detail_pengaduan" readonly><?= set_value('detail_pengaduan') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status Pengaduan <span class="text-danger">*</span></label>
                        <select class="form-control" name="status_pengaduan">
                            <?= getStatusPengaduanOption(set_value('status_pengaduan', $row->status_pengaduan)) ?>
                        </select>
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