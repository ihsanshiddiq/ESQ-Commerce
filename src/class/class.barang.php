<?php

class Barang extends Connection{
    private $kodeBarang = 0;
    private $namaBarang = '';
    private $deskripsi = '';
    private $jumlahStok = 0;
    private $harga = 0;
    private $fotoBarang ='';
    //private $currentfoto = '';
    private $jumlahTerjual = 0;
    private $nama_kategori = 0;
    private $id_penjual = 0;
    private $result = false;
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
                

    public function addBarang(){
        $sql = "INSERT INTO barang(kodeBarang, namaBarang, deskripsi, jumlahStok, harga, fotoBarang/*, 'nama_kategori', 'id_penjual'*/) 
                values ('$this->kodeBarang', '$this->namaBarang', '$this->deskripsi', '$this->jumlahStok', '$this->harga', '$this->fotoBarang'
                        /*'$this->nama_kategori', '$this->id_penjual'*/)";
        $this->result = mysqli_query($this->connection, $sql);
        
        //$this->kodeBarang = $this->connection->insert_kodeBarang;

        if($this->result)
            $this->message ='Data berhasil ditambahkan!';					
        else
            $this->message ='Data gagal ditambahkan!';	
   }

   public function updateFoto(){
    $sql = "UPDATE Barang SET 
            fotoBarang = '$this->fotoBarang'
            WHERE kodeBarang = '$this->kodeBarang'";

    $this->result = mysqli_query($this->connection, $sql);
    
    if($this->result)
       $this->message ='Foto berhasil diubah!';					
    else
       $this->message ='Foto gagal diubah!';	
}
    
    public function updateBarang(){
        $sql = "UPDATE Barang SET 
                namaBarang = '$this->namaBarang',
                deskripsi = '$this->deskripsi',
                jumlahStok = '$this->jumlahStok',
                harga = '$this->harga',
                fotoBarang = '$this->fotoBarang',
                -- nama_kategori = '$this->nama_kategori',
                -- id_penjual = '$this->id_penjual'
                WHERE kodeBarang = $this->kodeBarang";

        $this->result = mysqli_query($this->connection, $sql);
        
        if($this->result)
           $this->message ='Data berhasil diubah!';					
        else
           $this->message ='Data gagal diubah!';	
    }

    public function deleteBarang(){
        $sql = "DELETE FROM Barang WHERE kodeBarang=$this->kodeBarang";
        $this->result = mysqli_query($this->connection, $sql);
        
        if($this->result)
           $this->message ='Data berhasil dihapus!';					
        else
           $this->message ='Data gagal dihapus!';	
    }

    public function addFoto(){

    }
    
    public function UpdateFotoBarang(){
        $sql = "UPDATE Barang SET fotoBarang ='$this->fotoBarang'
                WHERE kodeBarang = $this->kodeBarang";
        $this->result = mysqli_query($this->connection, $sql);
        
        if($this->result)
           $this->message ='Foto berhasil diubah!';					
        else
           $this->message ='Foto gagal diubah!';	
    }


    public function selectOneBarang(){
        $sql = "SELECT * FROM barang WHERE kodeBarang='$this->kodeBarang'";
		$resultOne = mysqli_query($this->connection, $sql);	
		if(mysqli_num_rows($resultOne) == 1){
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->nama = $data['nama'];			
            $this->kodeBarang = $data['kodeBarang'];
            $this->namaBarang = $data['namaBarang'];
			$this->deskripsi = $data['deskripsi'];				
            $this->jumlahStok = $data['jumlahStok'];	
            $this->harga = $data['harga'];	
            $this->fotoBarang = $data['fotoBarang'];	

		}	
    }

    public function selectOneBarangRedirect(){
        $sql = "SELECT * FROM barang WHERE kodeBarang='$this->kodeBarang'";
		$resultOne = mysqli_query($this->connection, $sql);	

        $item;

		if(mysqli_num_rows($resultOne) == 1){
            
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$objBarang = new Barang();
            $objBarang->kodeBarang=$data['kodeBarang'];
            $objBarang->namaBarang=$data['namaBarang'];
            $objBarang->deskripsi=$data['deskripsi'];
            $objBarang->jumlahStok=$data['jumlahStok'];
            $objBarang->harga=$data['harga'];
            $objBarang->fotoBarang=$data['fotoBarang'];
            $item = $objBarang;
            //$i++;

		}	
        //return $item;
    }

    public function selectOneBarangParam($kode){
        $sql = "SELECT * FROM barang WHERE kodeBarang='$kode'";
		$resultOne = mysqli_query($this->connection, $sql);	

        $item = Array();

		if(mysqli_num_rows($resultOne) == 1){
            
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$objBarang = new Barang();
            $objBarang->kodeBarang=$data['kodeBarang'];
            $objBarang->namaBarang=$data['namaBarang'];
            $objBarang->deskripsi=$data['deskripsi'];
            $objBarang->jumlahStok=$data['jumlahStok'];
            $objBarang->harga=$data['harga'];
            $objBarang->fotoBarang=$data['fotoBarang'];
            $item = $objBarang;
            //$i++;

		}	
        return $item;
    }
    
    
    public function selectAllBarang(/* w/parameter*/){
        $this->connect();
        $sql = "SELECT * FROM barang order by kodeBarang";
        $result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
        
        $arrResult = Array();
        $i=0;
        if(mysqli_num_rows($result)>0){
            while($data = mysqli_fetch_array($result))
            {
                $objBarang = new Barang();
                $objBarang->kodeBarang=$data['kodeBarang'];
                $objBarang->namaBarang=$data['namaBarang'];
                $objBarang->deskripsi=$data['deskripsi'];
                $objBarang->jumlahStok=$data['jumlahStok'];
                $objBarang->harga=$data['harga'];
                $objBarang->fotoBarang=$data['fotoBarang'];
                $arrResult[$i] = $objBarang;
                $i++;
            }
        }
        return $arrResult;

                
    }

    public function selectAllBarangName($input){
        $this->connect();
        $sql = "SELECT * FROM barang WHERE namaBarang LIKE '%$input%'";
        $result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
        
        $arrResult = Array();
        $i=0;
        if(mysqli_num_rows($result)>0){
            while($data = mysqli_fetch_array($result))
            {
                $objBarang = new Barang();
                $objBarang->kodeBarang=$data['kodeBarang'];
                $objBarang->namaBarang=$data['namaBarang'];
                $objBarang->deskripsi=$data['deskripsi'];
                $objBarang->jumlahStok=$data['jumlahStok'];
                $objBarang->harga=$data['harga'];
                $objBarang->fotoBarang=$data['fotoBarang'];
                $arrResult[$i] = $objBarang;
                $i++;
            }
        }
        return $arrResult;

                
    }

    public function selectAllBarangInCart($arrayincart){
                
    }

    public function autoCode(){
        $auto = mysqli_query("SELECT MAX(kodeBarang) AS max_code FROM barang");
        $data = mysqli_fetch_array($auto);
        $code = $data['max_code'];
        $urutan = (int)substr($code, 1, 3);
        $urutan++;
        $huruf = 'b';
        $auto_code = $huruf . sprintf("%03s", $urutan);
        
    }

    
 }	