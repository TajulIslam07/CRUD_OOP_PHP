<?php
class db{
    public $hostname='localhost';
    public $username='root';
    public $password='';
    public $db_name='crud';
    public $conn;

    public function __construct()
    {
        $this->conn=mysqli_connect($this->hostname,$this->username,$this->password,$this->db_name);
        if (!$this->conn){
            echo mysqli_error($this->conn);
        }

    }

    public function insert($fname,$lname,$age,$phone){
        $sql="INSERT INTO user (fname,lname,age,phone) 
                VALUES ('$fname','$lname',$age,$phone);";
        if(!mysqli_query($this->conn,$sql)==TRUE){
            echo mysqli_error($this->conn,$sql);
        }
    }
    public function update($table_name,$fname,$age,$id){
        $sql="UPDATE $table_name
            SET fname ='$fname', age = $age
            WHERE id=$id;";
        if(mysqli_query($this->conn,$sql)==TRUE){
            echo "Data updated";
        }else{
            echo mysqli_error($this->conn,$sql);
        }
    }

    public function select($table_name,$col_name){
        $sql="SELECT * FROM $table_name";
        $data=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($data)){
           echo $row["$col_name"];
        }
    }

    public function delete($table_name,$id){
        $sql="DELETE  FROM $table_name WHERE id=$id";
        if (mysqli_query($this->conn,$sql )== TRUE){
            echo $table_name." Deleted";
        }else{
            echo mysqli_error($this->conn,$sql);
        }
    }

    public function table($table_name){
        $sql="SELECT * FROM $table_name";
        $data=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_array($data)){
            echo "
            <tbody>
        <tr>
            <th>{$row['id']}</th>
            <td>{$row['fname']} {$row['lname']}</td>
            <td>{$row['age']}</td>
            <td>{$row['phone']}</td>
        </tr>
        </tbody>";
        }




    }
}


