<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    $query = "SELECT * from provinces"; 
    $result = mysqli_query($conn, $query);
    $provinces = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    // mysqli_close($conn);
    
    include('inc/header.php'); ?>



    <div class="container">
        <br><h1>Add City</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter City's Name">
                </div>


                <div class="form-group">
                <label>Province</label>
                <select class="custom-select" name = "province">
                    <option selected="">Select provinces</option>
                    <?php 
                        foreach($provinces as $record):
                    ?>
                    <option value="<?php echo $record['province_name'];?>"><?php echo $record['province_name'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                <br><a href = "<?php echo ROOT_URL . 'city.php';?>" class = "btn btn-outline-secondary">Back</a>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $prov = mysqli_real_escape_string($conn, $_POST['province']);

                $query = "INSERT INTO cities(city, province) Values ('$name', '$prov')";
                if(mysqli_query($conn, $query))
                {
                    header('Location: '.ROOT_URL.'city.php');
                }
                else
                {
                ?>
                    <br>
                    <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Query Failed</strong> <a class="alert-link">Error:</a> <?php echo mysqli_error($conn); ?>
                    </div>
                <?php }}?>
        </div>

    <?php 
    mysqli_close($conn);
    include ('inc/footer.php');