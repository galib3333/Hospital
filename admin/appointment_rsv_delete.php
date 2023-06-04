<?php require_once('include/header.php'); ?>
<?php require_once('include/sidebar.php'); ?>


<?php
  $where['id']=$_GET['id'];
  $rs=$mysqli->common_delete('appointment_request',$where);
    if(!$rs['error']){
      echo "<script>window.location='appointment_rsv_list.php'</script>";
    }else{
        echo $rs['error'];
    }
  
?>

<?php require_once('include/footer.php'); ?>
