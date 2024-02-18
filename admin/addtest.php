<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    if(isset($_POST['submit']))
    {
        $count = mysqli_real_escape_string($conn, $_POST['count']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        $query = "INSERT INTO tests_taken(count, city, t_date) Values ($count, '$city', '$date')";
        
    
        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'teststaken.php');
        }
        else
        {
            echo mysqli_error($conn);
        }
    }

    $query = "SELECT * from cities"; 
    $result = mysqli_query($conn, $query);
    $provinces = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    // mysqli_close($conn);
    
    include('inc/header.php'); ?>



    <div class="container">
        <br><h1>Add Test</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>Count</label>
                <input type="number" class="form-control" name="count" placeholder="Enter Count">
                </div>


                <div class="form-group">
                <label>City</label>
                <select class="custom-select" name = "city">
                    <option selected="">Select City</option>
                    <?php 
                        foreach($provinces as $record):
                    ?>
                    <option value="<?php echo $record['city'];?>"><?php echo $record['city'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                 <div class="form-group">
                <label>Select Date</label>               
                <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d");?>">
                </div>

                <br><a href = "<?php echo ROOT_URL . 'teststaken.php';?>" class = "btn btn-outline-secondary">Back</a>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
        </form>

    <?php include ('inc/footer.php');?>