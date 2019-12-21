<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/task.php";
task::createTask($_POST['headline'],$_POST['body'],$_POST['duedate'],$_POST['level']);
//return var_dump($_POST['body'])
$task = task::selectTaskFollowBody($_POST['body']);
$iTask = $task[0]->id;
$iTask = (int)$iTask;
$idUser = (int)$_POST['idUser'];
//return var_dump($idUser)
task::createTaskUser($iTask,$idUser);
echo "success"
?>