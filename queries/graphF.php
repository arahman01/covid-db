<?php
	header('Content-Type: application/json');

    $conn = mysqli_connect("localhost","root","1234","covidproject");

    $startage = 0;
    $endage = 20;
    
    $data = array();
    

    for($i=0; $i<5; $i++):
        $result = mysqli_query($conn, "SELECT count(*) as males, '$endage' as label from patients where patient_gender = 'Male' and patient_age  between $startage AND $endage");
        $data[$i] = mysqli_fetch_assoc($result);
        mysqli_free_result($result);    


        $result = mysqli_query($conn, "SELECT count(*) as females from patients where patient_gender = 'Female' and patient_age  between $startage AND $endage");
        $data[$i] += mysqli_fetch_assoc($result);
        mysqli_free_result($result); 
        // var_dump($data);
        $startage = $endage+1;
        $endage += 20;
    endfor;

    mysqli_close($conn);

    echo json_encode($data);
?>