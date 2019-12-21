<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/task.php";
switch ($_POST['request']) {
    case 'getTaskDone':
        $id = $_POST['id'];
        $id = (int)$id;
        echo "<thead>
        <tr class='bg-success' style='color: aliceblue;'>
            <th scope='col'>#</th>
            <th scope='col' style='width: 60%'>Task đã hoàn thành</th>
            <th scope'col'>Tiến trình</th>
            <th scope='col'>Thời hạn</th>
        </tr>
    </thead>";
        echo "<tbody>";
        task::selectUserTaskDone($id);
        echo "</tbody>";
        break;
    case 'getTaskIn':
        $id = $_POST['id'];
        $id = (int)$id;
        echo "<thead>
        <tr class='bg-primary' style='color: aliceblue;'>
            <th scope='col'>#</th>
            <th scope='col' style='width: 60%'>Task đang tiến hành</th>
            <th scope'col'>Tiến trình</th>
            <th scope='col'>Thời hạn</th>
        </tr>
    </thead>";
        echo "<tbody>";
        task::selectUserTaskIn($id);
        echo "</tbody>";
        break;
    case 'getTaskDis':
        $id = $_POST['id'];
        $id = (int)$id;
        echo "<thead>
        <tr class='bg-danger' style='color: aliceblue;'>
            <th scope='col'>#</th>
            <th scope='col' style='width: 60%'>Task quá hạn</th>
            <th scope'col'>Tiến trình</th>
            <th scope='col'>Thời hạn</th>
        </tr>
    </thead>";
        echo "<tbody>";
        task::selectUserTaskDis($id);
        echo "</tbody>";
        break;
    case 'getTaskId':
        $task = task::selectTaskId((int)$_POST['id']);
        echo $task[0]->headline;
        break;
}
?>