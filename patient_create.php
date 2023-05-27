<?php
    $base_url="http://localhost/Hospital/";
    require_once('class/crud.php');
    $mysqli=new crud;
?>
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
                        <h4 class="card-title">Patient's Information</h4>
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-3 text-end control-label col-form-label">First Name :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-3 text-end control-label col-form-label">Last Name :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 text-end control-label col-form-label">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 text-end control-label col-form-label">Phone :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="present_address" class="col-sm-3 text-end control-label col-form-label">Present Address :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="present_address" name="present_address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="specialist" class="col-sm-3 text-end control-label col-form-label">Specialist :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="specialist" name="specialist">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education" class="col-sm-3 text-end control-label col-form-label">Education :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="education" name="education">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fees" class="col-sm-3 text-end control-label col-form-label">Fees :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fees" name="fees">
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
                        $rs=$mysqli->common_create('patients',$_POST);
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