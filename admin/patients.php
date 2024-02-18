<?php 

    require('config/config.php');  
    require('config/connectdb.php');

   

    $query = 'SELECT * from patients';
    
    //Get Result
    $result = mysqli_query($conn, $query);

    //Fetch Data
    $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);
    //Free Result
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>    

    <div class="container">
    <br><br><a href = "<?php echo ROOT_URL;?>" class = "btn btn-outline-secondary">Back</a>
       
    <br> <br><h1>Patients</h1><br><br>
        <div class="container">
       
        <a href = "<?php echo ROOT_URL . 'addpatients.php';?>" class = "btn btn-outline-success">Add Patient</a>
        <table class="table table-hover">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Centre ID</th>
                    <th scope="col">City</th>
                    <th scope="col">Details</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $temp = 0; foreach($patients as $patient) : ?>
                        <tr class="table-light">
                        <th scope="row"><?php echo $patient['patient_id']?></th>
                        
                        
                        <td><?php echo $patient['patient_name'];?></td>
                        <td><?php echo $patient['patient_centre'];?></td>                        
                        <td><?php echo $patient['patient_city'];?></td>
                        
                        <td>                        
                        <a class="btn btn-outline-info" href="infopatient.php?id=<?php echo $patient['patient_id'];?>">Detail</a>
                        </td>

                        <td>                        
                        <a class="btn btn-outline-warning" href="editpatients.php?id=<?php echo $patient['patient_id'];?>">Edit</a>
                        </td>
                        
                        <td>
                        <a class="btn btn-outline-danger" href="deletepatient.php?id=<?php echo $patient['patient_id'];?>">Delete</a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            </table> 
        </div>
    </div>

    <?php include ('inc/footer.php');