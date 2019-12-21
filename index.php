<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
require_once "config/connect.php";
Database::connect();
if (!isset($_SESSION['id'])) {
	 header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>INPG Pharma</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="views/js/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="views/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="views/css/style.css">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-primary bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
      aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="index.php">INPG PHARMA</a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?controller=mytask">MY TASK <span class="sr-only">(current)</span></a>
        </li>
        <?php
        require_once "controllers/permission.php";
        ?>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item  no-arrow mx-1">
          <a class="nav-link" href="#" role="button">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
        </li>
        <li class="nav-item  no-arrow mx-1">
          <a class="nav-link" href="#" role="button">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
        </li>
        <li class="nav-item no-arrow mx-1">
          <a href="#" class="nav-link"><?php echo $_SESSION['id']->user?></a>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bạn thực sự muốn rời đi</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="controllers/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
  <?php
        require_once "controllers/router.php";
        ?>
  <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg mw-100 w-75">
                <div class="modal-content">
                    <div class='modal-header'>
                        <h4 class='modal-title' id="taskName"></h4>
                        <button type='button' class='close' data-dismiss='modal'>×</button>
                    </div>
                    <div id="detailTask">

                    </div>
                    <!-- Modal Header -->
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Hoàn thành</button>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    $('#datepicker1').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#datepicker2').datepicker({
        uiLibrary: 'bootstrap4'
    });
    function detailTask(id,headline) {
        document.getElementById("taskName").innerHTML = headline
        getTaskChild(id)
        $("#myModal").modal();
    };

    function detailT(id) {
        $.ajax({
          type: "POST",
            url: "controllers/taskUser.php",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {
                request: "getTaskId",
                id: id
            },
            cache: false,
            success: function (html) {
              document.getElementById("taskName").innerHTML = html
              getTaskChild(id)
              $("#myModal").modal();
            }
        })
    }

    function getTaskChild(id) {
        $.ajax({
            type: "POST",
            url: "controllers/taskChild.php",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {
                request: "getTaskChild",
                id: id
            },
            cache: false,
            success: function (html) {
                $("#detailTask").html(html);
            }
        })
    };

    function addTaskChild(id) {
        var body = $("#bodyTask").val()
        console.log(body)
        $.ajax({
            type: "POST",
            url: "controllers/taskChild.php",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {
                request: "addTakChild",
                id: id,
                body:body
            },
            cache: false,
            success: function (data) {
                getTaskChild(id)
            }
        })
    };

    function taskFinish(id,parent) {
        $.ajax({
            type: "POST",
            url: "controllers/taskChild.php",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {
                request: "updateStateTask",
                id: id,
                parent:parent,
                state: 2
            },
            cache: false,
            success: function (html) {
                $("#detailTask").html(html);
            }
        })
    }

    function taskNoneFinish(id,parent) {
        $.ajax({
            type: "POST",
            url: "controllers/taskChild.php",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {
                request: "updateStateTask",
                id: id,
                parent:parent,
                state:1
            },
            cache: false,
            success: function (html) {
                $("#detailTask").html(html);
            }
        })
    }
</script>
</html>