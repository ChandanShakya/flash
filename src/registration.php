<?php
require "database_connection.php";

class crudi{
    private $con;

    public function connect(){
        $db= new Database_conn();
            $this->con = $db->getConnection();
            return $this->con;
        
        }

    public function insert($table,$item){
        $col="(";
        $vals="Values(";
        foreach($item as $key=>$value){
            $col .=$key . ",";
            $vals .= "'" .$value ."',";
        }
        $col =rtrim($col,",");
        $vals = rtrim($vals,",");
        $col .=")";
        $vals .=")";

        $query = "Insert into " .$table . $col . $vals;

        $res = mysqli_query($this->con, $query);
        if($res){
            header("Location:src/login.php");
        }
    }
}
?>