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
            <form method="post" action="">
            <table>
                <thead>
                    
                </thead>
                <tbody>
                    <?php
                        $where['id'] = $_GET['id'];
                        $data=$mysqli->common_select_single("p_test","*",$where);
                        if(!$data['error']){
                            $d=$data['data'];
                        }
                    ?>
                    <tr>
                        <td><h3>Total Amount : </h3></td>
                        <td> BDT <?= $d->total ?></td>
                    </tr>
                    <tr>
                        <td><h3>Total Due Amount : </h3></td>
                        <td>BDT <?= $d->due ?></td>
                    </tr>

                    <tr>
                        <td><h3>Pay Due : </h3></td>
                        <td><input class="form-control" type="text" name="pay_due" id="pay_due" value="" onkeyup="check_due(this.value)">
                        <span id="due_msg"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary ">Pay Due</button>
            </form>
<?php
    if($_POST){
        $pay=$_POST['pay_due'];
        if($d->due > $pay)
            $due['due']=($d->due - $pay);
        else
            $due['due']=0;
        $rs=$mysqli->common_update('p_test',$due,$where);
        if(!$rs['error']){
            echo "<script>window.location='p_test_list.php'</script>";
        }else{
            echo $rs['error'];
        }
        
    }

?>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
            
<?php include_once('include/footer.php'); ?>
<script>
    function check_due(e){
        $("#due_msg").text("");
        let due=<?= $d->due ?>;
        if(e>due){
            $("#pay_due").val(due);
            $("#due_msg").text("You cannot pay more than "+due);
        }
    }
</script>