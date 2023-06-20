<?php include_once('include/header.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Patients</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Patient's info Update</li>
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
                  $data=$mysqli->common_select('patients','*',$where);
                 
                  if(!$data['error'] && count($data['data'])>0)
                    $d=$data['data'][0];
                  else{
                    echo "<h2 class='text-danger text-center'>This url is not correct</h2>";
                    
                  }
                ?>
                    <div class="card-body">
                        <h4 class="card-title">Patient's Information</h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-end control-label col-form-label"> Name :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->name ?>" class="form-control" id="name" name="name">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 text-end control-label col-form-label">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" value="<?= $d->email ?>" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 text-end control-label col-form-label">Phone :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->phone ?>" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="present_address" class="col-sm-3 text-end control-label col-form-label">Present Address :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->present_address ?>" class="form-control" id="present_address" name="present_address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permanent_address" class="col-sm-3 text-end control-label col-form-label">Permanent Address :</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?= $d->present_address ?>" class="form-control" id="permanent_address" name="permanent_address">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="birth_date" class="col-sm-3 text-end control-label col-form-label">Date of Birth :</label>
                            <div class="col-sm-9">
                                <input type="date" value="<?= $d->birth_date ?>" class="form-control" id="birth_date" name="birth_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sex" class="col-sm-3 text-end control-label col-form-label">Gender :</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="male" value="Male" <?= $d->sex ==='Male' ? 'checked' :'' ?>>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="female" value="Female" <?= $d->sex ==='Female' ? 'checked' :'' ?>>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="others" value="Others" <?= $d->sex ==='Others' ? 'checked' :'' ?>>
                                    <label class="form-check-label" for="others">Others</label>
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
                        $rs=$mysqli->common_update('patients',$_POST,$where);
                        if(!$rs['error']){
                        echo "<script>window.location='patient_list.php'</script>";
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