<?php
require "conn.php";

class save{
    private $con;

    public function connect(){
        $db= new Database_conn();
            $this->con = $db->getConnection();
            return $this->con;
        
        }

    public function insert_result($table,$item){
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

        $resu = mysqli_query($this->con, $query);
        if($resu){
            header("Location:result.php");
        }
    }

    public function insert_test($table,$item){
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

        $resul = mysqli_query($this->con, $query);
        if($resul){
            header("Location:result.php");
        }
    }
}
?>