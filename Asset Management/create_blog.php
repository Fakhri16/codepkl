<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
    


    <!-- create_kategori.php -->
    
    <br>
        <div class="container">
        <div class="card mt-3">
            <div class="card-header bg-dark text-white">
            Tambah
            </div>


        <div class="card-body">
            <form method="post" action="insert_blog.php" enctype="multipart/form-data" >
            <div class="form-group">
            <label>Nama tipe :</label>
            <select name="nama_tipe" id="nama_tipe">
                <option value="0"> - </option>
                <option value="Laptop">Laptop</option>
                <option value="PC">PC</option>
                <option value="Monitor">Monitor</option>
            </select>
            <br><br>
            <label>Brand :</label>
            <input type="text" name="brand" id="brand" autocomplete="off">
            <br><br>
            <label >Detail tipe :</label>
            <input type="text" name="detail_tipe" id="detail_tipe" autocomplete="off">
            <br><br>
            <label>Nomor serial :</label>
            <input type="text" name="nomor_serial" id="nomor_serial" autocomplete="off">
            <br><br>
            <label>Tanggal pembelian : </label>
            <input type="text" name="tgl_beli" id="tgl_beli" autocomplete="off">
            <br><br>
            <label>Kondisi :</label>
            <select name="kondisi" id="kondisi">
                <option value="0"> - </option>
                <option value="Baik ">Baik </option>
                <option value="Rusak,namun bisa digunakan">Rusak,namun bisa digunakan</option>
                <option value="Rusak ">Rusak</option>
            </select>
            <br><br>
            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" id="deskripsi"></textarea>
            <br><br>
            <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
        </form>
        <script>
            $( function() {
                $( "#tgl_beli" ).datepicker({
                    dateFormat : "dd/mm/yy",
                    dateMonth : true,
                    dateYear : true 
                });
            } );
        </script>
            </div>
            </form>
        </div>  
        </div>
            </div>
        </div>
      
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>