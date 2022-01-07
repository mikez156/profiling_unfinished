
<!DOCTYPE html>
<html>
    <title>Profile</title>
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script src="js/updatejs.js"></script>
</head>

<script>
$(document).ready(function(){
  
    $('.search-box input[type="text"]').on("keyup input", function(){
    /* Get input value on change */
    
    var inputVal = $(this).val();
    var resultDropdown = $(this).siblings(".result");
    if(inputVal.length){
        
        $.get("searchmem.php", {term: inputVal}).done(function(data){
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
function submitBday() {
    var Q4A;
    var Bdate = document.getElementById('bdate').value;
    var Bday = +new Date(Bdate);
    Q4A = ~~ ((Date.now() - Bday) / (31557600000));
    document.getElementById("agetxt").value = Q4A;
}
function lentofservis() {
    var Q4A;
    var Bdate = document.getElementById('empdate').value;
    var Bday = +new Date(Bdate);
    Q4A = ~~ ((Date.now() - Bday) / (31557600000));
    document.getElementById("lentin").value = Q4A;
}
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
            
                <input type="submit" class="btn btn-primary" style="width: 100px; margin-left:30px" name="searchbtn" id="searchbtn" value="Search">
                
              <!--  <H4 name="namemem" id="namemem" style="text-indent: 50px;"></H4>-->

    </div>
    <!--=================UNUSED========================-->
	<div class="container">
       
        <DIV>
		<h3 id="srt">PERSONAL INFORMATION</h3>
        <table class="pinfo">
            <tr>
                <td>SURNAME<input type="hidden" id="inid"></td>
                <td colspan="3"><input type="text" id='surnametxt'></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td colspan="3"><input type="text" id='firstametxt'></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td colspan="3"><input type="text" id='midnametxt'></td>
            </tr>
            <tr>
                <td>Address</td>
                <td colspan="3"><input type="text" id='address'></td>
            </tr>
            <tr>
                <td>DATE OF BIRTH</td>
                <td><input type="date" id='bdate' onchange="submitBday()"></td>
                <td>Age</td>
                <td><input type="text" id='agetxt'></td>
            </tr>
            <tr>
                <td>BIRTH PLACE</td>
                <td><input type="text" id="bplacetxt"></td>
                <td>CITIZENSHIP</td>
                <td><input type="text" id="cititxt"></td>
            </tr>
            <tr>
                <td>CONTACT NO.</td>
                <TD><input type="text" id="conttxt"></TD>
                <td>EMAIL ADDRESS</td>
                <td><input type="text" id="emailtxt"></td>
            </tr>
            <tr>
                <td>GENDER</td>
                <td><select id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="lgbt">Lgbt</option>
                </select>
                </td>
                <td>Civil Status</td>
                <td><select id="cstatus">
                    <option value="Single">SINGLE</option>
                    <option value="Married">MARRIED</option>
                    <option value="Separated">SEPARATED</option>
                    <option value="Widowed">WIDOWED</option>
                </select>
                </td>
            </tr>
            <tr>
                <td colspan="4"><b><h5>Employment Record</h5></b></td>
            </tr>
            <tr>
                <td>Date of Employment in DepEd</td>
                <td><input type="date" id="empdate" onchange="lentofservis()"></td>
                <td>Length of Service in Deped</td>
                <td><input type="text" id="lentin"></td>
            </tr>
            <tr>
                <td colspan="4"><b><h5>Present Plantilla Position</h5></b></td>
            </tr>    
            <tr>
                <td>Position</td>
                <td><input type="text" id="position"></td>
                <td>Categorization</td>
                <td><select id="category">
                    <option value="Teaching">Teaching</option>
                    <option value="Non Teaching">Non Teaching</option>
                    <option value="Teaching related">Teaching related</option>
                </select></td>
            </tr>
            <tr>
                <td>Name of School or Office</td>
                <td><input type="text" id="nameofschool"></td>
                <td>Address</td>
                <td><input type="text" id="scoolid"></td>
            </tr>
            <tr>
                <td>District</td>
                <td><select id="distrct">
                    <option value="Aguinaldo">Aguinaldo</option>
                    <option value="Alfonso Lista">Alfonso Lista</option>
                    <option value="Asipulo">Asipulo</option>
                    <option value="Banaue">Banaue</option>
                    <option value="Hingyon">Hingyon</option>
                    <option value="Hungduan">Hungduan</option>
                    <option value="Kiangan">Kiangan</option>
                    <option value="Lagawe">Lagawe</option>
                    <option value="Lamut">Lamut</option>
                    <option value="Mayoyao">Mayoyao</option>
                    <option value="Tinoc">Tinoc</option>
                </select></td>
            </tr>
         
            <tr>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center;"><input class="btn btn-success" type="submit" id="uptsvmembtn" value="Update"><input class="btn btn-danger" type="submit" id="delitupdatebtn" value="Delete Employee" style="margin-left: 100px;"></td>
            </tr>
        </table>
        </DIV>
                    <!--=================EDUCATION========-->
                    <hr>
                    <div id="">
        <div>
            <h3>EDUCATIONAL BACKGROUND</h3>
            <table class="pinfo">
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2" style="text-align: center;  border-bottom:none;">For BSED only</td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>Degree/Diploma</td>
                    <td>Year Graduated</td>
                    <td style="text-align: center;" >Type</td>
                    <td style="text-align: center;">Subject</td>
                </tr>
                <tr>
                    <td><select id="edulvltxt">
                    <option value="VOCATIONAL">VOCATIONAL</option>
                    <option value="COLLEGE">COLLEGE</option>
                    <option value="GRADUATE STUDIES">GRADUATE STUDIES</option>
                </select></td>
                    <td><input type="text" id="edudgreetxt"></td>
                    <td><input type="text" id="eduyeargradtxt"></td>
                    <td><select id="edutypetxt">
                    <option value="MINOR">MINOR</option>
                    <option value="MAJOR">MAJOR</option>
                    <option value="MASTERAL">MASTERAL</option>
                    <option value="DOCTORAL">DOCTORAL</option>
                </select></td>
                <td><input type="text" id="edusubtxt"></td>
                
                </tr>
                <tr>
                <td colspan="5" style="text-align: center;"><input type="submit" id="edusubbtn" value="Add Education" class="btn btn-info"><input style="margin-left: 100px;" type="submit" id="deledu" value="Delete Education" class="btn btn-danger"></td>
                </tr>
            </table>

        </div>
        <div>
            <table id="edutbl" name="edutbl" class="pinfo">
                <thead>
                <tr><td colspan="6">Education</td></tr>
                <tr>
                    <td>Delete</td>
                    <td>id</td>
                    <td>Level</th>
                    <td>Degree/Diploma</td>
                    <td>Year Graduated</td>
                    <td>Type</td>
                    <td>Subject</td>
                </tr>
                </thead>
                    <tbody>
                        
                    </tbody>
            </table>
          
        </div>
        <hr />
        <!--==================trainings================-->
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
                <td><input type="text" id="titletrntxt"></td>
                <td><input type="text" id="incdatetrntxt"></td>
                <td><input type="text" id="cunducttrntxt"></td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: center;"><input type="submit" id="trnaddbtn" value="Add Training" class="btn btn-info"><input style="margin-left: 100px;" type="submit" id="trndelbtn" value="Delete Training" class="btn btn-danger"></td>
                </tr>
            </TAble>
        </div>
        <div>
            <table id="traintbl" class="tbldes">
                <thead>
                    <tr>
                        <th>Delete</th>
                        <th>ID</th>
                        <th>Level</th>
                        <th>Title of training</th>
                        <th>inclusive Dates</th>
                        <th>Conducted/Sponsored By</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <hr>
        <!--==================Scholarship================-->
        <div>
            <h3>Scholarship Enjoyed(Start in 2019 to present)</h3>
            <TAble class="pinfo">
           
                <tr>
                    <td>Title of Scholarship/Grant</td>
                    <td>Sponsoring Agency</td>
                    <td>Inclusive Dates</td>
                    <td>Date Graduated/Completed</td>
                </tr>
                <tr>
                <td><input type="text" id="scholartitle"></td>
                <td><input type="text" id="scholarsponsor"></td>
                <td><input type="text" id="scholarincdate"></td>
                <td><input type="text" id="scholargraddate"></td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: center;"><input type="submit" id="scholaraddbtn" value="Add Scholarship" class="btn btn-info"><input style="margin-left: 100px;" type="submit" id="scholardelbtn" value="Delete Scholar" class="btn btn-danger"></td>
                </tr>
            </TAble>
        </div>
        <div>
            <table id="scholartbl" class="tbldes">
                <thead>
                    <tr>
                        <th>Delete</th>
                        <th>ID</th>
                        <th>Title of training</th>
                        <th>inclusive Dates</th>
                        <th>Conducted/Sponsored By</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <hr>
        <!--==================Awards Recieved================-->
        <div>
            <h3>Awards Recieved start in 2019 to Present</h3>
            <TAble class="pinfo">
           
                <tr>
                    <td>Title of Awards</td>
                    <td>Level</td>
                    <td>Title of Search/contest/Comp.</td>
                    <td>Duration of Search</td>
                </tr>
                <tr>
                <td><input type="text" id="awardtitle"></td>
                <td><select id="awrdlvlsel">
                    <option value="Division">Division</option>
                    <option value="Regional">Regional</option>
                    <option value="National">National</option>
                    <option value="International">International</option>
                </select></td>
                <td><input type="text" id="awardsearchtitle"></td>
                <td><input type="text" id="awardduration"></td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: center;"><input type="submit" id="awardaddbtn" value="Add Award" class="btn btn-info"><input style="margin-left: 100px;" type="submit" id="awarddelbtn" value="Delete Award" class="btn btn-danger"></td>
                </tr>
            </TAble>
        </div>
        <div>
            <table id="awardtbl" class="tbldes">
                <thead>
                    <tr>
                        <th>Delete</th>
                        <th>ID</th>
                        <th>Title of Awards</th>
                        <th>Level</th>
                        <th>Title of Search/contest/Comp.</th>
                        <th>Duration of Search</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <hr>
                <!--==================Trainings Needed================-->
                <div>
            <h3>Trainings Needed</h3>
            <TAble class="pinfo">
           
                <tr>
                    <td>Training Needed</td>
                </tr>
                <tr>
                <td><input type="text" id="traineed"></td>
               
                </tr>
                <tr>
                    <td colspan="6" style="text-align: center;"><input type="submit" id="trnneededaddbtn" value="Add Training Needed" class="btn btn-info"><input style="margin-left: 100px;" type="submit" id="trnneededdelbtn" value="Delete Training Needed" class="btn btn-danger"></td>
                </tr>
            </TAble>
        </div>
        <div>
            <table id="trnneededtbl" class="tbldes">
                <thead>
                    <tr>
                        <th>Delete</th>
                        <th>ID</th>
                        <th>Training Needed</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
    <input type="submit" id="newmembtn" class="btn btn-primary" value="Save">
</div>
        </div><!--contshwhide-->
        <hr>


	</div><!-----CONTAINER-->
    <footer>
        <br><br><br>
  <p>Mikez@<br></p>
</footer>
</body>
</html>