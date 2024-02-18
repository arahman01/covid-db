<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['newname']);
        $old_name = mysqli_real_escape_string($conn, $_POST['oldname']); 
        echo 'new ' . $name;
        echo ', old ' .$old_name;
        $query = "UPDATE sources set source_name = '$name'
            where source_name = '{$old_name}'";

        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'sources.php');
        }
        else
        {
            echo mysqli_error($conn);
        }
    }


    //get ID
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * from sources where source_name =  '{$pn}' ";

    
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
                <label>Source Name</label>
                <input type="text" class="form-control" name = "newname" value= "<?php echo $l['source_name'];?>">
                <small class="form-text text-muted">Enter name of the Virus Source.</small>
                </div>
                <br>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
            
            <input type= "hidden"  name="oldname" value="<?php echo $l['source_name']?>">
        </form> 
    </div>

    <?php include ('inc/footer.php');