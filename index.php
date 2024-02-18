<?php 
    $conn = mysqli_connect("localhost", "root", "1234", "covidproject");

    if (mysqli_connect_errno($conn))
    {
        echo "Failed to connect to DataBase: " . mysqli_connect_error();
    }  
    else
    {

//header queries
        $enddate = date("Y-m-d",strtotime("+1 days"));        
        $initialtdate = date('Y-m-d',strtotime("-4 months"));
        $result = mysqli_query($conn, "SELECT SUM(t1.count) from (SELECT count from tests_taken where t_date  between '$initialtdate' AND '$enddate') as t1");
        $myresult = mysqli_fetch_assoc($result);
        $totaltests = $myresult['SUM(t1.count)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients");
        $myresult = mysqli_fetch_assoc($result);
        $confirmedcases = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from casesclosed where status = 'Dead'");
        $myresult = mysqli_fetch_assoc($result);
        $deaths = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from casesclosed where status = 'Recovered'");
        $myresult = mysqli_fetch_assoc($result);
        $recovered = $myresult['count(*)'];
        mysqli_free_result($result);
//Provinces Table
        $provincenames = array('Punjab', 'Sindh', 'Balochistan', 'AJK', 'Gilgit Baltistan', 'KPK');
        $provincepatients = array();
        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Punjab')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincepatients[] = $myresult['count(*)'];
        mysqli_free_result($result);
 
        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Sindh')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincepatients[] = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Balochistan')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincepatients[] = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'AJK')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincepatients[] = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Gilgit Baltistan')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincepatients[] = $myresult['count(*)'];
        mysqli_free_result($result);

        
        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'KPK')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincepatients[] = $myresult['count(*)'];
        mysqli_free_result($result);

        
        $provincedeaths = array();
        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Punjab')and patient_id in(SELECT id from casesclosed where status = 'Dead')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincedeaths[] = $myresult['count(*)'];
        mysqli_free_result($result);
 
        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Sindh') and patient_id in(SELECT id from casesclosed where status = 'Dead')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincedeaths[] = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Balochistan') and patient_id in(SELECT id from casesclosed where status = 'Dead')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincedeaths[] = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'AJK') and patient_id in(SELECT id from casesclosed where status = 'Dead')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincedeaths[] = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Gilgit Baltistan') and patient_id in(SELECT id from casesclosed where status = 'Dead')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincedeaths[] = $myresult['count(*)'];
        mysqli_free_result($result);

        
        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'KPK') and patient_id in(SELECT id from casesclosed where status = 'Dead')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincedeaths[] = $myresult['count(*)'];
        mysqli_free_result($result);


        
        $provincerecoveries = array();
        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Punjab')and patient_id  in(SELECT id from casesclosed where status = 'Recovered')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincerecoveries[] = $myresult['count(*)'];
        mysqli_free_result($result);
 
        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Sindh') and patient_id   in(SELECT id from casesclosed where status = 'Recovered')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincerecoveries[] = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Balochistan') and patient_id  in(SELECT id from casesclosed where status = 'Recovered')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincerecoveries[] = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'AJK') and patient_id  in(SELECT id from casesclosed where status = 'Recovered')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincerecoveries[] = $myresult['count(*)'];
        mysqli_free_result($result);

        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'Gilgit Baltistan') and patient_id  in(SELECT id from casesclosed where status = 'Recovered')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincerecoveries[] = $myresult['count(*)'];
        mysqli_free_result($result);

        
        $result = mysqli_query($conn, "SELECT count(*) from patients where patient_city IN (SELECT city from cities where province = 'KPK') and patient_id in(SELECT id from casesclosed where status = 'Recovered')");        
        $myresult = mysqli_fetch_assoc($result);
        $provincerecoveries[] = $myresult['count(*)'];
        mysqli_free_result($result);
//province table end   
    } 


    // $l = mysqli_fetch_assoc($result);
    mysqli_close($conn);
?>






