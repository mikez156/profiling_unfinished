$(document).ready(function(){
         //===================delete award===========
    $(document).on("click", "#serchbtn", function(){
      // alert("chhgcgh");
        insertude();
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