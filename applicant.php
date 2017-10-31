<!DOCTYPE html>
<html>
<head>
	<title>Insert Applicant</title>

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

	<!-- Form Validation -->
 	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"> </script>

	<!-- Validator script -->
	<script type="text/javascript" src="validatorApp.js"></script>

	<!-- CSS -->
	<style type="text/css">
		#success_message{ display: none;}
	</style>

	<!-- connect to DB -->
		<?php
	require_once 'connection.php';
	$con = connect();
?>

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


<?php 
	$result = mysqli_query($con, "Select * from intposition where hiring=0");

?>

<div class="container">
	<form class="well form-horizontal" action="insertApplicant.php" method="post" id="applicant_form" name="applicant_form">
		<fieldset>

		<!-- Point of Contact -->
		<div class="form-group">
		<label class="col-md-4 control-label">Point of Contact</label>
		<div class="col-md-4 selectContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<select name="hir_emp" class="form-control selectpicker">
					<?php query($con, "select hiringemp.HirEmpId, employee.FirstName from hiringemp inner join employee on hiringemp.empid=employee.empid"); ?>
				</select>
			</div>
		</div>
		</div>

		<!-- First Name -->
		<div class="form-group">
		<label class="col-md-4 control-label">First Name</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="first_name" placeholder="First Name" class="form-control">
			</div>
		</div>
		</div>

		<!-- Last Name -->
		<div class="form-group">
		<label class="col-md-4 control-label">Last Name</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="last_name" placeholder="Last Name" class="form-control">
			</div>
		</div>
		</div>

		<!-- Email -->
		<div class="form-group">
		<label class="col-md-4 control-label">E-mail</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="text" name="email" placeholder="E-mail Address" class="form-control">
			</div>
		</div>
		</div>

		<!-- Phone # -->
		<div class="form-group">
		<label class="col-md-4 control-label">Phone #</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
				<input type="text" name="phone" placeholder="(555)555-5555" class="form-control">
			</div>
		</div>
		</div>

		<!-- Application Date -->
		<div class="form-group">
		<label class="col-md-4 control-label">Application Date</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				<input type="date" name="AppDate" placeholder="MM/DD/YYYY" class="form-control">
			</div>
		</div>
		</div>

		<!-- Current Position -->
		<div class="form-group">
		<label class="col-md-4 control-label">Current Position</label>
		<div class="col-md-4 selectContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				<select name="cur_pos" class="form-control selectpicker">
					<?php query($con, "Select * from extposition"); ?>
				</select>
			</div>
		</div>
		</div>

		<!-- Platform -->
		<div class="form-group">
		<label class="col-md-4 control-label">Platform</label>
		<div class="col-md-4 selectContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				<select name="plat" class="form-control selectpicker">
					<?php query($con, "Select * from platform"); ?>
				</select>
			</div>
		</div>
		</div>

		<!-- Position -->
		<div class="form-group">
		<label class="col-md-4 control-label">Positions</label>
		<div class="col-md-4 checkContainer">
			<div class="input-group">
				<?php checkQuery($con); close($con);?>
			</div>
		</div>
		</div>

		<!-- Salary -->
		<div class="form-group">
		<label class="col-md-4 control-label">Salary</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
				<input type="number" name="salary" min="0" placeholder="0" step=.01 class="form-control">
			</div>			
		</div>
		</div>

		<!-- GitHub -->
		<div class="form-group">
		<label class="col-md-4 control-label">GitHub</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-github"></i></span>
				<input type="text" class="form-control" name="github">
			</div>
		</div>	
		</div>

		<!-- LinkedIn -->
		<div class="form-group">
		<label class="col-md-4 control-label">LinkedIn</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-linkedin-square"></i></span>
				<input type="text" name="linkedin" class="form-control">
			</div>
		</div>
		</div>

		<!-- Personal Page -->
		<div class="form-group">
		<label class="col-md-4 control-label">Personal Page</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
				<input type="text" name="pers_page" class="form-control">
			</div>
		</div>	
		</div>

		<!-- notes -->
		<div class="form-group">
		<label class="col-md-4 control-label">Notes</label>
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
				<textarea type="text" name="notes" class="form-control"></textarea>
			</div>
		</div>
		</div>

		<!-- Submit -->
		<div class="form-group">
		<label class="col-md-4 control-label"></label>
		<div class="col-md-4">
			<button type="submit" class="btn btn-warning">Send  <span class="glyphicon glyphicon-send"></span></button>
		</div>
		</div>

	</fieldset>
	</form>
</div>



</body>
</html>



