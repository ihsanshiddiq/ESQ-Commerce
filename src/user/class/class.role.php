<?php 
	class Role extends Connection{
		private $id_role ='';
		private $role = '';		
		private $result = false;
		private $message ='';

		public function __get($atribute){
			if(property_exists($this, $atribute)) {
				return $this->$atribute;
			}
		}
	
		public function __set($atribut, $value){
			if (property_exists($this, $atribut)) {
					$this->$atribut = $value;
			}
		}
				
		public function AddRole(){
			$sql = "INSERT INTO tblrole(role) 
		            values ('$this->role')";
			$this->result = mysqli_query($this->connection, $sql);
			
			if($this->result)
			    $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateRole(){
			$sql = "UPDATE tblrole SET role ='$this->role'
					WHERE id_role = $this->id_role";

			$this->result = mysqli_query($this->connection, $sql);
			
			if($this->result)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}
		
		public function DeleteRole(){
			$sql = "DELETE FROM tblrole WHERE id_role=$this->id_role";
			$this->result = mysqli_query($this->connection, $sql);
			
			if($this->result)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}
		
		
		public function SelectOneRole(){
			$sql = "SELECT * FROM tblrole WHERE id_role='$this->id_role'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->result = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->role = $data['role'];				
							
			}							
		}

        public function SelectAllRole(){
			$sql = "SELECT * FROM tblrole";
				
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objRole = new Role(); 
					$objRole->id_role=$data['id_role'];
					$objRole->role=$data['role'];
					$arrResult[$cnt] = $objRole;
					$cnt++;
				}
			}
			return $arrResult;			
		}
 	}	 
?>
