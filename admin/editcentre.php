<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['newname']);
        $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $old_name = mysqli_real_escape_string($conn, $_POST['oldname']); 
        $query = "UPDATE centres set name = '$name', city = '$city', capacity = $capacity
            where name = '{$old_name}'";
        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'centre.php');
        }
        else
        {
            echo mysqli_error($conn);
        }
    }


    //get ID
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * from centres where name =  '{$pn}' ";

    
    //Get Result
    $result = mysqli_query($conn, $query);
    // var_dump($result);
    
    //Fetch Data
    $l = mysqli_fetch_assoc($result);
    // var_dump($posts);
    //Free Result
    mysqli_free_result($result);


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
        <br><h1>Edit Centre</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name = "newname" value= "<?php echo $l['name'];?>">
                <small class="form-text text-muted">Enter name of the Threat Level.</small>
                </div>
                <div class="form-group">
                <label>Capacity</label>
                <input type="text" class="form-control" name = "capacity" value= "<?php echo $l['capacity'];?>">
                </div>

                <div class="form-group">
                <label>City</label>
                <select class="custom-select" name = 'city'>
                    <?php 
                        foreach($cities as $record):
                    ?>
                    <option <?php if($record['city'] == $l['city']) : ?> selected <?php endif;?> value="<?php echo $record['city'];?>"><?php echo $record['city'];?></option>

                <?php endforeach; ?>
                </select>
                 </div>


                <br>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
            
            <input type= "hidden"  name="oldname" value="<?php echo $l['name']?>">
        </form> 
    </div>

    <?php include ('inc/footer.php');