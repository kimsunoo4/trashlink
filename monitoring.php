<div class="mb-4">
    <h1 class=" h3 mb-0 text-gray-800">Monitoring</h1>
</div>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/modules/exporting.js"></script>
<script src="assets/js/modules/accessibility.js"></script>

<div class="row">
    <div class="col-md-6">
        <div id="container1"></div>
    </div>
    <div class="col-md-6">
        <div id="container2"></div>
    </div>
</div>
<?php
$rows = $db->getResults("SELECT tingkat, COUNT(*) AS total FROM tb_pengaduan GROUP BY tingkat");
$data = [];
foreach ($rows as $row) {
    $data[] = [
        'name' => $row->tingkat,
        'y' => $row->total * 1,
    ];
}
?>
<script>
    Highcharts.chart('container1', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Jumlah Peserta Berdasarkan Tingkat'
        },
        xAxis: {
            categories: ['USA', 'China', 'Brazil', 'EU', 'Argentina', 'India'],
            crosshair: true,
            accessibility: {
                description: 'Countries'
            }
        },
        series: [{
            name: 'Jumlah',
            colorByPoint: true,
            data: <?= json_encode($data) ?>
        }]
    });
</script>

<?php
$rows = $db->getResults("SELECT telpon, COUNT(*) AS total FROM tb_pengaduan k INNER JOIN tb_warga m ON m.id_warga=k.id_warga GROUP BY telpon");
$data = [];
$categories = [];
foreach ($rows as $row) {
    $categories[] = $row->telpon;
    $data[] =  $row->total * 1;
}
?>
<script>
    Highcharts.chart('container2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Peserta Berdasarkan Angkatan'
        },
        xAxis: {
            categories: <?= json_encode($categories) ?>,
            crosshair: true,
            accessibility: {
                description: 'Countries'
            }
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        series: [{
            name: 'Pengaduan',
            data: <?= json_encode($data) ?>
        }]
    });
</script>