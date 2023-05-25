<?php 
    $base_url="http://localhost/Hospital/";
    require_once('class/crud.php');
    $mysqli=new crud;
?>
<?php include_once('include/header.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Doctors</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add a new doctor</li>
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
                        <h4 class="card-title">Doctor's Information</h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-end control-label col-form-label">Name :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 text-end control-label col-form-label">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department" class="col-sm-3 text-end control-label col-form-label">Department :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department" class="col-sm-3 text-end control-label col-form-label">Designation :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department" class="col-sm-3 text-end control-label col-form-label">Specialist :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department" class="col-sm-3 text-end control-label col-form-label">Education :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department" class="col-sm-3 text-end control-label col-form-label">Fees :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                        </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <?php
                    include_once('crud.php');
                    $crud = new crud();

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Retrieve form data
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $department = $_POST['department'];
                        $designation = $_POST['designation'];
                        $specialist = $_POST['specialist'];
                        $education = $_POST['education'];
                        $fees = $_POST['fees'];
                        
                        // Prepare the data to be inserted
                        $data = array(
                            'name' => $name,
                            'email' => $email,
                            'department' => $department,
                            'designation' => $designation,
                            'specialist' => $specialist,
                            'education' => $education,
                            'fees' => $fees
                        );
                        
                        // Call the common_create method to insert the data
                        $insertResult = $crud->common_create('doctors', $data);
                        
                        // Check if the insertion was successful
                        if ($insertResult['error']) {
                            // Handle the error
                            echo "Error: " . $insertResult['error'];
                        } else {
                            $insertedId = $insertResult['data'];
                            // Handle the successful insertion
                            echo "Data inserted successfully with ID: " . $insertedId;
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