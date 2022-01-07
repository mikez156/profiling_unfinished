$(document).ready(function(){
         //===================delete award===========
    $(document).on("click", "#serchbtn", function(){
      if($('#selection option:selected').text() == 'Training' && $('#secondselect option:selected').text() == 'District')
      {
        searchtraining();
      }
      else if($('#selection option:selected').text() == 'Training' && $('#secondselect option:selected').text() == 'Search Training Tittle' ){
        searchtrainingdistrik();
      }
    //   else if($('#selection option:selected').text() == 'Training' && $('#secondselect option:selected').text() == 'Search Training Tittle' && $('#tirdselect option:selected').text() != 'All'){
    //     searchtrainingdistrik();
    //   }
      else{
         insertude(); 
      }
        
    });
});
function insertude(){
    //alert("same jjnjnj");
    $("#selectiontbl tbody").empty();
    $.ajax({
      url: "../selectphp.php",
      dataType: "json",
      type: "post",
      data:{serchtxt: $("#serchtxt").val(),selectioncmb: $("#selection").val(),secndsch: $("#secondselect").val(),
          tirdcmd: $("#tirdselect").val()},
      success: function(response){
     
          //  console.log(response);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].last + ' ' + response[i].fist + ' '+ response[i].mid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].addwes + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].bdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].age + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].bplace + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].cnum + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].emeladd + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].sex + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].csttatus + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].sistisen + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].postion + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].skulneym + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].addofschool + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].distrik + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].catgory + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].dateofemp + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].servislent + "</td>" +
                  "</tr>";
              $("#selectiontbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }
   function searchtraining(){
    //alert("same jjnjnj");
    $("#selectiontbl tbody").empty();
    $.ajax({
      url: "../selectphp.php",
      dataType: "json",
      type: "post",
      data:{serchtxt: $("#serchtxt").val(),selectioncmb: $("#selection").val(),secndsch: $("#secondselect").val(),
          tirdcmd: $("#tirdselect").val()},
      success: function(response){
     
           // console.log(response);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].lname + ' ' + response[i].fname + ' '+ response[i].mname + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].address + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].birthdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].age + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].birthplace + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].cp + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].emailadd + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].gender + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].civilstatus + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].citizenship + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].Position + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].namofschool + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].addressofschool + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].district + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].category + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].employdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].servicelength + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].trainingtitle + "</td>" +
                  "</tr>";
              $("#selectiontbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }
   function searchtrainingdistrik(){
    //alert("same jjnjnj");
    $("#selectiontbl tbody").empty();
    $.ajax({
      url: "../selectphp.php",
      dataType: "json",
      type: "post",
      data:{serchtxt: $("#serchtxt").val(),selectioncmb: $("#selection").val(),secndsch: $("#secondselect").val(),
          tirdcmd: $("#tirdselect").val()},
      success: function(response){
     
        //    console.log(response);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].lname + ' ' + response[i].fname + ' '+ response[i].mname + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].address + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].birthdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].age + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].birthplace + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].cp + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].emailadd + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].gender + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].civilstatus + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].citizenship + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].Position + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].namofschool + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].addressofschool + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].district + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].category + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].employdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].servicelength + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].trainingtitle + "</td>" +
                  "</tr>";
              $("#selectiontbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }