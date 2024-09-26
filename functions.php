<?php
session_start();

include 'config.php';
include 'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include 'includes/SimpleImage.php';
include 'includes/paging.php';

function is_able($mod)
{
    $role = array(
        'admin' => array(
            'warga',
            'pengepul',
            'tabungan',
            'user',
            'laporan',
        ),
        'warga' => array(
            'warga_profil',
            'tabungan',
            'tabungan_tambah',
            // 'tabungan_ubah',
            // 'tabungan_hapus',
            'pengaduan',
            'pengaduan_tambah',
            'saldo',
            'saldo_tarik',
        ),
        'kabid' => array(
            'warga',
            'warga_ubah',
            'warga_hapus',
            'warga_show',
            'warga_aktif',
            'warga_nonaktif',
            'pengepul',
            'pengepul_ubah',
            'pengepul_hapus',
            'pengepul_show',
            'pengepul_aktif',
            'pengepul_nonaktif',
            // 'tabungan',
            // 'tabungan_tambah',
            // 'tabungan_ubah',
            // 'tabungan_hapus',
            // 'pengaduan',
            // 'pengaduan_ubah',
            'laporan',
        ),
        'kasi' => array(
            'warga',
            'warga_show',
            // 'warga_ubah',
            'pengepul',
            'pengepul_show',
            // 'tabungan',
            // 'tabungan_tambah',
            // 'tabungan_ubah',
            // 'tabungan_hapus',
            'pengaduan',
            'pengaduan_ubah',
            'laporan',
        ),
        'pengepul' => array(
            'pengepul_profil',
            'tabungan',
            'tabungan_ubah',
            // 'pengaduan',
            // 'pengaduan_aksi',
        ),
        'guest' => array(),
    );
    if (!_session('level'))
        $_SESSION['level'] = 'guest';
    if (!isset($role[_session('level')]))
        $_SESSION['level'] = 'guest';
    $level = strtolower(_session('level'));
    return in_array($mod, (array)$role[$level]);
}

function is_hidden($mod)
{
    return (is_able($mod)) ? '' : 'hidden';
}

function _post($key, $val = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];
    else
        return $val;
}

function _get($key, $val = null)
{
    global $_GET;
    if (isset($_GET[$key]))
        return $_GET[$key];
    else
        return $val;
}

function _session($key, $val = null)
{
    global $_SESSION;
    if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    else
        return $val;
}

$mod = _get('m');
$act = _get('act');

$rows = $db->getResults("SELECT id_warga, nama_warga FROM tb_warga ORDER BY id_warga");
foreach ($rows as $row) {
    $ALTERNATIF[$row->id_warga] = $row->nama_warga;
}

$rows = $db->getResults("SELECT * FROM tb_tabungan ORDER BY id_tabungan");
foreach ($rows as $row) {
    $KRITERIA[$row->id_tabungan] = $row;
}

/** ============================== */

function set_value($key = null, $default = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];

    if (isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}

