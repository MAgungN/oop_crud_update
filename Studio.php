<?php
    // panggil file
    include '../Database.php';
    include '../model/Studio_model.php';

class Studio {
    public $model;

    function __construct(){
        $db = new Database();
        $conn = $db->DBConnect();
        $this->model = new Studio_model($conn); 

    }

        function index(){
        $studio = $this->model->tampil_data();
        return $studio;
    }
        function getData($id){
        $studio = $this->model->getData($id);
        return $studio;
    }
        function getDataHarga(){
        $harga = $this->model->getDataHarga();
        return $harga;
    }

    function saveData(){
        if (isset($_POST['submit'])) {
            $kode_booking = $_POST['kode_booking'];
            $nama_band = $_POST['nama_band'];
            $no_telpon = $_POST['no_telpon'];
            $tanggal = $_POST['tanggal'];
            $lokasi_studio = $_POST['lokasi_studio'];
            $waktu = $_POST['waktu'];
            $operator = $_POST['operator'];
            $harga = $_POST['harga'];

            $data[] = array(
                'kode_booking'=>$kode_booking,
                'nama_band'=>$nama_band,
                'no_telpon'=>$no_telpon,
                'tanggal'=>$tanggal,
                'lokasi_studio'=>$lokasi_studio,
                'waktu'=>$waktu,
                'operator'=>$operator,
                'harga'=>$harga
            );
        $result = $this->model->simpanData($data);

                if($result){
                    header("Location:index.php?pesan=success&frm=add");
                }else{
                    header("Location:index.php?pesan=gagal&frm=add");
                }
            }    
        }
        function updateStudio(){
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $kode_booking = $_POST['kode_booking'];
                $nama_band = $_POST['nama_band'];
                $no_telpon = $_POST['no_telpon'];
                $tanggal = $_POST['tanggal'];
                $lokasi_studio = $_POST['lokasi_studio'];
                $waktu = $_POST['waktu'];
                $operator = $_POST['operator'];
                $harga = $_POST['harga'];
    
                $data[] = array(
                    'kode_booking'=>$kode_booking,
                    'nama_band'=>$nama_band,
                    'no_telpon'=>$no_telpon,
                    'tanggal'=>$tanggal,
                    'lokasi_studio'=>$lokasi_studio,
                    'waktu'=>$waktu,
                    'operator'=>$operator,
                    'harga'=>$harga
                );
            $result = $this->model->updateData($data,$id);
    
                    if($result){
                        header("Location:index.php?pesan=success&frm=edit");
                    }else{
                        header("Location:index.php?pesan=gagal&frm=edit");
                    }
                }
                }
                function deleteData(){
                    if(isset($_POST['delete'])){
                        $id = $_POST['id'];
                        $result = $this->model->hapusData($id);
                        
                        if($result){
                            header("Location:index.php?pesan=success&frm=del");
                        }else{
                            header("Location:index.php?pesan=gagal&frm=del");
                        }
                    }
                }                
    }
?>