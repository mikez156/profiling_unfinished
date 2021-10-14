<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
	<title>Home</title>
<head>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
	<script src="js/selectmemsing.js"></script>
	<script src="../js/adminjs.js"></script>
	
	<style>
    /* Formatting search box */
    .search-box{
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
    }
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


.reporttbl tr td{
	border: black solid 1px;

}
th {
    border: black solid 1px;
}

p {
    margin: 0;
    padding: 0;
    font-weight: bold;
}
	</style>
  
</head>
<body>
<div class="container">
	<div class="content">
		<!-- notification message -->

		<!-- logged in user information -->
		<div class="profile_info">
			
			<div>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<table style="width: 100%;">
							<tr>
								<td>
						<div style="text-align: left;">
						<a href="admin/home.php"> Search</a>
						</div></td>
						<td>
							<div style="text-align: right;">
							<a href="admin/home.php?logout='1'" style="color: red;">logout</a>
                       &nbsp; <a href="admin/create_user.php"> + add user</a>
						</div>
						</td>
						

					</tr>
						</table>
					 
					</small>

			</div>
		</div>
	</div>
</div>
<br>
<div class="container">
<div class="row ">
        
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search ..." name="srchtxt" id="srchtxt"/>
        <div class="result"></div>
        
    </div>
    
        <input type="submit" class="btn-sm btn-primary" style="width: 100px; margin-left:50px" name="searchbtn" id="searchbtn" value="Search">
        <input type="submit" id="btnExport" style="width:150x; margin-left:50px" value="Excel">
        <!--<input type="hidden" name="techid" id="techid">-->
        <h4 id="techid"></h4>
        </div>
</div>
<hr>
<div>
	<table id="selectiontbl" class="reporttbl" style="width: 100%;">
		<tbody>
		<tr>
                <td style="width: 10%;">Surname</td>
                <td colspan="5"><p id="surname"></p></td>
        </tr><tr>
                <td>First name</td>
                <td colspan="5"><p id="firstname"></p></td>
        </tr><tr>   
				<td>Middle Name</td>
                <td colspan="5"><p id="midname"></p></td>
        </tr><tr>
				<td>Address</td>
                <td colspan="5"><p id="address"></p></td>
        </tr><tr>    
				<td>Birth Date</td>
                <td style="width: 30%;"><p id="birthdate"></p></td>
                <td style="width: 10%;">Age</td>
                <td style="width: 10%;"><p id="age"></p></td>
                <td style="width: 10%;">Gender</td>
                <td style="width: 20%;"><p id="gender"></p></td>
        </tr><tr>
                <td>Birth Place</td>
                <td colspan="5"><p id="bplace"></p></td>
		</tr><tr>
            <td>Contact Number</td>
            <td><p id="contac"></p></td>
            <td>Email Address</td>
            <td colspan="3"><p id="email"></p></td>
        </tr><tr>
            <td>Civil Status</td>
            <td><p id="cstat"></p></td>
            <td>Citizenship</td>
            <td colspan="3"><p id="citizen"></p></td>
        </tr><tr>
            <td>Position</td>
            <td><p id="position"></p></td>
            <td>Name of School</td>
            <td colspan="3"><p id="nameofschool"></p></td>
        </tr><tr>
            <td>School Address</td>
            <td colspan="5"><p id="addressofschool"></p></td>
        </tr><tr>
            <td>District</td>
            <td><p id="district"></p></td>
            <td>Category</td>
            <td colspan="3"><p id="clasification"></p></td>
        </tr><tr>
            <td>Employment Date</td>
            <td><p id="employmentdate"></p></td>
            <td>Yrs. in Service</td>
            <td colspan="3"><p id="yrsinservis"></p></td>
        </tr>
        <tr>
                <td colspan="6"><H5>EDUCATIONAL BACKGROUND</H5></td>
            </tr>
            <tr>
                <th>Level</th>
                <th>Degree/Diploma</th>
                <th>Year Graduated</th>
                <th>Type</th>
                <th>Subject</th>
            </tr>
        </tbody>
       
            
      
		<tbody id="eduid">

        </tbody>
   <tbody id="not2">
            <tr>
                <td colspan="6"><h5>TRAININGS ATTENDED</h5></td>
            </tr>
            <tr>
                <th>Level of Training</th>
                <th>Tittle of Training</th>
                <th>Inclusive Date</th>
                <th colspan="2">Conducted/Sponsor By:</th>
            </tr>
</tbody> 
        <tbody id="trntbod">

        </tbody>
      <tbody>
            <tr>
                <td colspan="6"><h5>Scholarship Enjoyed(Start in 2019 to present)</h5></td>
            </tr>
            <tr>
            <th>Scholarship Enjoyed(Start in 2019 to present)</th>
            <th>Sponsoring Agency</th>
            <th>Inclusive Dates</th>
            <th>Date Graduated/Completed</th>
        </tr>
</tbody>
        <tbody id="schlar">

        </tbody>
        <tbody>
            <tr><td colspan="6"><h5>Awards Recieved start in 2019 to Present</h5></td></tr>
            <tr>
    <th>Title of Awards</th>
    <th>Title of Search/contest/Comp.</th>
    <th>Level</th>
    <th>Duration of Search</th>
</tr>
        </tbody>
        <tbody id="awardbod">

        </tbody>
   <tbody>
            <tr>
                <td colspan="6"><h5>Trainings Needed</h5></td>
                 <tr>
            <th colspan="2">Training Needed</th>
        </tr>
            </tr>
   </tbody>  
        <tbody id="nided">

        </tbody>
	</table>
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

    $("#btnExport").click(function(){
        expotoexcel();
        });

});
function expotoexcel(){
    var tab_text="<table border='2px'>";
    var textRange; var j=0;
    tab = document.getElementById('selectiontbl'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    //tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
  //  tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>
</html>