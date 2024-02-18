<?php
	header('Content-Type: application/json');

	$conn = mysqli_connect("localhost","root","1234","covidproject");

	$enddate = date("Y-m-d",strtotime("+1 days"));
	$startdate = date('Y-m-d',strtotime("-1 month"));

	$data = array();
    $result = mysqli_query($conn, "SELECT count(*) as cases, patient_testdate as mydate from patients where (patient_testdate between '$startdate' and '$enddate') group by patient_testdate");
    $allresults = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $result = mysqli_query($conn, "SELECT count(*) as recoveries from casesclosed where (closedate between '$startdate' and '$enddate') group by closedate");
    $recoveries = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);



    $i =0;
    foreach($allresults as $row)
    {    
        $data[$i] = $row; 
        $data[$i] += $recoveries[$i];
        $i++;
    }
    // var_dump($data);

    mysqli_close($conn);

    echo json_encode($data);
?>