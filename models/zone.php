<?
class zone extends Database{
    function selectZone(){
        return parent::getAllData('zones');
    }
    function updateZone($id,$col,$data){
        $sql = "UPDATE zones SET $cot = '{$data}' WHERE id=$id";
        parent::execute($sql);
    }
    function deleteZone($id){
        parent::delete('zones','id',$id);
    }
}
?>