<?php require_once('include/header.php'); ?>
<?php require_once('include/sidebar.php'); ?>


<?php
  $where['id']=$_GET['id'];
  $data['deleted_at']=date('Y-m-d H:i:s');
  $rs=$mysqli->common_update('doctors',$data,$where);
    if(!$rs['error']){
      echo "<script>window.location='doctor_list.php'</script>";
    }else{
        echo $rs['error'];
    }
  
?>

<?php require_once('include/footer.php'); ?>
