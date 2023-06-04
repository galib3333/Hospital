<?php include_once('include/header.php'); ?>
<link href="<?= $base_url?>../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Appointment Update</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appointment Update</li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php
                        $where['id']=$_GET['id'];
                        $data=$mysqli->common_select_query("SELECT patients.name,appointment.* FROM `appointment` 
                        join patients on patients.id=appointment.patient_id
                        WHERE appointment.id=".$_GET['id']." and appointment.deleted_at is null");
                        if(!$data['error'])
                            $d=$data['data'][0];
                        else
                            echo "<h2 class='text-danger text-center'>This url is not correct</h2>";
                        
                    ?>

                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-end control-label col-form-label">Name :</label>
                            <div class="col-sm-9">
                                <input type="text" readonly value="<?= $d->name ?>" class="form-control">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="doctor_id" class="col-sm-3 text-end control-label col-form-label">Doctor:</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="doctor_id" name="doctor_id">
                                    <?php
                                        $data=$mysqli->common_select('doctors');
                                        if(!$data['error']){
                                            foreach($data['data'] as $dt){
                                    ?>
                                        <option value="<?= $dt->id ?>" <?= $d->doctor_id==$dt->id?"selected":""?>><?= $dt->name ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="serial" class="col-sm-3 text-end control-label col-form-label">SL :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="serial" name="serial"value="<?= $d->serial ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="problem" class="col-sm-3 text-end control-label col-form-label">Problem :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="problem" name="problem"><?= $d->problem ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="app_date" class="col-sm-3 text-end control-label col-form-label">Date :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="app_date" name="app_date" value="<?= $d->app_date ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="app_time" class="col-sm-3 text-end control-label col-form-label">Time :</label>
                            <div class="col-sm-9">
                                <input type="time" class="form-control" id="app_time" name="app_time" value="<?= $d->app_time ?>">
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
                            $rs=$mysqli->common_update('appointment',$_POST,$where);
                            if(!$rs['error']){
                            echo "<script>window.location='appointment_list.php'</script>";
                            }else{
                                echo $rs['error'];
                            }
                        }
                    ?>       
                   
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
            
<?php include_once('include/footer.php'); ?>
<!-- this page js -->
<script src="<?= $base_url?>../assets/extra-libs/DataTables/datatables.min.js"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>