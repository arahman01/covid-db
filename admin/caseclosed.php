<?php 

    require('config/config.php');  
    require('config/connectdb.php');

   

    $query = 'SELECT * from casesclosed';
    
    $result = mysqli_query($conn, $query);
    $closedcase = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>    

    <div class="container">
    <br><br><a href = "<?php echo ROOT_URL;?>" class = "btn btn-outline-secondary">Back</a>
       
    <br> <br><h1>Closed Cases</h1><br><br>
        <div class="container">
       
        <a href = "<?php echo ROOT_URL . 'addclosecase.php';?>" class = "btn btn-success">Add Closed Case</a>
        <table class="table table-hover">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Date of Closure</th>
                    <th scope="col">Patient Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    
                    </tr>
                </thead>

                <tbody>
                    <?php $temp = 0; foreach($closedcase as $case) : ?>
                        <tr class="table-light">
                        <th scope="row"><?php echo $case['id']?></th>                        
                        
                        <td><?php echo $case['closedate'];?></td>
                        <td><?php echo $case['status'];?></td>


                        <td>                        
                        <a class="btn btn-outline-warning" href="editcaseclosed.php?id=<?php echo $case['id'];?>">Edit</a>
                        </td>
                        
                        <td>
                        <a class="btn btn-outline-danger" href="deletecaseclosed.php?id=<?php echo $case['id'];?>">Delete</a>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
            </table> 
        </div>
    </div>

    <?php include ('inc/footer.php');