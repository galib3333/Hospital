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
                        <table id="zero_config" class="table table-striped   table-bordered">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Contact</th>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>time</th>
                                    <th>Symptoms</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data=$mysqli->common_select('appointment_request');
                                if(!$data['error']){
                                    foreach($data['data'] as $d){
                                ?>
                                    <tr>
                                        <td><?= $d->patient_name ?></td>
                                        <td><?= $d->contact_no ?></td>
                                        <td><?= $d->doctor_name ?></td>
                                        <td><?= $d->app_date ?></td>
                                        <td><?= $d->days ?></td>
                                        <td><?= $d->app_time ?></td>
                                        <td><?= $d->symptoms ?></td>
                                        <td>
                                            <a title="Accept" href="appointment_accept.php?id=<?= $d->id ?>">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a title="Delete" class="text-danger" href="appointment_rsv_delete.php?id=<?= $d->id ?>">
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