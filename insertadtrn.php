<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$level = mysqli_real_escape_string($link, $_POST["levtrn"]);
$tittil = mysqli_real_escape_string($link, $_POST["titletrn"]);
$deyts = mysqli_real_escape_string($link, $_POST["datetrn"]);
$sponsor = mysqli_real_escape_string($link, $_POST["condtrn"]);
$nama = mysqli_real_escape_string($link, $_POST["namtrain"]);
$cody = mysqli_real_escape_string($link, $_POST["setcode"]);
// $varval = $_POST["valval"];
 $varid = $_POST["idmem"];
 $trainidid = $_POST["deltrn"];
// $trnid = $_POST["deletetrnuid"];
//================== insert education===============================================
$fill1 = array();
$fill2 = array();

if($cody == 1){
$sql = "INSERT INTO trainings (`techer_id`, `level`, `trainingtitle`, `inclusivedate`,`sponsoring`)
         select techer_id, '$level', '$tittil','$deyts','$sponsor' from teachers where concat(lname,' ',fname,' ',mname,' #',techer_id) = '$nama';";
            if(mysqli_query($link, $sql)){
                $qry = "select concat(lname,' ',fname,' ',mname)as nami,training_id,level,trainingtitle,inclusivedate,sponsoring from teachers b inner join trainings c on b.techer_id = c.techer_id where c.trainingtitle = '$tittil' and c.inclusivedate = '$deyts'";
                if($result = mysqli_query($link, $qry)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $fill1[] = array(
                            'edid'      => $row["training_id"],
                            'meme'      => $row["nami"],
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
    elseif($cody == 2){
        $sql = "delete from trainings where training_id = '$trainidid'";
                    if(mysqli_query($link, $sql)){
                        $qry = "select concat(lname,' ',fname,' ',mname)as nami,training_id,level,trainingtitle,inclusivedate,sponsoring from teachers b inner join trainings c on b.techer_id = c.techer_id where c.trainingtitle = '$tittil' and c.inclusivedate = '$deyts'";
                        if($result = mysqli_query($link, $qry)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                $fill1[] = array(
                                    'edid'      => $row["training_id"],
                                    'meme'      => $row["nami"],
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
?>