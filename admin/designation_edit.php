<?php include_once('include/header.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Designation</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Designation Update</li>
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
                  $data=$mysqli->common_select('designations','*',$where);
                 
                  if(!$data['error'] && count($data['data'])>0)
                    $d=$data['data'][0];
                  else{
                    echo "<h2 class='text-danger text-center'>This url is not correct</h2>";
                    
                  }
                ?>
                    <div class="card-body">
                        <h4 class="card-title">Designation Information</h4>
                        <div class="form-group row">
                            <label for="designation_id" class="col-sm-3 text-end control-label col-form-label">Designation ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="designation_id" name="designation_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desig_name" class="col-sm-3 text-end control-label col-form-label">Designation Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="desig_name" name="desig_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desig_des" class="col-sm-3 text-end control-label col-form-label">Designation Description</label>
                            <div class="col-sm-9">
                                <textarea name="desig_des" id="desig_des" cols="30" rows="10" class="form-control"></textarea>
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
                        $rs=$mysqli->common_update('designations',$_POST,$where);
                        if(!$rs['error']){
                        echo "<script>window.location='designation_list.php'</script>";
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