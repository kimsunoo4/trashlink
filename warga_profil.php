<?php
$row = $db->getRow("SELECT * FROM tb_warga WHERE id_warga='$_SESSION[ID]'");
?>
<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Profil Warga</h1>
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_warga" value="<?= set_value('nama_warga', $row->nama_warga) ?>" />
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
                        <label>Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="user" value="<?= set_value('user', $row->user) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="status_warga" value="<?= set_value('status_warga', statusWarga($row->status_warga)) ?>" disabled />
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>