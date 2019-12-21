<?php require_once "models/task.php"; ?>
<!-- breadcrumb -->
<div class="content-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#" style="color: rgb(0, 4, 255);">MY TASK</a>
        </li>
    </ol>
</div>
<div class="container-fluid">
    <!-- table -->
    <div class="row">
        <div class="col-xl-6 col-sm-6 pr-4">
            <div class="card o-hidden mt-2">
                <div class="card-body">
                    <h5>Chỉ số KPI hoàn thành</h5>
                    <span><?php echo round($kpiAll, 2) ?> % / 100%</span>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 pl-4">
            <div class="card o-hidden mt-2">
                <div class="card-body">
                    <h5>Thu nhập cá nhân</h5>
                    <span><?php echo number_format($salary) ?> VNĐ / <?php echo number_format((int)$basicSalary) ?> VNĐ</span>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-3">
        <!-- Đang thực hiện -->
        <table class="table table-hover">
            <thead>
                <tr class="bg-primary" style="color: aliceblue;">
                    <th scope="col">#</th>
                    <th scope="col" style="width: 60%">Đang tiến hành</th>
                    <th scope="col">Tiến trình</th>
                    <th scope="col">Thời hạn</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($taskIn as $ti){ ?>
                <tr>
                    <th scope="row"><?php echo $ti -> id  ?></th>
                    <td><?php echo $ti -> headline ?>
                        <br>
                        <i style="color: blue;" data-toggle="modal" data-target="#modalDetail"><u>Chi tiết</u></i>
                    </td>
                    <td>
                        <?php task::progress1($ti -> id)  ?>
                    </td>
                    <td><?php echo $ti -> duedate ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <!-- Modal Detail -->
        <div class="modal fade" id="modalDetail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Phân tích thị trường khu vực HN 3 tháng cuối năm </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Chưa thực hiện -->
        <table class="table table-hover" id="">
            <thead>
                <tr class="bg-danger" style="color: aliceblue;">
                    <th scope="col">#</th>
                    <th scope="col" style="width: 60%">Chưa thực hiện</th>
                    <th scope="col">Tiến trình</th>
                    <th scope="col">Thời hạn</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($task as $t){ ?>
                <tr>
                    <th scope="row"><?php echo $t->id ?></th>
                    <td><?php echo $t->headline ?>
                    <br>
                        <i style="color: blue;" data-toggle="modal" data-target="#modalDetail"><u>Chi tiết</u></i>
                    </td>
                    <td>
                    <?php task::progress1($t -> id)  ?>
                    </td>
                    <td><?php echo $t -> duedate ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <!-- Đã hoàn thành -->
        <table class="table table-hover" id="">
            <thead>
                <tr class="bg-success" style="color: aliceblue;">
                    <th scope="col">#</th>
                    <th scope="col" style="width: 60%">Đã hoàn thành</th>
                    <th scope="col">Tiến trình</th>
                    <th scope="col">Thời hạn</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($taskDone as $tD){ ?>
                <tr>
                    <th scope="row"><?php echo $tD -> id ?></th>
                    <td><?php echo $tD -> headline ?>
                    <br>
                        <i style="color: blue;" data-toggle="modal" data-target="#modalDetail"><u>Chi tiết</u></i>
                    </td>
                    <td>
                        <?php task::progress1($tD -> id)  ?>
                    </td>
                    <td><?php echo $tD->duedate ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>