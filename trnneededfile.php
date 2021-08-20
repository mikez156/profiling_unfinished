<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$trnneeded = mysqli_real_escape_string($link, $_POST["trainneeded"]);
/*$awdlvl = mysqli_real_escape_string($link, $_POST["awardslvl"]);
$awrdtleserj = mysqli_real_escape_string($link, $_POST["awrdtlesrch"]);
$awrdduration = mysqli_real_escape_string($link, $_POST["awardduration"]);
$category = mysqli_real_escape_string($link, $_POST["cate"]);

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
$nidid = $_POST["deleteneededid"];
//================== insert education===============================================
$fill1 = array();
$fill2 = array();

if($varval == 1){
$sql = "INSERT INTO training_needed (`techer_id`, `tittleoftraining`)
         VALUES ('$varid', '$trnneeded');";
            if(mysqli_query($link, $sql)){
                $qry = "select * from training_needed where techer_id = '$varid'";
                if($result = mysqli_query($link, $qry)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $fill1[] = array(
                            'needid'      => $row["need_id"],
                            'needtle'    => $row["tittleoftraining"]
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
    $sql = "delete from training_needed where need_id = '$nidid';";
                if(mysqli_query($link, $sql)){
                    $qry = "select * from training_needed where techer_id = '$varid'";
                    if($result = mysqli_query($link, $qry)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $fill1[] = array(
                                'needid'      => $row["need_id"],
                                'needtle'    => $row["tittleoftraining"]
                                 );
                        }
                         echo json_encode($fill1);   
                    }
                    } else{
                        echo "No records matching your query were found.";
        }
    }
                }
elseif($varval == 3){
                                    $qry = "select * from training_needed where techer_id = '$varid'";
                                    if($result = mysqli_query($link, $qry)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $fill1[] = array(
                                                'needid'      => $row["need_id"],
                                                'needtle'    => $row["tittleoftraining"]
                                                 );
                                        }
                                         echo json_encode($fill1);   
                                    }
                                    } else{
                                        echo "No records matching your query were found.";
                        }
                    }

           
?>