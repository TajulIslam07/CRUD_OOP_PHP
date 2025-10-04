<?php
class db {
    public $hostname = 'db';
    public $username = 'user';
    public $password = 'user';
    public $db_name  = 'crud';
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect(
            $this->hostname,
            $this->username,
            $this->password,
            $this->db_name
        );
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function insert($fname, $lname, $age, $phone) {
        $sql = "INSERT INTO user (fname,lname,age,phone) VALUES ('$fname','$lname',$age,'$phone')";
        if (!mysqli_query($this->conn, $sql)) {
            echo "Insert failed: " . mysqli_error($this->conn);
        } else {
            echo "Inserted successfully!";
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM user";
        $result = mysqli_query($this->conn, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
?>
