<?php
	header('Content-Type: application/json');

	$conn = mysqli_connect("localhost","root","1234","covidproject");

    $enddate = date("Y-m-d",strtotime("+1 days"));
    $startdate = date('Y-m-d',strtotime("-1 month"));    
    $initialtdate = date('Y-m-d',strtotime("-4 months"));

    $data = array();
    $i = 0;
    while($enddate!=$startdate)
    {
        $result = mysqli_query($conn, "SELECT SUM(t1.count) as test_count,  '$startdate' as mydate from (SELECT count from tests_taken where t_date  between '$initialtdate' AND '$startdate') as t1");
        $data[$i] = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) as patient_count from patients where patient_testdate  between '$initialtdate' AND '$startdate'");
		$data[$i] +=  mysqli_fetch_assoc($result);		
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) as death_count from casesclosed where status = 'Dead' and closedate  between '$initialtdate' AND '$startdate'");
        $data[$i] += mysqli_fetch_assoc($result);		
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) as recovery_count from casesclosed where status = 'Recovered' and closedate  between '$initialtdate' AND '$startdate'");
        $data[$i] += mysqli_fetch_assoc($result);		
        mysqli_free_result($result);
        
        $startdate = date('Y-m-d',strtotime($startdate.'+1 days'));
        $i++;
    }

    // var_dump($data);

    mysqli_close($conn);

    echo json_encode($data);
?>