<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/task.php";
switch ($_POST['request']) {
    case 'getTaskChild':
        $id = $_POST['id'];
        $id = (int)$id;
        $allTask = task::countTask($id,3);
        $taskDone = task::countTask($id,2);
        $countT = count($allTask);
        $counTd = count($taskDone);
        if ($countT === 0) {
            $percent = 0;
        } else {
            $percent = ($counTd/$countT)*100;
        }
        
        echo "
            <div class='modal-body'>
                <div class='row'>
                    <div class='col-sm-6'>
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <h5>Danh sách công việc cần làm</h5>
                                    </th>
                                </tr>
                            </thead>
            ";
            task::returnTaskChild($id);
        echo "</table>
            </div>
                <div class='col-sm-6'>
                    <div class='form-group'>
                        <label for='comment'>
                            <h5>Thêm mục tiêu cần làm</h5>
                        </label>
                        <textarea class='form-control' rows='5' id='bodyTask' name='text'></textarea>
                    </div>
                    <button class='btn btn-primary' onclick='addTaskChild(".$id.")'>Thêm công việc</button>
                </div>
            </div>
        </div>
        <div class='progress' style='margin: 5%'>
                        <div class='progress-bar progress-bar-striped active progress-bar-animated' role='progressbar'
                            aria-valuenow='".$percent."' aria-valuemin='0' aria-valuemax='100' style='width:".$percent."%'>
                            ".$percent."%
                        </div>
                    </div>";
        break;
    case 'addTakChild':
        $id = $_POST['id'];
        $id = (int)$id;
        $body  = $_POST['body'];
        $taskParent = task::selectTaskId($id);
        //var_dump($taskParent);
        $headline = $taskParent[0]->headline;
        $duedate = $taskParent[0]->duedate;
        task::createTaskChild($id,$body,$headline,$duedate);
        break;
    case 'updateStateTask':
        $id = $_POST['id'];
        $id = (int)$id;
        $state = $_POST['state'];
        $state = (int)$state;
        $parent = $_POST['parent'];
        $parent = (int)$parent;
        task::updateStateTask($id,$state);
        $allTask = task::countTask($parent,3);
        $taskDone = task::countTask($parent,2);
        $countT = count($allTask);
        $counTd = count($taskDone);
        if ($countT === 0) {
            $percent = 0;
        } else {
            $percent = ($counTd/$countT)*100;
            if ($percent == 100) {
                task::updateTask($parent,'state',2);
            }
        }
        echo "
        <div class='modal-body'>
            <div class='row'>
                <div class='col-sm-6'>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <h5>Danh sách công việc cần làm</h5>
                                </th>
                            </tr>
                        </thead>
            ";
        task::returnTaskChild($parent);
        echo "</table>
            </div>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label for='comment'>
                        <h5>Thêm mục tiêu cần làm</h5>
                    </label>
                    <textarea class='form-control' rows='5' id='bodyTask' name='text'></textarea>
                </div>
                <button class='btn btn-primary' onclick='addTaskChild(".$id.")'>Thêm công việc</button>
            </div>
        </div>
        <div class='progress' style='margin: 5%'>
            <div class='progress-bar progress-bar-striped active progress-bar-animated' role='progressbar'
                aria-valuenow='".$percent."' aria-valuemin='0' aria-valuemax='100' style='width:".$percent."%'>
                    ".$percent."%
            </div>
        </div>";
        break;
}
?>