<?php
class Produk{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    //method3 CRUD
    public function datapegawai(){
        $sql = "SELECT pegawai.*, id.nama AS Alamat FROM pegawai
                INNER JOIN pegawai ON pegawai.id = pegawai.idjenis
                ORDER BY pegawai.id DESC";
        
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getpegawai($id){
        $sql = "SELECT pegawai.*, id.nama AS Alamat FROM pegawai
                INNER JOIN pegawai ON pegawai.id = pegawai.idpegawai
                WHERE pegawai.id = ?";
        
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function dataAlamat(){
        $sql = "SELECT * FROM alamat ";
        
        $rs = $this->koneksi->query($sql);
        return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO pegawai(id,nama,Alamat,email,no.telepon,divisi,foto)
                VALUES (?,?,?,?,?,?,?)";
        
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data){
        $sql = "UPDATE pegawai SET id=?,=?,nama=?,alamat=?,
                email=?,no.telepon=?,foto=? WHERE id=?";
        
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM produk WHERE id=?";
        
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }

    
}