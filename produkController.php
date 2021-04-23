<?php
require_once '../koneksi.php';
require_once '../models/Pegawai.php';
//1.tangkap request element form
$kode = $_POST['id'];
$nama = $_POST['nama'];
$kondisi = $_POST['alamat'];
$harga = $_POST['agama'];
$stok = $_POST['email'];
$idjenis = $_POST['no.telepon'];
$foto = $_POST['foto'];
$tombol = $_POST['proses'];
//2.menyimpan data2 di atas sebuah array
$data = [
    $id, //? 1
    $nama, //? 2
    $alamat, //? 3
    $agama, //? 4
    $email, //? 5
    $no.telepon, //?6
    $foto //? 7
];
//3.proses
$obj = new Pegawai();
switch ($tombol) {
    case 'simpan':
        $obj->simpan($data);
    break;
    case 'ubah':
        $data[] = $_POST['idx'];//tangkap hidden field u/ ? ke-8
        $obj->ubah($data);
    break;
    case 'hapus':
        $id[] = $_POST['idx'];//tangkap hidden field u/ ? ke-1
        $obj->hapus($id);
    break;
    default://tombol batal
        header('Location:http://localhost:8080/appku/index.php?hal=dataProduk');
        break;
}

//4.landing page
header('Location:http://localhost:8080/appku/index.php?hal=dataProduk');