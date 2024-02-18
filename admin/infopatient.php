<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 


    //Get Old Data
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * from patients where patient_id =  {$pn} ";
    $result = mysqli_query($conn, $query);
    $patient = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <br><h1>Patient Info</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="card-header">ID: <?php echo $patient['patient_id'];?></div>
        <div class="card-body">
            <h4 class="card-title">Name: <?php echo $patient['patient_name'];?></h4><br>
            <p class="card-text">Age: <?php echo $patient['patient_age'];?><br><br>Address: <?php echo $patient['patient_address'];?><br><br>City of Infection: <?php echo $patient['patient_city'];?><br><br>Gender: <?php echo $patient['patient_gender'];?><br><br>Centre: <?php echo $patient['patient_centre'];?><br><br>Test Date: <?php echo $patient['patient_testdate'];?><br><br>Virus Source: <?php echo $patient['patient_virussource'];?><br><br></p>
            
        </div>
            <br><a href = "<?php echo ROOT_URL . 'patients.php';?>" class = "btn btn-outline-secondary">Back</a>    <br><br>
        </div>
        
    </div>

    <?php include ('inc/footer.php');