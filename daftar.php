<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Registrasi</h1>
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_warga" value="<?= set_value('nama_warga') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="email" value="<?= set_value('email') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Telpon <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="telpon" value="<?= set_value('telpon') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="user" value="<?= set_value('user') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass1" value="<?= set_value('pass1') ?>" />
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass2" value="<?= set_value('pass2') ?>" />
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-user"></span> Daftar</button>
                    <a class="btn btn-danger" href="?m=home"><span class="fa fa-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>