<?php
class task extends Database{
    function createTask($headline,$body,$duadate,$level){
        $sql = "INSERT INTO tasks(headline,body,duedate,state,parent,level) VALUES ('{$headline}','{$body}','{$duadate}', 1, 0, $level)";
        parent::execute($sql);
    }
    function createTaskChild($id,$body,$headline,$duedate){
        $sql = "INSERT INTO tasks(headline,body,duedate,state,parent,level) VALUES ('{$headline}','{$body}','{$duedate}', 1, $id, 0)";
        parent::execute($sql);
    }
    function createTaskUser($idTask,$idUser){
        $sql = "INSERT INTO user_task(userId,taskId) VALUES ($idUser,$idTask)";
        parent::execute($sql);
    }
    function selectTaskId($id){
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
        $sql = "UPDATE tasks SET $col = $data WHERE id = $id";
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
            <td>".$td->headline." <button type='button' class='btn float-right'><i class='fas fa-caret-down' onclick='detailT(".$td->id.")'></i></button></td>
            <td>
                ".self::progress($td->id)."
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
                            <button type='button' class='btn float-right'><i class='fas fa-caret-down' onclick='detailT(".$ti->id.")'></i></button>
                    </td>
                    <td>
                    ".self::progress($ti->id)."
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
            <td>".$td->headline."
            <button type='button' class='btn float-right'><i class='fas fa-caret-down' onclick='detailT(".$td->id.")'></i></button>
            </td>
            <td>
                ".self::progress($td->id)."
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
    function countTask($id,$state)
    {
        if ($state === 3) {
            $sql = "SELECT * FROM tasks WHERE parent = $id";
            $result = parent::execute($sql);
            if (mysqli_num_rows($result)>0) {
                while($row = mysqli_fetch_object($result)){
                    $data[]=$row;
                }
            } else {
                $data = [];
            }
            return $data;
        } else {
            $sql = "SELECT * FROM tasks WHERE parent = $id AND state = $state";
            $result = parent::execute($sql);
            if (mysqli_num_rows($result)>0) {
                while($row = mysqli_fetch_object($result)){
                    $data[]=$row;
                }
            } else {
                $data = [];
            }
            return $data;
        }
        
    }
    function progress($id)
    {
        $allTask = self::countTask($id,3);
        $taskDone = self::countTask($id,2);
        $countT = count($allTask);
        $counTd = count($taskDone);
        if ($countT === 0) {
            $percent = 0;
            return "
        <div class='progress'>
                        <div class='progress-bar progress-bar-striped active progress-bar-animated' role='progressbar'
                            aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width:0%'>
                            0%
                        </div>
                    </div>";
        } else {
            $percent = ($counTd/$countT)*100;
            return "
        <div class='progress'>
                        <div class='progress-bar progress-bar-striped active progress-bar-animated' role='progressbar'
                            aria-valuenow='".round($percent, 1)."' aria-valuemin='0' aria-valuemax='100' style='width:".round($percent, 1)."%'>
                            ".round($percent, 1)."%
                        </div>
                    </div>";
        }
        
    }
    function progress1($id)
    {
        $allTask = self::countTask($id,3);
        $taskDone = self::countTask($id,2);
        $countT = count($allTask);
        $counTd = count($taskDone);
        if ($countT === 0) {
            $percent = 0;
            echo "
        <div class='progress'>
                        <div class='progress-bar progress-bar-striped active progress-bar-animated' role='progressbar'
                            aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width:0%'>
                            0%
                        </div>
                    </div>";
        } else {
            $percent = ($counTd/$countT)*100;
            echo "
        <div class='progress'>
                        <div class='progress-bar progress-bar-striped active progress-bar-animated' role='progressbar'
                            aria-valuenow='".round($percent, 1)."' aria-valuemin='0' aria-valuemax='100' style='width:".round($percent, 1)."%'>
                            ".round($percent, 1)."%
                        </div>
                    </div>";
        }
        
    }
}
?>