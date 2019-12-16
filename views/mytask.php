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
    <div class="table-responsive">
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
                <tr>
                    <th scope="row">1</th>
                    <td>Phân tích thị trường khu vực HN 3 tháng cuối năm
                        <br>
                        <i style="color: blue;" data-toggle="modal" data-target="#modalDetail"><u>Chi tiết</u></i>
                    </td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active progress-bar-animated"
                                role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                style="width:40%">
                                40%
                            </div>
                        </div>
                    </td>
                    <td>18/10-20/10</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Đánh giá điều chỉnh mục tiêu KPI của phòng</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active progress-bar-animated"
                                role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                style="width:60%">
                                60%
                            </div>
                        </div>
                    </td>
                    <td>18/10-20/10</td>
                </tr>
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
        <table class="table table-hover">
            <thead>
                <tr class="bg-danger" style="color: aliceblue;">
                    <th scope="col">#</th>
                    <th scope="col" style="width: 60%">Chưa thực hiện</th>
                    <th scope="col">Tiến trình</th>
                    <th scope="col">Thời hạn</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Phân tích thị trường khu vực HN 3 tháng cuối năm</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active bg-danger" role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                0%
                            </div>
                        </div>
                    </td>
                    <td>18/10-20/10</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Đánh giá điều chỉnh mục tiêu KPI của phòng</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active bg-danger" role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                0%
                            </div>
                        </div>
                    </td>
                    <td>18/10-20/10</td>
                </tr>
            </tbody>
        </table>
        <!-- Đã hoàn thành -->
        <table class="table table-hover">
            <thead>
                <tr class="bg-success" style="color: aliceblue;">
                    <th scope="col">#</th>
                    <th scope="col" style="width: 60%">Đã hoàn thành</th>
                    <th scope="col">Tiến trình</th>
                    <th scope="col">Thời hạn</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Phân tích thị trường khu vực HN 3 tháng cuối năm</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                100%
                            </div>
                        </div>
                    </td>
                    <td>18/10-20/10</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Đánh giá điều chỉnh mục tiêu KPI của phòng</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                100%
                            </div>
                        </div>
                    </td>
                    <td>18/10-20/10</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>