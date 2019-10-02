<?php include_once('Include/DB.php');?>
<?php

if(isset($_GET['search'])){
$key=$_GET['keyword'];

$query="select * from jobs where job_category='" . mysqli_real_escape_string($ConnectingDB,$key) . "' ";
$result=mysqli_query($ConnectingDB,$query);

  while($row = mysqli_fetch_assoc($result)){
    $id=$row['jobid'];
    $title=$row['title'];
    $jobdesc=$row['jobdesc'];
    $exp=$row['experience'];
    $salary=$row['salary'];
    $jobcategory=$row['job_category'];
    $ugequal=$row['ugequal'];
    $pgequal=$row['pgequal'];
    $postdate=$row['postdate'];
  ?>
    <table width="70%" border="1px solid black">
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

          <tr class="">
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
              <?php
}
}
?>
