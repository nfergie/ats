<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "Select applicant.AppID, 
  applicant.FirstName, 
  applicant.LastName, 
  applicant.AppDate, 
  employee.firstname as HirFirstName, 
  stage.stagedesc, 
  applicant.email, 
  applicant.linkedin,
  applicant.notes
from applicant
inner join stage
  on stage.stageid=applicant.stageid 
inner join hiringemp 
  on hiringemp.hirempid=applicant.hirempid 
inner join employee 
  on employee.empid = hiringemp.empid";
$faq = $db_handle->runQuery($sql);
?>

<!DOCTYPE html>
<html>


<head>
  <title>Applicant Tracker System</title>
  <meta charset="utf-8">

  <!-- First include jquery js -->
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- datatables imports -->
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

  <!-- scripts -->
  <script type="text/javascript">
    function showEdit(editableObj) {
      $(editableObj).css("background","#FFF");
    } 
    function saveToDatabase(editableObj,column,id) {
      $.ajax({
        url: "saveedit.php",
        type: "POST",
        data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
        success: function(data){
          $(editableObj).css("background","#FDFDFD");
        }     
      });
    }


  </script>

  
  <!-- datatables script -->
  <script type="text/javascript" language="javascript" >
    $(document).ready(function() {
       $('#applicants').DataTable();
    } );
</script>


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
        <a class="navbar-brand" href="#">ATS</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="applicant.php">Add Applicant</a></li>
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
  <div class="container">
    <div class="table-responsive">
      <table id="applicants" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Application Date</th>
            <th>POC</th>
            <th>Stage</th>
            <th>E-mail</th>
            <th>LinkedIn</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($faq as $k=>$v){
          ?>
            <tr>
              <td><?php echo $faq[$k]["AppID"] ?></td>
              <td><?php echo $faq[$k]["FirstName"]; ?></td>
              <td><?php echo $faq[$k]["LastName"]; ?></td>
              <td><?php echo $faq[$k]["AppDate"]; ?></td>
              <td><?php echo $faq[$k]["HirFirstName"]?></td>
              <td><?php echo $faq[$k]["stagedesc"]; ?></td>
              <td><?php echo $faq[$k]["email"]?></td>
              <td><?php echo $faq[$k]["linkedin"]; ?></td>
              <td contenteditable="true" onBlur="saveToDatabase(this,'notes','<?php echo $faq[$k]["AppID"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["notes"]; ?></td>
            </tr>
            <?php
              }
            ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Applicant name -->
<!--   <div class="contianer">
		<div class="form-group">
		<label class="col-md-4 control-label">Last Name</label>
		<div class="col-md-4 selectContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				<select name="name" class="form-control selectpicker">
					<?php 
					$db_handle2 = new DBController();
					$db_handle->selectQuery("Select applicant.appid, applicant.LastName from applicant");
					?>
				</select>
			</div>
		</div>
		</div>  	
  </div>

 -->
  
</body>

</html>

