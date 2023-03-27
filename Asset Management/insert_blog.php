<?php 
// memanggil function tgl
include ('function_tanggal.php');

$koneksi = mysqli_connect('localhost','root','','asset_db');

$nama_tipe = $_POST['nama_tipe'];
$brand = $_POST['brand'];
$detail_tipe = $_POST['detail_tipe'];
$nomor_serial = $_POST['nomor_serial'];
// $pengirim = $_POST['pengirim'];
// $penerima = $_POST['penerima'];
// $posisi = $_POST['posisi'];
$tgl_beli = $_POST['tgl_beli'];  
// mengkonversi ke database
$tanggalBeli = inputtgl($tgl_beli);
// $lokasi = $_POST['lokasi'];
$kondisi = $_POST['kondisi'];
$deskripsi = $_POST['deskripsi'];

// validasi serial
$query = "SELECT nomor_serial FROM tbl_home WHERE nomor_serial='$nomor_serial' ";
$ada = mysqli_query($koneksi, $query);

if (mysqli_num_rows($ada) > 0) {
    echo "<script>
        alert('Error! Nomor Serial sudah terdaftar!');
        history.go(-1);
        </script>";
} else {
$query = "INSERT INTO tbl_home(nama_tipe, brand, detail_tipe, nomor_serial, tgl_beli, kondisi, deskripsi) 
            VALUES ('$nama_tipe','$brand','$detail_tipe','$nomor_serial','$tanggalBeli', '$kondisi','$deskripsi')";

mysqli_query($koneksi, $query);
echo "<script>
        alert('Simpan Data Berhasil!');
        window.location='halaman.php';
    </script>"; 
}