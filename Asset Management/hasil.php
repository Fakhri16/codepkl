<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Menampilkan hasil pencarian -->
    <?php
    // function tanggal
    include('function_tanggal.php');

    //koneksi ke database
    $koneksi = mysqli_connect('localhost', 'root', '', 'asset_db');

    //proses pencarian data
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM tbl_home WHERE pengirim LIKE '%$search%'";
    } else {
        $query = "SELECT * FROM tbl_home";
    }

    //menampilkan data
    $no = 1;
    $hasil = mysqli_query($koneksi, $query);
    ?>
    <div class="table-responsive card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan pengirim">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <br>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Tipe</th>
                    <th>Brand</th>
                    <th>Detail Tipe</th>
                    <th>Nomor Serial</th>
                    <th>Pengirim</th>
                    <th>Penerima</th>
                    <th>Posisi Perkerjaan</th>
                    <th>Tanggal Pembelian</th>
                    <th>Lokasi</th>
                    <th>Kondisi</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
            </thead>

            <tbody>
                <?php
                while ($data = mysqli_fetch_array($hasil)) {
                    $tanggal = Tanggalindo($data['tgl_beli']);
                    ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?php echo $data['nama_tipe']; ?>
                        </td>
                        <td>
                            <?php echo $data['brand']; ?>
                        </td>
                        <td>
                            <?php echo $data['detail_tipe']; ?>
                        </td>
                        <td>
                            <?php echo $data['nomor_serial']; ?>
                        </td>
                        <td>
                            <?php echo $data['pengirim']; ?>
                        </td>
                        <td>
                            <?php echo $data['penerima']; ?>
                        </td>
                        <td>
                            <?php echo $data['posisi']; ?>
                        </td>
                        <td>
                            <?php echo $tanggal; ?>
                        </td>
                        <td>
                            <?php echo $data['lokasi']; ?>
                        </td>
                        <td>
                            <?php echo $data['kondisi']; ?>
                        </td>
                        <td>
                            <?php echo $data['deskripsi']; ?>
                        </td>
                        <td>
                            <a href="form_update.php?id=<?= $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="act_delete.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>