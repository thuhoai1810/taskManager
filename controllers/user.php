<?php
require_once "../config/connect.php";
Database::connect();
require_once "../models/user.php";
switch ($_POST['request']) {
    case 'addUser':
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $zone = $_POST['zone'];
        $position = $_POST['position'];
        
        switch ($_POST['position']){
            case 3:
                $emty = "Phó giám đốc";
                $kpi = 20;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 4:
                $emty = "Trưởng phòng sản xuất";
                $kpi = 10;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 5:
                $emty = "Trưởng phòng kỹ thuật";
                $kpi = 10;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 6:
                $emty = "Trưởng phòng công nghệ";
                $kpi = 10;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 7:
                $emty = "Trưởng phòng kinh doanh";
                $kpi = 10;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 8:
                $emty = "Trưởng phòng nhân sự";
                $kpi = 10;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 9:
                $emty = "Nhân viên marketing";
                $kpi = 5;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 10:
                $emty = "Nhân viên sale";
                $kpi = 5;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 11:
                $emty = "Nhân viên nhân sự";
                $kpi = 5;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 12:
                $emty = "Nhân viên kỹ thuật";
                $kpi = 5;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 13:
                $emty = "Nhân viên công nghệ";
                $kpi = 5;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 14:
                $emty = "Nhân viên hành chính";
                $kpi = 5;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
            case 15:
                $emty = "Nhân viên sản xuất";
                $kpi = 5;
                user::createUser($name,$phone,$zone,$position,$emty,$kpi);
                $user = user::findUserFollowPhone($phone);
                if ($user != null) {
                    user::regiter($email,$user[0]->id);
                    echo 'true';
                } else {
                    echo 'false';
                }
                break;
        }
    break;
    
}
?>