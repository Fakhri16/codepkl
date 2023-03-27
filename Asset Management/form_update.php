<?php
// memanggil function tanggal
include('function_tanggal.php');

// menghubungkan koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'asset_db');

$id = $_GET['id'];
$query = "SELECT * FROM tbl_home WHERE id='$id' ";
$hasil = mysqli_query($koneksi, $query);
$data1 = mysqli_fetch_array($hasil);

// $hobi = explode(",", $data['hobi']);

$tanggal = edittgl($data1['tgl_beli']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>


<body>
    <!-- navbar -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../blog/blog.php">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->


    <div class="container">
        <div class="card mt-3">
            <div class="card-header bg-dark text-white">
                Edit
            </div>

            <div class="card-body">
                <form action="act_update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data1['id']; ?>">
                    <input type="hidden" name="nomor_serial_lama" value="<?= $data1['nomor_serial']; ?>">
                    <div class="form-group">
                        <label>Nama tipe :</label>
                        <select name="nama_tipe" id="nama_tipe">
                            <?php if ($data1['nama_tipe'] == 0) { ?>
                                <option value="0" selected> - </option>
                                <option value="Laptop">Laptop</option>
                                <option value="PC">PC</option>
                                <option value="Monitor">Monitor</option>
                            <?php } elseif ($data1['nama_tipe'] == "Laptop") { ?>
                                <option value="0"> - </option>
                                <option value="Laptop" selected>Laptop</option>
                                <option value="PC">PC</option>
                                <option value="Monitor">Monitor</option>
                            <?php } elseif ($data1['nama_tipe'] == "PC") { ?>
                                <option value="0"> - </option>
                                <option value="Laptop">Laptop</option>
                                <option value="PC" selected> PC</option>
                                <option value="Monitor">Monitor</option>
                            <?php } else { ?>
                                <option value="0"> - </option>
                                <option value="Laptop">Laptop</option>
                                <option value="PC">PC</option>
                                <option value="Monitor" selected>Monitor</option>
                            <?php } ?>
                        </select>
                        <br><br>
                        <label>Brand :</label>
                        <input type="text" name="brand" value="<?= $data1['brand']; ?>" autocomplete="off">
                        <br><br>
                        <label>Detail tipe :</label>
                        <input type="text" name="detail_tipe" value="<?= $data1['detail_tipe']; ?>" autocomplete="off">
                        <br><br>
                        <label>Nomor serial :</label>
                        <input type="text" name="nomor_serial" value="<?= $data1['nomor_serial']; ?>" autocomplete="off">
                        <br><br>
                        <label>Pengirim :</label>
                        <input type="text" name="pengirim" value="<?= $data1['pengirim']; ?>" autocomplete="off">
                        <br><br>
                        <label>Penerima :</label>
                        <input type="text" name="penerima" value="<?= $data1['penerima']; ?>" autocomplete="off">
                        <br><br>
                        <label>Posisi Pekerjaan :</label>
                        <input type="text" name="posisi" value="<?= $data1['posisi']; ?>" autocomplete="off">
                        <br><br>
                        <label>Tanggal pembelian : </label>
                        <input type="text" name="tgl_beli" id="tgl_beli" value="<?= $tanggal; ?>" autocomplete="off">
                        <br><br>
                        <label>lokasi :</label>
                        <input type="text" name="lokasi" value="<?= $data1['lokasi']; ?>" autocomplete="off">
                        <br><br>
                        <label>Kondisi :</label>
                        <select name="kondisi" id="kondisi">
                            <?php if ($data1['kondisi'] == 0) { ?>
                                <option value="0" selected> - </option>
                                <option value="Baik">Baik </option>
                                <option value="Rusak,namun bisa digunakan">Rusak,namun bisa digunakan</option>
                                <option value="Rusak">Rusak</option>
                            <?php } elseif ($data1['kondisi'] == "Baik") { ?>
                                <option value="0"> - </option>
                                <option value="Baik" selected>Baik </option>
                                <option value="Rusak,namun bisa digunakan">Rusak,namun bisa digunakan</option>
                                <option value="Rusak">Rusak</option>
                            <?php } elseif ($data1['kondisi'] == "Rusak,namun bisa digunakan") { ?>
                                <option value="0"> - </option>
                                <option value="Baik">Baik </option>
                                <option value="Rusak,namun bisa digunakan" selected>Rusak,namun bisa digunakan</option>
                                <option value="Rusak">Rusak</option>
                            <?php } else { ?>
                                <option value="0"> - </option>
                                <option value="Baik">Baik </option>
                                <option value="Rusak,namun bisa digunakan">Rusak,namun bisa digunakan</option>
                                <option value="Rusak" selected>Rusak</option>
                            <?php } ?>
                        </select>
                        <br><br>
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"
                            id="deskripsi"><?= $data1['deskripsi']; ?></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                </form>
                <script>
                    $(function () {
                        $("#tgl_beli").datepicker({
                            dateFormat: "dd/mm/yy",
                            dateMonth: true,
                            dateYear: true
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>