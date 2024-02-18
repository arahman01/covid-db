<?php 

    require('config/config.php');  
    require('config/connectdb.php');

    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $min = mysqli_real_escape_string($conn, $_POST['mincount']);
        $max = mysqli_real_escape_string($conn, $_POST['maxcount']);

        $query = "INSERT INTO threatlevel(alert_level, mincount, maxcount) Values ('$name', '$min', '$max')";
        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'level.php');
        }
        else
        {
            echo  mysqli_error($conn); 
        }
    }




    include('inc/header.php'); ?>
    <div class="container">
        <br><h1>Add Threat Level</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>Threat Level Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Level Name">
                <small class="form-text text-muted">Enter name of the Threat Level.</small>
                </div>
                <div class="form-group">
                <label>Level Minimum Count</label>
                <input type="text" class="form-control" name="mincount" placeholder="Enter Minimum Count">
                </div>
                <div class="form-group">
                <label>Level Maxium Count</label>
                <input type="text" class="form-control" name="maxcount" placeholder="Enter Maximum Count">
                </div>

                <br><a href = "<?php echo ROOT_URL . 'level.php';?>" class = "btn btn-outline-secondary">Back</a>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
        </form>
           
        </div>

    <?php include ('inc/footer.php');