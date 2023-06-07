<?php
  session_start();
  if(!isset($_SESSION['userid'])){
    echo "<script>window.location='login.php'</script>";
    exit;
  }
    $base_url="http://localhost/Hospital/admin/";
    require_once('../class/crud.php');
    $mysqli=new crud;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      
    }
   h1{
    color: aqua;
   }
    h3{
      color:aqua;
    }
    .border{
      border-bottom: 5px solid aqua;
      padding: 10px;
     }
     .h1{
      opacity:0.2;
     font-size: 80px;
     transform: rotate(-30deg);
     }
     strong{
      padding:5%!important;
     }
     p{
      padding:1%;
      text-align: center;
      background-color: aqua;
     }
     .prescription{
      height: 300px;
     }
     footer{
      width: 100%;
      background-color: aqua;
      position: fixed;
      bottom: 0;
      left: 0;
      
     }
    
     
  </style>
</head>
<body>

  <section style="display: flex; justify-content: space-between; align-items: center; padding: 20px;">
    <div style="text-align: left;">
        <h1>Hospital</h1>
        <span>Tag in here</span>
    </div>
    <div></div>
    <div style="text-align: right;">
      <h3>Dr John Smith</h3>
      <strong>MBBS,FCPS</strong><hr>
      <strong>Contact: 01865850477</strong> <br>
      <strong>info@email.com</strong><br>
      <strong>www.website.com</strong>
    </div>
  </section>
  <div class="border">
     <strong>Name :....</strong>
     <strong>Age :....</strong>
     <strong>Gender :....</strong>
     <strong>Date :....</strong>
   </div>
   <div class="middle">
      <img src="Capture.PNG" alt="" width="100px">
      <h1 style="text-align: center;" class="h1">Prescription</h1>
   </div>
   <div class="prescription">

   </div>
   <footer>
      <p>2no Gate Sholoshahar,Chittagong</p>
   </footer>
</body>
</html>

