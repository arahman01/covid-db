<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    $query = "SELECT * from patients"; 
    $result = mysqli_query($conn, $query);
    $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $query = "SELECT * from places"; 
    $result = mysqli_query($conn, $query);
    $places = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    // mysqli_close($conn);

    if(isset($_POST['submit']))
    {
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $place = mysqli_real_escape_string($conn, $_POST['place']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        $query = "INSERT INTO placesvisited(patient_id, place_id, date) Values ($patient, $place, '$date')";
        echo $query;
        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'placesvisited.php');
        }
        else
        {
            echo mysqli_error($conn); 
        }
    }
    
    include('inc/header.php'); ?>



    <div class="container">
        <br><h1>Add Place Visited</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">

                <div class="form-group">
                <label>Patient ID</label>
                <select class="custom-select" name = "patient">
                    <option selected="">Select Patient</option>
                    <?php 
                        foreach($patients as $record):
                    ?>
                    <option value="<?php echo $record['patient_id'];?>"><?php echo $record['patient_id'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                 <label>Place ID</label>
                <select class="custom-select" name = "place">
                    <option selected="">Select Place</option>
                    <?php 
                        foreach($places as $record):
                    ?>
                    <option value="<?php echo $record['id'];?>"><?php echo $record['id'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                 <div class="form-group">
                <label>Select Date</label>               
                <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d");?>">
                </div>

                <br><a href = "<?php echo ROOT_URL . 'placesvisited.php';?>" class = "btn btn-outline-secondary">Back</a>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
        </form>

        </div>

    <?php 
    mysqli_close($conn);
    include ('inc/footer.php');