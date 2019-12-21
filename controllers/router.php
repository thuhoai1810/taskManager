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