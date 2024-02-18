<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    
    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $source = mysqli_real_escape_string($conn, $_POST['source']);
        $centre = mysqli_real_escape_string($conn, $_POST['centre']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        $query = "INSERT INTO patients(patient_name, patient_age, patient_city, patient_centre, patient_address, patient_virussource, patient_gender, patient_testdate) Values ('$name', '$age', '$city', $centre, '$address', '$source', '$gender', '$date');";
        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'patients.php');
        }
        else
        {echo mysqli_error($conn);}
    }


    $query = "SELECT * from centres"; 
    $result = mysqli_query($conn, $query);
    $centres = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    // mysqli_close($conn);

    $query = "SELECT * from cities"; 
    $result = mysqli_query($conn, $query);
    $cities = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    // mysqli_close($conn);

    $query = "SELECT * from gender"; 
    $result = mysqli_query($conn, $query);
    $genders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $query = "SELECT * from sources"; 
    $result = mysqli_query($conn, $query);
    $sources = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
    
    include('inc/header.php'); ?>



<div class="container">
        <br><h1>Add Patient</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Patient's Name">
                </div>

                <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" name="age" placeholder="Enter Patient's Age">
                </div>

                <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter Patient's Address">
                </div>

                
                <div class="form-group">
                <label>City of Infection</label>
                <select class="custom-select" name = 'city'>
                    <option selected="">Select City</option>
                    <?php 
                        foreach($cities as $record):
                    ?>
                    <option value="<?php echo $record['city'];?>"><?php echo $record['city'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                <div class="form-group">
                <label>Centre</label>
                <select class="custom-select" name = "centre">
                    <option selected="">Select Centre</option>
                    <?php 
                        foreach($centres as $record):
                    ?>
                    <option value="<?php echo $record['id'];?>"><?php echo $record['name'];?></option>
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
                    <option value="<?php echo $record['gender_name'];?>"><?php echo $record['gender_name'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>

                <div class="form-group">
                <label>Test Date</label>               
                <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d");?>">
                </div>


                <div class="form-group">
                <label>Virus Source</label>
                <select class="custom-select" name = "source">
                    <option selected="">Select Source</option>
                    <?php 
                        foreach($sources as $record):
                    ?>
                    <option value="<?php echo $record['source_name'];?>"><?php echo $record['source_name'];?></option>
                    <?php   endforeach; ?>
                </select>
                 </div>
                <br><a href = "<?php echo ROOT_URL . 'patients.php';?>" class = "btn btn-outline-secondary">Back</a>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
        </form>
        </div>
        <br><br>
        
    <?php include ('inc/footer.php');?>