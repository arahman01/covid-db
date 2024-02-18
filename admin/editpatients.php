<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    if(isset($_POST['submit']))
    {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $source = mysqli_real_escape_string($conn, $_POST['source']);
        $centre = mysqli_real_escape_string($conn, $_POST['centre']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);

        $query = "UPDATE patients set patient_name = '$name', patient_city = '$city', patient_age = $age, patient_address = '$address', patient_virussource = '$source', patient_centre = '$centre', patient_testdate = '$date', patient_gender = '$gender'
            where patient_id = $id";

        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'patients.php');
        }
        else
        {
            echo mysqli_error($conn);
        }
    }


    //Get Old Data
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * from patients where patient_id =  {$pn} ";
    $result = mysqli_query($conn, $query);
    $l = mysqli_fetch_assoc($result);
    mysqli_free_result($result);


    //Getting all options lists
    $query = "SELECT * from centres"; 
    $result = mysqli_query($conn, $query);
    $centres = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $query = "SELECT * from cities"; 
    $result = mysqli_query($conn, $query);
    $cities = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $query = "SELECT * from gender"; 
    $result = mysqli_query($conn, $query);
    $genders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $query = "SELECT * from sources"; 
    $result = mysqli_query($conn, $query);
    $sources = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <br><h1>Edit Patient</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $l['patient_name'];?>">
                </div>

                <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" name="age" value="<?php echo $l['patient_age'];?>">
                </div>

                <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="<?php echo $l['patient_address'];?>">
                </div>

                <div class="form-group">
                <label>Centre ID</label>
                <select class="custom-select" name = "centre">
                    <option selected="">Select Centre</option>
                    <?php 
                        foreach($centres as $record):
                    ?>
                    <option <?php if($record['id'] == $l['patient_centre']) : ?> selected <?php endif;?> value="<?php echo $record['id'];?>"><?php echo $record['name'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                <div class="form-group">
                <label>City</label>
                <select class="custom-select" name = 'city'>
                    <option selected="">Select City</option>
                    <?php 
                        foreach($cities as $record):
                    ?>
                    <option <?php if($record['city'] == $l['patient_city']) : ?> selected <?php endif;?> value="<?php echo $record['city'];?>"><?php echo $record['city'];?></option>
                    
                    <?php   endforeach; ?>
                </select>
                 </div>

                 <div class="form-group">
                <label>Gender</label>
                <select class="custom-select" name = "gender">
                    <option selected="">Select Gender</option>
                    <?php 
                        foreach($genders as $record):
                    ?>
                    
                    <option <?php if($record['gender_name'] == $l['patient_gender']) : ?> selected <?php endif;?> value="<?php echo $record['gender_name'];?>"><?php echo $record['gender_name'];?></option>
                
                    <?php   endforeach; ?>
                </select>
                 </div>

                <div class="form-group">
                <label>Test Date</label>               
                <input type="date" class="form-control" name="date" value="<?php echo $l['patient_testdate'];?>">
                </div>


                <div class="form-group">
                <label>Virus Source</label>
                <select class="custom-select" name = "source">
                    <option selected="">Select Source</option>
                    <?php 
                        foreach($sources as $record):
                    ?>
                    
                    <option <?php if($record['source_name'] == $l['patient_virussource']) : ?> selected <?php endif;?> value="<?php echo $record['source_name'];?>"><?php echo $record['source_name'];?></option>
                
                    <?php   endforeach; ?>
                </select>
                 </div>

                <br>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
            
            <input type= "hidden"  name="id" value="<?php echo $l['patient_id']?>">
        </form> 
    </div>

    <?php include ('inc/footer.php');