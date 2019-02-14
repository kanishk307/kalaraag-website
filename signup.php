 <?php
$msg = '';
$msgClass= '';
if(filter_has_var(INPUT_POST, 'submit')){
//     echo "submitted";
//    get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    if(!empty($name) && !empty($email) && !empty($message)){
        //passed
        //checking for email
        if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
            $msg = 'Please fill all fields correctly';
            $msgClass = 'alert-danger';
        } else{
//             echo 'Passed';
               //Recipient email
               $toEmail = "ysj30797.kj@gmail.com";
               $subject = "Contact request from $name";
               $body = "<h2>Contact Request</h2>
               <h4>Name : $name</h4>
                <h4>Email : $email</h4> 
                 <h4>Message : $message</h4>";
               
               // Setting email headers here
               $headers = "MIME-Version: 1.0" ."\r\n";
               $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
               
               // Additional Headers
               $headers .= "From: " .$name. "<".$email.">". "\r\n";
        } 
     
         
         
    if(mail($toEmail, $subject, $body,$headers)){
        $msg = 'Thank you for sending your details. We will respond soon.';
        $msgClass = 'alert-success';
    }else{
        $msg = 'You email was not sent';
        $msgClass = 'alert-danger';
    }
    }
    else{
        //failed
        $msg = 'Please fill all fields correctly';
        $msgClass = 'alert-danger';
    }
    
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<!--    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
   
<link rel="stylesheet" href="css/style.css">
<!--    <link rel="stylesheet" href="bootstrap/css/custom.css">-->
    <title>RAIT-Kalaraag</title>
</head>
<body>

<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="border-bottom: 1px solid orange;">
 <div class="container">
  <a class="navbar-brand" href="index.html">Kalaraag</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto w-100 justify-content-end">
      <li class="nav-item active">
        <a class="nav-link forange" href="./index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./aboutus.html">About Us </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="./footloose.html">Footloose</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="./gallery.html">Gallery</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="./signup.html"  style="color: orange;">Sign Up</a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="./contactus.html">Contact Us</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Accomplishments
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ourEvents.html">Our Events</a>
          <a class="dropdown-item" href="/ourParticipation.html">Our Participation</a>   
          <a class="dropdown-item" href="/ourAchievements.html">Our Achievements</a>
        </div>
      </li>
      
    </ul>
  </div>
  </div>
</nav>
   
   
<section id="signup-first-box">
<!--    <div class="container">-->
        <div class="container" style="margin: 50px auto; width:30%; ">
          <?php if($msg != ''):?>
          	<div class="alert <?php echo $msgClass;?>"><?php echo $msg;?></div>
          <?php endif;?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($name)? $name : ''; ?>">
                    
                </div>

                <div class="form-group">
                    <label for="email">Email  </label>
                    <input type="text" name="email" class="form-control"  value="<?php echo isset($email)? $email : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                   <textarea name="message"  cols="30" rows="10" class="form-control"><?php echo isset($message)? $message : ''; ?></textarea>
                </div>

                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>  

        
    </div>
</section>



<!-- Footer -->
<footer class="page-footer font-small blue footer" style="margin-top: 12%;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 text-white">&copy; 2019 Copyright:
    <a href="http://kalaraag.in">RAIT Kalaraag Official</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
<script src="js/typingeffect.js"></script>

</body>
</html>