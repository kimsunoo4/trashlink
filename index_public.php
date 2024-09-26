<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>TRASHLINK</title>

    <link href="favicon.ico" rel="icon" />
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="?">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#foo">Tentang</a>
                    </li>
            
        
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?m=login">Login/Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <?php
        if (file_exists($mod . '.php'))
            include $mod . '.php';
        else
            include 'home_public.php';
        ?>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>