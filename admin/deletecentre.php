<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    //get ID
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE from centres where name =  '{$pn}'";
    
    // $query = 'DELETE from provinces where province_name =' .$pn;

    if(mysqli_query($conn, $query))
    {
        // mysqli_close($conn);
        header('Location: '.ROOT_URL.'centre.php');
    }
    else
    {
        echo mysqli_error($conn);
    }

?>
