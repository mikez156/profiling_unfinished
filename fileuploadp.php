<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$textareaValue = trim($_POST['Textarea1']);
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["File1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["File1"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists. Pease rename the file";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["File1"]["size"] > 100000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["File1"]["tmp_name"], $target_file)) {
    
    $insert = "INSERT into images (file_name, uploaded_on,comment) VALUES ('".$_FILES["File1"]["name"]."', NOW(),'".$textareaValue."')";
    if(mysqli_query($link, $insert)){
        // $statusMsg = "The file ".$_FILES["File1"]["name"]. " has been uploaded successfully.";
        echo "The file ". htmlspecialchars( basename( $_FILES["File1"]["name"])). " has been uploaded.";
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($link);
      }
} else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>