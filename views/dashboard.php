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
                    echo "Danh sách quản lý";
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Thêm Task</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newEmploye">Thêm nhân viên</button>
</div>
<div class="modal fade" id="myModal1">
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
                        Công việc
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
                        Mục tiêu
                    </div>
                    <div class="col-sm-8" style="margin-top: 3%">
                        <select class="form-control" id="level">
                            <option value="1">
                                <?php switch ($zone) {
                                    case '1':
                                        echo "Đạt doanh số 10.000.000 VNĐ";
                                        break;
                                    case '2':
                                        echo "Độ khó 1";
                                        break;
                                    case '3':
                                        echo "KPI quản lý 1";
                                        break;
                                    case '4':
                                        echo "Độ khó 1";
                                        break;
                                    case '5':
                                        echo "Độ ưu tiên thấp";
                                        break;
                                } ?>
                            </option>
                            <option value="2">
                                <?php switch ($zone) {
                                    case '1':
                                        echo "Đạt doanh số 20.000.000 VNĐ";
                                        break;
                                    case '2':
                                        echo "Độ khó 2";
                                        break;
                                    case '3':
                                        echo "KPI quản lý 2";
                                        break;
                                    case '4':
                                        echo "Độ khó 2";
                                        break;
                                    case '5':
                                        echo "Độ ưu tiên trung bình";
                                        break;
                                } ?>
                            </option>
                            <option value="3">
                                <?php switch ($zone) {
                                    case '1':
                                        echo "Đạt doanh số 30.000.000 VNĐ";
                                        break;
                                    case '2':
                                        echo "Độ khó 3";
                                        break;
                                    case '3':
                                        echo "KPI quản lý 3";
                                        break;
                                    case '4':
                                        echo "Độ khó 3";
                                        break;
                                    case '5':
                                        echo "Độ ưu tiên vừa";
                                        break;
                                } ?>
                            </option>
                            <option value="4">
                                <?php switch ($zone) {
                                    case '1':
                                        echo "Đạt doanh số 40.000.000 VNĐ";
                                        break;
                                    case '2':
                                        echo "Độ khó 4";
                                        break;
                                    case '3':
                                        echo "KPI quản lý 4";
                                        break;
                                    case '4':
                                        echo "Độ khó 4";
                                        break;
                                    case '5':
                                        echo "Độ ưu tiên cao";
                                        break;
                                } ?>
                            </option>
                            <option value="5">
                                <?php switch ($zone) {
                                    case '1':
                                        echo "Đạt doanh số 50.000.000 VNĐ";
                                        break;
                                    case '2':
                                        echo "Độ khó 5";
                                        break;
                                    case '3':
                                        echo "KPI quản lý 5";
                                        break;
                                    case '4':
                                        echo "Độ khó 5";
                                        break;
                                    case '5':
                                        echo "Độ ưu tiên cực cao (cần gấp)";
                                        break;
                                } ?>
                            </option>
                        </select>
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
<div class="modal fade" id="newEmploye">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background-color: blue">
                <h4 class="modal-title" style="color: aliceblue;">Thêm nhân viên mới vào phòng</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4" style="margin-top: 3%">
                        <p>Họ và tên</p>
                    </div>
                    <div class="col-sm-8" style="margin-top: 3%">
                        <input type="text" class="form-control" id="name" placeholder="Nhập tên" name="fname">
                    </div>
                    <div class="col-sm-4" style="margin-top: 3%">
                        <p>Số điện thoại</p>
                    </div>
                    <div class="col-sm-8" style="margin-top: 3%">
                        <input type="tel" class="form-control" id="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                                required placeholder="Nhập số điện thoại" name="telephone">
                    </div>
                    <div class="col-sm-4" style="margin-top: 3%">
                        <p>Email</p>
                    </div>
                    <div class="col-sm-8" style="margin-top: 3%">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="col-sm-4" style="margin-top: 3%">
                        <p>Phòng</p>
                    </div>
                    <div class="col-sm-8" style="margin-top: 3%">
                        <select class="form-control" id="sel1" name="sellist1">
                            <option value="1">Phòng Kinh doanh</option>
                            <option value="2">Phòng Công nghệ</option>
                            <option value="3">Phòng Nhân sự</option>
                            <option value="4">Phòng Kỹ thuật</option>
                            <option value="5">Phòng sản xuất</option>
                        </select>
                    </div>  
                    <div class="col-sm-4" style="margin-top: 3%">
                        <p>Vị trí</p>
                    </div>
                    <div class="col-sm-8" style="margin-top: 3%">
                        <select class="form-control" id="sel2" name="sellist1">
                            <option value="3">Phó giám đốc</option>
                            <option value="4">Trưởng phòng (P.sản xuất)</option>
                            <option value="5">Trưởng phòng (P.kỹ thuật)</option>
                            <option value="6">Trưởng phòng (P.công nghệ)</option>
                            <option value="7">Trưởng phòng (P.kinh doanh)</option>
                            <option value="8">Trưởng phòng (P.nhân sự)</option>
                            <option value="9">Nhân viên marketing</option>
                            <option value="10">Nhân viên sale</option>
                            <option value="11">Nhân viên nhân sự</option>
                            <option value="12">Nhân viên kỹ thuật</option>
                            <option value="13">Nhân viên công nghệ</option>
                            <option value="14">Nhân viên hành chính</option>
                            <option value="15">Nhân viên sản xuất</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="addUser()">Thực hiện</button>
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
                    <button type="button" class="btn btn-link"
                        onclick="clickTaskUser(<?php echo $ke -> id ?>,'<?php echo $ke -> name ?>')">Chi
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
                <td><?php echo $ke -> phone ?></td>
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

    function clickTaskUser(id, name) {
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
        var duedate = `${date.split("/")[2]}-${date.split("/")[0]}-${date.split("/")[1]}`;
        var level = $("#level").val();
        $.ajax({
            type: "POST",
            url: "controllers/newTask.php",
            data: {
                idUser: parseInt(userId),
                headline: headline,
                body: bodyTask,
                duedate: duedate,
                level: parseInt(level)
            },
            cache: false,
            success: function (data) {
                if (data == 'success') {
                    $("#myModal1").modal("hide")
                }
            }
        })
    }

    function addUser() {
        var name = $("#name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var zone = $("#sel1").val();
        var position = $("#sel2").val();
        $.ajax({
            type: "POST",
            url: "controllers/user.php",
            data: {
                request: "addUser",
                name: name,
                phone: phone,
                email: email,
                zone: parseInt(zone),
                position: parseInt(position)
            },
            cache: false,
            success: function (data) {
                console.log(data)
                $("#newEmploye").modal("hide")
            }
        })
    }
</script>