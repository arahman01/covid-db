<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    if(isset($_POST['submit']))
    {
        $area = mysqli_real_escape_string($conn, $_POST['area']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $id = mysqli_real_escape_string($conn, $_POST['id']); 
        
        $query = "UPDATE places set area = '$area', city = '$city'
            where id = {$id}";

        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'place.php');
        }
        else
        {
            echo mysqli_error($conn);
        }
    }


    //get ID
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * from places where id =  {$pn} ";
    $result = mysqli_query($conn, $query);
    $l = mysqli_fetch_assoc($result);
    mysqli_free_result($result);


    $query = 'SELECT * from cities';
    $result = mysqli_query($conn, $query);
    $provinces = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <br><h1>Edit Place</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>City Name</label>
                <input type="text" class="form-control" name = "area" value= "<?php echo $l['area'];?>">
                <small class="form-text text-muted">Enter the area description.</small>
                </div>
                
                <div class="form-group">
                <label>Province</label>
                <select class="custom-select" name = 'city'>
                    <?php 
                        foreach($provinces as $record):
                    ?>
                    <option <?php if($record['city'] == $l['city']) : ?> selected <?php endif;?> value="<?php echo $record['city'];?>"><?php echo $record['city'];?></option>

                <?php endforeach; ?>
                </select>
                 </div>
                <br>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
            
            <input type= "hidden"  name="id" value="<?php echo $l['id']?>">
        </form> 
    </div>

    <?php include ('inc/footer.php');