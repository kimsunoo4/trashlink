<?php
$row = $db->getRow("SELECT * FROM tb_user WHERE kode_user='$_SESSION[ID]'");
?>
<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Profil</h1>
</div>
<form method="POST">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Kode <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="kode_user" value="<?= set_value('kode_user', $row->kode_user) ?>" readonly="" />
                    </div>
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_user" value="<?= set_value('nama_user', $row->nama_user) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="user" value="<?= set_value('user', $row->user) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Pass <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass" value="<?= set_value('pass', $row->pass) ?>" />
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>