<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    $nametosrch = mysqli_real_escape_string($link, $_POST["srchtxt"]);
    
    $varval = $_POST["dserchfunc"];
    $fill1 = array();
    $fill2 = array();
if($varval == 1){
     $qry = "select * from teachers where REPLACE(concat(lname,fname,mname),' ','') = REPLACE('$nametosrch',' ','')";
                    if($result = mysqli_query($link, $qry)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $fill1 = array(
                                'tid'  => $row["techer_id"],
                                'last' => $row["lname"],
                                'fist' => $row["fname"],
                                'mid'  => $row["mname"],
                                'addwes'   => $row["address"],
                                'bdate'      => $row["birthdate"],
                                'age'    => $row["age"],
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