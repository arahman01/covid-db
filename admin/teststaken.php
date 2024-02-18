<?php 

    require('config/config.php');  
    require('config/connectdb.php');

   

    $query = 'SELECT * from tests_taken order by t_date desc';
    
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
       
    <br> <br><h1>Tests Taken By Date</h1><br><br>
        <div class="container">
       
        <a href = "<?php echo ROOT_URL . 'addtest.php';?>" class = "btn btn-success">Add Test</a>
        <table class="table table-hover">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Tests Count</th>
                    <th scope="col">Test Date</th>
                    <th scope="col">City</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $temp = 0; foreach($tests as $t) : ?>
                        <tr class="table-light">
                        <th scope="row"><?php echo $t['count']?></th>
                        
                        
                        <td><?php echo $t['t_date'];?></td>
                        <td><?php echo $t['city'];?></td>
                        

                        <td>
                        <a class="btn btn-outline-danger" href="deletetest.php?c_id=<?php echo $t['city'].'&&d_id='.$t['t_date'];?>">Delete</a>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            </table> 
        </div>
    </div>

    <?php include ('inc/footer.php');