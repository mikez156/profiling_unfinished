<?php 
include('../functions.php');

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

    <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
	<script src="../js/selekajax.js"></script>
	<script src="../js/adminjs.js"></script>
	
	<style>
.reporttbl tr td{
	border: black solid 1px;
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
						<a href="../singlesearch.php"> Single Search</a>
						</div></td>
						<td>
							<div style="text-align: right;">
							<a href="home.php?logout='1'" style="color: red;">logout</a>
                       &nbsp; <a href="create_user.php"> + add user</a>
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
<table>
<tr>
	<td><input type="text" id="serchtxt" placeholder="Search..." style="width: 4in;"></td>
	<td><select id="selection">
                    <option value="All">All</option>
                    <option value="Names">Names</option>
                    <option value="Training">Training</option>
					<option value="Trainings Needed">Trainings Needed</option>
                    <option value="Position">Position</option>
                    <option value="Education">Education</option>
					<option value="School">School</option>
                    <option value="Gender">Gender</option>
                    <option value="Length in Service">Length in service</option>
					<option value="District">District</option>
                    <option value="Scholarship/Grant">Scholarship/Grant</option>
                    <option value="Awards">Awards</option>
					<option value="needed">Training Needed</option>
					<option value="Classification">Classification</option>
                </select></td>
	<td><select name="" id="secondselect"></select></td>
	<td><select name="" id="tirdselect"></select></td>
	<td><input type="submit" class=" btn btn-sm btn-primary" id="serchbtn" value="Search" style="margin-left: 40px;"></td>
	<td><input type="submit" id="btnExport" style="width:150x; margin-left:50px" value="Excel"></td>


</tr>
</table>
</div>
<hr>
<div>
	<table id="selectiontbl" class="reporttbl">
		<thead>
		<tr>
				<td>Name</td>
				<td>Address</td>
				<td>Birth Date</td>
				<td>Age</td>
				<td>Birth Place</td>
				<td>Contact Number</td>
				<td>Email Address</td>
				<td>Gender</td>
				<td>Civil Status</td>
				<td>Citizenship</td>
				<td>Position</td>
				<td>Name of School</td>
				<td>School Address</td>
				<td>District</td>
				<td>Classification</td>
				<td>Employment Date</td>
				<td>Yrs. in Service</td>
			</tr>
		</thead>
		<tbody>
			
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