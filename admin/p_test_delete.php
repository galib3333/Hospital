<?php require_once('include/header.php'); ?>
<?php require_once('include/sidebar.php'); ?>


<?php
  $where['id']=$_GET['id'];
  $rs=$mysqli->common_delete('p_test',$where);
  $des['p_test_id']=$_GET['id'];
  $rs=$mysqli->common_delete('p_test_des',$des);
    if(!$rs['error']){
      echo "<script>window.location='p_test_list.php'</script>";
    }else{
        echo $rs['error'];
    }
  
?>

<?php require_once('include/footer.php'); ?>
