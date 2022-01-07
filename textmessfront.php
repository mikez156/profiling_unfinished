<?php 
include('functions.php');
// include 'vendor/autoload.php';
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// if(isset($_POST['textsend']))
// {
// //     $sid = 'AC2c8e80195031130a88d58889dcd0c659';
// // $token = '982f09f912c5c1ea2ed258391e19bbab';

// // $client = new Twilio\Rest\Client($sid,$token);
// // $message = $client->messages->create('+639159080534',array(
// //     'from'=>'+19564365604',
// //     'body'=>$_POST['msg']
// // ));
// // if($message->$sid){
// //     echo 'message sent';
// // }

// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script src="js/selectmemsing.js"></script>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    
    <title>Text Messages</title>
</head>
<style>
    /* Formatting search box */
    /* .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    } */
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        background:white;
    }
    .result p:hover{
        background: #f2f2f2;
    }

    .heder {
	margin-top: 50px;
	background-color: lightpink;
	padding-bottom: 10px;
	padding-top: 10px;
	padding-right: 50px;
	padding-left: 50px;
	text-decoration: none !important;
}
</style>
<body>
<div class="container mt-4">
    <a href="admin/home.php" class="heder">Back</a><br>
    
    
    <div class="row mt-4">

<form method="post">        
    <div class="col-sm">
    <div class="form-group row">
        <label for="Textarea1" class="col-sm-2 col-form-label">Message</label>
        <div class="col-sm-10">
        <textarea class="form-control" id="Textarea1" rows="3" name="msg"></textarea>
        </div>
    </div>
    <button type="submit" name="textsend" value="Submit" id="textsend">Submit</button>
    </div>
</form>
   

    <div class="col-sm">
    <div class="form-group row">
        <label for="serjnametxt" class="col-sm-2 col-form-label" style="white-space: nowrap;">Search Name : </label>
        <div class="col-sm">
        <div class="search-box">
        <input type="text" class="form-control" id="serjnametxt" placeholder="Search Name">
        <div class="result"></div>
        </div>
        </div>
        <button type="submit" class="btn btn-primary" id="addbyname">Add</button>
    </div>
    <div class="form-group row">
        <label for="addnumbertxt" class="col-sm-2 col-form-label" style="white-space: nowrap;">Add Number : </label>
        <div class="col-sm">
        <input type="tel" class="form-control" id="addnumbertxt" placeholder="Add Number" maxlength="13">
        </div>
        <button type="submit" class="btn btn-primary" id="addnumberbtn">Add</button>
    </div>
    <div>
    <label for="listnumber" class="col-sm-2 col-form-label" style="white-space: nowrap;">Send to Staffs</label>
        <table class="table-bordered" id="listnumber">
            <thead>
            <tr>
                <th>Name</th>
                <th>Number</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    </div>
    </div>
    
 
  </div>
</body>
<script>
$(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            
            $.get("serjing.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
// ======================================serch=============================
$("#addbyname").click(function(){
        serjtechfortext();
        // alert("vtfgybhgbvfcdrft");
});
$("#addnumberbtn").click(function(){
    $("#listnumber tbody").append("<tr><td></td><td>"+$('#addnumbertxt').val()+"</td><td><button type='submit' id='delbtn' class='btn btn-primary btn-sm'>Remove</button> </td></tr>")
        // alert("vtfgybhgbvfcdrft");
});
$("#listnumber").on('click', '#delbtn', function () {
    $(this).closest('tr').remove();
});

    $("#textsend").click(function(){
        var myArray = new Array();

        $("#listnumber tr td:nth-child(2)").each(function(i){
            myArray.push($(this).text());
        });
       
    $.ajax({ 
        type: "POST", 
        url: "textphp.php", 
        data: { kvcArray : myArray,mess:$('#Textarea1').val() }, 
        success: function(response) { 
                alert(response); 
            } 
    });
});
});

</script>

</html>