<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Tarik Saldo Tabungan</h1>
</div>
<?php
$saldo = $db->get_var("SELECT saldo FROM tb_saldo WHERE id_warga='$_SESSION[ID]' ORDER BY id_saldo DESC LIMIT 1");
?>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Saldo <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="saldo" value="<?= set_value('saldo', $saldo) ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Jumlah <span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="jumlah" value="<?= set_value('jumlah') ?>" max="<?= $saldo ?>" min="10000" />
                    </div>
                
                <div class="form-group">
                        <label>Pilih E-Wallet <span class="text-danger">*</span></label>
                        <select class="form-control" name="e_wallet">
                            <option value="gopay" <?= set_value('e_wallet') == 'gopay' ? 'selected' : '' ?>>GoPay</option>
                            <option value="ovo" <?= set_value('e_wallet') == 'ovo' ? 'selected' : '' ?>>OVO</option>
                            <option value="dana" <?= set_value('e_wallet') == 'dana' ? 'selected' : '' ?>>DANA</option>
                            <option value="shopeepay" <?= set_value('e_wallet') == 'shopeepay' ? 'selected' : '' ?>>ShopeePay</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor E-Wallet <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="no_wallet" value="<?= set_value('no_wallet') ?>" />
                    </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="?m=tabungan"><span class="fa fa-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>