<?php

class Admin {
    public $ssn = '';
    public $fname = '';
    public $address = '';

    public $hasil = false;
    public $message = '';


    //VARIABLES ABOVE
    //FUNCTIONS BELOW
    
    public function AddEmployee(){
        $sql = "INSERT INTO employee (ssn, fname, address)
        VALUES ('$this->ssn', '$this->fname', '$this->address')";

        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil){
            $this->message = 'Data added successfully.';
        } else {
            $this->message = 'Cannot add data. Process failed along the way ;-;';
        }
    }         

    public function UpdateEmployee(){
        $sql = "UPDATE employee
                    SET fname = '$this->fname'
                    address = '$this->address'
                WHERE ssn = '$this->ssn'";

        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil) {
            $this->message = 'Data updated successfully.';
        }
        else {
            $this->message = 'Data could not be updated. Skill issue possibility';
        }
    }		

    public function DeleteEmployee(){
       $sql = "DELETE FROM employee WHERE ssn='$this->ssn'";
       $this->hasil = mysqli_query($this->connection, $sql);

       if($this->hasil){
           $this->hasil = "Employee fired successfully";
       } else {
           $this->hasil = "Employee could not be fired.";
       }
    }		

    public function SelectAllEmployee(){
        $sql = "SELECT * FROM employee";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = Array();
        $count = 0;
        
        if(mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_array($result)){
                $objEmployee = new Employee();
                $objEmployee->ssn = $data['ssn'];
                $objEmployee->fname = $data['fname'];
                $objEmployee->address = $data['address'];
                $arrResult[$count] = $objEmployee;
                $count++;
            }
        }
        return $arrResult;
    } 

    public function SelectOneEmployee(){
        $sql = "SELECT * FROM employee WHERE ssn='$this->ssn'";
        $resultOne = mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($resultOne) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_assoc($resultOne);
            $this->fname = $data['fname'];
            $this->address = $data['address'];
        }
    }

}

?>