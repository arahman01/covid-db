<?php
	header('Content-Type: application/json');

	$conn = mysqli_connect("localhost","root","1234","covidproject");

	$enddate = date("Y-m-d",strtotime("+1 days"));
	$startdate = date('Y-m-d',strtotime("-1 month"));

	$data = array();
    $result = mysqli_query($conn, "SELECT count(*) as cc, patient_testdate as t_date from patients where (patient_testdate between '$startdate' and '$enddate') group by patient_testdate");
    $allresults = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($allresults as $row)
    {    
        $data[] = $row; 
    }
    mysqli_free_result($result);
    // var_dump($data);

    mysqli_close($conn);

    echo json_encode($data);
?>