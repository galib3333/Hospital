<?php
 require_once('class/crud.php');
 $mysqli=new crud;

 $data=$mysqli->common_select_single("doctors","*",$_GET);
 if(!$data['error'])
     $d=array("error"=>false,"data"=>$data['data']);
 else
     $d=array("error"=>true,"data"=>"this doctor is not found");
 
    echo json_encode($d);

?>