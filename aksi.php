<?php
require_once 'functions.php';

if ($mod == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->getRow("SELECT * FROM tb_warga WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['login'] = $row->user;
        $_SESSION['ID'] = $row->id_warga;
        $_SESSION['level'] = 'warga';
        redirect_js("index.php");
    } else {
        $row = $db->getRow("SELECT * FROM tb_pengepul WHERE user='$user' AND pass='$pass'");
        if ($row) {
            $_SESSION['login'] = $row->user;
            $_SESSION['ID'] = $row->id_pengepul;
            $_SESSION['level'] = 'pengepul';
            redirect_js("index.php");
        } else {
            $row = $db->getRow("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
            if ($row) {
                $_SESSION['login'] = $row->user;
                $_SESSION['ID'] = $row->id_user;
                $_SESSION['level'] = $row->level;
                redirect_js("index.php");
            } else {
                print_msg("Salah kombinasi username dan password.");
            }
        }
    }
} else if ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->getRow("SELECT * FROM tb_user WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login']);
    header("location:index.php?m=login");
}
/** warga **/
elseif ($mod == 'daftar_pengepul') {
    $nama_pengepul = $_POST['nama_pengepul'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    $layanan = $_POST['layanan'];
    $harga_pengepul = $_POST['harga_pengepul'];
    $user = $_POST['user'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if ($nama_pengepul == '' || $alamat == '' || $email == '' || $telpon == '' || $layanan == '' || $harga_pengepul == '' || $user == '' || $pass1 == '' || $pass2 == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($pass1 !== $pass2)
        print_msg("Password dan konfirmasi password harus sama!");
    elseif ($db->getRow("SELECT * FROM tb_pengepul WHERE user='$user'"))
        print_msg("Username sudah ada!");
    elseif ($db->getRow("SELECT * FROM tb_pengepul WHERE email='$email'"))
        print_msg("Email sudah ada!");
    else {
        $db->query("INSERT INTO tb_pengepul(nama_pengepul, alamat, email, telpon, layanan, harga_pengepul, user, pass, status_pengepul) VALUES ('$nama_pengepul', '$alamat', '$email', '$telpon', '$layanan', '$harga_pengepul', '$user', '$pass1', 0)");
        addNotif(
            "$nama_pengepul mendaftar sebagai pengepul.",
            'kabid',
            null,
            'm=pengepul_show&ID=' . $db->insert_id,
        );
        set_msg('Pendaftaran berhasil. Silakan login!');
        redirect_js("index.php?m=login");
    }
} elseif ($mod == 'daftar_warga') {
    $nama_warga = $_POST['nama_warga'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    $user = $_POST['user'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if ($nama_warga == '' || $alamat == '' || $email == '' || $telpon == '' || $user == '' || $pass1 == '' || $pass2 == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($pass1 !== $pass2)
        print_msg("Password dan konfirmasi password harus sama!");
    elseif ($db->getRow("SELECT * FROM tb_warga WHERE user='$user'"))
        print_msg("Username sudah ada!");
    elseif ($db->getRow("SELECT * FROM tb_warga WHERE email='$email'"))
        print_msg("Email sudah ada!");
    else {
        $db->query("INSERT INTO tb_warga(nama_warga, alamat, email, telpon, user, pass, status_warga) VALUES ('$nama_warga', '$alamat', '$email', '$telpon', '$user', '$pass1', 0)");
        addNotif(
            "$nama_warga mendaftar sebagai warga.",
            'kabid',
            null,
            'm=warga_show&ID=' . $db->insert_id,
        );
        set_msg('Pendaftaran berhasil. Silakan login!');
        redirect_js("index.php?m=login");
    }
} elseif ($mod == 'warga_profil') {
    $nama_warga = $_POST['nama_warga'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    $user = $_POST['user'];

    if ($nama_warga == '' || $alamat == '' || $email == '' || $telpon == '' || $user == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->getRow("SELECT * FROM tb_warga WHERE user='$user' AND id_warga<>'$_SESSION[ID]'"))
        print_msg("Username sudah ada!");
    elseif ($db->getRow("SELECT * FROM tb_warga WHERE email='$email' AND id_warga<>'$_SESSION[ID]'"))
        print_msg("Email sudah ada!");
    else {
        $db->query("UPDATE tb_warga SET nama_warga='$nama_warga', alamat='$alamat', email='$email', telpon='$telpon' WHERE id_warga='$_SESSION[ID]'");
        print_msg('Profil tersimpan!', 'success');
    }
} elseif ($mod == 'pengepul_profil') {
    $nama_pengepul = $_POST['nama_pengepul'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    $layanan = $_POST['layanan'];
    $harga_pengepul = $_POST['harga_pengepul'];
    $user = $_POST['user'];

    if ($nama_pengepul == '' || $alamat == '' || $email == '' || $telpon == '' || $layanan == '' || $harga_pengepul == '' || $user == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->getRow("SELECT * FROM tb_pengepul WHERE user='$user' AND id_pengepul<>'$_SESSION[ID]'"))
        print_msg("Username sudah ada!");
    elseif ($db->getRow("SELECT * FROM tb_pengepul WHERE email='$email' AND id_pengepul<>'$_SESSION[ID]'"))
        print_msg("Email sudah ada!");
    else {
        $db->query("UPDATE tb_pengepul SET nama_pengepul='$nama_pengepul', alamat='$alamat', email='$email', telpon='$telpon', layanan='$layanan', harga_pengepul='$harga_pengepul' WHERE id_pengepul='$_SESSION[ID]'");
        print_msg('Profil tersimpan!', 'success');
    }
} elseif ($act == 'pengepul_aktif') {
    $db->query("UPDATE tb_pengepul SET status_pengepul=1 WHERE id_pengepul='$_GET[ID]'");
    set_msg('Warga berhasil diaktifkan!');
    addNotif(
        "Status Anda sudah aktif.",
        'pengepul',
        $_GET['ID'],
        'm=pengepul_profil',
    );
    header("location:index.php?m=pengepul_show&ID=$_GET[ID]");
} elseif ($act == 'pengepul_nonaktif') {
    $db->query("UPDATE tb_pengepul SET status_pengepul=0 WHERE id_pengepul='$_GET[ID]'");
    set_msg('Warga berhasil dinonaktifkan!');
    addNotif(
        "Status Anda sudah tidak aktif.",
        'pengepul',
        $_GET['ID'],
        'm=pengepul_profil',
    );
    header("location:index.php?m=pengepul_show&ID=$_GET[ID]");
} elseif ($mod == 'pengepul_ubah') {
    $nama_pengepul = $_POST['nama_pengepul'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    $layanan = $_POST['layanan'];
    $harga_pengepul = $_POST['harga_pengepul'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $status_pengepul = $_POST['status_pengepul'];

    if ($nama_pengepul == '' || $alamat == '' || $email =='' || $telpon =='' || $layanan =='' || $harga_pengepul == '' || $user == '' || $pass == '' || $status_pengepul == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_pengepul SET nama_pengepul='$nama_pengepul', alamat='$alamat', email='$email', telpon='$telpon', layanan='$layanan', harga_pengepul='$harga_pengepul', user='$user', pass='$pass', status_pengepul='$status_pengepul' WHERE id_pengepul='$_GET[ID]'");
        addNotif(
            "Profil Anda diubah oleh petugas!",
            'pengepul',
            $_GET['ID'],
            'm=pengepul_profil',
        );
        redirect_js("index.php?m=pengepul");
    }
}
/** warga **/
elseif ($mod == 'warga_tambah') {
    $id_warga = $_POST['id_warga'];
    $nama_warga = $_POST['nama_warga'];
    $nilai = $_POST['nilai'];

    if ($id_warga == '' || $nama_warga == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->getRow("SELECT * FROM tb_warga WHERE id_warga='$id_warga'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_warga(id_warga, nama_warga) VALUES ('$id_warga', '$nama_warga')");
        foreach ($nilai as $key => $val)
            $db->query("INSERT INTO tb_profile(id_warga, id_tabungan, nilai) 
            VALUES('$id_warga', '$key', '$val')");
        redirect_js("index.php?m=warga");
    }
} elseif ($mod == 'warga_ubah') {
    $nama_warga = $_POST['nama_warga'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $status_warga = $_POST['status_warga'];

    if ($nama_warga == '' || $alamat == '' || $email == '' || $telpon == '' || $user == '' || $pass == '' || $status_warga == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_warga SET nama_warga='$nama_warga', alamat='$alamat', email='$email', telpon='$telpon', user='$user', pass='$pass', status_warga='$status_warga' WHERE id_warga='$_GET[ID]'");
        addNotif(
            "Profil Anda diubah oleh petugas!",
            'warga',
            $_GET['ID'],
            'm=warga_profil',
        );
        redirect_js("index.php?m=warga");
    }
} elseif ($act == 'warga_hapus') {
    $db->query("DELETE FROM tb_profile WHERE id_warga='$_GET[ID]'");
    $db->query("DELETE FROM tb_warga WHERE id_warga='$_GET[ID]'");
    header("location:index.php?m=warga");
} elseif ($act == 'warga_aktif') {
    $db->query("UPDATE tb_warga SET status_warga=1 WHERE id_warga='$_GET[ID]'");
    set_msg('Warga berhasil diaktifkan!');
    addNotif(
        "Status Anda sudah aktif.",
        'warga',
        $_GET['ID'],
        'm=warga_profil',
    );
    header("location:index.php?m=warga_show&ID=$_GET[ID]");
} elseif ($act == 'warga_nonaktif') {
    $db->query("UPDATE tb_warga SET status_warga=0 WHERE id_warga='$_GET[ID]'");
    set_msg('Warga berhasil dinonaktifkan!');
    addNotif(
        "Status Anda sudah tidak aktif.",
        'warga',
        $_GET['ID'],
        'm=warga_profil',
    );
    header("location:index.php?m=warga_show&ID=$_GET[ID]");
}

/** tabungan */
elseif ($mod == 'tabungan_tambah') {
    $id_warga = $_SESSION['ID'];
    $id_pengepul = $_POST['id_pengepul'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $ket_tabungan = $_POST['ket_tabungan'];

    if ($id_pengepul == '' || $tanggal == '' || $jumlah == '' || $ket_tabungan == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_tabungan (id_warga, id_pengepul, tanggal, jumlah, ket_tabungan, status_tabungan) VALUES ('$id_warga', '$id_pengepul', '$tanggal', '$jumlah', '$ket_tabungan', 0)");
        $warga = getWarga();
        addNotif(
            "$warga->nama_warga menabung sebanyak $jumlah.",
            'pengepul',
            $id_pengepul,
            'm=tabungan_ubah&ID=' . $db->insert_id,
        );
        redirect_js("index.php?m=tabungan");
    }
} else if ($mod == 'tabungan_ubah') {
    $status_tabungan = $_POST['status_tabungan'];

    if ($status_tabungan == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_tabungan SET status_tabungan='$status_tabungan' WHERE id_tabungan='$_GET[ID]'");

        if ($status_tabungan == 1) {

            $harga = (int) $db->get_var("SELECT harga_pengepul FROM tb_pengepul WHERE id_pengepul='{$row->id_pengepul}'");
            $saldo = (int) $db->get_var("SELECT saldo FROM tb_saldo WHERE id_warga='{$row->id_warga}' ORDER BY id_saldo DESC LIMIT 1");
            $debet = $harga * $row->jumlah;
            $saldo += $debet;
            $db->query("INSERT INTO tb_saldo (id_warga, waktu, debet, kredit, saldo, keterangan) VALUES ('{$row->id_warga}', NOW(), '$debet', 0, '$saldo', 'Tabungan sejumlah {$row->jumlah}')");

            addNotif(
                "Tabungan selesai diproses, saldo berhasil ditambahkan.",
                'warga',
                $row->id_warga,
                'm=saldo',
            );
        }

        redirect_js("index.php?m=tabungan");
    }
} else if ($act == 'tabungan_hapus') {
    $db->query("DELETE FROM tb_tabungan WHERE id_tabungan='$_GET[ID]'");
    header("location:index.php?m=tabungan");
}
/** saldo */
elseif ($mod == 'saldo_tarik') {
    $id_warga = $_SESSION['ID'];
    $saldo = $_POST['saldo'];
    $jumlah = $_POST['jumlah'];

    if ($saldo == '' || $jumlah == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $saldo -= $jumlah;
        $db->query("INSERT INTO tb_saldo (id_warga, waktu, debet, kredit, saldo, keterangan) VALUES ('$id_warga', NOW(), 0, '$jumlah', '$saldo', 'Penarikan sejumlah " . angka($jumlah) . "')");

        redirect_js("index.php?m=saldo");
    }
}

/** pengaduan */
elseif ($mod == 'pengaduan_tambah') {
    $id_warga = $_SESSION['ID'];
    $nama_pengaduan = $_POST['nama_pengaduan'];
    $foto_pengaduan = $_FILES['foto_pengaduan'];
    $alamat_pengaduan = $_POST['alamat_pengaduan'];
    $detail_pengaduan = $_POST['detail_pengaduan'];

    if ($nama_pengaduan == '' || $foto_pengaduan['name'] == '' || $alamat_pengaduan == '' || $detail_pengaduan == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $fileName = rand(1000, 9999) . parse_file_name($foto_pengaduan['name']);
        $img = new SimpleImage($foto_pengaduan['tmp_name']);
        $img->bestFit(1024, 1024);
        $img->toFile('assets/img/pengaduan/' . $fileName);
        $img->bestFit(300, 300);
        $img->toFile('assets/img/pengaduan/small_' . $fileName);

        $db->query("INSERT INTO tb_pengaduan (waktu_pengaduan, id_warga, nama_pengaduan, foto_pengaduan, alamat_pengaduan, detail_pengaduan, status_pengaduan) VALUES (NOW(), '$id_warga', '$nama_pengaduan', '$fileName', '$alamat_pengaduan', '$detail_pengaduan', 0)");

        $warga = getWarga();
        addNotif(
            "$warga->nama_warga melakukan pengaduan.",
            'kasi',
            null,
            'm=pengaduan_ubah&ID=' . $db->insert_id,
        );

        redirect_js("index.php?m=pengaduan");
    }
} else if ($mod == 'pengaduan_ubah') {
    $status_pengaduan = $_POST['status_pengaduan'];

    if ($status_pengaduan == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_pengaduan SET status_pengaduan='$status_pengaduan' WHERE id_pengaduan='$_GET[ID]'");
        if ($status_pengaduan != $row->status_pengaduan)
            addNotif(
                "Status pengaduan Anda telah diubah menjadi " . statusPengaduan($status_pengaduan) . ".",
                'warga',
                $row->id_warga,
                'm=pengaduan',
            );
        redirect_js("index.php?m=pengaduan");
    }
} else if ($act == 'pengaduan_hapus') {
    $row = $db->getRow("SELECT * FROM tb_pengaduan WHERE id_pengaduan='$_GET[ID]'");
    deleteFile('pengaduan', $row->sertifikat);
    $db->query("DELETE FROM tb_pengaduan WHERE id_pengaduan='$_GET[ID]'");
    header("location:index.php?m=pengaduan");
} else if ($act == 'notif_buka') {
    $row = $db->getRow("SELECT * FROM tb_notif WHERE id_notif='$_GET[id_notif]'");
    $db->query("UPDATE tb_notif SET status_notif=1 WHERE id_notif='$_GET[id_notif]'");
    header("location:index.php?" . $row->link);
}
