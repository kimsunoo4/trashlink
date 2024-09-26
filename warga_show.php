<?php
$row = $db->getRow("SELECT * FROM tb_warga WHERE id_warga='$_GET[ID]'");
?>
<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Profil Warga</h1>
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
                        <input class="form-control" type="text" name="nama_warga" value="<?= set_value('nama_warga', $row->nama_warga) ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat', $row->alamat) ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="email" value="<?= set_value('email', $row->email) ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Telpon <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="telpon" value="<?= set_value('telpon', $row->telpon) ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="user" value="<?= set_value('user', $row->user) ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="status_warga" value="<?= set_value('status_warga', statusWarga($row->status_warga)) ?>" disabled />
                    </div>
                </div>
                <div class="card-footer">
                    <?php if ($row->status_warga == 0): ?>
                        <a class="btn btn-success" href="aksi.php?act=warga_aktif&ID=<?= $row->id_warga ?>" onclick="return confirm('Hapus data?')" <?= is_hidden('warga_aktif') ?>><span class="fa fa-check"></span> Aktifkan</a>
                    <?php endif ?>
                    <?php if ($row->status_warga == 1): ?>
                        <a class="btn btn-warning" href="aksi.php?act=warga_nonaktif&ID=<?= $row->id_warga ?>" onclick="return confirm('Hapus data?')" <?= is_hidden('warga_nonaktif') ?>><span class="fa fa-check"></span> NonAktifkan</a>
                    <?php endif ?>
                    <a class="btn btn-danger" href="?m=warga"><span class="fa fa-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>