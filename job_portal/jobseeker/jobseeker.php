<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/cFunctions.php"); ?>
<?php require_once('../header.php');?>
<?php Confirm_login(); ?>
<?php?>
<body id="back">
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="../index.php">Job Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav order-lg-1">
        <li class="nav-item active">
          <a class="nav-link" href="jobseeker.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jobs.php">search for jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jobs.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="clogout.php">logout</a>
        </li>

      </ul>
    </div>
  </nav>
  <div class="jumbotron jumbotron-fluid bg-dark text-white">
  <div class="container text-sm-center pt-3">
  <h1 class="display-2">Job Seeker</h1>
  <p class="lead"><img src="" class="mt-3"></p>

  <div class="btn-group mt-4" role="group" aria-label="Callout buttons">
    <a type="button" id="btn" class="btn btn-primary btn-lg" href="jobs.php" >Search For Jobs</a>

  </div>
  </div>
  </div>
	</body>
</html>

<style>
#back{
  background-color: ;
}
</style>