<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Pakistan's Covid 19 cases updates.">
  <meta name="author" content="19 - nCoV Cases">
  <title>19 - nCoV Cases</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
	
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
           
            <li class="nav-item">
              <a class="nav-link active" href="index.php">
                <i class="ni ni-planet text-purple"></i>
                <span class="nav-link-text">Pakistan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-pin-3 text-orange"></i>
                <span class="nav-link-text">Punjab</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-pin-3 text-purple"></i>
                <span class="nav-link-text">Sindh</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-pin-3 text-yellow"></i>
                <span class="nav-link-text">Balochistan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-pin-3 text-green"></i>
                <span class="nav-link-text">KPK</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-pin-3 text-red"></i>
                <span class="nav-link-text">AJK</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-pin-3 text-blue"></i>
                <span class="nav-link-text">Gilgit Baltistan</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Manage</span>
          </h6>
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="admin/index.php">
                <i class="ni ni-single-02 text-red"></i>
                <span class="nav-link-text">Admin</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/addpatients.php">
                <i class="ni ni-bullet-list-67 text-blue"></i>
                <span class="nav-link-text">Add Patients</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/addtest.php">
                <i class="ni ni-bullet-list-67 text-green"></i>
                <span class="nav-link-text">Add Tests</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Pakistan Cases</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="admin/index.php" class="btn btn-sm btn-neutral">New</a>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Cases</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo number_format($totaltests);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> -->
                    <span class="text-nowrap">Tests done across Country</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Active Cases</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo number_format($confirmedcases);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> -->
                    <span class="text-nowrap">All confirmed cases</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Deaths</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo number_format($deaths);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-ambulance"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-red mr-2"><i class="fa fa-arrow-down "> <?php echo round(($deaths/$confirmedcases)*100, 2) . '%';?></i></span>
                    <span class="text-nowrap">Deaths of Total</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Recoveries</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo number_format($recovered);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-umbrella-13"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?php echo round(($recovered/$confirmedcases)*100, 2) . '%';?></span>
                    <span class="text-nowrap">Recoveries</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 text-white mb-0">Confirmed Cases</h5>
                </div>                
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->                
					    <canvas id="graphA" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Confirmed Cases</h6>
                  <h5 class="h3 mb-0">Provinces</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="graphB" class="chart-canvas"></canvas>                
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-muted text-uppercase ls-1 mb-1">By Province</h6>
                  <h3 class="mb-0">Cases Details</h3>
                </div>
                <div class="col text-right">
                  <!-- <a href="#!" class="btn btn-sm btn-primary">See all</a> -->
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Province</th>
                    <th scope="col">Total Cases</th>
                    <th scope="col">Deaths</th>
                    <th scope="col">Recovered</th>
                  </tr>
                </thead>
                <tbody>
                    <?php for($i =0; $i<6; $i++):?>
                  <tr>

                    <th scope="row">
                      <?php echo $provincenames[$i];?>
                    </th>
                    <td>
                      <?php echo number_format((int)$provincepatients[$i]);?>
                    </td>
                    <td>
                      <?php echo number_format((int)$provincedeaths[$i]);?>
                    </td>
                    <td>
                      <?php echo number_format((int)$provincerecoveries[$i]);?>
                    </td>
                  </tr>
                  <?php endfor?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">By Date</h6>
                  <h5 class="h3 mb-0">Daily New Cases</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="graphC" class="chart-canvas"></canvas>                
              </div>
            </div>
          </div>
        </div>
      </div>


      
      <div class="row">
        
      <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">By Date</h6>
                  <h5 class="h3 mb-0">Tests vs Confirmed Cases</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="graphD" class="chart-canvas"></canvas>     

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Confirmed Cases with Deaths and Recoveries</h6>
                  <h5 class="h3 mb-0">Confirmed Cases</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="graphE" class="chart-canvas"></canvas>                
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        
      <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">By Date</h6>
                  <h5 class="h3 mb-0">Each Province Cases</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="graphF" class="chart-canvas"></canvas>     

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">By Date</h6>
                  <h5 class="h3 mb-0">Provinces In Comparison</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="graphG" class="chart-canvas"></canvas>                
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        
      <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">By Age</h6>
                  <h5 class="h3 mb-0">Demographic: Male vs Female</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="graphH" class="chart-canvas"></canvas>     

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">By Date</h6>
                  <h5 class="h3 mb-0">New Cases vs New Recoveries</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="graphI" class="chart-canvas"></canvas>                
              </div>
            </div>
          </div>
        </div>
      </div>

      
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-right">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-right  text-muted">
              &copy; 2020 <a href="https://www.instagram.com/beingbat/" class="font-weight-bold ml-1" target="_blank">beingbat</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


