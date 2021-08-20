<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$awardtaytel = mysqli_real_escape_string($link, $_POST["awardtitle"]);
$awdlvl = mysqli_real_escape_string($link, $_POST["awardslvl"]);
$awrdtleserj = mysqli_real_escape_string($link, $_POST["awrdtlesrch"]);
$awrdduration = mysqli_real_escape_string($link, $_POST["awardduration"]);
$varval = $_POST["valval"];
$varid = $_POST["memid"];
$awardid = $_POST["deleteawrdid"];
//================== insert education===============================================
$fill1 = array();
$fill2 = array();

if($varval == 1){
$sql = "INSERT INTO award (`techer_id`, `awardtitle`, `level`, `schoolrecieve`,`period`)
         VALUES ('$varid', '$awardtaytel','$awdlvl','$awrdtleserj','$awrdduration');";
            if(mysqli_query($link, $sql)){
                $qry = "select * from award where techer_id = '$varid'";
                if($result = mysqli_query($link, $qry)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $fill1[] = array(
                            'awardid'      => $row["award_id"],
                            'awrdtle'    => $row["awardtitle"],
                            'awrdlvl'   => $row["level"],
                            'awrdres' => $row["schoolrecieve"],
                            'awardperiod' => $row["period"]
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
    $sql = "delete from award where award_id = '$awardid';";
                if(mysqli_query($link, $sql)){
                    $qry = "select * from award where techer_id = '$varid'";
                    if($result = mysqli_query($link, $qry)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $fill1[] = array(
                                'awardid'      => $row["award_id"],
                                'awrdtle'    => $row["awardtitle"],
                                'awrdlvl'   => $row["level"],
                                'awrdres' => $row["schoolrecieve"],
                                'awardperiod' => $row["period"]
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

    $qry = "select * from award where techer_id = '$varid'";
                                    if($result = mysqli_query($link, $qry)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $fill1[] = array(
                                                'awardid'      => $row["award_id"],
                                                'awrdtle'    => $row["awardtitle"],
                                                'awrdlvl'   => $row["level"],
                                                'awrdres' => $row["schoolrecieve"],
                                                'awardperiod' => $row["period"]
                                                 );
                                        }
                                         echo json_encode($fill1);   
                                    }
                                    } else{
                                        echo "No records matching your query were found.";
                        }
    }

           
?>