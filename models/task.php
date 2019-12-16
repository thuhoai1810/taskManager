<?php
class task extends Database{
    function createTask($headline,$body,$duadate){
        $sql = "INSERT INTO tasks(headline,body,duedate,state,parent) VALUES ('{$headline}','{$body}','{$duadate}', 1, 0)";
        parent::execute($sql);
    }
    function createTaskChild($id,$body,$headline,$duedate){
        $sql = "INSERT INTO tasks(headline,body,duedate,state,parent) VALUES ('{$headline}','{$body}','{$duedate}', 1, $id)";
        parent::execute($sql);
    }
    function createTaskUser($idTask,$idUser)
    {
        $sql = "INSERT INTO user_task(userId,taskId) VALUES ($idUser,$idTask)";
        parent::execute($sql);
    }
    function selectTaskId($id)
    {
        $result = parent::execute("SELECT * FROM tasks WHERE id = $id");
        if (mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_object($result)){
                $data[]=$row;
            }
        } else {
            $data = [];
        }
        return $data;
    }
    function selectTaskFollowBody($body){
        $result = parent::execute("SELECT id FROM tasks WHERE body = '{$body}'");
        if (mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_object($result)){
                $data[]=$row;
            }
        } else {
            $data = [];
        }
        return $data;
    }
    function updateTask($id,$col,$data){
        $sql = "UPDATE tasks SET $col = '{$data}' WHERE id = $id";
        parent::execute($sql);
    }
    function updateStateTask($id,$state){
        $sql = "UPDATE tasks SET state = $state WHERE id = $id";
        parent::execute($sql);
    }
    function deleteTask($id){
        parent::delete('tasks','id',$id);
    }
    function selectAllTask(){
        return parent::getAllData('tasks');
    }
    function selectUserTaskState($id,$state){
        $result = parent::execute("SELECT * FROM tasks INNER JOIN user_task on tasks.id = user_task.taskId WHERE user_task.userId = $id AND tasks.state = $state AND tasks.parent = 0");
        if (mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_object($result)){
                $data[]=$row;
            }
        } else {
            $data = [];
        }
        return $data;
    }
    function selectUserTaskDone($id){
        $taskDone = self::selectUserTaskState($id,2);
        foreach ($taskDone as $td) {
            echo "tr>
            <th scope='row'>".$td->id."</th>
            <td>".$td->headline."</td>
            <td>
                <div class='progress'>
                    <div class='progress-bar progress-bar-striped'
                        role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'
                        style='width:100%'>
                        100%
                    </div>
                </div>
            </td>
            <td>".$td->duedate."</td>
        </tr>";
        }
    }
    function selectUserTaskIn($id)
    {
        $taskIn = self::selectUserTaskState($id,1);
        foreach ($taskIn as $ti) {
        echo "
                <tr>
                    <th scope='row'>".$ti->id."</th>
                    <td>
                            ".$ti->headline."
                        </div>
                    </td>
                    <td>
                        <div class='progress'>
                            <div class='progress-bar progress-bar-striped'
                                role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100'
                                style='width:40%'>
                                40%
                            </div>
                        </div>
                    </td>
                    <td>".$ti->duedate."</td>
                </tr>";
        }
    }
    function selectUserTaskDis($id)
    {
        $taskDis = self::selectUserTaskState($id,0);
        foreach ($taskDis as $td) {
            echo "<tr>
            <th scope='row'>".$td->id."</th>
            <td>".$td->headline."</td>
            <td>
                <div class='progress'>
                    <div class='progress-bar progress-bar-striped' role='progressbar' aria-valuenow='20'
                        aria-valuemin='0' aria-valuemax='100' style='width:20%'>
                        20%
                    </div>
                </div>
            </td>
            <td>".$td->duedate."</td>
        </tr>";
        }
    }
    function selectTaskFollowParent($id)
    {
        $result = parent::execute("SELECT * FROM tasks WHERE parent = $id");
        if (mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_object($result)){
                $data[]=$row;
            }
        } else {
            $data = [];
        }
        return $data;
    }
    function returnTaskChild($id)
    {
       $taskChild = self::selectTaskFollowParent($id);
       if (count($taskChild) == 0) {
           echo "<tr style='margin: 3%'><td>
                Chưa phân nhỏ công việc cần làm
           </td></tr>";
       }else{
        foreach($taskChild as $tC){
            if ($tC->state == 1) {
             echo "
             <tr style='margin: 3%'>
             <td>
                 <div class='checkbox'>
                 <button type='button' onclick='taskFinish(".$tC->id.",".$tC->parent.")' class='btn btn-outline-light text-dark'><i class='far fa-check-circle'></i></button><label class='ml-2'>".$tC->body."</label>
                 </div>
             </td>
         </tr>
             ";
            }elseif ($tC->state == 2) {
             echo "
             <tr style='margin: 3%'>
             <td>
                 <div class='checkbox'>
                 <button type='button' onclick='taskNoneFinish(".$tC->id.",".$tC->parent.")' class='btn btn-outline-light text-success'><i class='far fa-check-circle'></i></button><label class='ml-2'>".$tC->body."</label>
                 </div>
             </td>
         </tr>
             ";
            }
            
        }
       }
    }
}
?>