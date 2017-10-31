<?php
	require_once('dbatsconfig.php');
	function connect(){
		$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Could not connect to db' . mysqly_error());
		return $con;
	}

	function close($con){
		mysqli_close($con);
	}

	function query($con, $query){
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result)){
			echo '<option value ="' . $row[0] . '"> ' . $row[1] . '</option>';
		}
	}

	function checkQuery($con){
		$result = mysqli_query($con, "Select * from intposition where hiring=0");
		while($row = mysqli_fetch_array($result)){
			echo '<div class="checkbox"><label class="checkbox"><input name="posApp'. $row[0]. '" type="checkbox" value="' . $row[0] . '"/>' . $row[1] . '</label></div>';
		}
	}

	function convertDate($date){
		$date = strtotime(str_replace('/', '.', $date));
		$newDate = date('Y-m-d', $date);
		return $newDate;
	}

	function intPosition($int_pos, $con){
		$selectQuery = "Select intposid from intposition where intposdesc='$int_pos'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		return $row[0];
	}

	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function table($con){
		$result = mysqli_query($con, "select applicant.AppID, applicant.FirstName, applicant.LastName, applicant.AppDate, stage.stagedesc, applicant.linkedin, applicant.notes  from applicant inner join stage on applicant.stageid=stage.stageid");
		while($row = mysqli_fetch_array($result)){
          	echo '<tr>
          		  <td>' . $row[0] . '</td>
                  <td>' . $row[1] . '</td>
                  <td>' . $row[2] . '</td>
                  <td>' . $row[3] . '</td>
                  <td>' . $row[4] . '</td>
                  <td>' . $row[5] . '</td>
                  <td>' . $row[6] . '</td>
                </tr>';
        }
	}

	function updateQuery($con){
		
	}
?>