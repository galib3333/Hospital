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
                            <?php
                                
                            ?>
                            <div class="col-sm-6">
                                <label for="name">Patient Name :</label>
                                <select readonly class="form-control" name="patient_id">
                                <?php
                                $data=$mysqli->common_select('patients');
                                if(!$data['error']){
                                    foreach($data['data'] as $p_data){
                                ?>
                                    <option value="<?= $p_data->name ?>"><?= $p_data->name ?></option>
                                <?php } } ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <label for="name">Test Name :</label>
                            <select readonly class="form-control" name="test_id">
                            <?php
                            $data=$mysqli->common_select('test');
                            if(!$data['error']){
                                foreach($data['data'] as $t_data){
                            ?>
                                <option value="<?= $t_data->test_name ?>"><?= $t_data->test_name ?></option>
                            <?php } } ?>
                            </select>
                            <?php
                                $data = $mysqli->common_select_query("SELECT patients.name AS p_name, test.test_name, p_test.* FROM `p_test`
                                JOIN patients ON patients.id = p_test.patient_id
                                JOIN test ON test.id = p_test.test_id
                                WHERE p_test.deleted_at IS NULL");
                                if(!$data['error']){
                                    foreach($data['data'] as $d){
                                    }
                                } else {
                                    echo $data['error'];
                                }
                                ?>
                        </div>
                        <div class="form-group repeater">
                            <div data-repeater-list="test">
                                <div class="row pt-3" data-repeater-item>
                                <div class="row">
                                    <div class="col-sm-2"><h6>Sub Total</h6></div>
                                    <div class="col-sm-2"><h6 class="ps-1">Discount</h6></div>
                                    <div class="col-sm-2"><h6 class="ps-1">Total</h6></div>
                                    <div class="col-sm-2"><h6 class="ps-3">Due</h6></div>
                                    <div class="col-sm-2"><h6 class="ps-2">Bill_Date</h6></div>
                                    
                                </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="sub_total">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="discount">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="total">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="due">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" name="bill_date">
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
                        $pdata['patient_id'] = $_POST['patient_id'];
                        $pdata['test_id'] = $_POST['test_id'];
                        $pdata['sub_total']=$_POST['sub_total'];
                        $pdata['discount']=$_POST['discount'];
                        $pdata['total']=$_POST['total'];
                        $pdata['bill_date']=$_POST['bill_date'];
                        $pdata['due']=$_POST['due'];
                        $pdata['created_at']=date('Y-m-d H:i:s');
                        $rs=$mysqli->common_create('p_test',$pdata);
                        if(!$rs['error']){
                            echo "<script>window.location='p_test_list.php'
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
<script src="<?= $base_url; ?>../assets/dist/js/repeater/jquery.repeater.min.js"></script>
<script src="<?= $base_url; ?>../assets/dist/js/file.js "></script>
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