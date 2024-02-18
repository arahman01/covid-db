<?php 

    require('config/config.php');  
    require('config/connectdb.php');

    if(isset($_POST['submit']))
    {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        $query = "INSERT INTO casesclosed(id, status, closedate) Values ($id, '$status', '$date')";
        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'caseclosed.php');
        }
        else
        {
            echo mysqli_error($conn);
        }
    }

    $query = "SELECT * from patients"; 
    $result = mysqli_query($conn, $query);
    $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    // var_dump($patients);

    $query = "SELECT * from closestatus"; 
    $result = mysqli_query($conn, $query);
    $status = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    
    // var_dump($patients);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <br><h1>Add Closed Case</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>Patient ID</label>
                <select class="custom-select" name = 'id'>
                    <option selected="">Select Patient</option>
                    <?php 
                        foreach($patients as $p):
                    ?>
                    <option value="<?php echo $p['patient_id'];?>"> <?php echo $p['patient_id'];?> </option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                 <div class="form-group">
                <label>Patient Status</label>
                <select class="custom-select" name = 'status'>
                    <option selected="">Select Status</option>
                    <?php 
                        foreach($status as $record):
                    ?>
                    <option value="<?php echo $record['status'];?>"><?php echo $record['status'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                 <div class="form-group">
                <label>Close Date</label>               
                <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d");?>">
                </div>

                <br><a href = "<?php echo ROOT_URL . 'caseclosed.php';?>" class = "btn btn-outline-secondary">Back</a>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
        </form>
    </div>
<?php include ('inc/footer.php');