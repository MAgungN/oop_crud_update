<?php
include '../controller/Studio.php';

$ctrl = new Studio();
$hasil = $ctrl->index();
// var_dump($hasil);
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
    <div class="main mt-5">
        <div>
            <!--  <?php
                    $pesan = $_GET['pesan'];
                    $frm = $_GET['frm'];
                    if ($pesan == 'success' && $frm == 'del') {
                    ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Berhasil!</strong> Selamat Anda Berhasil Menghapus
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
                    } else if ($pesan == 'success' && $frm == 'add') {
?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Berhasil!</strong> Selamat Anda Berhasil Menambahkan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
                    } else if ($pesan == 'success' && $frm == 'edit') {
?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Berhasil!</strong> Selamat Anda Berhasil Merubah
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
                    }
?> -->
            <div class="row">
                <div class="col-lg-15">
                    <div class="card">
                        <div class="card-header bg-white text-uppercase">
                            <div class="h2 text-center"><b>DATA BOOKING STUDIO AGUNG</b></div>
                            <div class="float-end">
                                <br>
                                <a href="add.php" style="margin-left: -735px; text-shadow: black;" 
                                class="badge bg-primary py-2 px-2 small text-white fw-bold text-decoration-none">Tambah Booking Band</a>
                                <br>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table w-100">
                                    <thead class="bg-warning">
                                        <tr>
                                            <th class="text-center">KODE BOOKING</th>
                                            <th class="text-center">NAMA BAND</th>
                                            <th class="text-center">NO TELPON</th>
                                            <th class="text-center">TANGGAL</th>
                                            <th class="text-center">LOKASI STUDIO</th>
                                            <th class="text-center">WAKTU</th>
                                            <th class="text-center">OPERATOR</th>
                                            <th class="text-center">HARGA</th>
                                            <th class="text-center">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($hasil as $data) { ?>
                                            <?php
                                            if ($data['harga'] == 1) {
                                                $jb = 'Rp. 30.000 (1 Jam)';
                                            } else if ($data['harga'] == 2) {
                                                $jb = 'Rp. 50.000 (2 Jam)';
                                            } else if ($data['harga'] == 3) {
                                                $jb = 'Rp. 70.000 (3 Jam)';
                                            } else if ($data['harga'] == 4) {
                                                $jb = 'Rp. 90.000 (4 Jam)';
                                            } else {
                                                $jb = 'Kodingan mu bermasalaaaaaaah!';
                                            }
                                            ?>
                                            <tr>
                                                <td align="center" class="table-warning"><?= $data['kode_booking'] ?></td>
                                                <td align="center" class="table-warning"><?= $data['nama_band'] ?></td>
                                                <td align="center" class="table-warning"><?= $data['no_telpon'] ?></td>
                                                <td align="center" class="table-warning"><?= $data['tanggal'] ?></td>
                                                <td align="center" class="table-warning"><?= $data['lokasi_studio'] ?></td>
                                                <td align="center" class="table-warning"><?= $data['waktu'] ?></td>
                                                <td align="center" class="table-warning"><?= $data['operator'] ?></td>
                                                <td align="center" class="table-warning"><?= $jb ?></td>
                                                <!-- <td><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</td>
                                              <td><a href="#" data-bs-toggle="modal" data-bs-target="#deletesurat<?php echo $data['id']; ?>">Delete</a></td> -->

                                                <td>
                                                    <a href="edit.php?id=<?= $data['id'] ?>" class="badge bg-success text-white p-2 text-decoration-none">Edit</a>
                                                    <a href="delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')" class="badge bg-danger p-2 text-white text-decoration-none">Delete</a>




                                                </td>
                                            </tr>

                                            <!-- <div class="modal" tabindex="-1">  -->
                                            <!-- <div class="example-modal">    
         <div id="deletesurat<?php echo $data['iddd']; ?>" class="modal fade" role="dialog" style="display:none;">                           
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Konfirmasi Delete Data SUrat</h3>
      </div>
      <div class="modal-body">
      <form action="edit_proses.php?id=<?= $data['id'] ?>" method="post">
      
        <h4 align="center">Apakah anda yakin ingin menghapus no surat <?php echo $data['no_surat']; ?><strong><span class="grt"></span></strong>?</h4>
      </div>
      </form>
      <div class="modal-footer">
        <button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancle</button>
        <button type="submit" name="submit" class="btn btn-info text-white">Delete</button>
        <!-- <a href="../user/function_user.php?act=deletesurat&id=<?php echo $row['id_user']; ?>" class="btn btn-primary">Delete</a> -->
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>



    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
    <script src="assets/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>