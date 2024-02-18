<?php 

    require('config/config.php');  
    require('config/connectdb.php');

    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        
        $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);

        $query = "INSERT INTO centres(name, city, capacity) Values ('$name', '$city', '$capacity')";
        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'centre.php');
        }
        else
        {
            mysqli_error($conn);
        }
    }

    $query = "SELECT * from cities"; 
    $result = mysqli_query($conn, $query);
    $cities = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <br><h1>Add Hospital / Quarantine Centre</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>

                <div class="form-group">
                <label>Centre Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Centre's Name">
                </div>

                
                <div class="form-group">
                <label>Capacity</label>
                <input type="number" class="form-control" name="capacity" placeholder="Enter Centre's Capacity">
                </div>
                
                
                <div class="form-group">
                <label>City</label>
                <select class="custom-select" name = 'city'>
                    <option selected="">Select City</option>
                    <?php 
                        foreach($cities as $record):
                    ?>
                    <option value="<?php echo $record['city'];?>"><?php echo $record['city'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                <br><a href = "<?php echo ROOT_URL . 'centre.php';?>" class = "btn btn-outline-secondary">Back</a>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
        </form>
           
        </div>

    <?php include ('inc/footer.php');