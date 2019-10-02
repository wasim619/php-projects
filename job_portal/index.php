<?php
include_once('header.php');
include_once('navbar.php');
include_once('Include/Session.php');
include_once('Include/DB.php');
include_once('Include/cFunctions.php');

?>




<!--for Callout buttons  -->
<div class="jumbotron jumbotron-fluid bg-info text-white">
<div class="container text-sm-center pt-5">
<h1 class="display-2">Online job portal</h1>
<p class="lead">One Stop For All Job Seekers And Employers<img src="" class="mt-3"></p>

<div class="btn-group mt-4" role="group" aria-label="Callout buttons">
  <a type="button" class="btn btn-primary btn-lg" href="jobseeker/cregister.php" >I Am A Candidate</a>
  <a type="button" class="btn btn-secondary btn-lg ml-4" href="employer/eregister.php" >We Are An Employer</a>
</div>
</div>
</div>
<!--/for Callout buttons  -->
<!--Gallery  -->


<!--/Gallery -->
<!--About us  -->
<div class="container">
<h1 id="About us" class="display-4 text-center my-5 text-muted">About us</h1>
<div class="row">
  <div class="col-md-6 col-lg-6">
    <div class="card mb-3">
      <img class="card-img-top" src="img/SSAHIL.jpg" alt="sahil">
      <div class="card-body">
        <h5 class="card-title">Sahil Sakharkar</h5>
        <p class="card-text">Sahil is a programmer who loves to code.</p>
      </div>
  </div>
</div>



  <div class="col-md-6 col-lg-6">
    <div class="card mb-3">
      <img class="card-img-top" src="img/WASIM.jpg" alt="sahil">
      <div class="card-body">
        <h5 class="card-title">Wasim  Sayyed</h5>
        <p class="card-text">Wasim manages the online job portal.</p>
      </div>
  </div>
  </div>

</div>
</div>

<!--/About us  -->
<!-- contact us  -->
<hr class="my-5" name="contact">
<div class="container bg-grey mb-5" id="contact">
    <div class="page-header" style="background: #f4511e"></div>
    <h2 class="text-center mb-5" >CONTACT US</h2>
    <div class="page-header"></div>
    <div class="row">
        <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Mumbai, India</p>
            <p><span class="glyphicon glyphicon-phone"></span> +91 8898293575</p>
            <p><span class="glyphicon glyphicon-envelope"></span> info@jobportal.com</p>
        </div>

        <form action="index.php" method="post">
        <div class="col-sm-7">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit" name="send">Send</button>
                </div>
            </div>
</form>
        </div>

    </div>

</div>
<?php
if(isset($_POST['send'])){
$name=mysqli_real_escape_string($ConnectingDB,$_POST['name']);
$email=mysqli_real_escape_string($ConnectingDB,$_POST['email']);
$comments=mysqli_real_escape_string($ConnectingDB,$_POST['comments']);

if(empty($name) || empty($email) || empty($comments)){
  $_SESSION['message']='All fields are required';
}else{
  global $ConnectingDB;
  $Query="INSERT INTO contact(name,email,comments) VALUES('$name','$email','$comments')";
  $Execute=mysqli_query($ConnectingDB,$Query);
  if(mysqli_num_rows($Execute)>0){
    $_SESSION['message']='Your comments have been submitted';
  }else{
    Redirect_To('index.php');
  }
}

}
?>




<!--sign up form  -->
<hr>
<div class="container">
<div class="row py-4 text-muted">
  <div class="col-md col-xl-5">
    <p><strong>About Online Job Portal</strong></p>
    <p>One Stop For All Job Seekers And Employers</p>
    <nav class="nav flex-column">
      <a class="nav-link" href="#">Our Officials</a>
      <a class="nav-link" href="#">Team</a>
      <a class="nav-link" href="#">Contacts</a>
      <a class="nav-link" href="#">Disabled</a>
    </nav>
  </div>

  <div class="col-md col-xl-5 ml-auto">
    <p><strong>Stay up-to-date on Online Job Portal</strong></p>
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Enter Email">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">Sign up</button>
      </span>
    </div>
  </div>
</div>
</div>

<!--/sign up form  -->

<!--footer  -->
<hr>
<div class="container">
<div class="row py-3">
  <div class="col-md-7">

  </div>
  <div class="col-md text-md-right">
    <small>&copy;2018 <a class="" href="index.html">Online Job Portal</a></small>
  </div>
</div>
</div>

<!--/footer  -->

<?php
include_once('footer.php');
?>
