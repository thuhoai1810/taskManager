<?php
class user extends Database{
    function createUser($username,$pass,$fullname,$phone){
        $sql ="INSERT INTO users('name','permission','phone','zone','position','username','pass') VALUES ('{$fullname}',21,'{$phone}',6,'none','${username}','{$pass}'";
        parent::execute($sql);
    }
    function updateUser($id,$col,$data){
        $sql = "UPDATE users SET $cot = '{$data}' WHERE id=$id";
        parent::execute($sql);
    }
    function deleteUser($id){
        parent::delete('users','id',$id);
    }
    function selectAllUser(){
        return parent::getAllData('users');
    }
    function selectUserWithZone($id){
        return parent::findData('*','users','zone',$id);
    }
    function selectZoneForUser($id){
        return parent::findData('zone','users','id',$id);
    }
    function selectUserWithPermissinon($id){
        return parent::findData('permission','users','id',$id);
    }
    function login($table,$user,$pass){
        $sql = "SELECT * FROM $table WHERE user = '{$user}' AND pass = '{$pass}'";
        $result = parent::execute($sql);
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_object($result))
            {
               
                $data[]=$row;
            }	
         }
         else
         {
            $data=0;
         }
      
        return $data;
    }
}
?>