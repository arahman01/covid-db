<?php 

    require('config/config.php');  
    require('config/connectdb.php');

   

    $query = 'SELECT * from placesvisited';
    $result = mysqli_query($conn, $query);
    $placesvisited = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>    

    <div class="container">
    <br><br><a href = "<?php echo ROOT_URL;?>" class = "btn btn-outline-secondary">Back</a>
       
    <br> <br><h1>Places Visited</h1><br><br>
        <div class="container">
       
        <a href = "<?php echo ROOT_URL . 'addplacesvisited.php';?>" class = "btn btn-success">Add Visited Place</a>
        <table class="table table-hover">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Place ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Delete</th>                    
                    </tr>
                </thead>

                <tbody>
                    <?php $temp = 0; foreach($placesvisited as $city) : ?>
                        <tr class="table-light">
                        <th scope="row"><?php echo $city['patient_id']?></th>                       
                        
                        <td><?php echo $city['place_id'];?></td>                       
                        
                        <td><?php echo $city['date'];?></td>

                        <td>
                        <a class="btn btn-outline-danger" href="deleteplacesvisited.php?a_id=<?php echo $city['patient_id'].'&&b_id='.$city['place_id'].'&&c_id='.$city['date'];?>">Delete</a>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            </table> 
        </div>
    </div>

    <?php include ('inc/footer.php');