<?php include_once('include/header.php'); ?>
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
                        <li class="breadcrumb-item"><a href="#<?= $base_url?>dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update test info.</li>
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
                <form class="form-horizontal" method="post" action="p_test_edit.php">
                <?php
                  $where['id']=$_GET['id'];
                  $data=$mysqli->common_select('p_test','*',$where);
                 
                  if(!$data['error'] && count($data['data'])>0)
                    $d=$data['data'][0];
                  else{
                    echo "<h2 class='text-danger text-center'>This url is not correct</h2>";
                    
                  }
                ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="name">Patient Name :</label>
                                <select class="form-control" name="patient_id">
                                <?php
                                    $data = $mysqli->common_select('patients');
                                    if (!$data['error']) {
                                        foreach ($data['data'] as $p) {
                                ?>
                                    <option <?= $p->id == $d->patient_id ? "selected" : "" ?> value="<?= $p->id ?>"><?= $p->name ?></option>
                                <?php } } ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="bill_date">Test Date</label>
                                <input type="date" class="form-control" name="bill_date" id="bill_date" value="<?= $d->bill_date ?>" >
                            </div>
                        </div>
                        
                        <div class="form-group repeater">
                            <div data-repeater-list="test">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Test Name:</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="">Price</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="">Delete</label>
                                    </div>
                                </div>
                                <div class="row pt-3" data-repeater-item>
                                    <div class="col-sm-6">
                                        <select onchange="get_test(this)" class="form-control" name="test_id">
                                            <option value="">Select Test</option>
                                            <?php
                                                $data=$mysqli->common_select('test');
                                                if(!$data['error']){
                                                    foreach($data['data'] as $t){
                                            ?>
                                                <option data-price="<?= $d->price ?>" 
                                                <?= $t->id == $d->id ? "selected" : "" ?> value="<?= $d->id ?>"><?= $t->test_name ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                    <input type="text" name="amount" class="form-control testprice">
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="btn btn-danger" data-repeater-delete type="button" value="Delete"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1 pt-2">
                                    <input class="btn btn-primary" data-repeater-create type="button" value="Add"/>
                                </div>
                            </div>

                            <div class="row">
								<div class="col-sm-6 offset-sm-6">
									<table class="table">
										<tr>
											<td>Amount</td>
											<td width="100px"><input class="form-control subamount" type="hidden" name="sub_total" value="<?= $d->sub_total ?>"></td>
											<td id="subamount"></td>
										</tr>
										<tr>
											<td>Discount (%)</td>
											<td><input class="form-control" onkeyup="check_total()" id="discount" type="text" name="discount" value=""></td>
											<td class="discount"></td>
										</tr>
										<tr>
											<td>VAT (%)</td>
											<td><input class="form-control" onkeyup="check_total()" id="vat" type="text" name="vat"  value=""></td>
											<td class="vat"></td>
										</tr>
										<tr>
											<td>Service Charge (%)</td>
											<td><input class="form-control" onkeyup="check_total()" id="service_charge" type="text" name="service_charge" value=""></td>
											<td class="service_charge"></td>
										</tr>
										<tr>
											<td>Total</td>
											<td><input class="form-control" type="hidden" name="total" id="total" value=""></td>
											<td class="total"></td>
										</tr>
                                        <tr>
											<td>Pay</td>
											<td></td>
											<td><input class="form-control" type="text" name="pay" id="pay" onkeyup="get_due(this.value)" value=""></td>
										</tr>
                                        <tr>
											<td>Due</td>
											<td></td>
											<td><input class="form-control" type="text" name="due" id="due" value=""></td>
										</tr>
									</table>
								</div>
							</div>

                        </div>
                    </div>
                   
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <?php
                    if($_POST){
                        $rs=$mysqli->common_update('p_test',$_POST,$where);
                        print_r($rs);
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
<script src="<?= $base_url; ?>../assets/dist/js/repeater/jquery.repeater.min.js"></script>
<script>
    function get_due(e){
        let total=$('#total').val()?parseFloat($('#total').val()):0;
        let pay=e>0?parseFloat(e):0;
        if(total>pay)
            $("#due").val((total - pay));
        else
            $("#due").val(0);
    }
    function get_test(e){
        let price=$(e).find(":selected").data("price");
        $(e).closest('.row').find('.testprice').val(price);
        check_total()
    }
    $(document).ready(function () {
        $('.repeater').repeater({
            hide: function (deleteElement) {
                $(this).hide(function(){
                    deleteElement();
                    check_total();
                });
            }
        })
    });
    function check_total(){
        let totalamt=0;
        $('.testprice').each(function(){
            totalamt+=$(this).val()?parseFloat($(this).val()):0;
        })
        let rent=totalamt;
        let discount=$("#discount").val()?parseFloat($("#discount").val()):0;
        let vat=$("#vat").val()?parseFloat($("#vat").val()):0;
        let service_charge=$("#service_charge").val()?parseFloat($("#service_charge").val()):0;
        
        if(discount>0){
            discount=(rent*(discount/100))
        }
        if(vat>0){
            vat=(rent*(vat/100))
        }
        if(service_charge>0){
            service_charge=(rent*(service_charge/100))
        }
        $(".discount").text("BDT "+discount);
        $(".vat").text("BDT "+vat);
        $(".service_charge").text("BDT "+service_charge);
        $("#subamount").text("BDT "+rent);
        $(".subamount").val(rent);

        let total=((rent + service_charge + vat) -discount)
        $(".total").text("BDT "+total);
        $("#total").val(total);

    }
</script>
