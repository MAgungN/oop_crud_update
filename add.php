<?php

// $sql = "SELECT * FROM tbl_harga";
// $hasil = $koneksi->query($sql);
// $dataisi = $hasil->fetch_assoc();

include '../controller/Studio.php';

$ctrl = new Studio();
$id = $_GET['id'];
$dataisi = $ctrl->getData($id);
$harga = $ctrl->getDataHarga();

if ($dataisi['harga'] == 1) {
    $jb = 'Rp. 30.000 (1 Jam)';
} else if ($dataisi['harga'] == 2) {
    $jb = 'Rp. 50.000 (2 Jam)';
} else if ($dataisi['harga'] == 3) {
    $jb = 'Rp. 70.000 (3 Jam)';
} else if ($dataisi['harga'] == 4) {
    $jb = 'Rp. 90.000 (4 Jam)';
} else {
    $jb = 'Kodingan mu bermasalaaaaaaah!';
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS-Muhamad Agung Nurrasyid-MI20B</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <div class="main mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white text-uppercase">
                            <div class="h3 text-center"><b>Tambah Booking Band</b></div>
                        </div>
                        <div class="card-body">
                            <form action="<?php $ctrl->saveData();?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <small>KODE BOOKING</small>
                                            <input type="text" name="kode_booking" id="kode_booking" class="form-control" placeholder="Masukan Kode Booking" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group" style="margin-top:-15px;">
                                            <small>NAMA BAND</small>
                                            <input type="text" name="nama_band" id="nama_band" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>NO TELPON</small>
                                            <input type="text" name="no_telpon" id="no_telpon" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>TANGGAL</small>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>LOKASI STUDIO</small>
                                            <input type="text" name="lokasi_studio" id="lokasi_studio" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>WAKTU</small>
                                            <input type="text" name="waktu" id="waktu" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>OPERATOR</small>
                                            <input type="text" name="operator" id="operator" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group" style="margin-top: 15px;">
                                            <small>HARGA</small>
                                            <select name="harga" id="harga" class="form-control" required>
                                                <option value="">Silahkan Pilih...</option>
                                                <?php
                                                foreach ($hasil as $jb) {

                                                ?>
                                                    <option value="<?= $jb['id'] ?>"><?= $jb['harga'] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <button type="submit" name="submit" class="btn btn-info text-white">Tambah</button>
                                    <a href="view.php" class="btn btn-danger">Cancel</a>
                                </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
    <script src="assets/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- Proses Add Data -->

    <?php


    if (isset($_POST['submit'])) {
        $kode_booking = $_POST['kode_booking'];
        $nama_band = $_POST['nama_band'];
        $no_telpon = $_POST['no_telpon'];
        $tanggal = $_POST['tanggal'];
        $lokasi_studio = $_POST['lokasi_studio'];
        $waktu = $_POST['waktu'];
        $operator = $_POST['operator'];
        $harga = $_POST['harga'];

        // SQL Insert to Database db_surat
        $insert_sql = "INSERT INTO tbl_studio (id, kode_booking, nama_band, no_telpon, tanggal, lokasi_studio, waktu, operator, harga) VALUES ('', '$kode_booking', '$nama_band', '$no_telpon',
        '$tanggal' , '$lokasi_studio', '$waktu', '$operator', '$harga')";
        $insert = $koneksi->query($insert_sql);

        if ($insert) {
            // header("Location:view.php?pesan=success");
    ?>
            <script>
                alert('DATA BERHASIL DITAMBAHKAN');
                window.location.href = '<?= "view.php" ?>';
            </script>
        <?php

        } else {
        ?>
            <script>
                alert('Failed insert data');
            </script>
    <?php
        }
    }

    ?>

</body>

</html>