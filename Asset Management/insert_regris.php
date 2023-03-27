<?php
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $asset_management = 'asset_management';

  // membuat koneksi ke database
  $conn = mysqli_connect($host, $username, $password, $asset_management);

  // mengecek koneksi
  if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    // melakukan query untuk menyimpan data pengguna ke dalam tabel pengguna
    $sql = "INSERT INTO tbl_regris (username, email, pass) VALUES ('$username', '$email', '$pass')";
    
    if (mysqli_query($conn, $sql)) {
      echo "<script>
      alert('Simpan Data Berhasil!');
      window.location='halaman.php';
  </script>";
    } else {
      echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
?>