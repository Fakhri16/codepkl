 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asset Management</title>
  <link rel="stylesheet" href="cari.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- show entries js -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
  <!-- show entries css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
</head>

<body>
  <!-- navbar -->


  <section class="">
    <!-- content home -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create_blog.php">tambah data</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link " href="">Tambah data detail </a>
      </li>
    </ul>
   
  </div>
</nav>
    <div class="container">
      <div class="card mt-3">
        <div class="card-header bg-dark text-white">
          Dashboard
        </div>


        <!-- Menampilkan hasil pencarian -->
        <?php
        // function tanggal
        include('function_tanggal.php');

        //koneksi ke database
        $koneksi = mysqli_connect('localhost', 'root', '', 'asset_db');

        //proses pencarian data
        if (isset($_POST['search'])) {
          $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
          $pengirim = isset($_POST['pengirim']) ? $_POST['pengirim'] : '';
          $tgl_beli = isset($_POST['tgl_beli']) ? $_POST['tgl_beli'] : '';
          $nomor_serial = isset($_POST['nomor_serial']) ? $_POST['nomor_serial'] : '';

          $query = "SELECT * FROM tbl_home WHERE brand LIKE '%$brand%' AND pengirim LIKE '%$pengirim%' AND tgl_beli LIKE '%$tgl_beli%' AND nomor_serial LIKE '%$nomor_serial%'
                    ORDER BY id  ";
        } else {
          $query = "SELECT * FROM tbl_home ORDER BY id";
        }

        //mencari data
        $no = 1;
        $hasil = mysqli_query($koneksi, $query);
        ?>
        <div class="container table-responsive card-body">
          <form action="" method="POST">
            <div class="box mb-3">
              <label for="">Brand</label>
              <input type="text" name="brand" class="" autocomplete="off">
            </div>
            <div class="box mb-3">
            <div> <label for="">Pengirim</label> </div>
              <input type="text" name="pengirim" class="" autocomplete="off">
            </div>
            <div class="box mb-3">
              <label for="">Nomor Serial</label>
              <input type="text" name="nomor_serial" class="" autocomplete="off">
            </div>
            <div class="box mb-3">
              <label for="">Tanggal Pembelian</label>
              <input type="date" name="tgl_beli" class="">
            </div>
            <button type="submit" name="search" class="btn btn-dark">Cari</button>
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

          <br> <br>

          <!-- Tambah -->
          <div class="">
            <a class="btn btn-primary bg-primary" href="create_blog.php" role="button">Tambah</a>
          </div>

          <!-- show entries  -->
          <!-- <div class="table-responsive card-body">
            <div class="row">
              <div class="dataTables_length">
                <label>Show entries:</label>
                <select id="show-entries" class="">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                  <option value="-1">All</option>
                </select>
              </div>
            </div> -->

          <br>

          <div class="table-responsive">
            <table id="entries" class="table table-striped table-bordered ">
              <thead class="table-dark">
                <tr>
                  <th>No</th>
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
                </tr>
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
        </div>
      </div>
      <br><br><br>
  </section>
  <!-- footer -->
  <div class="card">
    <div class="card-header">
      Quote
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>A well-known quote, contained in a blockquote element.</p>
        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
    </div>
  </div>



  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

  <!-- show entries -->
  <script src="js/app.js"></script>
</body>

</html>