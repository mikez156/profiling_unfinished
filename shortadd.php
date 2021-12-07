
<!DOCTYPE html>
<html>
    <title>Profile</title>
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script src="js/shortaddfor.js"></script>
</head>

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


  //======================endsearch========================
});

</script>
<style>
    input[type="text"] {
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
.pinfo tr td {
    border: 1px solid black;
    background-color: #F0F0F0;
}
.tbldes tr td {
    border: 1px solid black;
    background-color: #F8F8FF;
}
.tbldes th {
    text-align: center;
    border:black solid 1px;
}
.trnname tr td {
    border: 1px solid black;
    background-color: #F8F8FF;
}
table{
    width: 100%;
}
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
</style>
<body>



	<div class="content">
		<!-- notification message -->
		
		<!-- logged in user information -->
		<div class="profile_info">
			

			<div class="container">
				
					

					<small>
						
						<br>
                        
						<a href="index.php" style="color: red; float:right;">Back</a>
                        
					</small>

			</div>
		</div>
	</div>
    <!--==================search div=================-->
    <div class="container">
            <div class="row ">
                
                <div class="search-box">
                <input type="text" autocomplete="off" placeholder="Search ..." name="srchtxt" id="srchtxt"/>
                <div class="result"></div>
                
            </div>
                <input type="submit" name="addbtn" id="addbtn" class="btn btn-success" value="Add" style="margin-left: 50px;">
                <input type="hidden" id="inid">
              <!--  <H4 name="namemem" id="namemem" style="text-indent: 50px;"></H4>-->
    
    </div>
    <hr>
    
    <div>
            <h3>TRAININGS ATTENDED</h3>
            <TAble class="pinfo">
           
                <tr>
                    <td>Level of Training</td>
                    <td>Tittle of training</td>
                    <td>Inclusive Dates</td>
                    <td>Conduced/Sponsored By</td>
                </tr>
                <tr>
                    <td><select id="trnlvlsel">
                    <option value="Division">Division</option>
                    <option value="Regional">Regional</option>
                    <option value="National">National</option>
                    <option value="International">International</option>
                </select></td>
                <td><input type="text" id="tittrn" name="tittrn" style="width: 500px;"></td>
                <td><input type="text" id="incdatetrntxt"></td>
                <td><input type="text" id="cunducttrntxt"></td>
                </tr>
               
            </TAble>
        </div>
    <div>
        <table class="trnname" id="trnname">
            <thead>
                <tr>
                <th align='center'>Delete</th>
                <th style="display:none;">id</th>
                <th align='center'>Name</th>
                <th align='center'>Level</th>
                <th align='center'>Tittle</th>
                <th align='center'>Inclusive Date</th>
                <th align='center'>Sponsor</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <hr>
    <input style="margin-left: 100px;" type="submit" id="deltrn" value="Delete" class="btn btn-danger">
</body>
</html>