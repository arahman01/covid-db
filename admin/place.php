<?php 

    require('config/config.php');  
    require('config/connectdb.php');

   

    $query = 'SELECT * from places';
    
    //Get Result
    $result = mysqli_query($conn, $query);

    //Fetch Data
    $tests = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);
    //Free Result
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>    

    <div class="container">
    <br><br><a href = "<?php echo ROOT_URL;?>" class = "btn btn-outline-secondary">Back</a>
       
    <br> <br><h1>Places</h1><br><br>
        <div class="container">
       
        <a href = "<?php echo ROOT_URL . 'addplace.php';?>" class = "btn btn-success">Add Place</a>
        <table class="table table-hover">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Place</th>
                    <th scope="col">City</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $temp = 0; foreach($tests as $t) : ?>
                        <tr class="table-light">
                        <th scope="row"><?php echo $t['id']?></th>                      
                        <td><?php echo $t['area'];?></td>
                        <td><?php echo $t['city'];?></td>
                        
                        <td>
                        <a class="btn btn-outline-warning" href="editplace.php?id=<?php echo $t['id'];?>">Edit</a></td>
                        <td>
                        <a class="btn btn-outline-danger" href="deleteplace.php?id=<?php echo $t['id'];?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            </table> 
        </div>
    </div>

    <?php include ('inc/footer.php');