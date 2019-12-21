<div class="content-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#" style="color: blue;">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" style="color: rgb(146, 146, 245);">My Task</li>
    </ol>
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-4 col-sm-6 mb-4">
                <div class="card text-white bg-warning o-hidden">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-list mr-2"></i><?php echo sizeOf($taskIn) ?> task đang nhận
                        </div>
                    </div>
                </div>
                <?php foreach($taskIn as $tI) {
                        ?>
                <div class="card o-hiddeen mt-2">
                    <div class="card-body">
                        <h5><?php echo $tI->headline ?></h5>
                        <p>Nội dung công viêc: <?php echo $tI->body ?></p>
                    </div>
                    <div class="card-footer">
                        <span>DeadLine: <?php echo $tI->duedate ?></span>
                        <button type="button" class="btn float-right"
                            onclick="detailTask(<?php echo $tI->id ?>,'<?php echo $tI->headline ?>')"><i
                                class="fas fa-plus"></i></button>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <!-- Logout Modal-->
            <div class="col-xl-4 col-sm-6 mb-4">
                <div class="card text-white bg-success o-hidden">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart mr-2"></i><?php echo sizeOf($taskDone) ?> task hoàn
                            thành
                        </div>
                    </div>
                </div>
                <?php 
                                foreach($taskDone as $tD){
                            ?>
                <div class="card o-hidden mt-2">
                    <div class="card-body">
                        <h5><?php echo $tD->headline ?></h5>
                        <span>Nội dung công việc: <?php echo $tD->body ?></span>
                    </div>
                    <div class="card-footer">
                        <span>DeadLine: <?php echo $tD->duedate ?></span>
                        <button type="button" class="btn float-right"
                            onclick="detailTask(<?php echo $tD->id ?>,'<?php echo $tD->headline ?>')"><i
                                class="fas fa-plus"></i></button>
                    </div>
                </div>
                <?php
                        }
                    ?>
            </div>
            <div class="col-xl-4 col-sm-6 mb-4">
                <div class="card text-white bg-danger o-hidden">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring mr-2"></i><?php echo sizeOf($task) ?> task hết hạn
                        </div>
                    </div>
                </div>
                <?php 
                    foreach($task as $t){
                ?>
                <div class="card o-hidden mt-2">
                    <div class="card-body">
                        <h5><?php echo $t->headline ?></h5>
                        <span>Nội dung công việc: <?php echo $t->body ?></span>
                    </div>
                    <div class="card-footer">
                        <span>DeadLine: <?php echo $t->duedate ?></span>
                        <button type="button" class="btn float-right"
                            onclick="detailTask(<?php echo $t->id ?>,'<?php echo $t->headline ?>')"><i
                                class="fas fa-plus"></i></button>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <!-- modal cong viec -->
        
    </div>
</div>
<script>
    
</script>