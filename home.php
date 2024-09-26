<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<?= show_msg() ?>
<?php
$where = '';
if (isWarga())
    $where .= " AND id_warga='$_SESSION[ID]'";
?>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4" <?= is_hidden('pengaduan') ?>>
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Pengaduan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $db->get_var("SELECT COUNT(*) FROM tb_pengaduan WHERE 1 $where") ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4" <?= is_hidden('tabungan') ?>>
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Tabungan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $db->get_var("SELECT SUM(jumlah) FROM tb_tabungan WHERE 1 $where") ?> kg</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-medal fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4" <?= is_hidden('saldo') ?>>
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Saldo </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= angka($db->get_var("SELECT saldo FROM tb_saldo WHERE id_warga='$_SESSION[ID]' ORDER BY id_saldo DESC LIMIT 1")) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-medal fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>