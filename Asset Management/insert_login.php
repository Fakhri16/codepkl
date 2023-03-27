<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$gmail = $_POST['gmail'];
	$password = $_POST['password'];
	
	// Query untuk memeriksa apakah pengguna telah terdaftar
	// Ubah 'nama_tabel' dengan nama tabel Anda
	$query = "SELECT * FROM tbl_regris WHERE username='$username' AND gmail='$gmail' AND password='$password'";
	
	// Koneksi ke database
	// Ubah 'hostname', 'username', 'password', dan 'nama_database' dengan informasi koneksi Anda
	$koneksi = mysqli_connect('localhost','root','','asset_managament');
	
	// Jalankan query
	$result = mysqli_query($koneksi, $query);
	
	// Periksa apakah query berhasil dijalankan dan menghasilkan hasil
	if(mysqli_num_rows($result) == 1) {
		// Jika ada satu hasil, pengguna telah terdaftar
		// Buat sesi untuk pengguna dan arahkan ke halaman utama
		$_SESSION['username'] = $username;
		header('Location: halaman.php');
	} else {
		// Jika tidak ada hasil, tampilkan pesan kesalahan
		echo "Username atau password salah";
	}
}
?>