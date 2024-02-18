<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    //get ID
    $a_id = mysqli_real_escape_string($conn, $_GET['a_id']);
    $b_id = mysqli_real_escape_string($conn, $_GET['b_id']);
    $c_id = mysqli_real_escape_string($conn, $_GET['c_id']);
    $query = "DELETE from placesvisited where patient_id = {$a_id} and place_id = {$b_id} and date = '{$c_id}'";
    if(mysqli_query($conn, $query))
    {
        header('Location: '.ROOT_URL.'placesvisited.php');
    }
    else
    {
        echo mysqli_error($conn);
    }

?>