<?php 
include('functions.php');
require 'connection.php';

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['submit'])){


$textareaValue = $_POST['Textarea1'];
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["File1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["File1"]["tmp_name"]);
//   if($check !== false) {
//     // echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     // echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// Check if file already exists
if (file_exists($target_file)) {
    $successMsg = " Sorry, file already exists. Pease rename the file";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["File1"]["size"] > 100000000) {
    $successMsg = " Sorry, your file is too large.";
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
    $successMsg;
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["File1"]["tmp_name"], $target_file)) {
    
    $insert = "INSERT into images (file_name, uploaded_on,comment) VALUES ('".$_FILES["File1"]["name"]."', NOW(),'".$textareaValue."')";
    if(mysqli_query($link, $insert)){
        // $statusMsg = "The file ".$_FILES["File1"]["name"]. " has been uploaded successfully.";
        $successMsg = "The file ". htmlspecialchars( basename( $_FILES["File1"]["name"])). " has been uploaded.";
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($link);
      }
} else {
    echo "Sorry, there was an error uploading your file.";
  }
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposals</title>
</head>
<style>
       .heder {
	margin-top: 50px;
	background-color: lightpink;
	padding-bottom: 10px;
	padding-top: 10px;
	padding-right: 50px;
	padding-left: 50px;
	text-decoration: none !important;
}
.success-msg{
	background:#15a869;
	border:1px solid #15a869;
	color:#ffffff;
	/* width:33%; */
}
</style>
<body>

    <div class="container mt-5">
    <a href="admin/home.php" class="heder" style="width: 250px !important;">Back</a><br>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <div class="form-group mt-4">
    <label for="File1">Choose File</label>
    <input type="file" class="form-control-file" id="File1" name="File1">
    </div>

    
    <div class="form-group">
    <label for="Textarea1">Coments\Questions\Sugestions</label>
    <textarea class="form-control" id="Textarea1" name="Textarea1" rows="3"></textarea>
  </div>
 
  <input type="submit" name="submit" value="Submit">
</form>
<?php 
		if(isset($successMsg))
		{
			echo "<div class='success-msg mt-4'>";
			print_r($successMsg);
			echo "</div>";
		}
?>
  </div>
  <div class="container mt-4">
<?php
$path    = 'files/';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));
foreach($files as $file){
    echo "<div class='mt-3 rounded border border-warning' style='background-color:#FFFAF0;'>";
  echo "<a href='$path/$file'>$file</a><br>";
 
$sql = "SELECT comment FROM images where file_name = '".$file."'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo $row["comment"];
  }
} else {
  echo "0 results";
}
echo "</div>";
}
?>
  </div>
 
</body>

</html>
