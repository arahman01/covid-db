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
        $result = mysqli_query($conn, "SELECT count(*) as punjab_count, '$startdate' as mydate  from patients where patient_testdate between '$initialtdate' and '$startdate' and patient_city IN (SELECT city from cities where province ='Punjab')");
        $data[$i] = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) as sindh_count from patients where patient_testdate between '$initialtdate' and '$startdate' and  patient_city IN (SELECT city from cities where province ='Sindh')");
		$data[$i] +=  mysqli_fetch_assoc($result);		
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) as ajk_count from patients where patient_testdate between '$initialtdate' and '$startdate' and patient_city IN (SELECT city from cities where province ='AJK')");
        $data[$i] += mysqli_fetch_assoc($result);		
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) as balochistan_count  from patients where patient_testdate between '$initialtdate' and '$enddate' and patient_city IN (SELECT city from cities where province ='Balochistan')");
        $data[$i] += mysqli_fetch_assoc($result);		
        mysqli_free_result($result);
        
        $result = mysqli_query($conn, "SELECT count(*) as kpk_count  from patients where patient_testdate between '$initialtdate' and '$startdate' and patient_city IN (SELECT city from cities where province ='KPK')");
        $data[$i] += mysqli_fetch_assoc($result);		
        mysqli_free_result($result);
        
        $result = mysqli_query($conn, "SELECT count(*) as gilgit_count from patients where patient_testdate between '$initialtdate' and '$startdate' and patient_city IN (SELECT city from cities where province ='Gilgit Baltistan')");
        $data[$i] += mysqli_fetch_assoc($result);		
        mysqli_free_result($result);
        
        $startdate = date('Y-m-d',strtotime($startdate.'+1 days'));
        $i++;
    }

    // var_dump($data);

    mysqli_close($conn);

    echo json_encode($data);
?>