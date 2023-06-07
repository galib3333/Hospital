<?php include_once('include/header.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add New Test</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Test</li>
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
                        <div class="form-group row">
                            <label for="test_name" class="col-sm-2 col-form-label">Test Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="test_name" name="test_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price" name="price" required>
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
                if ($_POST) {
                    $testData = array(
                        'test_name' => $_POST['test_name'],
                        'description' => $_POST['description'],
                        'price' => $_POST['price']
                    );
                    
                    $result = $mysqli->common_create('test', $testData);
                    if (!$result['error']) {
                        echo "<script>alert('Test created successfully.');
                                window.location='test_list.php';
                                </script>";
                    } else {
                        echo $result['error'];
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
