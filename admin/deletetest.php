<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    //get ID
    $city = mysqli_real_escape_string($conn, $_GET['c_id']);
    $date = mysqli_real_escape_string($conn, $_GET['d_id']);
    $query = "DELETE from tests_taken where t_date =  '{$date}' and city = '{$city}'";
    echo $query;
    // $query = 'DELETE from provinces where province_name =' .$pn;

    if(mysqli_query($conn, $query))
    {
        // mysqli_close($conn);
        header('Location: '.ROOT_URL.'teststaken.php');
    }
    else
    {
        echo mysqli_error($conn);
    }

?>
