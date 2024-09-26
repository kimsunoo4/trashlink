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
                        <label>Tanggal <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="tanggal" value="<?= set_value('tanggal', $row->tanggal) ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Warga <span class="text-danger">*</span></label>
                        <select class="form-control" name="id_warga" disabled>
                            <option value="">&nbsp;</option>
                            <?= getWargaOption(set_value('id_warga', $row->id_warga)) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pengepul <span class="text-danger">*</span></label>
                        <select class="form-control" name="id_pengepul" disabled>
                            <option value="">&nbsp;</option>
                            <?= getPengepulOption(set_value('id_pengepul', $row->id_pengepul)) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="jumlah" value="<?= set_value('jumlah', $row->jumlah) ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Keterangan </label>
                        <input class="form-control" type="text" name="ket_tabungan" value="<?= set_value('ket_tabungan', $row->ket_tabungan) ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Status Tabungan <span class="text-danger">*</span></label>
                        <select class="form-control" name="status_tabungan">
                            <?= getStatusTabunganOption(set_value('status_tabungan', $row->status_tabungan)) ?>
                        </select>
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