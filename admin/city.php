<?php 

    require('config/config.php');  
    require('config/connectdb.php');

   

    $query = 'SELECT * from cities';
    
    //Get Result
    $result = mysqli_query($conn, $query);

    //Fetch Data
    $cities = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);
    //Free Result
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>    

    <div class="container">
    <br><br><a href = "<?php echo ROOT_URL;?>" class = "btn btn-outline-secondary">Back</a>
       
    <br> <br><h1>Cities</h1><br><br>
        <div class="container">
       
        <a href = "<?php echo ROOT_URL . 'addcity.php';?>" class = "btn btn-success">Add City</a>
        <table class="table table-hover">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">City</th>
                    <th scope="col">Province</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    
                    </tr>
                </thead>

                <tbody>
                    <?php $temp = 0; foreach($cities as $city) : ?>
                        <tr class="table-light">
                        <th scope="row"><?php echo $city['city']?></th>
                        
                        
                        <td><?php echo $city['province'];?></td>


                        <td>                        
                        <a class="btn btn-outline-warning" href="editcity.php?id=<?php echo $city['city'];?>">Edit</a>
                        </td>
                        
                        <td>
                        <a class="btn btn-outline-danger" href="deletecity.php?id=<?php echo $city['city'];?>">Delete</a>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            </table> 
        </div>
    </div>

    <?php include ('inc/footer.php');