<?php

    //include '../inc.koneksi.php';

    class Transaksi extends Connection{
        private $id = 0;
        //private $id_admin = 0;
        private $penjual = "";
        private $pembeli = "";
        
        private $id_status = "";
        private $id_barang = 0;
        private $quantity = 0;
        private $price = 0;
        private $total = 0;
        private $today;
        //private $tanggal;
        
        //private $email = " ";
        
        private $hasil = false;
        private $message = " ";
        
        //---------------------- below is for view transaksi detail
        
        private $usernamepb = "";   //specific to fetch transaksi satu user
        private $usernamepj = "";   //specific to fetch transaksi satu user
        private $keterangan = "";   //specific to fetch transaksi satu user
        private $namaBarang = "";
        private $tanggal;
        private $namaToko = "";
        


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

        
/*
        public function addTransaksiPDO(){

            $stmt = $this->connect()->prepare('INSERT INTO `transaksi`(`id_status`, `tanggal`, `pembeli`, `id_barang`, `penjual`, `quantity`, `total`) 
            VALUES (?, ?, ?, ?, ?, ?, ?);');

            $newstatus = 1;
            //$today = date("Y/m/d");

            if(!$stmt->execute(array($newstatus, $this->today, $this->pembeli, $this->id_barang, $this->penjual, $this->quantity, $this->total)))
            {
                $stmt = null;
                $this->message ='Data gagal ditambahkan (stmt error)';
                //header("location: ../index.php?error=stmtfailedcheckuser");  
            } else {
                $this->message ='Transaksi sukses ditambahkan!';
            }

        }
        */

        public function addTransaksiPDOTemporary(){

            $stmt = $this->connect()->prepare('INSERT INTO `transaksi`(`id_status`, `tanggal`, `pembeli`, `id_barang`, `penjual`, `quantity`, `total`) 
            VALUES (?, ?, ?, ?, ?, ?, ?);');

            $newstatus = 1;
            //$today = date("YYYY-mm-dd");
            $total = $this->price * $this->quantity;

            if(!$stmt->execute(array($newstatus, $this->today, $this->pembeli, $this->id_barang, $this->penjual, $this->quantity, $total)))
            {
                $stmt = null;
                $this->message ='Data gagal ditambahkan (stmt error)';
                //header("location: ../index.php?error=stmtfailedcheckuser");  
            } else {
                $this->message ='Transaksi sukses ditambahkan!';
            }

        }

        public function UpdateTransaksiStatusPDO(){
            $stmt = $this->connect()->prepare('UPDATE transaksi
                    SET 
                    id_status = ?			
                    WHERE id = ?;');
            //$this->hasil = mysqli_query($this->connection, $query);
           
            
            if(!$stmt->execute(array($this->id_status, $this->id)))
            {				
                $this->message ='Data transaksi gagal diubah!';
            }
            else
            {
                $this->message ='Data berhasil berhasil diubah!';					
                //echo '<script>alert(" ' . $this->message . ' ");</script>';
                header("../location: seller-transaction.php?statusupdated");
                exit();
            }
            header("../location: seller-transaction.php?fail");

        }

        public function SelectAllTransaksiPembeli(){    
        
            $stmt = $this->connect()->prepare('SELECT * FROM vw_transaksi WHERE pembeli=?');
            //$stmt = "SELECT * FROM akun";            
            $result = $stmt->execute(array($this->usernamepb));
    
            if ($result == false) {
                $stmt = null;
                echo "fail to execute SelectAllTransaksiPembeli() function";
                exit();
            }
                    
            $arrResult = Array();
            $count=0;
            if($stmt->rowCount() > 0){                
            while ($data= $stmt->fetch(PDO::FETCH_OBJ))
            {
                $objakun = new Transaksi(); 
                $objakun ->id = $data->id;
                //$objakun ->username = $data->namaDepan;
                $objakun ->tanggal = $data->tanggal;
                $objakun ->pembeli = $data->pembeli;
                $objakun ->penjual = $data->penjual;
                $objakun ->namaBarang = $data->namaBarang;
                $objakun ->namaToko = $data->namaToko;
                $objakun ->quantity = $data->quantity;
                $objakun ->total = $data->total;
                $objakun ->keterangan = $data->keterangan;
    
                $arrResult[$count] = $objakun;
                $count++;
                }
            } else {
                echo "Ain't got any transaction innit";
            }
            return $arrResult;          
        }

        public function SelectAllTransaksiPenjual(){    
        
            $stmt = $this->connect()->prepare('SELECT * FROM vw_transaksi WHERE penjual=?');
            //$stmt = "SELECT * FROM akun";            
            $result = $stmt->execute(array($this->usernamepj));
    
            if ($result == false) {
                $stmt = null;
                echo "fail to execute SelectAllTransaksiPembeli() function";
                exit();
            }
                    
            $arrResult = Array();
            $count=0;
            if($stmt->rowCount() > 0){                
            while ($data= $stmt->fetch(PDO::FETCH_OBJ))
            {
                $objakun = new Transaksi(); 
                $objakun ->id = $data->id;
                //$objakun ->username = $data->namaDepan;
                $objakun ->tanggal = $data->tanggal;
                $objakun ->pembeli = $data->pembeli;
                $objakun ->penjual = $data->penjual;
                $objakun ->namaBarang = $data->namaBarang;
                $objakun ->namaToko = $data->namaToko;
                $objakun ->quantity = $data->quantity;
                $objakun ->total = $data->total;
                $objakun ->keterangan = $data->keterangan;
                $objakun ->id_status = $data->id_status;
    
                $arrResult[$count] = $objakun;
                $count++;
                }
            } else {
                echo "Ain't got any transaction innit";
            }
            return $arrResult;          
        }

        //how PDO works is that, in the SQL query it uses '?' as PLACEHOLDERS that will then be replaced inside the execute(array(?,?,?)) according to the varname. Urutan harus sesuai dalam execute(array())

        public function DeleteAccountPDO(){
            $stmt = $this->connect()->prepare('DELETE FROM akun WHERE username = ? ');
           
            if(!$stmt->execute(array($this->username)))
            {
                $this->message ='Data gagal dihapus!';				
            }
            else
            {
                $this->message ='Data berhasil dihapus!';					
            }
        }

        public function cek_akun(){
            //$nama = mysqli_real_escape_string($con, $username);
            $query = "SELECT * FROM akun WHERE username = '$this->username'";
            
            $res = mysqli_query($this->connection, $query);
           
            if($res) {
                $this->hasil = true;
                return mysqli_num_rows($res);
            }
        }

        public function cek_akunPDO($uname){        //i actually dont know if this works
            //$nama = mysqli_real_escape_string($con, $username);
            $stmt = $this->connect()->prepare('SELECT * FROM akun WHERE username = ?;');
            
            if(!$stmt->execute(array($uname)))
            {
                $this->message ='Data tidak ditemukan! (stmt error)';				
            }

            //$resultCheck;
            if($stmt->rowCount() > 0) {
                $this->hasil = TRUE;
                $akun = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $this->username = $akun[0]["username"];
                $this->email = $akun[0]["email"];
                $this->password = $akun[0]["password"];
                return $stmt->rowCount();       //i dont know what kinda value this shit returns
            }
        }

           /*
            if($res){
				$this->hasil = true;
                
				$data = mysqli_fetch_assoc($resultOne);
				$this->id=$data['id'];
				$this->idpembeli=$data['idpembeli'];
				$this->nama = $data['nama'];				
				$this->email=$data['email'];
				$this->password=$data['password'];			
				$this->role=$data['role'];							
				$this->idrole=$data['idrole'];							
				return true;		
			}
            */

        public function reset_pass(){
                $stmt = $this->connect()->prepare('UPDATE akun SET password = ? WHERE username = ?');

                if (!$stmt->execute(array($this->password, $this->username))) {
                    $this->hasil = false;
                }else {
                    $this->hasil = true;
                    
                }
        }

        public function SelectOneTransaksiPDO(){    
        
            $stmt = $this->connect()->prepare('SELECT * FROM transaksi WHERE id = ?');
            //$stmt = "SELECT * FROM akun";            
            $result = $stmt->execute(array($this->id));
    
            if ($result == false) {
                $stmt = null;
                echo "fail to execute SelectAllEmployee() function, fail to execute: SELECT * FROM akun";
                exit();
            }
                    
            $arrResult;
            //$count=0;
            if($stmt->rowCount() > 0){                
            while ($data= $stmt->fetch(PDO::FETCH_OBJ))
            {
                $objtr = new Transaksi(); 
                $objtr ->id = $data->id;
                //$objakun ->username = $data->namaDepan;
                $objtr ->tanggal = $data->tanggal;
                $objtr ->pembeli = $data->pembeli;
                $objtr ->penjual = $data->penjual;
                $objtr ->id_barang = $data->id_barang;
                //$objtr ->namaToko = $data->namaToko;
                $objtr ->quantity = $data->quantity;
                $objtr ->total = $data->total;
                //$objtr ->keterangan = $data->keterangan;
                $objtr ->id_status = $data->id_status;
    
               // $arrResult[$count] = $objtr;
    
                $arrResult = $objtr;
                //$count++;
                }
            } else {
                echo "Ain't got any user innit";
            }
            return $arrResult;          
        }

        public function SelectOneTransaksiPDOparam($input){    
        
            $stmt = $this->connect()->prepare('SELECT * FROM transaksi WHERE id = ?');
            //$stmt = "SELECT * FROM akun";            
            $result = $stmt->execute(array($input));
    
            if ($result == false) {
                $stmt = null;
                echo "fail to execute SelectAllEmployee() function, fail to execute: SELECT * FROM akun";
                exit();
            }
                    
            $arrResult;
            //$count=0;
            if($stmt->rowCount() > 0){                
            while ($data= $stmt->fetch(PDO::FETCH_OBJ))
            {
                $objtr = new Transaksi(); 
                $objtr ->id = $data->id;
                //$objakun ->username = $data->namaDepan;
                $objtr ->tanggal = $data->tanggal;
                $objtr ->pembeli = $data->pembeli;
                $objtr ->penjual = $data->penjual;
                $objtr ->id_barang = $data->id_barang;
                //$objtr ->namaToko = $data->namaToko;
                $objtr ->quantity = $data->quantity;
                $objtr ->total = $data->total;
                //$objtr ->keterangan = $data->keterangan;
                $objtr ->id_status = $data->id_status;
    
               // $arrResult[$count] = $objtr;
    
                $arrResult = $objtr;
                //$count++;
                }
            } else {
                echo "Ain't got any user innit";
            }
            return $arrResult;          
        }



        public function SelectOneAccount(){
            $query = "SELECT * FROM akun WHERE username='$this->username'"; 
            $resultOne = mysqli_query($this->connection, $query);
            if(mysqli_num_rows($resultOne) == 1){
                $this->hasil = true;
                $data = mysqli_fetch_assoc($resultOne);
                $this->username=$data['username'];
                $this->namaDepan=$data['namaDepan'];
                $this->namaBelakang=$data['namaBelakang'];
                $this->email=$data['email'];
                $this->noHp=$data['noHp'];
                $this->jalan=$data['jalan'];
                $this->kodePos=$this['kodePos'];
            }

        }


    }





?>