<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    //get ID
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE from sources where source_name =  '{$pn}'";
    
    // $query = 'DELETE from provinces where province_name =' .$pn;

    if(mysqli_query($conn, $query))
    {
        // mysqli_close($conn);
        header('Location: '.ROOT_URL.'sources.php');
    }
    else
    {
        echo mysqli_error($conn);
    }

?>