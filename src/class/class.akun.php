<?php

    //include '../inc.koneksi.php';

    class Akun extends Connection{
        //private $id = 0;
        private $id_admin = 0;
        private $id_penjual = 0;
        private $id_pembeli = 0;
        private $namaDepan = " ";
        private $namaBelakang = " ";
        private $username = " ";
        private $password = " ";
        private $email = " ";
        //private $pwd_hashed = " ";
        //private $role = " ";
        private $id_role = 0;
        private $noHp = 0;
        private $kodePos = " ";
        private $jalan = " ";
        private $hasil = false;
        private $message = " ";
        

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

        public function addAkun(){
                
            $query = "INSERT INTO `akun`(`username`, `password`, `namaDepan`, `namaBelakang`, `email`, `noHp`, `kodePos`, `jalan`, `id_role`) 
                    VALUES ('$this->username', '$this->password', '$this->namaDepan', '$this->namaBelakang', '$this->email', '$this->noHp', '$this->kodePos', '$this->jalan', '$this->id_role')";
            $this->hasil = mysqli_query($this->connection, $query);
            //$this->id = $this->connection->insert_id; //tak paham nay ini gunanya buat apa :v	
            
            if($this->hasil)
            $this->message ='Data berhasil ditambahkan!';					
            else
            $this->message ='Data gagal ditambahkan!';
        }

        public function addAkunPDO(){

            $stmt = $this->connect()->prepare('INSERT INTO `akun`(`username`, `password`, `namaDepan`, `namaBelakang`, `email`, `noHp`, `kodePos`, `jalan`, `id_role`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');

            if(!$stmt->execute(array($this->username, $this->password, $this->namaDepan, $this->namaBelakang, $this->email, $this->noHp, $this->kodePos, $this->jalan, $this->id_role)))
            {
                $stmt = null;
                $this->message ='Data gagal ditambahkan (stmt error)';
                //header("location: ../index.php?error=stmtfailedcheckuser");  
            } else {
                $this->message ='Data gagal ditambahkan!';
            }

        }

        //how PDO works is that, in the SQL query it uses '?' as PLACEHOLDERS that will then be replaced inside the execute(array(?,?,?)) according to the varname. Urutan harus sesuai dalam execute(array())

        public function UpdateAccount(){
            $query = "UPDATE akun 
                    SET username = '$this->username',
                    password = '$this->password',
                    namaDepan = '$this->namaDepan',
                    namaBelakang = '$this->namaBelakang',
                    email = '$this->email',
                    noHp = '$this->noHp',
                    kodePos = '$this->kodePos',
                    jalan = '$this->jalan',
                    id_role = '$this->id_role'					
                    WHERE id = $this->id";
            $this->hasil = mysqli_query($this->connection, $query);
            
            if($this->hasil)
            $this->message ='Data berhasil diubah!';					
            else
            $this->message ='Data gagal diubah!';
        }

        public function UpdateAccountPDO(){
            $stmt = $this->connect()->prepare('UPDATE akun 
                    SET username = ?,
                    password = ?,
                    namaDepan = ?,
                    namaBelakang = ?,
                    email = ?,
                    noHp = ?,
                    kodePos = ?,
                    jalan = ?,
                    id_role = ?					
                    WHERE id = ?;');
            //$this->hasil = mysqli_query($this->connection, $query);
           
            
            if(!$stmt->execute(array($this->username, $this->password, $this->namaDepan, $this->namaBelakang, $this->email, $this->noHp, $this->kodePos, $this->jalan, $this->id_role)))
            {				
                $this->message ='Data gagal diubah!';
            }
            else
            {
                $this->message ='Data berhasil diubah!';					
                echo '<script>alert(" ' . $this->message . ' ");</script>';
            }
        }

        public function DeleteAccount(){
            $query = "DELETE FROM akun WHERE username=$this->username";
            $this->hasil = mysqli_query($this->connection, $query);
            
            if($this->hasil)
            $this->message ='Data berhasil dihapus!';					
            else
            $this->message ='Data gagal dihapus!';				
        }


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

        public function SelectOneAkunPDO($uname){    
        
            $stmt = $this->connect()->prepare('SELECT * FROM akun WHERE username = ?');
            //$stmt = "SELECT * FROM akun";            
            $result = $stmt->execute(array($uname));
    
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
                $objakun = new Akun(); 
                $objakun ->username = $data->username;
                $objakun ->namaDepan = $data->namaDepan;
                $objakun ->namaBelakang = $data->namaBelakang;
                $objakun ->email = $data->email;
                $objakun ->id_role = $data->id_role;
                $objakun ->noHp = $data->noHp;
                $objakun ->jalan = $data->jalan;
                $objakun ->kodePos = $data->kodePos;
    
                $arrResult = $objakun;
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

        public function ValidateEmail($email){
            $query = "SELECT a.*, p.id_penjual as idpenjual FROM akun a LEFT JOIN penjual p ON a.username = p.username INNER JOIN role r ON a.id_role = r.id_role WHERE email='$email'";
            $resultOne = mysqli_query($this->connection, $query);
            if(mysqli_num_rows($resultOne) ==1){
                $this->hasil = true;
                $data = mysqli_fetch_assoc($resultOne);
                $this->username=$data['username'];
                $this->namaDepan=$data['namaDepan'];
                $this->namaBelakang=$data['namaBelakang'];
                $this->email=$data['email'];
                $this->noHp=$data['noHp'];
                $this->kodePos=$data['kodePos'];
                $this->jalan=$data['jalan'];
                $this->id_role=$this['id_role'];
                return true;
            }
        }








    }





?>