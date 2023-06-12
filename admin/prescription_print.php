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
      padding:2%!important;
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
    @media print {
      button{
        display: none;
      }
    }
     
  </style>
<button type="button" onclick="printbtn()">Print</button>
<?php
  $data=$mysqli->common_select_query("SELECT patients.name, patients.sex, doctors.name as doc,doctors.email,doctors.specialist,doctors.education, p_prescription.* FROM `p_prescription` 
  join patients on patients.id=p_prescription.patient_id
  join doctors on doctors.id=p_prescription.doctor_id
  where p_prescription.id=".$_GET['id']."");
  if(!$data['error'])
      $prescription=$data['data'][0];
  else
      echo "<h2 class='text-danger text-center'>This url is not correct</h2>";

    
  $where['prescription_id']=$_GET['id'];
  $data=$mysqli->common_select('p_medicine','*',$where);
  
  if(!$data['error'] && count($data['data'])>0)
      $medicine=$data['data'];
  
?>
  <section style="display: flex; justify-content: space-between; align-items: center; padding: 20px;">
    <div style="text-align: left;">
        <h1>XYZ Hospital</h1>
    </div>
    <div></div>
    <div style="text-align: right;">
      <h3><?= $prescription->doc ?></h3>
      <strong><?= $prescription->specialist ?></strong><hr>
      <strong><?= $prescription->education ?></strong>
      <strong><?= $prescription->email ?></strong>
    </div>
  </section>
  <div class="border">
     <strong>Name :<span style="border-bottom:1px dotted"><?= $prescription->name ?></span></strong>
     <strong>Age :<span style="border-bottom:1px dotted"><?= $prescription->age ?></span></strong>
     <strong>Gender :<span style="border-bottom:1px dotted"><?= $prescription->sex ?></span></strong>
     <strong>Date :<span style="border-bottom:1px dotted"><?= date('d/m/Y',strtotime($prescription->created_at)) ?></span></strong>
   </div>
    <table style="width:100%">
      <tr>
        <td style="width:20%">
          <b>Inv.</b>
          <div style="min-height:100px">
            <?= $prescription->inv ?>
          </div>
          <b>C/C.</b>
          <div style="min-height:100px">
            <?= $prescription->cc ?>
          </div>
          <b>Advice.</b>
          <div style="min-height:100px">
            <?= $prescription->advice ?>
          </div>
        </td>
        <td style="vertical-align:top">
          <img src="../assets/images/rx.PNG" alt="" width="100px"><br>
          <table>

          <?php foreach($medicine as $md){?>
            <tr>
              <td><b><?= $md->medicine_name ?></b></td>
              <td><?= $md->advice ?></td>
              <td><?= $md->before_after ?></td>
            </tr>
          <?php } ?>
          </table>
        </td>
      </tr>
    </table>
      
      
    </div>
    <div class="prescription">
     
    </div>
    <footer>
      <p>2no Gate Sholoshahar,Chittagong</p>
    </footer>

<script>
  function printbtn(){
    window.print();
  }
</script>