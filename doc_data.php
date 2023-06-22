<?php
 require_once('class/crud.php');
 $mysqli=new crud;

 $data=$mysqli->common_select_single("doctors","*",$_GET);
 if(!$data['error'])
     $d=$data['data'];
 else
     echo "<h2 class='text-danger text-center'>This url is not correct</h2>";
 
    echo json_encode($d);

?>