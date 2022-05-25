<?php

class Barang extends Connection{
    private $kodeBarang = 0;
    private $namaBarang = '';
    private $deskripsi = '';
    private $jumlahStok = 0;
    private $harga = 0;
    private $fotoBarang ='';
    private $jumlahTerjual = 0;
    private $id_category = 0;
    private $id_penjual = 0;
    private $hasil = false;
    private $message ='';

    public function __get($atribute) {
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
            }
    }

    public function __set($atribut, $value){
        if (property_exists($this, $atribut)) {
                $this->$atribut = $value;
        }
    }
                
//     public function addBarang(){
//       $sql = "INSERT INTO 'tblbarang'('kodeBarang', 'namaBarang', 'deskripsi', 'jumlahStok', 'harga', 'id_kategori', 'id_penjual') 
//               values ('$this->kodeBarang', '$this->namaBarang', '$this->deskripsi', '$this->jumlahStok',
//                       '$this->id_category', '$this->id_penjual')";
//       //$this->result = mysqli_query($this->connection, $sql);
      
//       if($this->result)
//          $this->message ='Data berhasil ditambahkan!';					
//       else
//          $this->message ='Data gagal ditambahkan!';	
//   }
    
    public function updateBarang(){
        $sql = "UPDATE tblBarang SET kodeBarang ='$this->kodeBarang',
                namaBarang = '$this->namaBarang',
                deskripsi = '$this->deskripsi',
                jumlahStok = '$this->jumlahStok',
                harga = '$this->harga',
                id_category = '$this->id_category',
                id_penjual = '$this->id_penjual'
                WHERE kodeBarang = $this->kodeBarang";
        $this->hasil = mysqli_query($this->connection, $sql);
        
        if($this->hasil)
           $this->message ='Data berhasil diubah!';					
        else
           $this->message ='Data gagal diubah!';	
    }

    public function deleteBarang(){
        $sql = "DELETE FROM tblBarang WHERE kodeBarang=$this->kodeBarang";
        $this->hasil = mysqli_query($this->connection, $sql);
        
        if($this->hasil)
           $this->message ='Data berhasil dihapus!';					
        else
           $this->message ='Data gagal dihapus!';	
    }

    public function addFoto(){

    }
    
    public function UpdateFotoBarang(){
        $sql = "UPDATE tblBarang SET fotoBarang ='$this->fotoBarang'
                WHERE kodeBarang = $this->kodeBarang";
        $this->hasil = mysqli_query($this->connection, $sql);
        
        if($this->result)
           $this->message ='Foto berhasil diubah!';					
        else
           $this->message ='Foto gagal diubah!';	
    }


    public function selectOneBarang(){
        //blmm
    }
    
    
    public function selectAllBarang(/* w/parameter*/){
                
    }

    public function selectAllBarangInCart($arrayincart){
                
    }

    
 }	