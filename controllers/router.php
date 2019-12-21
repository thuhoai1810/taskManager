<?php
require_once("models/task.php");
require_once("models/user.php");
if (isset($_GET['controller'])) {
    $điềuhướng = $_GET['controller'] ;
    if (isset($_GET['action'])) {
        $hànhđộng = $_GET['action'];
    } else {
        $hànhđộng = "index";
    }
    
 } else {
    $điềuhướng="page";
    $hànhđộng="home";
 }
 switch ($điềuhướng) {
    case 'mytask':
        $userId = $_SESSION['id']->user_id;
        $userKpi = user::selectUserWithId($userId);
        $basicSalary = $userKpi[0] -> money;
        $taskDone = task::selectUserTaskState($userId,2);
        $taskIn = task::selectUserTaskState($userId,1);
        $task = task::selectUserTaskState($userId,0);
        $kpiIn = 0;
        $kpiDone = 0;
        $kpiMiss = 0;
        foreach ($taskDone as $key) {
            $kpiDone += 100 * $key -> level;
        }
        foreach ($taskIn as $ti) {
            $allTask = task::countTask($ti->id,3);
            $taskD = task::countTask($ti->id,2);
            if (count($allTask) == 0) {
                $kpiIn += 0;
            } else {
                $percent = ((count($taskD)/count($allTask))*100) * $ti->level;
                $kpiIn += $percent;
            }
        }
        foreach ($task as $t) {
            $allTask = task::countTask($t->id,3);
            $taskD = task::countTask($t->id,2);
            if (count($allTask) == 0) {
                $kpiMiss += 0;
            } else {
                $percent1 = ((count($taskD)/count($allTask))*100) * $t->level;
                $kpiMiss += $percent1;
            }
        }
        $kpiAll = ($kpiIn + $kpiDone + $kpiMiss)/$userKpi[0]->kpi;
        $salary = ((int)$basicSalary * $kpiAll)/100;
        require_once "views/mytask.php";
        break;
    case 'dashboard':
        $zone = $_GET['zone'];
        $user = user::selectUserWithZone($zone);
        require_once 'views/dashboard.php';
        break;
    default:
        $userId = $_SESSION['id']->user_id;
        $taskDone = task::selectUserTaskState($userId,2);
        $taskIn = task::selectUserTaskState($userId,1);
        $task = task::selectUserTaskState($userId,0);
        require_once 'views/main.php';
        break;
 }
?>