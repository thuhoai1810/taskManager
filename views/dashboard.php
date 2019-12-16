<?php require_once "models/task.php" ?>
<div class="content-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#" style="color: rgb(0, 4, 255);">Dashboad</a>
        </li>
        <li class="breadcrumb-item active" style="color: rgb(97, 97, 230);">
            Bảng phân công công việc
        </li>
        <li class="breadcrumb-item active">
            <?php switch ($zone) {
                case '1':
                    echo "Phòng kinh doanh";
                    break;
                case '2':
                    echo "Phòng công nghệ";
                    break;
                case '3':
                    echo "Toàn bộ nhân viên";
                    break;
                case '4':
                    echo "Phòng kỹ thuật";
                    break;
                case '5':
                    echo "Phòng sản xuất";
                    break;
                default:
                    echo "Chưa có phòng";
                    break;
            } ?>
        </li>
    </ol>
</div>
<div class="container-fluid">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thêm Task</button>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background-color: blue">
                <h4 class="modal-title" style="color: aliceblue;">Tạo Task Mới</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4" style="margin-top: 3%">
                        Nhân viên
                    </div>
                    <div class="col-sm-8" style="margin-top: 3%">
                        <select class="form-control" id="userChoise">
                            <?php foreach ($user as $us){ ?>
                            <option value="<?php echo $us->id ?>"><?php echo $us->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <br>
                    <div class="col-sm-4" style="margin-top: 3%">
                        Mục tiêu
                    </div>
                    <div class="col-sm-8" style="margin-top: 3%">
                        <input id="headline" type="text" class="form-control" name="msg" placeholder="">
                    </div>
                    <div class="col-sm-4" style="margin-top: 3%">
                        Mô tả
                    </div>
                    <div class="col-sm-8" style="margin-top: 5%">
                        <textarea class="form-control" id="bodyTask" rows="3"></textarea>
                    </div>
                    <div class="col-sm-4" style="margin-top: 3%">
                        Hạn hoàn thành
                    </div>
                    <div class="col-sm-8" style="margin-top: 3%">
                        <input id="datepicker1" />
                    </div>
                    
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="addTask()">Thực hiện</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 1%">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">Mã nhân viên</th>
                <th scope="col">Tên nhân viên</th>
                <th scope="col">Phòng</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Số điện thoại</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $ke) {
            ?>
            <tr>
                <th scope="row"><?php echo $ke -> id?></th>
                <td><?php echo $ke -> name ?>
                    <br>
                    <!-- <a id="myMo" style="color: blue;">Chi tiết</a> -->
                    <button type="button" class="btn btn-link" onclick="clickTaskUser(<?php echo $ke -> id ?>,'<?php echo $ke -> name ?>')">Chi
                        tiết</button>
                </td>
                <td><?php switch ($ke -> zone) {
                case '1':
                    echo "Phòng kinh doanh";
                    break;
                case '2':
                    echo "Phòng công nghệ";
                    break;
                case '3':
                    echo "Admin";
                    break;
                case '4':
                    echo "Phòng kỹ thuật";
                    break;
                case '5':
                    echo "Phòng sản xuất";
                    break;
                default:
                    echo "Chưa có phòng";
                    break;
            } ?></td>
                <td><?php echo $ke -> position ?></td>
                <td>0<?php echo $ke -> phone ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- the modal Mơ -->
<div class="modal fade" id="mymodalMo">
    <div class="modal-dialog modal-lg mw-100 w-75">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="userName"></h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="table-responsive">
                    <!-- Đang thực hiện -->
                    <table class="table table-hover" id="taskDone">
                        
                    </table>
                    <!-- Chưa thực hiện -->
                    <table class="table table-hover" id="taskIn">
                        
                    </table>
                    <!-- Đã hoàn thành -->
                    <table class="table table-hover" id="taskDis">
                        
                    </table>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script>
    $('#datepicker1').datepicker({
        uiLibrary: 'bootstrap4'
    })

    function clickTaskUser(id,name) {
        document.getElementById("userName").innerHTML = `Chi tiết công việc của ${name}`
        getTaskDone(id);
        getTaskIn(id);
        getTaskDis(id);
        $("#mymodalMo").modal();
    }
    function getTaskDone(idUser) {
        $.ajax({
            type: "POST",
            url: "controllers/taskUser.php",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {
                request: "getTaskDone",
                id: idUser
            },
            cache: false,
            success: function (html) {
                console.log(html)
                $("#taskDone").html(html);
            }
        })
    }
    function getTaskIn(idUser) {
        $.ajax({
            type: "POST",
            url: "controllers/taskUser.php",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {
                request: "getTaskIn",
                id: idUser
            },
            cache: false,
            success: function (html) {
                $("#taskIn").html(html);
            }
        })
    }
    function getTaskDis(idUser) {
        $.ajax({
            type: "POST",
            url: "controllers/taskUser.php",
            timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
            data: {
                request: "getTaskDis",
                id: idUser
            },
            cache: false,
            success: function (html) {
                $("#taskDis").html(html);
            }
        })
    }
    function addTask() {
        var userId = $("#userChoise").val();
        var headline = $("#headline").val();
        var bodyTask = $("#bodyTask").val();
        var date = $("#datepicker1").val();
        var duedate = `${date.split("/")[2]}-${date.split("/")[0]}-${date.split("/")[1]}`
        $.ajax({
            type: "POST",
            url: "controllers/newTask.php",
            data: {
                idUser: parseInt(userId),
                headline: headline,
                body: bodyTask,
                duedate: duedate
            },
            cache: false,
            success: function (data) {
                if(data == 'success'){
                    $("#myModal").modal("hide")
                    }
                }
            })
    }
</script>