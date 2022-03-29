<?php

if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $ada = false;
    $text = $nik . "," . $nama . "\n";
    $fpo = file_get_contents('config.txt');
    $pecah = explode("\n", $fpo);
    foreach ($pecah as $values) {
        $data = explode(",", $values);
        if (array_key_exists(1, $data)) {
            if ($data[0] == $nik || $data[1] == $nama) {
                $ada = true;
                break;
            }
        }
    }

    if (!$ada) {
        $fp = fopen('config.txt', 'a+');
        fwrite($fp, $text);
        echo '<script>alert("Data Berhasil Di Tambahkan");</script>';
    } else {
        echo '<script>alert("NIK / Nama sudah terdaftar");</script>';
    }
} else if (isset($_POST['masuk'])) {
    error_reporting(0);
    $data = file_get_contents("config.txt");
    $content = explode("\n", $data);
    $false = false;

    foreach ($content as $values) {
        $login = explode(",", $values);
        $nik = $login[0];
        $nama = $login[1];
        if ($nik == $_POST['nik'] && $nama == $_POST['nama']) {
            $false = true;
            break;
        }
    }

    if ($false) {
        session_start();
        $_SESSION['username'] = $_POST['nama'];
        header('location: home.php');
    } else {
        echo '<script>alert("Data tidak ditemukan");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar & Masuk</title>
</head>

<body>
    <form action="" method="POST">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <table align="center">
            <tr>
                <td><input type="text" name="nik" placeholder="NIK"></td>
            </tr>
            <tr>
                <td><input type="text" name="nama" placeholder="Nama Lengkap"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="daftar" value="Saya Pengguna Baru">
                    <input type="submit" name="masuk" value="Masuk">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>