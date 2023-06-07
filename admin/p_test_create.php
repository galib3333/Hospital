<?php include_once('include/header.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tests</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create a new test.</li>
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
                <form class="form-horizontal" method="post">
                    <div class="card-body">
                    
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="name"> Patient Name :</label>
                                <select readonly class="form-control" id="patient_id" name="patient_id">
                                <?php
                                $data=$mysqli->common_select('patients');
                                if(!$data['error']){
                                    foreach($data['data'] as $d){
                                ?>
                                    <option value="<?= $d->id ?>"><?= $d->name ?></option>
                                <?php } } ?>
                                </select>
                            </div>
                            
                        </div>
                       
                        <div class="form-group repeater">
                            <div data-repeater-list="test">
                                <div class="row">
                                    <div class="col-sm-5">Test Name</div>
                                    <div class="col-sm-3">Description</div>
                                    <div class="col-sm-3">Price</div>
                                </div>
                                <div class="row pt-3" data-repeater-item>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="test_name">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="Des">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="Price">
                                    </div>
                                    <div class="col-sm-1">
                                        <input class="btn btn-danger" data-repeater-delete type="button" value="Delete"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1 offset-sm-11 pt-3">
                                    <input class="btn btn-primary" data-repeater-create type="button" value="Add"/>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                    if($_POST){
                        
                        $pdata['patient_id']=$_POST['patient_id'];
                        $pdata['age']=$_POST['age'];
                        $pdata['weight']=$_POST['weight'];
                        $pdata['inv']=$_POST['patiinvent_id'];
                        $pdata['cc']=$_POST['cc'];
                        $pdata['advice']=$_POST['advice'];
                        $pdata['created_at']=date('Y-m-d H:i:s');
                        $rs=$mysqli->common_create('p_prescription',$pdata);
                        if(!$rs['error']){
                            if($_POST['medicine']){
                                foreach($_POST['medicine'] as $m){
                                    $m['prescription_id']=$rs['data'];
                                    $rsm=$mysqli->common_create('p_medicine',$m);
                                }
                            }
                        echo "<script>window.location='prescription_list.php'
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
<script src="<?= $base_url; ?>../assets/libs/repeater/jquery.repeater.min.js"></script>
<script>
    $(document).ready(function () {
        $('.repeater').repeater({
            initEmpty: true,
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            isFirstItemUndeletable: true
        })
    });
</script>