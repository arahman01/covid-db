<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['newname']);
        $min = mysqli_real_escape_string($conn, $_POST['mincount']);
        $max = mysqli_real_escape_string($conn, $_POST['maxcount']);
        $old_name = mysqli_real_escape_string($conn, $_POST['oldname']); 
        echo 'new ' . $name;
        echo ', old ' .$old_name;
        $query = "UPDATE threatlevel set alert_level = '$name', mincount = $min, maxcount = $max
            where alert_level = '{$old_name}'";

        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'level.php');
        }
        else
        {
            echo mysqli_error($conn);
        }
    }


    //get ID
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * from threatlevel where alert_level =  '{$pn}' ";

    
    //Get Result
    $result = mysqli_query($conn, $query);
    // var_dump($result);
    
    //Fetch Data
    $l = mysqli_fetch_assoc($result);
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
                <label>Level Name</label>
                <input type="text" class="form-control" name = "newname" value= "<?php echo $l['alert_level'];?>">
                <small class="form-text text-muted">Enter name of the Threat Level.</small>
                </div>
                <div class="form-group">
                <label>Minimum Count</label>
                <input type="text" class="form-control" name = "mincount" value= "<?php echo $l['mincount'];?>">
                </div>
                <div class="form-group">
                <label>Maximum Count</label>
                <input type="text" class="form-control" name = "maxcount" value= "<?php echo $l['maxcount'];?>">
                </div>
                <br>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
            
            <input type= "hidden"  name="oldname" value="<?php echo $l['alert_level']?>">
        </form> 
    </div>

    <?php include ('inc/footer.php');