<script>
     $(document).ready(function () {
            showGraphA();
            showGraphB();
        });


        function showGraphA()
        {
            {
                $.post("queries/graphA.php",
                function (data)
                {
                     var cc = [];
                    var date = [];

                    for (var i in data) {
                        cc.push(data[i].cc);
                        var dt = data[i].mydate;
                                      
                        date.push(data[i].mydate);
                        // date.push((dt.getMonth() + 1) + "/" + dt.getDate());
                    }

                    var chartdata = {
                          labels: date,
                        datasets: [
                            {
                                label: 'Cases Count',
                                // backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                // hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                fill: false,
                                data: cc
                            }]
                          };


                    var graphTarget = $("#graphA");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                        options:
                        {
                          responsive:true,
                          elements:
                          {
                            line:
                            {
                              tension:0
                            }
                          },
                          title: {
                            text: 'Chart.js Time Scale'
                          },scales: {
                            xAxes: [{ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0
                            },
                              type:       "time",
                              // time:       {
                              //     format: timeFormat,
                              //     tooltipFormat: 'll'
                              // },
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Date'
                              }
                            }],
                            yAxes: [{
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Count'
                              }
                            }]
                          },
                        }
                          
                    });
                });
            }
           
        }

        
</script>

<script>
 $(document).ready(function () {
            showGraphB();
        });


        function showGraphB()
        {
            {
                $.post("queries/graphB.php",
                function (data)
                {
                     var cc = [];
                    var province = [];

                    for (var i in data) {
                        cc.push(data[i].cc);
                        province.push(data[i].province);
                    }

                    var chartdata = {
                          labels: province,
                        datasets: [
                            {
                                label: 'Cases Count',
                                // backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                // hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                fill: false,
                                data: cc
                            }]
                          };


                    var graphTarget = $("#graphB");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options:
                        {
                          responsive:true,
                          elements:
                          {
                            line:
                            {
                              tension:0
                            }
                          },
                          title: {
                            text: 'Chart.js Time Scale'
                          },scales: {
                            xAxes: [{
                              // type:       "time",
                              // time:       {
                              //     format: timeFormat,
                              //     tooltipFormat: 'll'
                              // },
                              scaleLabel: {
                                display: true,
                                labelString: 'Province'
                              }
                            }],
                            yAxes: [{
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Count'
                              }
                            }]
                          },
                        }
                          
                    });
                });
            }
           
        }

        

</script>

<script>
 $(document).ready(function () {
            showGraphC();
        });


        function showGraphC()
        {
            {
                $.post("queries/graphC.php",
                function (data)
                {
                     var cc = [];
                    var date = [];

                    for (var i in data) {
                        cc.push(data[i].cc);
                        date.push(data[i].t_date);
                    }

                    var chartdata = {
                          labels: date,
                        datasets: [
                            {
                                label: 'Daily Cases',
                                backgroundColor: '#43CCE9',
                                fill: false,
                                data: cc
                            }]
                          };


                    var graphTarget = $("#graphC");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options:
                        {
                          responsive:true,
                          elements:
                          {
                            line:
                            {
                              tension:0
                            }
                          },
                          title: {
                            text: 'Chart.js Time Scale'
                          },scales: {
                            xAxes: [{ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0
                            },
                              type:       "time",
                              // time:       {
                              //     format: timeFormat,
                              //     tooltipFormat: 'll'
                              // },
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Date'
                              }
                            }],
                            yAxes: [{
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Count'
                              }
                            }]
                          },
                        }
                          
                    });
                });
            }
           
        }

        

</script>


