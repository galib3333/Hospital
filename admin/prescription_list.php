<?php include_once('include/header.php'); ?>
<link href="<?= $base_url?>../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
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
                        <li class="breadcrumb-item"><a href="<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Prescription List</li>
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
                   
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Patient</th>
                                    <th>Age</th>
                                    <th>Weight</th>
                                    <th>Complain</th>
                                    <th>Inv</th>
                                    <th>Doctor Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $where="";
                                if(isset($_GET['id'])){
                                    $where=" and p_prescription.patient_id=".$_GET['id'];
                                }
                                $data=$mysqli->common_select_query("SELECT departments.dep_name,patients.name, patients.phone,patients.sex,doctors.name as doc, p_prescription.* FROM `p_prescription` 
                                join patients on patients.id=p_prescription.patient_id
                                join doctors on doctors.id=p_prescription.doctor_id
                                join departments on departments.id=doctors.department_id
                                WHERE p_prescription.deleted_at is null $where");
                                if(!$data['error']){
                                    foreach($data['data'] as $d){
                                ?>
                                    <tr>
                                        <td><?= $d->created_at ?></td>
                                        <td>
                                            <?= $d->name ?>,
                                            <?= $d->sex ?>,
                                            (<?= $d->phone ?>)

                                        </td>
                                        <td><?= $d->age ?></td>
                                        <td><?= $d->weight ?></td>
                                        <td><?= $d->cc ?></td>
                                        <td><?= $d->inv ?></td>
                                        <td><?= $d->doc ?> (<?= $d->dep_name ?>)</td>
                                        <td>
                                            <a title="Prescription" href="prescription_print.php?id=<?= $d->id ?>">
                                                <i class="fa fa-list"></i>
                                            </a>
                                            <a title="Update" href="prescription_edit.php?id=<?= $d->id ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a title="Update" class="text-danger" href="prescription_delete.php?id=<?= $d->id ?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                            
                        </table>
                    </div>

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