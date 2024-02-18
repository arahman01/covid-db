<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    //get ID
    $id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "DELETE from places where id = '{$id}'";
    echo $query;
    // $query = 'DELETE from provinces where province_name =' .$pn;

    if(mysqli_query($conn, $query))
    {
        // mysqli_close($conn);
        header('Location: '.ROOT_URL.'place.php');
    }
    else
    {
        echo mysqli_error($conn);
    }

?>