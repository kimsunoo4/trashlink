<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Perhitungan</h1>
</div>

<?php
foreach ($KRITERIA as $key => $val) {
    $nilai[$key] = $val->nilai;
    $bobot[$key] = $val->bobot;
}
$rel_warga = get_rel_warga();
$pm = new ProfileMatchingKriteria($rel_warga, $nilai, $bobot);
?>
<div class="card mb-3">
    <div class="card-header">
        Nilai Tabungan
    </div>
    <table class="table table-bordered table-striped table-hover m-0">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <?php foreach ($KRITERIA as $key => $val) : ?>
                    <th><?= $val->nama_pengaduan ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <?php foreach ($rel_warga as $key => $val) : ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $ALTERNATIF[$key] ?></td>
                <?php foreach ($val as $k => $v) : ?>
                    <td><?= $v ?></td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<div class="card mb-3">
    <div class="card-header">
        GAP
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val->nama_pengaduan ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($pm->gap as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $v ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        GAP
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val->nama_pengaduan ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($pm->mappingGap as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $v ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        Terbobot
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>Kode</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($pm->terbobot as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 4) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        Perangkingan
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Total</th>
            </thead>
            <?php
            $rank = get_rank($pm->total);
            $categories = [];
            $data = [];
            foreach ($rank as $key => $val) :
                $categories[] = $ALTERNATIF[$key];
                $data[] = round($pm->total[$key], 2);
                $db->query("UPDATE tb_warga SET total='{$pm->total[$key]}', rank='$val' WHERE id_warga='$key'") ?>
                <tr>
                    <td><?= $val ?></td>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <td><?= round($pm->total[$key], 4) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="card-body">
        <a class="btn btn-secondary" target="_blank" href="cetak.php?m=hitung"><span class="fa fa-print"></span> Cetak</a>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div id="container"></div>
    </div>
</div>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/modules/exporting.js"></script>
<script src="assets/js/modules/export-data.js"></script>
<script src="assets/js/modules/accessibility.js"></script>
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Hasil Perhitungan PM'
        },
        xAxis: {
            categories: <?= json_encode($categories) ?>,
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.4f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            "name": "Total",
            "data": <?= json_encode($data) ?>
        }]
    });
</script>