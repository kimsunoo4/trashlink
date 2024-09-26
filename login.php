<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Silakan Masuk</h1>
        </div>
        <?= show_msg() ?>
        <?php if ($_POST) include 'aksi.php' ?>
        <form class="user" method="POST" action="?m=login">
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" name="user" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user text-center" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success btn-user btn-block"><i class="fa fa-sign-in-alt"></i> Masuk</button>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <button class="btn btn-info btn-user btn-block dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                Daftar
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="?m=daftar_warga">Daftar Warga</a>
                                <a class="dropdown-item" href="?m=daftar_pengepul">Daftar Pengepul</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>