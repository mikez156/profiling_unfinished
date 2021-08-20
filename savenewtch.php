<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$surnam = mysqli_real_escape_string($link, $_POST["surname"]);
$firstnam = mysqli_real_escape_string($link, $_POST["firstname"]);
$midnam = mysqli_real_escape_string($link, $_POST["midname"]);
$address = mysqli_real_escape_string($link, $_POST["address"]);
$bdate = mysqli_real_escape_string($link, $_POST["bdate"]);
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
$ditrik = mysqli_real_escape_string($link, $_POST["distrct"]);
$varval = $_POST["isertval"];
$varid = $_POST["memid"];
// insert===============================================
$upok = 0;
if($varval == 1){
$sql = "INSERT INTO teachers (`lname`, `fname`, `mname`, `address`,`birthdate`,`age`,`birthplace`,`cp`,
        `emailadd`,`gender`,`civilstatus`,`citizenship`,`namofschool`,`addressofschool`,`district`,
        `Position`,`category`,`employdate`,`servicelength`)
         VALUES ('$surnam', '$firstnam', '$midnam','$address', '$bdate', '$age','$bplace','$cp','$email'
         ,'$gender','$csatatus','$citizen','$schoolnm','$scooladd','$ditrik','$position','$categ','$empdate','$lentser')";
            if(mysqli_query($link, $sql)){
            $setid = mysqli_insert_id($link);
            echo json_encode($setid);
            } else{
        }
}
elseif($varval == 2){
    $sql = "update teachers set lname='$surnam',fname='$firstnam',mname='$midnam',address='$address',
    birthdate='$bdate',age='$age',birthplace='$bplace',cp='$cp',emailadd='$email',gender='$gender',
    civilstatus='$citizen',namofschool='$schoolnm',addressofschool='$scooladd',district='$ditrik',
    Position='$position',category='$categ',employdate='$empdate',servicelength='$lentser' where techer_id = '$varid'";
    if(mysqli_query($link, $sql)){
        $upok = 1;
        echo json_encode($upok);
    } else{
    }
}
elseif($varval == 3){
    $sql = "delete from teachers where techer_id = '$varid';";
    if(mysqli_query($link, $sql)){
        $upok = 3;
        echo json_encode($upok);
    } else{
    }
    $sql = "delete from award where techer_id = '$varid';";
    if(mysqli_query($link, $sql)){
    } 
    $sql = "delete from education where techer_id = '$varid';";
    if(mysqli_query($link, $sql)){
    } 
    $sql = "delete from scholarship where techer_id = '$varid';";
    if(mysqli_query($link, $sql)){
    } 
    $sql = "delete from trainings where techer_id = '$varid';";
    if(mysqli_query($link, $sql)){
    } 
    $sql = "delete from training_needed where techer_id = '$varid';";
    if(mysqli_query($link, $sql)){
    } 
}
?>