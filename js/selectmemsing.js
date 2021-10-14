$(document).ready(function(){
    $("#searchbtn").click(function(){
        $.when(serjtech()).done(function(){
            serjedu();
            serjtrn();
            serjscholr();
            serjaward();
            serjneeded();
        })
        
         //  searchloanbal();
       });
});
function serjtech(){
     
    $.ajax({
        url: "membersrjsingle.php",
        cache: false,
        dataType: "json",
        type: "post",
        data:{srchtxt: $("#srchtxt").val(),sit:1},
            success: function (result) {
              //alert(result.techerid);
            $("#techid").val(result.techerid);
            $("#surname").html(result.lname);
            $("#firstname").text(result.fname);
            $("#midname").html(result.mname);
            $("#address").html(result.address);
            $("#birthdate").html(result.birtdate);
            $("#age").html(result.age);
            $("#bplace").html(result.birtplace);
            $("#contac").html(result.cp);
            $("#email").html(result.emailadd);
            $("#gender").html(result.gender);
            $("#cstat").html(result.civilstatus);
            $("#citizen").html(result.citisen);
            $("#nameofschool").html(result.schoolname);
            $("#addressofschool").html(result.schooladd);
            $("#district").html(result.district);
            $("#position").html(result.posison);
            $("#clasification").html(result.category);
            $("#employmentdate").html(result.dateemp);
            $("#yrsinservis").html(result.servlent);
        }
        
    });
  
   }
   function serjedu(){
    $("#selectiontbl #eduid").empty();
    $.ajax({
        url: "membersrjsingle.php",
        cache: false,
        dataType: "json",
        type: "post",
        data:{srchtxt: $("#srchtxt").val(),sit:2},
            success: function (response) {
               
        var len = response.length;
        for(var i=0; i<len; i++){
            var tr_str = "<tr id='row1'>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].lvl + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].dgree + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].yrgrad + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].catgry + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].subjct + "</td>" +
                "</tr>";
            $("#selectiontbl #eduid").append(tr_str);
        } 
        }
        
    });
    //serjtrn();
   }
   function serjtrn(){
    $("#selectiontbl #trntbod").empty();
    $.ajax({
        url: "membersrjsingle.php",
        cache: false,
        dataType: "json",
        type: "post",
        data:{srchtxt: $("#srchtxt").val(),sit:3},
            success: function (response) {
               
        var len = response.length;
        for(var i=0; i<len; i++){
            var tr_str = "<tr id='row1'>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].lvl + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].trntitle + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].incdate + "</td>" +
                "<td align='center' style='white-space: nowrap;' colspan='2'>" + response[i].sponsr + "</td>" +
                "</tr>";
            $("#selectiontbl #trntbod").append(tr_str);
        } 
        }
        
    });
   }
   function serjscholr(){
    $("#selectiontbl #schlar").empty();
    $.ajax({
        url: "membersrjsingle.php",
        cache: false,
        dataType: "json",
        type: "post",
        data:{srchtxt: $("#srchtxt").val(),sit:4},
            success: function (response) {
               
        var len = response.length;
        for(var i=0; i<len; i++){
            var tr_str = "<tr id='row1'>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].schtitle + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].spnsr + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].incdate + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].dategrad + "</td>" +
                "</tr>";
            $("#selectiontbl #schlar").append(tr_str);
        } 
        }
        
    });
   }
   function serjaward(){
    $("#selectiontbl #awardbod").empty();
    $.ajax({
        url: "membersrjsingle.php",
        cache: false,
        dataType: "json",
        type: "post",
        data:{srchtxt: $("#srchtxt").val(),sit:5},
            success: function (response) {
               
        var len = response.length;
        for(var i=0; i<len; i++){
            var tr_str = "<tr id='row1'>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].awrdtitel + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].schlres + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].lvl + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].pryod + "</td>" +
                "</tr>";
            $("#selectiontbl #awardbod").append(tr_str);
        } 
        }
        
    });
   }
   function serjneeded(){
    $("#selectiontbl #nided").empty();
    $.ajax({
        url: "membersrjsingle.php",
        cache: false,
        dataType: "json",
        type: "post",
        data:{srchtxt: $("#srchtxt").val(),sit:6},
            success: function (response) {
               
        var len = response.length;
        for(var i=0; i<len; i++){
            var tr_str = "<tr id='row1'>" +
                "<td align='center' style='white-space: nowrap;' colspan='2'>" + response[i].nided + "</td>" +
                "</tr>";
            $("#selectiontbl #nided").append(tr_str);
        } 
        }
        
    });
   }