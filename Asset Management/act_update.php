<?php 
// memanggil function tgl
include ('function_tanggal.php');

// menghubungkan koneksi ke database
$koneksi = mysqli_connect('localhost','root','','asset_db');

$id = $_POST['id'];
$nama_tipe = $_POST['nama_tipe'];
$brand = $_POST['brand'];
$detail_tipe = $_POST['detail_tipe'];
$nomor_serial = $_POST['nomor_serial'];
$nomor_serial_lama = $_POST['nomor_serial_lama'];
$pengirim = $_POST['pengirim'];
$penerima = $_POST['penerima'];
$posisi = $_POST['posisi'];
$tgl_beli = $_POST['tgl_beli'];
// mengkonversi ke database
$tanggalBeli = inputtgl($tgl_beli);
$lokasi = $_POST['lokasi'];
$kondisi = $_POST['kondisi'];
$deskripsi = $_POST['deskripsi'];

// validasi serial
$query = "SELECT nomor_serial FROM tbl_home WHERE nomor_serial='$nomor_serial' and not nomor_serial='$nomor_serial_lama' ";
$ada = mysqli_query($koneksi, $query);

if (mysqli_num_rows($ada) > 0) {
    echo "<script>
            alert('Error! Nomor Serial sudah terdaftar!');
            history.go(-1);
            </script>";
} else {

    $query = "UPDATE tbl_home SET nama_tipe='$nama_tipe', brand='$brand', detail_tipe='$detail_tipe', nomor_serial='$nomor_serial', pengirim='$pengirim',penerima='$penerima',
    posisi='$posisi', tgl_beli='$tanggalBeli', lokasi='$lokasi', kondisi='$kondisi', deskripsi='$deskripsi' WHERE id='$id' ";
    mysqli_query($koneksi, $query);
    echo "<script>
            alert('Ubah data berhasil!');
            window.location='halaman.php';
        </script>";

}


