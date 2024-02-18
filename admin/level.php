<?php 

    require('config/config.php');  
    require('config/connectdb.php');

   

    $query = 'SELECT * from threatlevel order by mincount';
    
    //Get Result
    $result = mysqli_query($conn, $query);

    //Fetch Data
    $threatlevels = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);
    //Free Result
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>    

    <div class="container">
    <br><br><a href = "<?php echo ROOT_URL;?>" class = "btn btn-outline-secondary">Back</a>
       
    <br> <br><h1>Threat Level</h1><br><br>
        <div class="container">
       
        <a href = "<?php echo ROOT_URL . 'addthreatlevel.php';?>" class = "btn btn-success">Add Level</a>
        <table class="table table-hover">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Alert Level Name</th>
                    <th scope="col">Minimum Count</th>
                    <th scope="col">Maximum Count</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    
                    </tr>
                </thead>

                <tbody>
                    <?php $temp = 0; foreach($threatlevels as $threatlevel) : ?>
                        <tr class="table-light">
                        <th scope="row"><?php echo $threatlevel['alert_level']?></th>
                        
                        
                        <td><?php echo $threatlevel['mincount'];?></td>
                        <td><?php echo $threatlevel['maxcount'];?></td>


                        <td>                        
                        <a class="btn btn-outline-warning" href="editlevel.php?id=<?php echo $threatlevel['alert_level'];?>">Edit</a>
                        </td>
                        
                        <td>
                        <a class="btn btn-outline-danger" href="deletelevel.php?id=<?php echo $threatlevel['alert_level'];?>">Delete</a>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            </table> 
        </div>
    </div>

    <?php include ('inc/footer.php');