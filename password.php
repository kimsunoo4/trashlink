<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Ubah Password</h1>
</div>
<form method="POST">
    <div class="row">
        <div class="col-sm-5">
            <?php if ($_POST) include 'aksi.php' ?>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Password Lama <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass1" />
                    </div>
                    <div class="form-group">
                        <label>Password Baru <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass2" />
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass3" />
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>