<?php include 'functions.php'; ?>
<!doctype html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow" />
    <title>Cetak Laporan</title>
    <style>
        body {
            font-family: Verdana;
            font-size: 13px;
        }

        h1 {
            font-size: 14px;
            border-bottom: 4px double #000;
            padding: 3px 0;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 10px;
            width: 100%;
        }

        th {
            background-color: lightgray;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 5px 10px;
        }

        .wrapper {
            margin: 0 auto;
            max-width: 980px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="wrapper">
        <?php

        if (is_file($mod . '_cetak.php'))
            include $mod . '_cetak.php';
        ?>
        <!-- Ubah tempat, nama, jabatan di config.php -->
        <p style="text-align: right;">
            <?= $config['tempat'] ?>, <?= tglIndo(date('Y-m-d')) ?><br />
            <br />
            <br />
            <br />
            <br />
            <?= $config['nama'] ?><br />
            <?= $config['jabatan'] ?><br />
        </p>
    </div>
</body>

</html>