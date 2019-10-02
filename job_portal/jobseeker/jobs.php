
<?php
include_once('../header.php');
include_once('../Include/DB.php');
require_once("../Include/cFunctions.php");

?>

<style>
#back{
  background-color: indigo;
}
</style>

<body id="back">
<nav class="navbar" id="insidenav">
		<div class="container-fluid">
				<div class="navbar-header">
						<a class="navbar-brand" href="../index.php">Job Portal</a>
				</div>
				<ul class="nav navbar-nav">
						<li class="active"><a href="jobseeker.php">Job Seeker</a></li>
			 </ul>
       <ul class="nav navbar-nav">
           <li class="active"><a href="jobs.php">Search for job</a></li>
      </ul>
				<ul class="nav navbar-nav navbar-right">
						<li><a href="clogout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			 </ul>
		 </div>
 </nav>
<div class="container-fluid" id="main1"> <!-- jumbotron fluid -->
<div class="jumbotron text-center" id="searchjum">
<h1>Job Portal</h1>
    <p>Search for Jobs</p>
    <form action="jobs.php" method="get">
        <input type="text" class="form-control" size="50" placeholder="Enter job category" name="keyword" id="keyword">
        <input type="submit"  class="btn btn-lg " style="color: black" name="search" value="search">
          </form>
</div>
</div> <!-- jumbotron -->
<?php

?>
<?php include_once('../Include/DB.php');?>
<?php

if(isset($_GET['search'])){
$key=$_GET['keyword'];

$query="select * from jobs where job_category='" . mysqli_real_escape_string($ConnectingDB,$key) . "' ";
$result=mysqli_query($ConnectingDB,$query);
if(mysqli_num_rows($result)==0){
  echo "<center><b>No records found in this job category</b></center>";
}
  while($row = mysqli_fetch_assoc($result)){
    $id=$row['jobid'];
    $title=$row['title'];
    $jobdesc=$row['jobdesc'];
    $exp=$row['experience'];
    $salary=$row['salary'];
    $jobcategory=$row['job_category'];
    $ugequal=$row['ugequal'];
    $pgequal=$row['pgequal'];
    $postdate=$row['postdatetime'];
  ?>
  <div class="container">
    <table class="text-center" padding="50" width="70%" border="1px solid black">
                <tr style="background-color:green; color:white">
                    <th><strong>job id</strong></th>
                    <th><strong>title</strong></th>
                    <th><strong>job description</strong></th>
                    <th><strong>experience</strong></th>
                    <th><strong>salary</strong></th>
                    <th><strong>job category</strong></th>
                    <th><strong>ugequal</strong></th>
                    <th><strong>pgequal</strong></th>
                    <th><strong>post date</strong></th>

                </tr>

          <tr class="text-center" style="background-color: white;color:black">
                    <td><?php echo $id;?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $jobdesc?></td>
                    <td><?php echo $exp;?></td>
                    <td><?php echo $salary;?></td>
                    <td><?php echo $jobcategory;?></td>
                    <td><?php echo $ugequal;?></td>
                    <td><?php echo $pgequal;?></td>
                    <td><?php echo $postdate;?></td>

                </tr>
              </table>
            </div>
              <?php
}
}
?>
