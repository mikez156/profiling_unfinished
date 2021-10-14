<?php
require 'connection.php';
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$qry = "select * from teachers b inner join trainings c on b.techer_id = c.techer_id where replace(c.trainingtitle,' ','') like replace('%NSET%',' ','')";
                    if($result = mysqli_query($link, $qry)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){

                           
                                echo  $row["lname"];

                        }
                        
                    }
                    } else{
                        echo "No records matching your query were found.";
                    }

    
?>