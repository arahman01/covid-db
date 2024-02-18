<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['newname']);
        $min = mysqli_real_escape_string($conn, $_POST['province']);
        $old_name = mysqli_real_escape_string($conn, $_POST['oldname']); 
        
        $query = "UPDATE cities set city = '$name', province = '$min'
            where city = '{$old_name}'";

        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'city.php');
        }
        else
        {
            echo mysqli_error($conn);
        }
    }


    //get ID
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * from cities where city =  '{$pn}' ";

    
    //Get Result
    $result = mysqli_query($conn, $query);
    // var_dump($result);
    
    //Fetch Data
    $l = mysqli_fetch_assoc($result);
    // var_dump($posts);
    //Free Result
    mysqli_free_result($result);


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
        <br><h1>Edit Entry</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>City Name</label>
                <input type="text" class="form-control" name = "newname" value= "<?php echo $l['city'];?>">
                <small class="form-text text-muted">Enter name of the City.</small>
                </div>
                
                <div class="form-group">
                <label>Province</label>
                <select class="custom-select" name = 'province'>
                    <?php 
                        foreach($provinces as $record):
                    ?>
                    <option <?php if($record['province_name'] == $l['province']) : ?> selected <?php endif;?> value="<?php echo $record['province_name'];?>"><?php echo $record['province_name'];?></option>

                <?php endforeach; ?>
                </select>
                 </div>
                <br>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
            
            <input type= "hidden"  name="oldname" value="<?php echo $l['city']?>">
        </form> 
    </div>

    <?php include ('inc/footer.php');