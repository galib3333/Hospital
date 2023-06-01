
<?php include_once('include/header.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Room</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add a new patient</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="" method="post">
                    <div class="card-body">
                        <h4 class="card-title">Room's Information</h4>
                        <div class="form-group row">
                            <label for="room_no" class="col-sm-3 text-end control-label col-form-label">Room No :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="room_no" name="room_no">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="room_type" class="col-sm-3 text-end control-label col-form-label">Room Type :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="room_type" name="room_type">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="capacity" class="col-sm-3 text-end control-label col-form-label">Capacity :</label>
                            <div class="col-sm-9">
                                <input type="capacity" class="form-control" id="capacity" name="capacity" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="room_rent" class="col-sm-3 text-end control-label col-form-label">Room Rent :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="room_rent" name="room_rent">
                            </div>
                        </div>
                        
                     
                       
                       
                       
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <?php
                    if($_POST){
                        $rs=$mysqli->common_create('room',$_POST);
                        if(!$rs['error']){
                        echo "<script>window.location='room_list.php'
                        </script>";
                        }else{
                            echo $rs['error'];
                        }
                    }
                ?>       
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
            
<?php include_once('include/footer.php'); ?>