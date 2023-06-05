<?php include_once('include/header.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Prescription</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add a new Prescription</li>
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
                        <?php
                            $data=$mysqli->common_select_query("SELECT doctors.name as doc, p_prescription.* FROM `p_prescription` 
                            join patients on patients.id=p_prescription.patient_id
                            join doctors on doctors.id=p_prescription.doctor_id
                            where p_prescription.id=".$_GET['id']."");
                            if(!$data['error'])
                                $prescription=$data['data'][0];
                            else
                                echo "<h2 class='text-danger text-center'>This url is not correct</h2>";

                              
                            $where['prescription_id']=$_GET['id'];
                            $data=$mysqli->common_select('p_medicine','*',$where);
                            
                            if(!$data['error'] && count($data['data'])>0)
                                $medicine=$data['data'][0];
                            
                        ?>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <h5>Doctor : <?= $prescription->doc ?></h5>
                            </div>
                            <div class="col-sm-6">
                                <label for="name"> Patient Name :</label>
                                <select readonly class="form-control" id="patient_id" name="patient_id">
                                <?php
                                $data=$mysqli->common_select('patients');
                                if(!$data['error']){
                                    foreach($data['data'] as $d){
                                ?>
                                    <option <?= $d->id==$prescription->patient_id?"selected":"" ?> value="<?= $d->id ?>"><?= $d->name ?></option>
                                <?php } } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="age">Age :</label>
                                <input type="text" class="form-control" id="age" name="age" value="<?= $prescription->age ?>">
                            </div>
                            <div class="col-sm-3">
                                <label for="age">Weight :</label>
                                <input type="text" class="form-control" id="weight" name="weight" value="<?= $prescription->weight ?>">
                            </div>
                        </div>
                       
                        <div class="form-group repeater">
                            <div data-repeater-list="medicine">
                                <div class="row">
                                    <div class="col-sm-5">Medicine</div>
                                    <div class="col-sm-3">Advice</div>
                                    <div class="col-sm-3">Before/After</div>
                                </div>
                                <div class="row pt-3" data-repeater-item>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" value="afffffffffffffff" name="medicine_name">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" value="affffffffff" name="advice">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" value="afffffffff" name="before_after">
                                    </div>
                                    <div class="col-sm-1">
                                        <input class="btn btn-danger" data-repeater-delete type="button" value="Delete"/>
                                    </div>
                                </div>
                                <div class="row pt-3" data-repeater-item>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" value="b" name="medicine_name">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" value="b" name="advice">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" value="b" name="before_after">
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
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="inv">Inv :</label>
                                <textarea class="form-control" id="inv" name="inv"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <label for="cc">Complain :</label>
                                <textarea class="form-control" id="cc" name="cc"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <label for="advice">Advice :</label>
                                <textarea class="form-control" id="advice" name="advice"></textarea>
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
        var $repeater = $('.repeater').repeater()
        
        $repeater.setList([
            {'text-input': 'medicine_name','text-input': 'medicine_name','text-input': 'medicine_name',},
            { 'text-input': 'set-foo' }
        ]);
    });
</script>