<?php 

    require('config/config.php');  
    require('config/connectdb.php');

   

    $query = 'SELECT * from centres';
    
    //Get Result
    $result = mysqli_query($conn, $query);

    //Fetch Data
    $centres = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);
    //Free Result
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>    

    <div class="container">
    <br><br><a href = "<?php echo ROOT_URL;?>" class = "btn btn-outline-secondary">Back</a>
       
    <br> <br><h1>Hospitals and Quarantine Centres</h1><br><br>
        <div class="container">
       
        <a href = "<?php echo ROOT_URL . 'addcentre.php';?>" class = "btn btn-success">Add Centre</a>
        <table class="table table-hover">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    
                    </tr>
                </thead>

                <tbody>
                    <?php $temp = 0; foreach($centres as $centre) : ?>
                        <tr class="table-light">
                        <th scope="row"><?php echo $centre['name']?></th>                        
                        
                        <td><?php echo $centre['city'];?></td>
                        <td><?php echo $centre['capacity'];?></td>


                        <td>                        
                        <a class="btn btn-outline-warning" href="editcentre.php?id=<?php echo $centre['name'];?>">Edit</a>
                        </td>
                        
                        <td>
                        <a class="btn btn-outline-danger" href="deletecentre.php?id=<?php echo $centre['name'];?>">Delete</a>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            </table> 
        </div>
    </div>

    <?php include ('inc/footer.php');