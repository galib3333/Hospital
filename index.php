<?php

    $protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
    $base_url="$protocol://".$_SERVER['SERVER_NAME']."/".explode('/',$_SERVER['SCRIPT_NAME'])[1]."/";
    require_once('class/crud.php');
    $mysqli=new crud;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Consultation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/frontend/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.1/css/all.min.css" integrity="sha512-BxQjx52Ea/sanKjJ426PAhxQJ4BPfahiSb/ohtZ2Ipgrc5wyaTSgTwPhhZ/xC66vvg+N4qoDD1j0VcJAqBTjhQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg nav-back fixed-top" 
    id="mainNav">
      <div class="container">
          <a class="navbar-brand fw-bold" href="#" >Matrix Hospital</a>
          <button class="navbar-toggler navbar-toggler-right" type="button"
           data-toggle="collapse" data-target="#navbarResponsive" 
           aria-controls="navbarResponsive" aria-expanded="false" 
           aria-label="Toggle navigation"><i class="fas fa-syringe fa-2x"></i>
           </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" 
                  href="#about">Services</a></li>
                  <li class="nav-item"><a class="nav-link" 
                    href="#about">About</a></li>
                  <li class="nav-item"><a class="nav-link" 
                    href="#about">Medical Camps</a></li>
                  <li class="nav-item"><a class="nav-link"
                     href="#projects">Team</a></li>
                  <li class="nav-item"><a class="nav-link" 
                    href="#signup">Contact</a></li>
              </ul>
          </div>
      </div>
  </nav>
   
<!-- End Header -->    
   <!-- ======= Hero Section ======= -->
   <section id="hero" class="d-flex align-items-center" style="background-image:url('assets/images/doctor.jpg'); background-repeat:no-repeat; background-size:cover;">
    <div class="container text-center position-relative">

      <h1 style="color:rgb(21,185,175);">24/7 Care is available</h1>
      <marquee behavior="" direction=""><h2 style="font-size:25px;"> <i>Innovating Healthcare for a Better Tomorrow..</i> </h2></marquee>
      <a href="#about" class="main-btn">Get Started</a>
    </div>
  </section>
  <!-- End Hero -->
  <div class="container mt-4 p-4">
      <div class="row">
          <div class="col-md-6">
              <h2 class="text-center my-4">
                 Appointment
              </h2>
              <form method="post" action="">
                  <div class="form-group row">
                      <label class="col-sm-4 col-lg-4">Patient Name</label>
                      <div class="col-sm-8 col-lg-8">
                          <input name="patient_name" type="text"id="patient-name"class="form-control"
                          placeholder="Name" required>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-lg-4">Contact</label>
                    <div class="col-sm-8 col-lg-8">
                        <input name="contact_no" type="tel"id="contact"class="form-control"
                        placeholder="123"required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-lg-4">Doctor:</label>
                    <div class="col-sm-8 col-lg-8">
                         <select onchange="get_doc(this)" class="form-control" name="doctor_id" id="doctor">
                            <option value="">Select Doctor</option>
                          <?php
                              $data=$mysqli->common_select('doctors');
                              if(!$data['error']){
                                foreach($data['data'] as $d){
                          ?>
                              <option value="<?= $d->id ?>"><?= $d->name ?></option>
                          <?php } } ?>
                      </select>
                      <span class="days"></span>
                    </div>
                  </div>
                <!---->
                <div class="form-group row">
                    <label class="col-sm-4 col-lg-4">Date</label>
                    <div class="col-sm-8 col-lg-8">
                      <input name="app_date" required type="date"id="date"class="form-control">
                      <span id="datemsg"></span>
                    </div>
                </div>
                
                <!---->
                <div class="form-group row">
                    <label class="col-sm-4 col-lg-4">Time</label>
                    <div class="col-sm-8 col-lg-8">
                      <input readonly name="app_time" type="time"id="time"class="form-control">
                    </div>
                </div>
                <!---->
                <div class="form-group row">
                    <label class="col-sm-4 col-lg-4">Symptoms</label>
                    <div class="col-sm-8 col-lg-8">
                        <textarea name="symptoms" id="symptoms" class="form-control" required></textarea>
                    </div>
                </div>
                <!---->
                <div class="form-group row justify-content-end">
                    <div class="col-sm-5">
                        <button type="submit"class="btn btn-form">
                            Confirm
                        </button>
                    </div>
                </div>
              </form>
            <?php

                if($_POST){
                    $rs=$mysqli->common_create('appointment_request',$_POST);
                    if(!$rs['error']){
                    echo "Successfully done";
                    }else{
                        echo $rs['error'];
                    }
                }
            ?>
          </div>
          
      </div>
  </div>

  <!-- Footer-->
  <footer class="footer py-4 mt-5">
    <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4 text-lg-left">Copyright © WDPF-R54</div>
            <div class="col-lg-4 my-3 my-lg-0">
              <a class="btn btn-back btn-social mx-2 rounded-circle" href="#!">
                <i class="fab fa-facebook"></i></a>
                <a class="btn btn-back btn-social mx-2 rounded-circle" href="#!">
                 <i class="fab fa-twitter"></i></a>
                  <a class="btn btn-back btn-social mx-2 rounded-circle" href="#!">
                      <i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-right">
              <a class="mr-3 text" href="#!">Privacy Policy</a>
              <a href="#!"class="text">Terms of Use</a></div>
        </div>
    </div>
</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      var doc_day="";
      function get_doc(e){
        let doc_id=$(e).val();
        $.getJSON( "doc_data.php", { id: doc_id } )
          .done(function( json ) {
            if(!json.error){
              doc_day=json.data.days;
              $(".days").text(json.data.days);
              $("#time").val(json.data.start_time);
            }
          })
          .fail(function( jqxhr, textStatus, error ) {
            var err = textStatus + ", " + error;
            console.log( "Request Failed: " + err );
        });
      }

      const validate = dateString => {
        var days=doc_day.split(',');
        const day = (new Date(dateString)).getDay();
        for(i in days){
          console.log(days[i])
          if(days[i]=="Sat")
            if (day==6) 
              return true;
          if(days[i]=="Sun")
            if (day==0) 
              return true;
          if(days[i]=="Mon")
            if (day==1) 
              return true;
          if(days[i]=="Tue")
            if (day==2) 
              return true;
          if(days[i]=="Wed")
            if (day==3) 
              return true;
          if(days[i]=="Thur")
            if (day==4) 
              return true;
          if(days[i]=="Fri")
            if (day==5) 
              return true;
            
        }
        
        return false;
      }

      // Sets the value to '' in case of an invalid date
      document.querySelector('#date').onchange = evt => {
        $('#datemsg').text("")
        if (!validate(evt.target.value)) {
          evt.target.value = '';
          $('#datemsg').text("This doctor is not available on this date.")
        }
      }
  </script>
  </body>
</html>