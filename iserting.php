<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$level = mysqli_real_escape_string($link, $_POST["level"]);
$degree = mysqli_real_escape_string($link, $_POST["degree"]);
$yrgrad = mysqli_real_escape_string($link, $_POST["yrgrad"]);
$subject = mysqli_real_escape_string($link, $_POST["subject"]);
$category = mysqli_real_escape_string($link, $_POST["cate"]);
$varval = $_POST["valval"];
$varid = $_POST["memid"];
$eduid = $_POST["deleteeduid"];
//================== insert education===============================================
$fill1 = array();
$fill2 = array();

if($varval == 1){
$sql = "INSERT INTO education (`techer_id`, `level`, `degree`, `yeargrad`,`category`,`subject`)
         VALUES ('$varid', '$level', '$degree','$yrgrad','$category', '$subject');";
            if(mysqli_query($link, $sql)){
                $qry = "select * from education where techer_id = '$varid'";
                if($result = mysqli_query($link, $qry)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $fill1[] = array(
                            'edid'      => $row["edu_id"],
                            'levels'    => $row["level"],
                            'degrees'   => $row["degree"],
                            'yeargrads' => $row["yeargrad"],
                            'categorys' => $row["category"],
                            'subjects'  => $row["subject"]
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
    $sql = "delete from education where edu_id = '$eduid';";
                if(mysqli_query($link, $sql)){
                    
                } else{
           }

           $qry = "select * from education where techer_id = '$varid'";
                    if($result = mysqli_query($link, $qry)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $fill1[] = array(
                                'edid'      => $row["edu_id"],
                                'levels'    => $row["level"],
                                'degrees'   => $row["degree"],
                                'yeargrads' => $row["yeargrad"],
                                'categorys' => $row["category"],
                                'subjects'  => $row["subject"]
                                 );
                        }
                         echo json_encode($fill1);   
                    }
                    } else{
                        echo "No records matching your query were found.";
        }
    }
elseif($varval == 3){

                        $qry = "select * from education where techer_id = '$varid'";
                        if($result = mysqli_query($link, $qry)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                $fill1[] = array(
                                    'edid'      => $row["edu_id"],
                                    'levels'    => $row["level"],
                                    'degrees'   => $row["degree"],
                                    'yeargrads' => $row["yeargrad"],
                                    'categorys' => $row["category"],
                                    'subjects'  => $row["subject"]
                                     );
                            }
                             echo json_encode($fill1);   
                        }
                        } else{
                            echo "No records matching your query were found.";
                        }
                   
        }
?>