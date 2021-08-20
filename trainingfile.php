<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$level = mysqli_real_escape_string($link, $_POST["level"]);
$tittil = mysqli_real_escape_string($link, $_POST["titletrn"]);
$inclusdate = mysqli_real_escape_string($link, $_POST["incdate"]);
$cundactor = mysqli_real_escape_string($link, $_POST["cunductor"]);
/*$category = mysqli_real_escape_string($link, $_POST["cate"]);

$age = mysqli_real_escape_string($link, $_POST["age"]);
$bplace = mysqli_real_escape_string($link, $_POST["bplace"]);
$citizen = mysqli_real_escape_string($link, $_POST["citizen"]);
$cp = mysqli_real_escape_string($link, $_POST["cp"]);
$email = mysqli_real_escape_string($link, $_POST["email"]);
$gender = mysqli_real_escape_string($link, $_POST["gender"]);
$csatatus = mysqli_real_escape_string($link, $_POST["cstatus"]);
$empdate = mysqli_real_escape_string($link, $_POST["empdate"]);
$lentser = mysqli_real_escape_string($link, $_POST["lentin"]);
$position = mysqli_real_escape_string($link, $_POST["position"]);
$categ = mysqli_real_escape_string($link, $_POST["category"]);
$schoolnm = mysqli_real_escape_string($link, $_POST["nameofschool"]);
$scooladd = mysqli_real_escape_string($link, $_POST["scoolid"]);
$ditrik = mysqli_real_escape_string($link, $_POST["distrct"]); */
$varval = $_POST["valval"];
$varid = $_POST["memid"];
$trnid = $_POST["deletetrnuid"];
//================== insert education===============================================
$fill1 = array();
$fill2 = array();

if($varval == 1){
$sql = "INSERT INTO trainings (`techer_id`, `level`, `trainingtitle`, `inclusivedate`,`sponsoring`)
         VALUES ('$varid', '$level', '$tittil','$inclusdate','$cundactor');";
            if(mysqli_query($link, $sql)){
                $qry = "select * from trainings where techer_id = '$varid'";
                if($result = mysqli_query($link, $qry)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $fill1[] = array(
                            'edid'      => $row["training_id"],
                            'levels'    => $row["level"],
                            'trntitle'   => $row["trainingtitle"],
                            'incluvdate' => $row["inclusivedate"],
                            'sponsor' => $row["sponsoring"]
                             );
                    }
                     echo json_encode($fill1);   
                }
                } else{
                    echo "No records matching your query were found.";
                }
            } else{
       }
}
elseif($varval == 2){
    $sql = "delete from trainings where training_id = '$trnid';";
                if(mysqli_query($link, $sql)){
                    
                } else{
           }

           $qry = "select * from trainings where techer_id = '$varid'";
                    if($result = mysqli_query($link, $qry)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $fill1[] = array(
                                'edid'      => $row["training_id"],
                                'levels'    => $row["level"],
                                'trntitle'   => $row["trainingtitle"],
                                'incluvdate' => $row["inclusivedate"],
                                'sponsor' => $row["sponsoring"]
                                 );
                        }
                         echo json_encode($fill1);   
                    }
                    } else{
                        echo "No records matching your query were found.";
        }
    }
    elseif($varval == 3){
    
               $qry = "select * from trainings where techer_id = '$varid'";
                        if($result = mysqli_query($link, $qry)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                $fill1[] = array(
                                    'edid'      => $row["training_id"],
                                    'levels'    => $row["level"],
                                    'trntitle'   => $row["trainingtitle"],
                                    'incluvdate' => $row["inclusivedate"],
                                    'sponsor' => $row["sponsoring"]
                                     );
                            }
                             echo json_encode($fill1);   
                        }
                        } else{
                            echo "No records matching your query were found.";
            }
        }
?>