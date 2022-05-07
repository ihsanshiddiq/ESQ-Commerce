<?php

    class akun extends Connection{
        //private $id = 0;
        private $id_admin = 0;
        private $id_penjual = 0;
        private $id_pembeli = 0;
        private $namaDepan = " ";
        private $namaBelakang = " ";
        private $username = " ";
        private $password = " ";
        private $pwd_hashed = " ";
        private $role = " ";
        private $id_role = 0;
        private $noHp = 0;
        private $kodePos = " ";
        private $jalan = " ";
        private $hasil = false;
        

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
                
            $query = "INSERT INTO akun(username, password, namaDepan, namaBelakang, email, noHp, kodePos, jalan, id_role) 
                    values ('$this->username', '$this->pwd_hashed', '$this->namaDepan', '$this->namaBelakang', '$this->email', '$this->noHp', '$this->kodePos', '$this->jalan', '$this->id_role')";
            $this->hasil = mysqli_query($this->conn, $query);
            //$this->id = $this->connection->insert_id; //tak paham nay ini gunanya buat apa :v	
            
            if($this->hasil)
            $this->message ='Data berhasil ditambahkan!';					
            else
            $this->message ='Data gagal ditambahkan!';
        }

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
            $this->hasil = mysqli_query($this->conn, $query);
            
            if($this->hasil)
            $this->message ='Data berhasil diubah!';					
            else
            $this->message ='Data gagal diubah!';
        }

        public function DeleteAccount(){
            $query = "DELETE FROM akun WHERE username=$this->username";
            $this->hasil = mysqli_query($this->conn, $query);
            
            if($this->hasil)
            $this->message ='Data berhasil dihapus!';					
            else
            $this->message ='Data gagal dihapus!';				
        }

        public function cek_akun($uname){
            //$nama = mysqli_real_escape_string($con, $username);
            $query = "SELECT * FROM user.data WHERE username = '$uname'";
            $res = mysqli_query($this->conn, $query);
            if($res) 
            return mysqli_num_rows($res);
        }









    }

?>