<?php include_once('include/header.php'); ?>
<link href="<?= $base_url?>../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
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
                        <li class="breadcrumb-item"><a href="<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Patient's List</li>
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
                    <h5 class="card-title">Patient's List
                        <a class="btn btn-primary btn-xs float-end" href="<?= $base_url?>patient_create.php">Add New</a>
                    </h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Present Address</th>
                                    <th>Permanent Address</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data=$mysqli->common_select('patients');
                                if(!$data['error']){
                                    foreach($data['data'] as $d){
                                ?>
                                    <tr>
                                        <td><?= $d->id ?></td>
                                        <td><?= $d->name ?></td>
                                        <td><?= $d->email ?></td>
                                        <td><?= $d->phone ?></td>
                                        <td><?= $d->present_address ?></td>
                                        <td><?= $d->permanent_address
                                        ?></td>
                                        <td><?= $d->birth_date ?></td>
                                        <td><?= ($d->sex == 'male') ? 'Male' : (($d->sex == 'female') ? 'Female' : 'Other') ?></td>
                                        <td>
                                        <a title="Update" href="patient_edit.php?id=<?= $d->id ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a title="Delete" class="text-danger" href="patient_delete.php?id=<?= $d->id ?>">
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