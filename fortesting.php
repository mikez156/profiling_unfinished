<?php

require 'connection.php';
$varid = 26;
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "delete from teachers where techer_id = '$varid';";
         // mysqli_query($link, $sql);
          if (mysqli_query($link, $sql)) {
            echo "Record deleted successfully";
          } else {
            echo "Error deleting record: " . mysqli_error($link);
          }      
          $sql = "delete from award where techer_id = '$varid';";
               // mysqli_query($link, $sql);
                if (mysqli_query($link, $sql)) {
                  echo "Record deleted successfully";
                } else {
                  echo "Error deleting record: " . mysqli_error($link);
                } 
                $sql = "delete from scholarship where techer_id = '$varid';";
                     // mysqli_query($link, $sql);
                      if (mysqli_query($link, $sql)) {
                        echo "Record deleted successfully";
                      } else {
                        echo "Error deleting record: " . mysqli_error($link);
                      }
                      $sql = "delete from trainings where techer_id = '$varid';";
                           // mysqli_query($link, $sql);
                            if (mysqli_query($link, $sql)) {
                              echo "Record deleted successfully";
                            } else {
                              echo "Error deleting record: " . mysqli_error($link);
                            } 
                            $sql = "delete from training_needed where techer_id = '$varid';";
                            // mysqli_query($link, $sql);
                             if (mysqli_query($link, $sql)) {
                               echo "Record deleted successfully";
                             } else {
                               echo "Error deleting record: " . mysqli_error($link);
                             }
/*$fill2[] = array();
$qry = "select * from education where techer_id = '$varid'";
                    if($result = mysqli_query($link, $qry)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $fill2[] = array(
                                'edid'      => $row["edu_id"],
                                'levels'    => $row["level"],
                                'degrees'   => $row["degree"],
                                'yeargrads' => $row["yeargrad"],
                                'categorys' => $row["category"],
                                'subjects'  => $row["subject"]
                                 );
                        }
                        echo '<pre>'; print_r($fill2); echo '</pre>';   
                    }
                    } else{
                        echo "No records matching your query were found.";
                    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery Add / Remove Table Rows</title>
<style>
    table{
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 5px;
        text-align: left;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $(".add-row").click(function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td>" + 
            "<td>" + email + "</td>" +
            "<td><p class='remCF'>Remove</p></td>"
            "</tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                  var currentRow=$(this).closest("tr"); 
                    alert(currentRow.find("td:eq(1)").text());
                }
            });
        });
        
    });    
</script>
</head>
<body>
    <form>
        <input type="text" id="name" placeholder="Name">
        <input type="text" id="email" placeholder="Email Address">
        <input type="button" class="add-row" value="Add Row">
    </form>
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" name="record"></td>
                <td>Peter Parker</td>
                <td>peterparker@mail.com</td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="delete-row">Delete Row</button>
</body> 
</html>