<?php 

    require('config/config.php');  
    require('config/connectdb.php');

   

    $query = 'SELECT * from provinces';
    
    //Get Result
    $result = mysqli_query($conn, $query);

    //Fetch Data
    $provinces = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);
    //Free Result
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>

    

    <div class="container">
    <br><br><a href = "<?php echo ROOT_URL;?>" class = "btn btn-outline-secondary">Back</a>
       
    <br> <br><h1>Provinces</h1><br><br>
        <div class="container">
       
        <a href = "<?php echo ROOT_URL . 'addprovince.php';?>" class = "btn btn-success">Add Province</a>
        <table class="table table-hover">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Province Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $temp = 0; foreach($provinces as $province) : ?>
                        <tr class="table-light">
                        <th scope="row"><?php echo $province['province_name']?></th>
                        <td>                        
                        <a class="btn btn-outline-warning" href="editprovince.php?id=<?php echo $province['province_name'];?>">Edit</a>
                        </td>
                        <td>
                        
                        <a class="btn btn-outline-danger" href="deleteprovince.php?id=<?php echo $province['province_name'];?>">Delete</a>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            </table> 
        </div>
    </div>

    <?php include ('inc/footer.php');