<?php
class user extends Database{
    function createUser($name,$phone,$zone,$permiss,$position,$kpi,$salary){
        $sql ="INSERT INTO users(name,permission,phone,zone,position,kpi,money) VALUES ('{$name}',$permiss,'{$phone}',$zone,'${position}',$kpi,'{$salary}')";
        parent::execute($sql);
    }
    function regiter($user,$id){
        $sql ="INSERT INTO login(user,pass,user_id) VALUES ('{$user}','tunt',$id)";
        parent::execute($sql);
    }
    function updateUser($id,$col,$data){
        $sql = "UPDATE users SET $cot = '{$data}' WHERE id=$id";
        parent::execute($sql);
    }
    function findUserFollowPhone($phone){
        $result = self::execute("SELECT * From users where phone = '{$phone}'");
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_object($result)) {
                $data[]=$row;
            }
          } else {
                $data= [];
          }
          return $data;
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
    function selectUserWithId($id)
    {
        return parent::findData('*','users','id',$id);
    }
}
?>