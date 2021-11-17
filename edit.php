<?php
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
    <title>Muhamad Agung Nurrasyid-MI20B</title>

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
                            <div class="h3 text-center"><b>Edit Booking Band</b></div>
                        </div>
                        <div class="card-body">
                            <form action="edit.php?id=<?= $dataisi['id'] ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <small>KODE BOOKING</small>
                                            <input type="text" name="kode_booking" id="kode_booking" class="form-control" placeholder="" value="<?= $dataisi['kode_booking'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group" style="margin-top:-16px;">
                                            <small>NAMA BAND</small>
                                            <input type="text" name="nama_band" id="nama_band" class="form-control" value="<?= $dataisi['nama_band'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>NO TELPON</small>
                                            <input type="text" name="no_telpon" id="no_telpon" class="form-control" value="<?= $dataisi['no_telpon'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>TANGGAL</small>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $dataisi['tanggal'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>LOKASI STUDIO</small>
                                            <input type="text" name="lokasi_studio" id="lokasi_studio" class="form-control" value="<?= $dataisi['lokasi_studio'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <small>WAKTU</small>
                                            <input type="text" name="waktu" id="waktu" class="form-control" value="<?= $dataisi['waktu'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>OPERATOR</small>
                                            <input type="text" name="operator" id="operator" class="form-control" value="<?= $dataisi['operator'] ?>">
                                        </div>

                                        <div class="col-lg-6 mt-3">
                                            <div class="form-group" style="margin-top:0px;">
                                                <small>HARGA</small>
                                                <select name="harga" id="harga" class="form-control">
                                                    <option value="<?= $dataisi['harga'] ?>"><?= $jb ?></option>
                                                    <option value="1">Rp. 30.000 (1 Jam)</option>
                                                    <option value="2">Rp. 50.000 (2 Jam)</option>
                                                    <option value="3">Rp. 70.000 (3 Jam)</option>
                                                    <option value="4">Rp. 90.000 (4 Jam)</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <button type="submit" name="submit" class="btn btn-success text-white">Update</button>
                                        <a href="view.php" class="btn btn-warning">Cancel</a>
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

        // SQL Update to Databas
        $update_sql = "UPDATE tbl_studio SET 
    kode_booking='$kode_booking', nama_band='$nama_band', no_telpon='$no_telpon', tanggal='$tanggal',
    lokasi_studio='$lokasi_studio', waktu='$waktu', operator='$operator', harga='$harga' WHERE id='$id'";
        $update = $koneksi->query($update_sql);

        if ($update) {
            // 
    ?>
            <script>
                alert('DATA BERHASIL DIRUBAH');
                window.location.href = '<?= "view.php" ?>';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Failed update data');
            </script>
    <?php
        }
    }


    ?>

</body>

</html>