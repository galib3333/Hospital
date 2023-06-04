<?php include_once('include/header.php'); ?>
<link href="<?= $base_url?>../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Appointment Accept</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appointment Accept</li>
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
    $data=$mysqli->common_select_single('appointment_request','*',$where);
    if(!$data['error'])
    $d=$data['data'];
    else{
    echo "<h2 class='text-danger text-center'>This url is not correct</h2>";
    
    }
    ?>

                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-end control-label col-form-label">Name :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->patient_name ?>" class="form-control" id="name" name="name">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 text-end control-label col-form-label">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 text-end control-label col-form-label">Phone :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->contact_no ?>" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="present_address" class="col-sm-3 text-end control-label col-form-label">Present Address :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="present_address" name="present_address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permanent_address" class="col-sm-3 text-end control-label col-form-label">Permanent Address :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="permanent_address" name="permanent_address">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="birth_date" class="col-sm-3 text-end control-label col-form-label">Date of Birth :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="birth_date" name="birth_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sex" class="col-sm-3 text-end control-label col-form-label">Gender :</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="male" value="Male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="female" value="Female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="other" value="Others">
                                    <label class="form-check-label" for="other">Others</label>
                                </div>
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
                                        <option value="<?= $dt->id ?>"><?= $dt->name ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="serial" class="col-sm-3 text-end control-label col-form-label">SL :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="serial" name="serial"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="problem" class="col-sm-3 text-end control-label col-form-label">Problem :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="problem" name="problem"><?= $d->symptoms ?></textarea>
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
                            $pdata['name']=$_POST['name'];
                            $pdata['email']=$_POST['email'];
                            $pdata['phone']=$_POST['phone'];
                            $pdata['present_address']=$_POST['present_address'];
                            $pdata['permanent_address']=$_POST['permanent_address'];
                            $pdata['birth_date']=$_POST['birth_date'];
                            $pdata['sex']=$_POST['sex'];
                            $pdata['created_at']=date('Y-m-d H:i:s');
                            $rs=$mysqli->common_create('patients',$pdata);
                            if(!$rs['error']){
                                $appdata['patient_id']=$rs['data'];
                                $appdata['doctor_id']=$_POST['doctor_id'];
                                $appdata['serial']=$_POST['serial'];
                                $appdata['app_date']=$_POST['app_date'];
                                $appdata['app_time']=$_POST['app_time'];
                                $appdata['problem']=$_POST['problem'];
                                $appdata['created_at']=date('Y-m-d H:i:s');
                                $rs=$mysqli->common_create('appointment',$appdata);
                                $mysqli->common_delete('appointment_request',$where);
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