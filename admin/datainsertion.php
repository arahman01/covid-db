<?php

    require('config/config.php');
    require('config/connectdb.php');

    //CITIES INSERTION
        /*
        $handle = fopen("data/cities/balochistan.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO cities(city, province) Values ('$line', 'Balochistan')";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }

        $handle = fopen("data/cities/punjab.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO cities(city, province) Values ('$line', 'Punjab')";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }



        $handle = fopen("data/cities/sindh.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO cities(city, province) Values ('$line', 'Sindh')";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn) . '     ';
                break;
                }
            }
            fclose($handle);
        }

        $handle = fopen("data/cities/kpk.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO cities(city, province) Values ('$line', 'KPK')";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }

        $handle = fopen("data/cities/gilgit.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO cities(city, province) Values ('$line', 'Gilgit Baltistan')";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }

        $handle = fopen("data/cities/ajk.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO cities(city, province) Values ('$line', 'AJK')";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }


        */
    //CENTRES INSERTION
        /*
        $capacity_arr = array(50, 100, 150, 200, 250);

        $handle = fopen("data/centres/peshawarhospitals.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $cap = array_rand($capacity_arr);
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO centres(name, city, capacity) Values ('$line', 'Peshawar', $capacity_arr[$cap])";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }

        $handle = fopen("data/centres/quettahospitals.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $cap = array_rand($capacity_arr);
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO centres(name, city, capacity) Values ('$line', 'Quetta', $capacity_arr[$cap])";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }

        $handle = fopen("data/centres/islamabadhospitals.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $cap = array_rand($capacity_arr);
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO centres(name, city, capacity) Values ('$line', 'Islamabad', $capacity_arr[$cap])";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }

        $handle = fopen("data/centres/karachihospitals.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $cap = array_rand($capacity_arr);
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO centres(name, city, capacity) Values ('$line', 'Karachi', $capacity_arr[$cap])";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }

        $handle = fopen("data/centres/lahorehospitals.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $cap = array_rand($capacity_arr);
                $line = preg_replace( "/\r|\n/", "", $line);
                $query = "INSERT INTO centres(name, city, capacity) Values ('$line', 'Lahore', $capacity_arr[$cap])";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '     ';
                break;
                }
            }
            fclose($handle);
        }
        */


    //TESTS DONE
        /*

        $t = date("Y-m-d",strtotime("+1 days"));
        $startdate = date('Y-m-d',strtotime("-3 months + 10 days"));

        $result = mysqli_query($conn, "SELECT city from cities");
        $allresults = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $i=0;
        foreach($allresults as $row)
        {
            $myarr[$i] =  $row['city'];
            $i++;
        }
        // var_dump($myarr);
        mysqli_free_result($result);
        $ok = 5;
        while($t !== $startdate)
        {
            foreach($myarr as $city)
            {
                // echo $startdate.'<br>';
                $num =  rand(0,$ok);
                // echo $num . '   ';
                $query = "INSERT INTO tests_taken(t_date, city, count) Values ('$startdate', '$city', $num)";
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '<br><br>';
                }
            }
            $ok = $ok + 4;
            $startdate = date('Y-m-d',strtotime($startdate .'+1 days'));
        }
        */

    //Patients

        /*
        $males = array();
        $females = array();
        //read 2 files for names male, female
        $handle = fopen("data/names/male.txt", "r");
        if ($handle) {
            $j=0;
            while (($line = fgets($handle)) !== false)
            {
                $males[$j] = $line;
                $j++;
            }
            fclose($handle);
        }

        $handle = fopen("data/names/female.txt", "r");
        if ($handle) {
            $j=0;
            while (($line = fgets($handle)) !== false)
            {
                $females[$j] = $line;
                $j++;
            }
            fclose($handle);
        }


        $centres_arr = array();
        $cities_arr = array();
        $query = 'SELECT * from centres';
        $result = mysqli_query($conn, $query);
        $centres = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        $k=0;
        foreach($centres as $c)
        {
            $centres_arr[$k] = trim($c['id']);
            $cities_arr[$k] = trim($c['city']);
            $k++;
        }

        $sources_arr = array();
        $query = 'SELECT * from sources';
        $result = mysqli_query($conn, $query);
        $sources = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        $k=0;
        foreach($sources as $c)
        {
            $sources_arr[$k] = trim($c['source_name']);
            $k++;
        }

        $t = date("Y-m-d",strtotime("+1 days"));
        $startdate = date('Y-m-d',strtotime("-1 months + 7 days"));
        while($t !== $startdate)
        {
            $num =  rand(20, 3000);
            for($i = 0; $i<=$num; $i++)
            {
                $r = rand(0,1);
                if($r == 0)
                {
                    $r = array_rand($males);
                    $name = $males[$r];
                    $gender = 'Male';
                }
                else
                {
                    $r = array_rand($females);
                    $name = $females[$r];
                    $gender = 'Female';
                }
                $age = rand(0, 70);
                $address = 'address: '. rand(0, 99999);

                $r = array_rand($centres_arr);
                $centre = $centres_arr[$r];
                $city = $cities_arr[$r];


                $r = array_rand($sources_arr);
                $virussource = $sources_arr[$r];



                $query = "INSERT INTO patients(patient_name, patient_age, patient_address, patient_centre, patient_city, patient_gender, patient_testdate, patient_virussource) Values ('$name', $age, '$address', '$centre', '$city', '$gender', '$startdate', '$virussource')";
                // echo $query.'<br>';
                if(!mysqli_query($conn, $query))
                {
                    echo 'Failed: ' . mysqli_error($conn). '<br><br>';
                    // return;
                }

            }
            $startdate = date("Y-m-d", strtotime($startdate . '+1 days'));
        }
        mysqli_close($conn);
        */
    //CASES CLOSED

    // mysqli_close($conn);
    // $t = date("Y-m-d",strtotime("-1 days"));
    // $startdate = date('Y-m-d',strtotime("-10 days"));


    // // $query = 'SELECT COUNT(patient_id) from patients';
    // // $result = mysqli_query($conn, $query);
    // // $row = mysqli_fetch_assoc($result);
    // // mysqli_free_result($result);
    // // $row["COUNT(patient_id)"]

    // $query = 'SELECT * from patients';
    // $result = mysqli_query($conn, $query);
    // $ids = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // mysqli_free_result($result);

    // $ids_arr = array();
    // $i=-1;
    // foreach($ids as $id)
    // {
    //     $a = $id['patient_id'];
    //     $query = "SELECT COUNT(id) from casesclosed where id = $a";
    //     $result = mysqli_query($conn, $query);
    //     $row = mysqli_fetch_assoc($result);
    //     mysqli_free_result($result);
    //     if($row["COUNT(id)"] == 0)
    //     {
    //         $i++;
    //         $ids_arr[$i] = $a;
    //     }
    // }

    // // var_dump($ids_arr);
    // // ver_dump($i) ;

    // while($t !== $startdate)
    // {
    //     var_dump($startdate);
    //     $num =  rand(250, 1000);
    //     for($i = 0; $i<=$num; $i++)
    //     {
    //         $r = rand(0,10);
    //         if($r == 0 || $r==1)
    //         {
    //            $status = 'Dead';
    //         }
    //         else
    //         {
    //             $status = 'Recovered';
    //         }
    //         $noo = rand(50000, $i);
    //         $pid = $ids_arr[$noo];
    //         // var_dump($pid);

    //         $query = "INSERT INTO casesclosed(id, closedate, status) Values ($pid, '$startdate', '$status')";

    //         if(!mysqli_query($conn, $query))
    //         {
    //             echo 'Failed: ' . mysqli_error($conn). '<br><br>';
    //         }

    //     }
    //     $startdate = date("Y-m-d", strtotime($startdate . '+1 days'));
    // // break;
    // }
    mysqli_close($conn);
?>