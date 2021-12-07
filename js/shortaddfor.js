var trainid = 0;
$(document).ready(function(){
 
    $(document).on("click", "#addbtn", function(){
        inserttrn();
    });
    $(document).on("click", "#deltrn", function(){
        $.when( settrniddelete() ).done(function() {
            deltrning();
         });
       });
});
function settrniddelete(){
    $("#trnname tbody").find('input[name="radtrn"]').each(function(){
      if($(this).is(":checked")){
        var currentRow=$(this).closest("tr"); 
        trainid = currentRow.find("td:eq(1)").text();
      }
  });
  }
function inserttrn(){
    $("#trnname tbody").empty();
    $.ajax({
      url: "insertadtrn.php",
      dataType: "json",
      type: "post",
      data:{titletrn: $("#tittrn").val(),namtrain: $("#srchtxt").val(),levtrn: $("#trnlvlsel").val()
      ,datetrn: $("#incdatetrntxt").val(),condtrn: $("#cunducttrntxt").val(),deltrn:trainid,idmem: $("#cunducttrntxt").val(),setcode: 1},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='radtrn'></td>"+
                  "<td align='center' style='white-space: nowrap; display:none;'>" + response[i].edid + "</td>" +
                  "<td align='left' style='white-space: nowrap;'>" + response[i].meme + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].levels + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].trntitle + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].incluvdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].sponsor + "</td>" +
                  "</tr>";
              $("#trnname tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
}
function deltrning(){
    $("#trnname tbody").empty();
    $.ajax({
      url: "insertadtrn.php",
      dataType: "json",
      type: "post",
      data:{titletrn: $("#tittrn").val(),namtrain: $("#srchtxt").val(),levtrn: $("#trnlvlsel").val()
      ,datetrn: $("#incdatetrntxt").val(),condtrn: $("#cunducttrntxt").val(),deltrn:trainid,idmem: $("#cunducttrntxt").val(),setcode: 2},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='radtrn'></td>"+
                  "<td align='center' style='white-space: nowrap; display:none;'>" + response[i].edid + "</td>" +
                  "<td align='left' style='white-space: nowrap;'>" + response[i].meme + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].levels + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].trntitle + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].incluvdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].sponsor + "</td>" +
                  "</tr>";
              $("#trnname tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
}