function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $var = (string)$db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . (substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function esc_field($str)
{
    return addslashes($str);
}

function redirect_js($url)
{
    echo '<script type="text/javascript">window.location.replace("' . $url . '");</script>';
}

function alert($url)
{
    echo '<script type="text/javascript">alert("' . $url . '");</script>';
}

function dd($arr)
{
    echo '<pre>' . print_r($arr, 1) . '</pre>';
}

function print_msg($msg, $type = 'danger')
{
    echo ('<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg . '</div>');
}

function parse_file_name($file_name)
{
    $x = strtolower($file_name);
    $x = str_replace(array(' '), '-', $x);
    return $x;
}

function set_msg($msg, $type = 'success')
{
    $_SESSION['message'] = ['msg' => $msg, 'type' => $type];
}

function show_msg()
{
    if (_session('message'))
        print_msg($_SESSION['message']['msg'], $_SESSION['message']['type']);
    unset($_SESSION['message']);
}

DEFINE('ABSPATH', dirname(__FILE__) . '/');
function get_image_url($filename, $pref_f = "", $pref_d = "")
{
    $location = "assets/img/{$pref_f}{$filename}";

    $file = ABSPATH . $location;
    if (is_file($file))
        return $pref_d . $location;
    else
        return $pref_d . "assets/img/no_image.png";
}

function delete_image($ID)
{
    global $db;
    $foto = $db->get_var("SELECT foto FROM tb_warga WHERE id_warga='$ID'");
    if (!empty($foto)) {
        $foto1 = "assets/img/warga/$foto";
        $foto2 = "assets/img/warga/small_$foto";
        if (file_exists($foto1) && is_file($foto1))
            unlink($foto1);
        if (file_exists($foto2) && is_file($foto2))
            unlink($foto2);
    }
}

function getFile($pref, $fileName)
{
    $path = 'assets/files/' . $pref . '/' . $fileName;
    if (is_file($path))
        return '<a href="' . $path . '" target="_blank">' . $fileName . '</a>';
    else
        return 'No file';
}

function today()
{
    return date('Y-m-d');
}

function uploadFile($dir, $file)
{
    $fileName = rand(111, 999) . $file['name'];
    move_uploaded_file($file['tmp_name'], "assets/files/$dir/" . $fileName);
    return $fileName;
}
function deleteFile($dir, $fileName)
{
    $path = "assets/files/$dir/$fileName";
    if (is_file($path))
        unlink($path);
}

function isWarga()
{
    return strtolower(_session('level')) == 'warga';
}

function isPengepul()
{
    return strtolower(_session('level')) == 'pengepul';
}

function get_validasi_option($selected = '')
{
    $validasi = array('1' => 'Setuju', '0' => 'Tidak');
    $a = '';
    foreach ($validasi as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$value</option>";
        else
            $a .= "<option value='$key'>$value</option>";
    }
    return $a;
}

function get_tingkat_option($selected = '')
{
    $tingkat = array('Nasional' => 'Nasional', 'Internasional' => 'Internasional');
    $a = '';
    foreach ($tingkat as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$value</option>";
        else
            $a .= "<option value='$key'>$value</option>";
    }
    return $a;
}

function getPengepulOption($selected = '')
{
    global $db;
    $rows = $db->getResults("SELECT * FROM tb_pengepul");
    $a = '';
    foreach ($rows as $row) {
        $harga = angka($row->harga_pengepul);
        if ($selected == $row->id_pengepul)
            $a .= "<option value='$row->id_pengepul' selected>$row->nama_pengepul ($harga/kg)</option>";
        else
            $a .= "<option value='$row->id_pengepul'>$row->nama_pengepul ($harga/kg)</option>";
    }
    return $a;
}

function angka($num, $decimals = 0, $decimal_seperator = ",", $thausand_seperator = ".")
{
    return number_format($num, $decimals, $decimal_seperator, $thausand_seperator);
}

function getWargaOption($selected = '')
{
    global $db;
    $rows = $db->getResults("SELECT * FROM tb_warga");
    $a = '';
    foreach ($rows as $row) {
        if ($selected == $row->id_warga)
            $a .= "<option value='$row->id_warga' selected>$row->nama_warga</option>";
        else
            $a .= "<option value='$row->id_warga'>$row->nama_warga</option>";
    }
    return $a;
}

$STATUS_WARGA = ['Nonaktif', 'Aktif'];
function statusWarga($status = 0)
{
    global $STATUS_WARGA;
    foreach ($STATUS_WARGA as $key => $val) {
        if ($status == $key)
            return $val;
    }
    return "N/A";
}

function getStatusWargaOption($selected = '')
{
    global $STATUS_WARGA;
    $a = '';
    foreach ($STATUS_WARGA as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}


$STATUS_PENGEPUL = ['Nonaktif', 'Aktif'];
function statusPengepul($status = 0)
{
    global $STATUS_PENGEPUL;
    foreach ($STATUS_PENGEPUL as $key => $val) {
        if ($status == $key)
            return $val;
    }
    return "N/A";
}

function getStatusPengepulOption($selected = '')
{
    global $STATUS_PENGEPUL;
    $a = '';
    foreach ($STATUS_PENGEPUL as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}


$STATUS_PENGADUAN = ['Pending', 'Diproses', 'Selesai'];
function statusPengaduan($status = 0)
{
    global $STATUS_PENGADUAN;
    foreach ($STATUS_PENGADUAN as $key => $val) {
        if ($status == $key)
            return $val;
    }
    return "N/A";
}

$STATUS_TABUNGAN = ['Pending', 'Selesai'];
function statusTabungan($status = 0)
{
    global $STATUS_TABUNGAN;
    foreach ($STATUS_TABUNGAN as $key => $val) {
        if ($status == $key)
            return $val;
    }
    return "N/A";
}

function getStatusTabunganOption($selected = '')
{
    global $STATUS_TABUNGAN;
    $a = '';
    foreach ($STATUS_TABUNGAN as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function getStatusPengaduanOption($selected = '')
{
    global $STATUS_PENGADUAN;
    $a = '';
    foreach ($STATUS_PENGADUAN as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function addNotif($judul, $level, $id_user, $link)
{
    global $db;
    $id_user = $id_user ? "'$id_user'" : 'NULL';
    $db->query("INSERT INTO tb_notif (waktu, judul, level, id_user, link, status_notif) VALUES (NOW(), '$judul', '$level', $id_user, '$link', 0)");
}

function getWarga($id_warga = null)
{
    global $db;
    if (!$id_warga)
        $id_warga = _session('ID');
    return $db->getRow("SELECT * FROM tb_warga WHERE id_warga='$id_warga'");
}

function getPengepul($id_pengepul = null)
{
    global $db;
    if (!$id_pengepul)
        $id_pengepul = _session('ID');
    return $db->getRow("SELECT * FROM tb_pengepul WHERE id_pengepul='$id_pengepul'");
}

function aktifWarga()
{
    if (!isWarga())
        return false;

    $warga = getWarga();
    if ($warga->status_warga == 0) {
        set_msg('Akun Anda belum aktif, silakan hubungi Admin!', 'info');
        redirect_js('index.php?m=home');
    }
}

function aktifPengepul()
{
    if (!isPengepul())
        return false;

    $pengepul = getPengepul();
    if ($pengepul->status_pengepul == 0) {
        set_msg('Akun Anda belum aktif, silakan hubungi Admin!', 'info');
        redirect_js('index.php?m=home');
    }
}
function tglIndo($tanggal)
{
    // Daftar bulan dalam bahasa Indonesia
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    // Memecah tanggal berdasarkan tanda "-"
    $pecahkan = explode('-', $tanggal);

    // Hasil format: Tanggal Bulan Tahun (contoh: 25 Januari 2024)
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
