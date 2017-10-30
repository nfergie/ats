<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- First include jquery js -->
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href=https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
</head>
<body>



<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="index.php">ATS</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="#">Add Applicant</a></li>
          <li><a href="#">Contact</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Nav header</li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
          <li><a href="../navbar-static-top/">Static top</a></li>
          <li><a href="../navbar-fixed-top/">Fixed top</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>

<div class="container-fluid">
	<div class="jumbotron">
	  	<h1 class="display-3">Your applicant was submitted successfully</h1>
	  	<hr class="my-4">
	  	<p class="lead">
	  		<a class="btn btn-primary btn-lg" href="index.php" role="button">Home</a>
	  	</p>
  </div>
</div>




<?php
	require_once 'connection.php';
	$con = connect();

		$hir_emp = intval($_POST["hir_emp"]);
		$last_name = $_POST["last_name"];
		$first_name = $_POST["first_name"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$app_date = convertDate($_POST["AppDate"]);
		$cur_pos = intval($_POST["cur_pos"]);
		$plat = intval($_POST["plat"]);
		$sala = intval($_POST["salary"]);
		$github = $_POST["github"];
		$link = $_POST["linkedin"];
		$pers = $_POST["pers_page"];
		$notes = $_POST["notes"];
		$HirEmpID = intval($_POST["hir_emp"]);
		

	$inApplicant = "insert into applicant(lastname, firstname, email, tel, appdate, notes, extposid, github, perspage, linkedin, stageid, HirEmpID) values('$last_name', '$first_name', '$email', '$phone', '$app_date', '$notes', $cur_pos, '$github', '$pers', '$link',2, $HirEmpID )";


	$result1 = mysqli_query($con, $inApplicant) or die ('Error in query');

	$id= mysql_insert_id($result);

	$regex="/(posApp)\d/";
?>


</body>
</html>

 <!-- extposid, github, perspage, linkedin
$cur_pos, '$github', '$pers', '$link' -->