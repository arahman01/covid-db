<?php 

    require('config/config.php');  
    require('config/connectdb.php');

    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);

        $query = "INSERT INTO sources(source_name) Values ('$name')";
        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'sources.php');
        }
        else
        {
            mysqli_error($conn);
        }
    }
    include('inc/header.php'); ?>
    <div class="container">
        <br><h1>Add Virus Source</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>Source Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Level Name">
                <small class="form-text text-muted">Enter name of the Virus Source.</small>
                </div>

                <br><a href = "<?php echo ROOT_URL . 'sources.php';?>" class = "btn btn-outline-secondary">Back</a>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
        </form>
        
        </div>

    <?php include ('inc/footer.php');