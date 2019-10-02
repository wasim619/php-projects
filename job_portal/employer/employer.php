<?php include_once('../header.php'); ?>
<?php include_once('../Include/DB.php');?>
<?php include_once('../Include/eFunctions.php');?>
<?php require_once("../Include/Session.php"); ?>
<?php require_once('../Include/Styles.css'); ?>
<?php Confirm_login(); ?>
<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Post Jobs </title>

    </head>
    <body>

    <div id="nav">
        <nav>
            <div class="navbar" id="insidenav" >
                <div class="navbar-header">
                    <a class="navbar-brand" href="../index.php">Job Portal</a>
                </div>

                <ul class="nav navbar-nav nav justify-content-end">
                    <li class=""><a href="employer.php">Home</a>
                    <a class="mr-2" href="Post_Jobs.php">Post Jobs</a></li>
                        </ul>



                <ul class="nav navbar-nav navbar-right">

                    <li><a href="elogout.php">Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div><!-- /.container-fluid -->
    <div class="jumbotron jumbotron-fluid bg-info text-white">
    <div class="container text-sm-center pt-3">
    <h1 class="display-2">Employer</h1>
    <p class="lead"><img src="" class="mt-3"></p>

    <div class="btn-group mt-4" role="group" aria-label="Callout buttons">
      <a type="button" id="btn" class="btn btn-primary btn-lg" href="Post_Jobs.php" >Post Jobs</a>

    </div>
    </div>
    </div>

<style>

#btn{
  font-size: 29px;

}
