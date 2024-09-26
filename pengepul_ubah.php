<?php
$row = $db->getRow("SELECT * FROM tb_pengepul WHERE id_pengepul='$_GET[ID]'");
?>
<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Profil Pengepul</h1>
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php show_msg() ?>
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_pengepul" value="<?= set_value('nama_pengepul', $row->nama_pengepul) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat', $row->alamat) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="email" value="<?= set_value('email', $row->email) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Telpon <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="telpon" value="<?= set_value('telpon', $row->telpon) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Layanan <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="layanan"><?= set_value('layanan', $row->layanan) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Harga Layanan <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="harga_pengepul" value="<?= set_value('harga_pengepul', $row->harga_pengepul) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="user" value="<?= set_value('user', $row->user) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass" value="<?= set_value('pass', $row->pass) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Status Pengepul <span class="text-danger">*</span></label>
                        <select class="form-control" name="status_pengepul">
                            <?= getStatusPengepulOption(set_value('status_pengepul', $row->status_pengepul)) ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="?m=pengepul"><span class="fa fa-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>