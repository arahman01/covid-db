<?php
    require('config/config.php');
    require('config/connectdb.php');

    $tablelist = array("Patients", "Cities", "Provinces", "Cases Closed", "Tests Taken", "Quarantine Centres / Hospitals", "Virus Sources", "Places", "Places Visited By Patients", "Threat Level Setter", "Genders");

    $pagelist = array("Patients" => "patients", "Cities" => "city", "Provinces" => "province", "Cases Closed" => "caseclosed", "Tests Taken" => "teststaken", "Quarantine Centres / Hospitals" => "centre", "Virus Sources" => "sources", "Places" => "place", "Places Visited By Patients" => "placesvisited", "Threat Level Setter" => "level", "Genders" => "genders");

?>


<?php include('inc/header.php');?>

    <div class="container">
        <br><h1>Select Table</h1><br><br>
        <div class="container">
            <?php foreach($tablelist as $table) : ?>
                <a type="button" class="btn btn-secondary btn-lg btn-block" href= " <?php echo ROOT_URL .  $pagelist[$table].'.php';?>"><?php echo $table;?></a>
            <?php endforeach; ?>
        </div>
    </div>


<?php include('inc/footer.php'); ?>