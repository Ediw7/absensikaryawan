<?php
session_start(); 
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $tmp_tgl_lahir = $_POST['tmp_tgl_lahir'];
    $jenkel = $_POST['jenkel'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $no_tel = $_POST['no_tel'];

    $sql = "SELECT * FROM user WHERE id_karyawan = '".$id_karyawan."'";
    $result = mysqli_query($koneksi, $sql);

    if (!$result) {
        die('Error: ' . mysqli_error($koneksi));
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Data dengan NIP = ".$id_karyawan." sudah ada')</script>";
        echo "<script>window.location.href = 'datakaryawan.php'</script>";
    } else {
        $query = "INSERT INTO user SET id_karyawan='$id_karyawan', username='$username', password='$password', nama='$nama', tmp_tgl_lahir='$tmp_tgl_lahir', jenkel='$jenkel', agama='$agama', alamat='$alamat', no_tel='$no_tel'";
        
        if (mysqli_query($koneksi, $query)) {
            header("location: datakaryawan.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }
}
?>
