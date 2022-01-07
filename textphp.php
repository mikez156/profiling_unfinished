<?php
require 'connection.php';
include 'vendor/autoload.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$level = $_POST["kvcArray"];
$messa = $_POST["mess"];
//================== insert education===============================================
//     $sid = 'AC2c8e80195031130a88d58889dcd0c659';
// $token = '982f09f912c5c1ea2ed258391e19bbab';

// $client = new Twilio\Rest\Client($sid,$token);
// $message = $client->messages->create($level,array(
//     'from'=>'+19564365604',
//     'body'=>$_POST['msg']
// ));
// if($message->$sid){
//     echo 'message sent';
// }
echo json_encode($level);   
?>