<script>
 $(document).ready(function () {
            showGraphD();
        });


        function showGraphD()
        {
            {
                $.post("queries/graphD.php",
                function (data)
                {
                     var patientcount = [];
                     var deathcount = [];
                     var recoverycount = [];
                     
                     var testcount = [];
                    var date = [];

                    for (var i in data) 
                    {
                        patientcount.push(data[i].patient_count);
                        testcount.push(data[i].test_count);
                        deathcount.push(data[i].death_count);
                        recoverycount.push(data[i].recovery_count);
                        date.push(data[i].mydate);
                    }


                    var chartdata = {
                          labels: date,
                        datasets: [ 
                          // {
                          //       label: 'Test Count',
                          //       backgroundColor: '#43CCE9',
                          //       fill: false,
                          //       data: patientcount
                          //     }
                          //   ,
                          // {
                          //       label: 'Recovery Count',
                          //       backgroundColor: '#2DCE9D',
                          //       borderColor: '#2DCE9D',                                
                          //       borderWidth: 3,
                          //       fill: false,
                          //       data: recoverycount,
                          //       type: 'line'
                          //   },
                          //   {
                          //       label: 'Death Count',
                          //       backgroundColor: '#F53E55',
                          //       borderColor: '#F53E55',                                
                          //       borderWidth: 3,
                          //       fill: false,
                          //       data: deathcount,
                          //       type: 'line'
                          //   },
                            {
                                label: 'Tests Count',
                                backgroundColor: '#11A6EF',
                                fill: false,
                                data: testcount
                              
                            }, {
                                label: 'Patient Count',
                                backgroundColor: '#FBAC40',
                                fill: false,
                                data: patientcount
                              
                            }]
                          };


                    var graphTarget = $("#graphD");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options:
                        {
                          responsive:true,
                          elements:
                          {
                            line:
                            {
                              tension:0
                            }
                          },
                          title: {
                            // text: 'Chart.js Time Scale'
                          },
                          responsive:true,
                          scales: {
                            xAxes: [{ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0
                            },
                              type:       "time",
                              
                              stacked:true,
                              // time:       {
                              //     format: timeFormat,
                              //     tooltipFormat: 'll'
                              // },
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Date'
                              }
                            }],
                            yAxes: [{
                                stacked:true,
                              scaleLabel: {
                                
                                // display: true,
                                // labelString: 'Count'
                              }
                            }]
                          },
                        }
                          
                    });
                });
            }
           
        }

        

</script>


<script>
 $(document).ready(function () {
            showGraphE();
        });


        function showGraphE()
        {
            {
                $.post("queries/graphD.php",
                function (data)
                {
                     var patientcount = [];
                     var deathcount = [];
                     var recoverycount = [];
                     
                     var testcount = [];
                    var date = [];

                    for (var i in data) 
                    {
                        patientcount.push(data[i].patient_count);
                        testcount.push(data[i].test_count);
                        deathcount.push(data[i].death_count);
                        recoverycount.push(data[i].recovery_count);
                        date.push(data[i].mydate);
                    }


                    var chartdata = {
                          labels: date,
                        datasets: [ 
                          // {
                          //       label: 'Test Count',
                          //       backgroundColor: '#43CCE9',
                          //       fill: false,
                          //       data: patientcount
                          //     }
                          //   ,
                          {
                                label: 'Recovery Count',
                                backgroundColor: '#2DCE9D',
                                borderColor: '#2DCE9D',                                
                                borderWidth: 3,
                                fill: false,
                                data: recoverycount,
                                type: 'line'
                            },
                            {
                                label: 'Death Count',
                                backgroundColor: '#F53E55',
                                borderColor: '#F53E55',                                
                                borderWidth: 3,
                                fill: false,
                                data: deathcount,
                                type: 'line'
                            },
                            // {
                            //     label: 'Tests Count',
                            //     backgroundColor: '#11A6EF',
                            //     fill: false,
                            //     data: testcount
                              
                            // },
                             {
                                label: 'Patient Count',
                                backgroundColor: '#FBAC40',
                                fill: false,
                                data: patientcount
                              
                            }]
                          };


                    var graphTarget = $("#graphE");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options:
                        {
                          responsive:true,
                          elements:
                          {
                            line:
                            {
                              tension:0
                            }
                          },
                          title: {
                            // text: 'Chart.js Time Scale'
                          },
                          responsive:true,
                          scales: {
                            xAxes: [{ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0
                            },
                              type:       "time",
                              
                              // stacked:true,
                              // time:       {
                              //     format: timeFormat,
                              //     tooltipFormat: 'll'
                              // },
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Date'
                              }
                            }],
                            yAxes: [{
                                // stacked:true,
                              scaleLabel: {
                                
                                // display: true,
                                // labelString: 'Count'
                              }
                            }]
                          },
                        }
                          
                    });
                });
            }
           
        }

        

</script>


