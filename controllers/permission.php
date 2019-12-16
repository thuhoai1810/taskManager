<?php
require_once("models/user.php");
$id = $_SESSION['id']->user_id;
$id = (int)$id;
$permiss = user::selectUserWithPermissinon($id);
$zone = user::selectZoneForUser($id);
$p = (int)$permiss[0]->permission;
$z = (int)$zone[0]->zone;
if ($p <= 3) {
    echo "<li class='nav-item'>
                <a class='nav-link' href='index.php?controller=dashboard&zone={$z}'>Danh sách nhân viên</a>
            </li>
            <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' id='navbarDropdown' href='#' role='button' data-toggle='dropdown' aria-haspopup'true' aria-expanded='false'>
          Phòng ban
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          <a class='dropdown-item' href='index.php?controller=dashboard&zone=1'>Phòng kinh doanh</a>
          <a class='dropdown-item' href='index.php?controller=dashboard&zone=2'>Phòng công nghệ</a>
          <a class='dropdown-item' href='index.php?controller=dashboard&zone=4'>Phòng kỹ thuật</a>
          <a class='dropdown-item' href='index.php?controller=dashboard&zone=5'>Phòng sản xuất</a>
          <div class='dropdown-divider'></div>
          <a class='dropdown-item' href='index.php?controller=dashboard&zone=3'>Phòng giám đốc</a>
          <a class='dropdown-item' href='index.php?controller=dashboard&zone=6'>Nhân viên chưa vào phòng ban</a>
        </div>
      </li>";
}else if($p > 3 && $p <= 8){
    echo "<li class='nav-item'>
    <a class='nav-link' href='index.php?controller=dashboard&zone={$z}'>Danh sách nhân viên</a>
</li>
<li class='nav-item dropdown'>";
}else{
    echo '';
}
?>