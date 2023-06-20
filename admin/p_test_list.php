<?php include_once('include/header.php'); ?>
<link href="<?= $base_url?>../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
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
                        <li class="breadcrumb-item"><a href="<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Test List</li>
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
                    <h5 class="card-title">Test List
                        <a class="btn btn-primary btn-xs float-end" href="<?= $base_url?>p_test_create.php">Add New Test</a>
                    </h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Patient Name</th>
                                    <th>Sub Total</th>
                                    <th>Discount</th>
                                    <th>Vat</th>
                                    <th>Service Charge</th>
                                    <th>Total</th>
                                    <th>Bill Date</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data = $mysqli->common_select_query("SELECT p_test.*, patients.name AS patient_name
                                FROM p_test
                                JOIN patients ON patients.id = p_test.patient_id
                                WHERE p_test.deleted_at IS NULL");                            
                                if(!$data['error']){
                                    foreach($data['data'] as $d){
                                ?>
                                    <tr>
                                        <td><?= $d->id ?></td>
                                        <td><?= $d->patient_name?></td>
                                        <td>BDT <?= $d->sub_total ?></td>
                                        <td><?= $d->discount ?>(%)</td>
                                        <td><?= $d->vat ?>(%)</td>
                                        <td><?= $d->service_charge ?>(%)</td>
                                        <td>BDT <?= $d->total ?></td>
                                        <td><?= $d->bill_date ?></td>
                                        <td>BDT <?= $d->due ?></td>
                                        <td>
                                        <a title="Update" href="p_test_edit.php?id=<?= $d->id ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php if($d->due > 0){ ?>
                                            <a title="Pay" class="text-success" href="payment.php?id=<?= $d->id ?>">
                                            <i class="fa fa-dollar-sign"></i>
                                            </a>
                                        <?php } ?>
                                        <a title="Delete" onclick="return confirm('Are you sure to delete this!')" class="text-danger" href="p_test_delete.php?id=<?= $d->id ?>">
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