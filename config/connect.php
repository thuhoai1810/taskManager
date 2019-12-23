<?php
class Database
{
    private static $dbc;   
    public static function connect(){
        self::$dbc = mysqli_connect('sql309.freevnn.com','freev_24965053','12051997','freev_24965053_taskmanager');
        if (!self::$dbc) {
           echo "k thể kết nối database";
        } else {
           mysqli_set_charset(self::$dbc,'utf8');
        }
        return self::$dbc;
    }
    public function execute($sql){
        $result = self::$dbc->query($sql);
        return $result;
    }
    public function getAllData($table){
        $result= self::execute("SELECT * FROM $table");
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_object($result))
            {
               
                $data[]=$row;
            }	
         }
         else
         {
            $data=[];
         }
      
        return $data;
    }
    public function choiseData($cot,$table){
        $result = self::execute("SELECT $cot From $table");
        if (mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_object($result)){
                $data[]=$row;
            }
        } else {
            $data = [];
        }
        return $data;
    }
    public function findData($col,$table,$cause,$limit){
        $result = self::execute("SELECT $col From $table where $cause = '{$limit}'");
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_object($result)) {
                $data[]=$row;
            }
          } else {
                $data= [];
          }
          return $data;
    }
    public function findDataLimit($col,$table,$cause,$limit,$number){
          $result = self::execute("SELECT $col FROM $table WHERE $cause = $limit LIMIT $number");
          if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_object($result)) {
                $data[]=$row;
            }
          } else {
                $data=[];
          }
          return $data;
    }
    public function searchData($col,$table,$cause,$giatri){
        $result = self::execute("SELECT $col FROM $table WHERE $cause LIKE %$giatri%");
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_object($result)){
                $data[]=$row;
            }
        } else {
            $data=[];
        }
        return $data;
    }
    public function costTime($col,$table,$time){
        $sql = "SELECT $col FROM $table ORDER BY $time DESC";
        $result = self::execute($sql);
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_object($result)) {
            $data[]=$row;
            }
        } else {
            $data=[];
        }
        return $data;
    }
    public function delete($table,$cot,$id){
        $sql = "DELETE FROM $table WHERE $cot=$id";
        return self::execute($sql);     
    }
}
?>