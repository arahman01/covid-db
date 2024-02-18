<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    if(isset($_POST['submit']))
    {
        $count = mysqli_real_escape_string($conn, $_POST['name']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);

        $query = "INSERT INTO places(area, city) Values ('$count', '$city')";
        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'place.php');
        }
        else
        { echo mysqli_error($conn); 
         
        }
    }

    $query = "SELECT * from cities"; 
    $result = mysqli_query($conn, $query);
    $provinces = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    // mysqli_close($conn);
    
    include('inc/header.php'); ?>



    <div class="container">
        <br><h1>Add Place</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>Place</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Place Name /Address">
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

                <br><a href = "<?php echo ROOT_URL . 'place.php';?>" class = "btn btn-outline-secondary">Back</a>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
        </form>
        </div>

    <?php 
    mysqli_close($conn);
    include ('inc/footer.php');