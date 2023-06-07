<?php include_once('include/header.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Doctors</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Doc's info Update</li>
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
                <?php
                  $where['id']=$_GET['id'];
                  $data=$mysqli->common_select('doctors','*',$where);
                 
                  if(!$data['error'] && count($data['data'])>0)
                    $d=$data['data'][0];
                  else
                    echo "<h2 class='text-danger text-center'>This url is not correct</h2>";
                    
                ?>
                    <div class="card-body">
                        <h4 class="card-title">Doctor's Information</h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-end control-label col-form-label">Name :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->name ?>" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 text-end control-label col-form-label">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" value="<?= $d->email ?>" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="department_id" class="col-sm-3 text-end control-label col-form-label">Department:</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="department_id" name="department_id">
                                    <?php
                                        $data=$mysqli->common_select('departments');
                                        if(!$data['error']){
                                            foreach($data['data'] as $dep){
                                    ?>
                                        <option <?= $d->department_id==$dep->id?"selected":"" ?> value="<?= $dep->id ?>"><?= $dep->dep_name ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="designation_id" class="col-sm-3 text-end control-label col-form-label">Designation:</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="designation_id" name="designation_id">
                                <?php
                                        $data=$mysqli->common_select('designations');
                                        if(!$data['error']){
                                            foreach($data['data'] as $des){
                                    ?>
                                        <option <?= $d->designation_id==$des->id?"selected":"" ?> value="<?= $des->id ?>"><?= $des->desig_name ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="specialist" class="col-sm-3 text-end control-label col-form-label">Specialist :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->specialist ?>" class="form-control" id="specialist" name="specialist">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education" class="col-sm-3 text-end control-label col-form-label">Education :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->education ?>" class="form-control" id="education" name="education">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fees" class="col-sm-3 text-end control-label col-form-label">Fees :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->fees ?>" class="form-control" id="fees" name="fees">
                            </div>
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
                        $rs=$mysqli->common_update('doctors',$_POST,$where);
                        print_r($rs);
                        if(!$rs['error']){
                        echo "<script>window.location='doctor_list.php'</script>";
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