<?php 

    require('config/config.php');  
    require('config/connectdb.php'); 

    if(isset($_POST['submit']))
    {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $closedate = mysqli_real_escape_string($conn, $_POST['date']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $query = "UPDATE casesclosed set closedate = '$closedate'
            where id = $id";

        if(mysqli_query($conn, $query))
        {
            header('Location: '.ROOT_URL.'caseclosed.php');
        }
        else
        {
            echo mysqli_error($conn);
        }
    }


    //Get Old Data
    $pn = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * from casesclosed where id =  {$pn} ";
    $result = mysqli_query($conn, $query);
    $l = mysqli_fetch_assoc($result);
    mysqli_free_result($result);


    //Getting all options lists?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <br><h1>Edit Case Closed</h1><br><br>
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <div class="form-group">
                <label>Close Date</label>               
                <input type="date" class="form-control" name="date" value="<?php echo $l['closedate'];?>">
                </div>
                <br>
                <input type="submit" name="submit" value="Submit" class = "btn btn-outline-info"></input>
            </fieldset>
            
            <input type= "hidden"  name="id" value="<?php echo $l['id']?>">
        </form> 
    </div>

    <?php include ('inc/footer.php');