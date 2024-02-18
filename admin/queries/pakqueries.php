<?php

    $conn = mysqli_connect("localhost", "root", "1234", "covidproject");
    header('Content-Type: application/json');

    if (mysqli_connect_errno($conn))
    {
        echo "Failed to connect to DataBase: " . mysqli_connect_error();
    }
    else
    {
        $data_points = array();

        $enddate = date("Y-m-d",strtotime("0 days"));
        $startdate = date('Y-m-d',strtotime("-1 month"));
        // $initialdate = date('Y-m-d',strtotime("-4 months"));
        $i = 0;
        $out = array();
        $out2 = array();
        while($enddate != $startdate)
        {
            $result = mysqli_query($conn, "SELECT count(*) from patients where patient_testdate = '$startdate'");
            $out[$i] = mysqli_fetch_assoc($result);
            mysqli_free_result($result);       
            $result = mysqli_query($conn, "SELECT count(*) from casesclosed where status = 'Recovered' and closedate = '$startdate'");
            $out2[$i] = mysqli_fetch_assoc($result);
            mysqli_free_result($result);         
            $startdate = date('Y-m-d',strtotime($startdate.'+1 days'));
            $i++;
        }
        var_dump($out2);
        var_dump($out);
        
        echo json_encode($data_points, JSON_NUMERIC_CHECK);
    }
    mysqli_close($conn);

?>
