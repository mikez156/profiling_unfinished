<?php

require_once "connection.php";
$srchtxt=$_POST["srchtxt"];
$siyt = $_POST["sit"];
$fill1 = array();
$fill2 = array();
$fill3 = array();
$fill4 = array();
$fill5 = array();
$fill6 = array();
if ($siyt == 1){
$sql = "SELECT * FROM teachers where replace(concat(lname,fname,mname,'#',techer_id),' ','') = replace('".$srchtxt."',' ','')";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
     
        while($row = mysqli_fetch_array($result)){
            $fill1 = array(
                'techerid' => $row["techer_id"],
                'lname' => $row["lname"],
                'fname' => $row["fname"],
                'mname' => $row["mname"],
                'address' => $row["address"],
                'birtdate' => $row["birthdate"],
                'age' => $row["age"],
                'birtplace' => $row["birthplace"],
                'cp' => $row["cp"],
                'emailadd' => $row["emailadd"],
                'gender' => $row["gender"],
                'civilstatus' => $row["civilstatus"],
                'citisen' => $row["citizenship"],
                'schoolname' => $row["namofschool"],
                'schooladd' => $row["addressofschool"],
                'district' => $row["district"],
                'posison' => $row["Position"],
                'category' => $row["category"],
                'dateemp' => $row["employdate"],
                'servlent' => $row["servicelength"],
                 );
            
        }
        // Free result set
        echo json_encode($fill1);
       // echo json_encode($loanarr);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
// Close connection
}
if ($siyt == 2){
    $sql = "SELECT * FROM education a inner join teachers b on a.techer_id = b.techer_id where replace(concat(b.lname,b.fname,b.mname,'#',b.techer_id),' ','') = replace('".$srchtxt."',' ','')";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
         
            while($row = mysqli_fetch_array($result)){
                $fill2[] = array(
                    'techerid' => $row["techer_id"],
                    'lvl' => $row["level"],
                    'dgree' => $row["degree"],
                    'yrgrad' => $row["yeargrad"],
                    'catgry' => $row["category"],
                    'subjct' => $row["subject"],
                     );
                
            }
            // Free result set
            echo json_encode($fill2);
           // echo json_encode($loanarr);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
    // Close connection
    }
if ($siyt == 3){
        $sql = "SELECT * FROM trainings a left join teachers b on a.techer_id = b.techer_id where replace(concat(b.lname,b.fname,b.mname,'#',b.techer_id),' ','') = replace('".$srchtxt."',' ','')";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
             
                while($row = mysqli_fetch_array($result)){
                    $fill3[] = array(
                        'techerid' => $row["techer_id"],
                        'lvl' => $row["level"],
                        'trntitle' => $row["trainingtitle"],
                        'incdate' => $row["inclusivedate"],
                        'sponsr' => $row["sponsoring"],
                         );
                }
                // Free result set
                echo json_encode($fill3);
               // echo json_encode($loanarr);
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        mysqli_close($link);
        // Close connection
        }
if ($siyt == 4){
            $sql = "SELECT * FROM scholarship a left join teachers b on a.techer_id = b.techer_id where replace(concat(b.lname,b.fname,b.mname,'#',b.techer_id),' ','') = replace('".$srchtxt."',' ','')";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                 
                    while($row = mysqli_fetch_array($result)){
                        $fill4[] = array(
                            'techerid' => $row["techer_id"],
                            'lvl' => $row["level"],
                            'schtitle' => $row["titlescholar"],
                            'spnsr' => $row["sponsor"],
                            'incdate' => $row["inclusivedate"],
                            'dategrad' => $row["dategraduated"],
                             );
                    }
                    // Free result set
                    echo json_encode($fill4);
                   // echo json_encode($loanarr);
                } else{
                    echo "No records matching your query were found.";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            mysqli_close($link);
            // Close connection
}
if ($siyt == 5){
    $sql = "SELECT * FROM award a left join teachers b on a.techer_id = b.techer_id where replace(concat(b.lname,b.fname,b.mname,'#',b.techer_id),' ','') = replace('".$srchtxt."',' ','')";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
         
            while($row = mysqli_fetch_array($result)){
                $fill5[] = array(
                    'techerid' => $row["techer_id"],
                    'awrdtitel' => $row["awardtitle"],
                    'lvl' => $row["level"],
                    'schlres' => $row["schoolrecieve"],
                    'pryod' => $row["period"],
                     );
            }
            // Free result set
            echo json_encode($fill5);
           // echo json_encode($loanarr);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
    // Close connection
}
if ($siyt == 6){
    $sql = "SELECT * FROM training_needed a left join teachers b on a.techer_id = b.techer_id where replace(concat(b.lname,b.fname,b.mname,'#',b.techer_id),' ','') = replace('".$srchtxt."',' ','')";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
         
            while($row = mysqli_fetch_array($result)){
                $fill6[] = array(
                    'nided' => $row["tittleoftraining"],
                     );
            }
            // Free result set
            echo json_encode($fill6);
           // echo json_encode($loanarr);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
    // Close connection
}
?>