<script>
 $(document).ready(function () {
            showGraphF();
        });


        function showGraphF()
        {
            {
                $.post("queries/graphE.php",
                function (data)
                {
                     var punjab = [];
                     var sindh = [];
                     var kpk = [];
                    var gilgit = [];                     
                     var ajk = [];
                    var balochistan = [];
                    var date = [];

                    for (var i in data) 
                    {
                        punjab.push(data[i].punjab_count);
                        sindh.push(data[i].sindh_count);
                        kpk.push(data[i].kpk_count);
                        gilgit.push(data[i].gilgit_count);
                        ajk.push(data[i].ajk_count);
                        balochistan.push(data[i].balochistan_count);
                        date.push(data[i].mydate);
                    }


                    var chartdata = {
                          labels: date,
                        datasets: [ 
                            {
                                label: 'Punjab Count',
                                backgroundColor: '#11A6EF',
                                fill: false,
                                data: punjab
                              
                            }, {
                                label: 'Sindh Count',
                                backgroundColor: '#FBAC40',
                                fill: false,
                                data: sindh
                              
                            }, {
                                label: 'Balochistan Count',
                                backgroundColor: '#2DCE89',
                                fill: false,
                                data: balochistan
                              
                            }, {
                                label: 'KPK Count',
                                backgroundColor: '#FB6644',
                                fill: false,
                                data: kpk
                              
                            },
                            {
                                label: 'Gilgit Baltistan Count',
                                backgroundColor: '#39A3C1',
                                fill: false,
                                data: gilgit
                              
                            }, {
                                label: 'AJK Count',
                                backgroundColor: '#FFE24D',
                                fill: false,
                                data: ajk
                              
                            }]
                          };


                    var graphTarget = $("#graphF");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options:
                        {
                          responsive:true,
                          elements:
                          {
                            line:
                            {
                              tension:0
                            }
                          },
                          title: {
                            // text: 'Chart.js Time Scale'
                          },
                          responsive:true,
                          scales: {
                            xAxes: [{ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0
                            },
                              type:       "time",
                              
                              stacked:true,
                              // time:       {
                              //     format: timeFormat,
                              //     tooltipFormat: 'll'
                              // },
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Date'
                              }
                            }],
                            yAxes: [{
                                stacked:true,
                              scaleLabel: {
                                
                                // display: true,
                                // labelString: 'Count'
                              }
                            }]
                          },
                        }
                          
                    });
                });
            }
           
        }

        

</script>

<script>
 $(document).ready(function () {
            showGraphG();
        });


        function showGraphG()
        {
            {
                $.post("queries/graphE.php",
                function (data)
                {
                     var punjab = [];
                     var sindh = [];
                     var kpk = [];
                    var gilgit = [];                     
                     var ajk = [];
                    var balochistan = [];
                    var date = [];

                    for (var i in data) 
                    {
                        punjab.push(data[i].punjab_count);
                        sindh.push(data[i].sindh_count);
                        kpk.push(data[i].kpk_count);
                        gilgit.push(data[i].gilgit_count);
                        ajk.push(data[i].ajk_count);
                        balochistan.push(data[i].balochistan_count);
                        date.push(data[i].mydate);
                    }


                    var chartdata = {
                          labels: date,
                        datasets: [ 
                            {
                                type:'line',
                                label: 'Punjab Count',
                                backgroundColor: '#11A6EF',
                                borderColor:'#11A6EF',
                                borderWidth:3,
                                fill: false,
                                data: punjab
                              
                            }
                            ,
                             {
                                type:'line',
                                label: 'Sindh Count',
                                backgroundColor: '#FBAC40',
                                borderColor:'#FBAC40',
                                borderWidth:3,
                                fill: false,
                                data: sindh
                              
                            }, {
                                type:'line',
                                label: 'Balochistan Count',
                                backgroundColor: '#2DCE89',
                                borderColor:'#2DCE89',
                                borderWidth:3,
                                fill: false,
                                data: balochistan
                              
                            }, 
                            {
                                type:'line',
                                label: 'KPK Count',
                                backgroundColor: '#FB6644',
                                borderColor:'#FB6644',
                                borderWidth:3,
                                fill: false,
                                data: kpk
                              
                            }
                            ,
                            {   
                                type:'line',
                                label: 'Gilgit Baltistan Count',
                                backgroundColor: '#39A3C1',
                                borderColor:'#39A3C1',
                                borderWidth:3,
                                fill: false,
                                data: gilgit
                              
                            }, {
                                type:'line',
                                label: 'AJK Count',
                                backgroundColor: '#FFE24D',
                                borderColor:'#FFE24D',
                                borderWidth:3,
                                fill: false,
                                data: ajk
                              
                            }
                            ]
                          };


                    var graphTarget = $("#graphG");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                        options:
                        {
                          responsive:true,
                          elements:
                          {
                            line:
                            {
                              tension:0
                            }
                          },
                          title: {
                            // text: 'Chart.js Time Scale'
                          },
                          responsive:true,
                          scales: {
                            xAxes: [{ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0
                            },
                              type:       "time",
                              
                              // stacked:true,
                              // time:       {
                              //     format: timeFormat,
                              //     tooltipFormat: 'll'
                              // },
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Date'
                              }
                            }],
                            yAxes: [{
                                // stacked:true,
                              scaleLabel: {
                                
                                // display: true,
                                // labelString: 'Count'
                              }
                            }]
                          },
                        }
                          
                    });
                });
            }
           
        }

        

