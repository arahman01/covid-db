<?php
	header('Content-Type: application/json');

	$conn = mysqli_connect("localhost","root","1234","covidproject");

	$enddate = date("Y-m-d",strtotime("+1 days"));
	$startdate = date('Y-m-d',strtotime("-1 month"));
	
	$initialtdate = date('Y-m-d',strtotime("-4 months"));
	// $result = mysqli_query($conn, "SELECT * FROM tests_taken where city = 'Lahore' and t_date between '$startdate' AND '$enddate'");
	$myarr = array();
	$i =0;

	$data = array();
	while($enddate!=$startdate)
	{

		$result = mysqli_query($conn, "SELECT count(*) as cc, '$startdate' as mydate from patients where patient_testdate  between '$initialtdate' AND '$startdate'");
		$allresults = mysqli_fetch_all($result, MYSQLI_ASSOC);
		// $myarr[$i] =  $allresults;
		// var_dump($allresults);
		foreach($allresults as $row)
		{    
			$data[] = $row; 
		}
		mysqli_free_result($result);
		$i++;
		$startdate = date('Y-m-d',strtotime($startdate.'+1 days'));
	}
	// var_dump($myarr);



// $sqlQuery = "SELECT patient_id,patient_name,patient_age FROM patients where patient_id between 9900 and 10000 ORDER BY patient_id";

// $result = mysqli_query($conn,$sqlQuery);

// foreach ($result as $row) {
// 	$data[] = $row;
// }

mysqli_close($conn);

echo json_encode($data);
?>