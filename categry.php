<?php

    class Categry
    {
        private $servername = "localhost";
        private $username   = "root";
        private $password   = "";
        private $database   = "php_crud";
        public  $con;


        // Database Connection 
        public function __construct()
        {
            $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
            if(mysqli_connect_error()) {
             trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
            }else{
            return $this->con;
            }
        }

        // Insert categry data into customer table
        public function insertData($post)
        {
            $name = $this->con->real_escape_string($_POST['name']);
            $type = $this->con->real_escape_string($_POST['type']);
            $price = $this->con->real_escape_string($_POST['price']);
            $query="INSERT INTO categry(name,type,price) VALUES('$name','$type','$price')";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:index.php?msg1=insert");
            }else{
                echo "Registration failed try again!";
            }
        }

        // Fetch categry records for show listing
        public function displayData()
        {
            $query = "SELECT * FROM categry";
            $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                   $data[] = $row;
            }
             return $data;
            }else{
             echo "No found records";
            }
        }

        // Fetch single data for edit from categry table
        public function displyaRecordById($id)
        {
            $query = "SELECT * FROM categry WHERE id = '$id'";
            $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
            }else{
            echo "Record not found";
            }
        }

        // Update categry data into customer table
        public function updateRecord($postData)
        {
            $name = $this->con->real_escape_string($_POST['uname']);
            $type = $this->con->real_escape_string($_POST['utype']);
            $price = $this->con->real_escape_string($_POST['uprice']);
            $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE categry SET name = '$name', type = '$type', price = '$price' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:index.php?msg2=update");
            }else{
                echo "Registration updated failed try again!";
            }
            }
            
        }

        // Delete categry data from categry table
        public function deleteRecord($id)
        {
            $query = "DELETE FROM categry WHERE id = '$id'";
            $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
            }
        }
    }
?>