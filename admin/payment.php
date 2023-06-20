<?php include_once('include/header.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Payment</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment</li>
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
        <div class="col-sm-6">
            
            <table>
                <thead>
                    
                </thead>
                <tbody>
                    <?php
                        $payAmount = $_GET['pay'] ?? '';
                        $dueAmount = $_GET['due'] ?? '';
                    ?>
                    <tr>
                        <td><h3>Total Amount : </h3></td>
                        <td></td>
                        <td><input class="form-control" type="text" name="pay" id="pay" value="<?= $payAmount; ?>"></td>
                    </tr>
                    <tr>
                        <td><h3>Total Due Amount : </h3></td>
                        <td></td>
                        <td><input class="form-control" type="text" name="due" id="due" value="<?= $dueAmount; ?>"></td>
                    </tr>

                    <tr>
                        <td><h3>Pay Due : </h3></td>
                        <td></td>
                        <td><input class="form-control" type="text" name="pay_due" id="pay_due" value=""></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary ">Pay Due</button>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
            
<?php include_once('include/footer.php'); ?>