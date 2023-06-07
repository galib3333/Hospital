<?php include_once('include/header.php'); ?>
<link href="<?= $base_url?>../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Appointment</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appointment List</li>
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
                                    <th>Patient</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Symptoms</th>
                                    <th>Serial No </th>
                                    <th>Doctor Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data=$mysqli->common_select_query("SELECT patients.name, patients.phone,patients.sex,doctors.name as doc, departments.dep_name,appointment.* FROM `appointment` 
                                join patients on patients.id=appointment.patient_id
                                join doctors on doctors.id=appointment.doctor_id
                                join departments on departments.id=doctors.department_id
                                WHERE appointment.deleted_at is null");
                                if(!$data['error']){
                                    foreach($data['data'] as $d){
                                ?>
                                    <tr>
                                        <td><?= $d->name ?></td>
                                        <td><?= $d->sex ?></td>
                                        <td><?= $d->phone ?></td>
                                        <td><?= $d->app_date ?></td>
                                        <td><?= $d->app_time ?></td>
                                        <td><?= $d->problem ?></td>
                                        <td><?= $d->serial ?></td>
                                        <td><?= $d->doc ?> (<?= $d->dep_name ?>)</td>
                                        <td>
                                            <a title="Prescription" href="prescription_create.php?id=<?= $d->id ?>">
                                                <i class="fa fa-list"></i>
                                            </a>
                                            <a title="Update" href="appointment_edit.php?id=<?= $d->id ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a title="Delete" class="text-danger" href="appointment_delete.php?id=<?= $d->id ?>">
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