</script>


<script>
 $(document).ready(function () {
            showGraphH();
        });


        function showGraphH()
        {
            {
                $.post("queries/graphF.php",
                function (data)
                {
                     var male = [];
                     var female = [];
                    var mlabel = [];

                    for (var i in data) 
                    {
                        mlabel.push(data[i].label);
                        male.push(data[i].males);
                        female.push(data[i].females);
                    }


                    var chartdata = {
			                  labels: ['0-20', '21-40', '41-60', '61-80', '81 and above'],
                        datasets: [ 
                            {
                                label: 'Male Count',
                                backgroundColor: '#11A6EF',
                                // borderColor:'#11A6EF',
                                // borderWidth:3,
                                fill: false,
                                data: male
                              
                            }
                            ,
                             {
                                label: 'Female Count',
                                backgroundColor: '#f38c8f',
                                // borderColor:'#FBAC40',
                                // borderWidth:3,
                                fill: false,
                                data: female
                              
                            }
                            ]
                          };


                    var graphTarget = $("#graphH");

                    var barGraph = new Chart(graphTarget, {
                        type: 'horizontalBar',
                        data: chartdata,
                        options:
                        {
                          responsive:true,
                          elements:
                          {
                            line:
                            {
                              tension:0
                            }
                          },
                          title: {
                            // text: 'Chart.js Time Scale'
                          },
                          responsive:true,
                          scales: {
                            xAxes: [{
                              // type:       "time",
                              ticks: {
                                autoSkip: false,
                                maxRotation: 0,
                                minRotation: 0
                            },
                              
                              stacked:true,
                              // time:       {
                              //     format: timeFormat,
                              //     tooltipFormat: 'll'
                              // },
                              scaleLabel: {
                              }
                            }],
                            yAxes: [{
                                stacked:true,
                              scaleLabel: {
                                
                                // display: true,
                                // labelString: 'Count'
                              }
                            }]
                          },
                        }
                          
                    });
                });
            }
           
        }

        

</script>



<script>
 $(document).ready(function () {
            showGraphI();
        });


        function showGraphI()
        {
            {
                $.post("queries/graphG.php",
                function (data)
                {
                     var date = [];
                     var cases = [];
                    var recoveries = [];

                    for (var i in data) 
                    {
                        date.push(data[i].mydate);
                        cases.push(data[i].cases);
                        recoveries.push(data[i].recoveries);
                    }


                    var chartdata = {
			                  labels: date,
                        datasets: [ 
                            {
                              type:'line',
                                label: 'New Recoveries',
                                backgroundColor: '#2DCE89',
                                borderColor:'#2DCE89',
                                borderWidth:3,
                                fill: false,
                                data: recoveries
                              
                            }
                            ,
                             {
                                label: 'New Cases',
                                backgroundColor: '#FF481F',
                                borderColor:'#FF481F',
                                borderWidth:3,
                                fill: false,
                                data: cases
                              
                            }
                            ]
                          };


                    var graphTarget = $("#graphI");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options:
                        {
                          responsive:true,
                          elements:
                          {
                            line:
                            {
                              tension:0
                            }
                          },
                          title: {
                            // text: 'Chart.js Time Scale'
                          },
                          responsive:true,
                          scales: {
                            xAxes: [{
                              type:       "time",
                              ticks: {
                                autoSkip: true,
                                maxRotation: 0,
                                minRotation: 0
                            },
                              
                              // stacked:true,
                              // time:       {
                              //     format: timeFormat,
                              //     tooltipFormat: 'll'
                              // },
                              scaleLabel: {
                                // display: true,
                                // labelString: 'Age'
                              }
                            }],
                            yAxes: [{
                                // stacked:true,
                              scaleLabel: {
                                
                                // display: true,
                                // labelString: 'Count'
                              }
                            }]
                          },
                        }
                          
                    });
                });
            }
           
        }       

</script>


  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>


</body>

</html>
