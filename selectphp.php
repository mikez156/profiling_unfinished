<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$serchtxt = mysqli_real_escape_string($link, $_POST["serchtxt"]);
$selectioncmb = mysqli_real_escape_string($link, $_POST["selectioncmb"]);
$secndsch = mysqli_real_escape_string($link, $_POST["secndsch"]);
$tirdcmd = mysqli_real_escape_string($link, $_POST["tirdcmd"]);


    $fill1 = array();
    $fill2 = array();

if($selectioncmb == 'All'){
     $qry = "select * from teachers";
                    if($result = mysqli_query($link, $qry)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $fill1[] = array(
                                'tid'  => $row["techer_id"],
                                'last' => $row["lname"],
                                'fist' => $row["fname"],
                                'mid'  => $row["mname"],
                                'addwes' => $row["address"],
                                'bdate' => $row["birthdate"],
                                'age'  => $row["age"],
                                'bplace'   => $row["birthplace"],
                                'cnum' => $row["cp"],
                                'emeladd' => $row["emailadd"],
                                'sex'      => $row["gender"],
                                'csttatus'    => $row["civilstatus"],
                                'sistisen'   => $row["citizenship"],
                                'skulneym' => $row["namofschool"],
                                'addofschool' => $row["addressofschool"],
                                'distrik'      => $row["district"],
                                'postion'    => $row["Position"],
                                'catgory'   => $row["category"],
                                'dateofemp' => $row["employdate"],
                                'servislent' => $row["servicelength"]
                                 );
                        }
                         echo json_encode($fill1);   
                    }
                    } else{
                        echo "No records matching your query were found.";
                    }
}       
if($selectioncmb == 'Names' && $secndsch == "Civil Status"){
    $qry = "select * from teachers where gender = '$tirdcmd'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'Names' && $secndsch == "Email Add"){
    $qry = "select * from teachers where emailadd like '%$serchtxt%'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}      
if($selectioncmb == 'Training' && $secndsch == "All"){
    $qry = "select * from teachers b inner join trainings c on b.techer_id = c.techer_id where replace(c.trainingtitle,' ','') > ''";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}      
     
if($selectioncmb == 'Training' && $secndsch == "Level"){
    $qry = "select * from teachers b inner join trainings c on b.techer_id = c.techer_id where c.level = '$tirdcmd'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}      
if($selectioncmb == 'Training' && $secndsch == "District"){
    $qry = "select b.techer_id,b.lname,b.fname,b.mname,b.address,b.birthdate,b.age,b.birthplace,b.cp,b.emailadd,b.gender,b.civilstatus,b.citizenship,b.namofschool,b.addressofschool,b.district,b.Position,b.category,b.employdate,b.servicelength,c.trainingtitle from teachers b inner join trainings c on b.techer_id = c.techer_id where b.district = '$tirdcmd'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = $row;
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}    
if($selectioncmb == 'Training' && $secndsch == "Search Training Tittle" && $tirdcmd == "All"){
    $qry = "select b.techer_id,b.lname,b.fname,b.mname,b.address,b.birthdate,b.age,b.birthplace,b.cp,b.emailadd,b.gender,b.civilstatus,b.citizenship,b.namofschool,b.addressofschool,b.district,b.Position,b.category,b.employdate,b.servicelength,c.trainingtitle from teachers b inner join trainings c on b.techer_id = c.techer_id where replace(c.trainingtitle,' ','') like replace('%$serchtxt%',' ','')";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = $row;
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'Training' && $secndsch == "Search Training Tittle" && $tirdcmd != "All"){
    $qry = "select b.techer_id,b.lname,b.fname,b.mname,b.address,b.birthdate,b.age,b.birthplace,b.cp,b.emailadd,b.gender,b.civilstatus,b.citizenship,b.namofschool,b.addressofschool,b.district,b.Position,b.category,b.employdate,b.servicelength,c.trainingtitle from teachers b inner join trainings c on b.techer_id = c.techer_id where replace(c.trainingtitle,' ','') like replace('%$serchtxt%',' ','') and district ='$tirdcmd'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = $row;
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}      
if($selectioncmb == 'Trainings Needed'){
    $qry = "select * from teachers b inner join training_needed c on b.techer_id = c.techer_id where replace(c.tittleoftraining,' ','') like replace('%$serchtxt%',' ','')";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}    
if($selectioncmb == 'Position'){
    $qry = "select * from teachers where replace(Position,' ','') like replace('%$serchtxt%',' ','')";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}    

if($selectioncmb == 'Education' && $secndsch == "Degree/Course"){
    $qry = "select * from teachers b inner join education c on b.techer_id = c.techer_id where replace(c.degree,' ','') like replace('%$serchtxt%',' ','')";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}    
if($selectioncmb == 'Education' && $secndsch == "Level"){
    $qry = "select * from teachers b inner join education c on b.techer_id = c.techer_id where c.level = '$tirdcmd'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'Education' && $secndsch == "Category"){
    $qry = "select * from teachers b inner join education c on b.techer_id = c.techer_id where c.category = '$tirdcmd'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'Education' && $secndsch == "Subject"){
    $qry = "select * from teachers b inner join education c on b.techer_id = c.techer_id where c.subject like '%$serchtxt%'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'School'){
    $qry = "select * from teachers where namofschool like '%$serchtxt%'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'Gender'){
    $qry = "select * from teachers where gender = '$secndsch'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}

if($selectioncmb == 'Length in Service'){
if($secndsch == 'Above'){
    $qry = "select * from teachers where servicelength >= '$serchtxt'";
    if($result = mysqli_query($link, $qry)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $fill1[] = array(
                'tid'  => $row["techer_id"],
                'last' => $row["lname"],
                'fist' => $row["fname"],
                'mid'  => $row["mname"],
                'addwes' => $row["address"],
                'bdate' => $row["birthdate"],
                'age'  => $row["age"],
                'bplace'   => $row["birthplace"],
                'cnum' => $row["cp"],
                'emeladd' => $row["emailadd"],
                'sex'      => $row["gender"],
                'csttatus'    => $row["civilstatus"],
                'sistisen'   => $row["citizenship"],
                'skulneym' => $row["namofschool"],
                'addofschool' => $row["addressofschool"],
                'distrik'      => $row["district"],
                'postion'    => $row["Position"],
                'catgory'   => $row["category"],
                'dateofemp' => $row["employdate"],
                'servislent' => $row["servicelength"]
                
                 );
        }
         echo json_encode($fill1);   
    }
    } else{
        echo "No records matching your query were found.";
    }
}else{
   

    $qry = "select * from teachers where servicelength <= '$serchtxt'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
    }
}
if($selectioncmb == 'District'){
    $qry = "select * from teachers where district = '$secndsch'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'Scholarship/Grant'){
    $qry = "select * from teachers b inner join scholarship c on b.techer_id = c.techer_id where c.titlescholar like '%$serchtxt%'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'Awards' && $secndsch == "Tittle"){
    $qry = "select * from teachers b inner join award c on b.techer_id = c.techer_id where c.awardtitle like '%$serchtxt%'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'Awards' && $secndsch == "Level"){
    $qry = "select * from teachers b inner join award c on b.techer_id = c.techer_id where c.level = '$tirdcmd'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'needed'){
    $qry = "select * from teachers b inner join training_needed c on b.techer_id = c.techer_id where c.tittleoftraining like '%$serchtxt%'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
if($selectioncmb == 'Classification'){
    $qry = "select * from teachers where category = '$secndsch'";
                   if($result = mysqli_query($link, $qry)){
                   if(mysqli_num_rows($result) > 0){
                       while($row = mysqli_fetch_array($result)){
                           $fill1[] = array(
                               'tid'  => $row["techer_id"],
                               'last' => $row["lname"],
                               'fist' => $row["fname"],
                               'mid'  => $row["mname"],
                               'addwes' => $row["address"],
                               'bdate' => $row["birthdate"],
                               'age'  => $row["age"],
                               'bplace'   => $row["birthplace"],
                               'cnum' => $row["cp"],
                               'emeladd' => $row["emailadd"],
                               'sex'      => $row["gender"],
                               'csttatus'    => $row["civilstatus"],
                               'sistisen'   => $row["citizenship"],
                               'skulneym' => $row["namofschool"],
                               'addofschool' => $row["addressofschool"],
                               'distrik'      => $row["district"],
                               'postion'    => $row["Position"],
                               'catgory'   => $row["category"],
                               'dateofemp' => $row["employdate"],
                               'servislent' => $row["servicelength"]
                               
                                );
                       }
                        echo json_encode($fill1);   
                   }
                   } else{
                       echo "No records matching your query were found.";
                   }
}
?>