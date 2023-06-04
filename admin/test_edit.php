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
                  $data=$mysqli->common_select('test','*',$where);
                 
                  if(!$data['error'] && count($data['data'])>0)
                    $d=$data['data'][0];
                  else{
                    echo "<h2 class='text-danger text-center'>This url is not correct</h2>";
                    
                  }
                ?>
                    <div class="form-group row">
                            <label for="test_name" class="col-sm-3 text-end control-label col-form-label">Test Name :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="test_name" name="test_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 text-end control-label col-form-label">Description :</label>
                            <div class="col-sm-9">
                                <input type="description" class="form-control" id="description" name="description" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 text-end control-label col-form-label">Price :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="price" name="price">
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
                        $rs=$mysqli->common_update('test',$_POST,$where);
                        print_r($rs);
                        if(!$rs['error']){
                        echo "<script>window.location='test_list.php'</script>";
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