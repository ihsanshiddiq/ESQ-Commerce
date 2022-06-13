<?php



class Barang extends Connection2{
    private $id = 0;

    private $namaBarang = '';
    private $deskripsi = '';
    private $jumlahStok = 0;
    private $harga = 0;
    private $fotoBarang ='';
    //private $currentfoto = '';
    private $jumlahTerjual = 0;
    private $nama_kategori = '';
    private $id_penjual = "";
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
        $sql = "INSERT INTO barang(namaBarang, deskripsi, jumlahStok, harga, fotoBarang, nama_kategori, id_penjual) 
                values ('$this->namaBarang', '$this->deskripsi', $this->jumlahStok, $this->harga, '$this->fotoBarang',
                        '$this->nama_kategori', '$this->id_penjual');";
        $this->result = mysqli_query($this->connection, $sql);
        
        $this->id = $this->connection->insert_id;

        if($this->result)
            $this->message ='Data berhasil ditambahkan!';					
        else
            $this->message ='Data gagal ditambahkan!';	
   }

   public function updateFoto(){
    $sql = "UPDATE barang SET 
            fotoBarang = '$this->fotoBarang'
            WHERE id = $this->id";

    $this->result = mysqli_query($this->connection, $sql);
    
    if($this->result)
       $this->message ='Foto berhasil diubah!';					
    else
       $this->message ='Foto gagal diubah!';	
       
}
    // To update barang select by id
    public function updateBarangg(){
        $sql="UPDATE barang SET id=$this->id, 
                namaBarang='$this->namaBarang', 
                deskripsi='$this->deskripsi',
                jumlahStok=$this->jumlahStok, 
                harga=$this->harga, 
                nama_kategori='$this->nama_kategori', 
                fotoBarang='$this->fotobarang'
              WHERE id=$this->id";
        $result = mysqli_query($this->connection, $sql);
    }

    // Function to delete barang exc by id
    public function deleteBarang(){
        $sql = "DELETE FROM barang WHERE id=$this->id";
        $this->result = mysqli_query($this->connection, $sql);
        
        if($this->result)
           $this->message ='Data berhasil dihapus!';					
        else
           $this->message ='Data gagal dihapus!';	
    }


    public function UpdateFotoBarang(){
        $sql = "UPDATE barang SET fotoBarang ='$this->fotoBarang'
                WHERE id = $this->id";
        $this->result = mysqli_query($this->connection, $sql);
        
        if($this->result)
           $this->message ='Foto berhasil diubah!';					
        else
           $this->message ='Foto gagal diubah!';	
    }


    public function selectOneBarang(){
        $sql = "SELECT * FROM barang WHERE id='$this->id'";
		$resultOne = mysqli_query($this->connection, $sql);	

        $item = Array();

		if(mysqli_num_rows($resultOne) == 1){
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->nama = $data['nama'];			
            $this->id = $data['id'];
            $this->namaBarang = $data['namaBarang'];
			$this->deskripsi = $data['deskripsi'];				
            $this->jumlahStok = $data['jumlahStok'];	
            $this->harga = $data['harga'];	
            $this->fotoBarang = $data['fotoBarang'];	
            $item = $objBarang;
		}	
        return $item;
    }

    public function selectOneBarangRedirect(){
        $sql = "SELECT * FROM barang WHERE id='$this->id'";
		$resultOne = mysqli_query($this->connection, $sql);	

        $item;

		if(mysqli_num_rows($resultOne) == 1){
            
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$objBarang = new Barang();
            $objBarang->id=$data['id'];
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

    public function selectOneBarangParam(){
        $sql = "SELECT * FROM barang WHERE id='$this->id'";
		$resultOne = mysqli_query($this->connection, $sql);	

        $item = Array();

		if(mysqli_num_rows($resultOne) == 1){
            
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$objBarang = new Barang();
            $objBarang->id=$data['id'];
            $objBarang->namaBarang=$data['namaBarang'];
            $objBarang->deskripsi=$data['deskripsi'];
            $objBarang->jumlahStok=$data['jumlahStok'];
            $objBarang->harga=$data['harga'];
            $objBarang->nama_kategori=$data['nama_kategori'];
            $objBarang->fotoBarang=$data['fotoBarang'];
            $objBarang->id_penjual=$data['id_penjual'];
            $item = $objBarang;
            //$i++;

		}	
        return $item;
    }
    
    
    public function viewOneBarang(){
        $sql="SELECT * FROM barang where id=$this->id";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $this->namaBarang = $row['namaBarang'];
        $this->deskripsi = $row['deskripsi'];
        $this->jumlahStok = $row['jumlahStok'];
        $this->harga = $row['harga'];
        $this->nama_kategori = $row['nama_kategori'];
        $this->fotoBarang = $row['fotoBarang'];
    }
    
    // To view all barang order by id
    public function selectAllBarang(){
        $this->connect();
        $sql = "SELECT * FROM barang order by id";
        $result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
        
        $arrResult = Array();
        $i=0;
        if(mysqli_num_rows($result)>0){
            while($data = mysqli_fetch_array($result))
            {
                $objBarang = new Barang();
                $objBarang->id=$data['id'];
                $objBarang->namaBarang=$data['namaBarang'];
                $objBarang->deskripsi=$data['deskripsi'];
                $objBarang->jumlahStok=$data['jumlahStok'];
                $objBarang->harga=$data['harga'];
                $objBarang->nama_kategori=$data['nama_kategori'];
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
                $objBarang->id=$data['id'];
                $objBarang->namaBarang=$data['namaBarang'];
                $objBarang->deskripsi=$data['deskripsi'];
                $objBarang->jumlahStok=$data['jumlahStok'];
                $objBarang->harga=$data['harga'];
                $objBarang->nama_kategori=$data['nama_kategori'];
                $objBarang->fotoBarang=$data['fotoBarang'];
                $arrResult[$i] = $objBarang;
                $i++;
            }
        }
        return $arrResult;

                
    }

    public function selectAllBarangPenjual($input){
        $this->connect();
        $sql = "SELECT * FROM barang WHERE id_penjual LIKE '$input'";
        $result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
        
        $arrResult = Array();
        $i=0;
        if(mysqli_num_rows($result)>0){
            while($data = mysqli_fetch_array($result))
            {
                $objBarang = new Barang();
                $objBarang->id=$data['id'];
                $objBarang->namaBarang=$data['namaBarang'];
                $objBarang->deskripsi=$data['deskripsi'];
                $objBarang->jumlahStok=$data['jumlahStok'];
                $objBarang->jumlahTerjual=$data['jumlahTerjual'];
                $objBarang->harga=$data['harga'];
                $objBarang->nama_kategori=$data['nama_kategori'];
                $objBarang->fotoBarang=$data['fotoBarang'];
                $arrResult[$i] = $objBarang;
                $i++;
            }
        }
        return $arrResult;

                
    }

    public function selectAllBarangCategory($input){
        $this->connect();
        $sql = "SELECT * FROM barang WHERE nama_kategori LIKE '%$input%'";
        $result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
        
        $arrResult = Array();
        $i=0;
        if(mysqli_num_rows($result)>0){
            while($data = mysqli_fetch_array($result))
            {
                $objBarang = new Barang();
                $objBarang->id=$data['id'];
                $objBarang->namaBarang=$data['namaBarang'];
                $objBarang->deskripsi=$data['deskripsi'];
                $objBarang->jumlahStok=$data['jumlahStok'];
                $objBarang->harga=$data['harga'];
                $objBarang->nama_kategori=$data['nama_kategori'];
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
        $auto = mysqli_query("SELECT MAX(id) AS max_code FROM barang");
        $data = mysqli_fetch_array($auto);
        $code = $data['max_code'];
        $urutan = (int)substr($code, 1, 3);
        $urutan++;
        $huruf = 'b';
        $auto_code = $huruf . sprintf("%03s", $urutan);
        
    }

    
 }	