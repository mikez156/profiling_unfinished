var saveupdate;
var eduid = 0;
var trnid = 0;
var scholid = 0;
var awarddelid = 0;
var trnneededid = 0;
$(document).ready(function(){
    $(document).on("click", "#searchbtn", function(){
        searchtejer();
    });

 $(document).on("click", "#uptsvmembtn", function(){
      udatetecher();
   });
$(document).on("click", "#delitupdatebtn", function(){
    deltecher();
    $("input:text").val("");
 });
//============addd education================
$(document).on("click", "#edusubbtn", function(){
    insertude();
 });
 //============dell education================
$(document).on("click", "#deledu", function(){
    $.when( seteduiddelete() ).done(function() {
        deleteude();
        
        }); 
 });
//============addd training================
 $(document).on("click", "#trnaddbtn", function(){
    inserttraining();
  });
         //===================delete training===========
$(document).on("click", "#trndelbtn", function(){
    $.when( settrniddelete() ).done(function() {
              deletetraining();
    });
});
//===================insert scholar===========
$(document).on("click", "#scholaraddbtn", function(){
    insertscholar();
  });
     //===================delete scholara===========
 $(document).on("click", "#scholardelbtn", function(){
  $.when( setscholiddelete() ).done(function() {
    deletescholar();
   });
 });
     //===================insert award===========
     $(document).on("click", "#awardaddbtn", function(){
      insertawrds();
    });
       //===================delete award===========
   $(document).on("click", "#awarddelbtn", function(){
    $.when( setawardiddelete() ).done(function() {
      deleteawrds();
     });
   });
          //===================insert training needed===========
     $(document).on("click", "#trnneededaddbtn", function(){
      inserttrnnedded();
    });
       //===================delete award===========
   $(document).on("click", "#trnneededdelbtn", function(){
    $.when( trnneededdelete() ).done(function() {
      delstrnnedded();
     });
   });
            //================new member==========
            $(document).on("click", "#newmembtn", function(){
             // $("#cont_shwhide").hide();
              $("input:text").val("");
             // $("#svmembtn").prop('value', 'Save');
              $("#inid").prop('value', '');
             });

 //=================end ready function =====================
});
function seteduiddelete(){
    $("#edutbl tbody").find('input[name="record"]').each(function(){
      if($(this).is(":checked")){
        var currentRow=$(this).closest("tr"); 
        eduid = currentRow.find("td:eq(1)").text();
      }
  });
  }
  function settrniddelete(){
    $("#traintbl tbody").find('input[name="trnrcd"]').each(function(){
      if($(this).is(":checked")){
        var currentRow=$(this).closest("tr"); 
        trnid = currentRow.find("td:eq(1)").text();
      }
  });
  }
  function setscholiddelete(){
    $("#scholartbl tbody").find('input[name="scholardelid"]').each(function(){
      if($(this).is(":checked")){
        var currentRow=$(this).closest("tr"); 
        scholid = currentRow.find("td:eq(1)").text();
      }
  });
  }
  function setawardiddelete(){
    $("#awardtbl tbody").find('input[name="awarddelids"]').each(function(){
      if($(this).is(":checked")){
        var currentRow=$(this).closest("tr"); 
        awarddelid = currentRow.find("td:eq(1)").text();
      }
  });
  }
  function trnneededdelete(){
    $("#trnneededtbl tbody").find('input[name="neededids"]').each(function(){
      if($(this).is(":checked")){
        var currentRow=$(this).closest("tr"); 
        trnneededid = currentRow.find("td:eq(1)").text();
      }
  });
  }
function searchtejer(){
    $.ajax({
      url: "serjteacher.php",
      dataType: "json",
      type: "post",
      data:{srchtxt: $("#srchtxt").val(),dserchfunc: 1},
          success: function(result){
          $("#inid").val(result.tid);
          $("#surnametxt").val(result.last);
          $("#firstametxt").val(result.fist);
          $("#midnametxt").val(result.mid);
          $("#address").val(result.addwes);
          $("#bdate").val(result.bdate);
          $("#agetxt").val(result.age);
          $("#bplacetxt").val(result.bplace);
          $("#conttxt").val(result.cnum);
          $("#emailtxt").val(result.emeladd);
          $("#gender").val(result.sex).change();
          $("#cstatus").val(result.csttatus).change();
          $("#cititxt").val(result.sistisen);
          $("#nameofschool").val(result.skulneym);
          $("#scoolid").val(result.addofschool);
          $("#distrct").val(result.distrik);
          $("#position").val(result.postion);
          $("#category").val(result.catgory);
          $("#empdate").val(result.dateofemp);
          $("#lentin").val(result.servislent); 
  
         // namemem.innerText = result.lastname+ ' ' +result.firstname+' '+result.midn+' #'+result.account;
      },
      complete: function(){
        serjedu();
        srchtrng();
        serjschlr();
        serjawrds();
        serjneddedtrn();
      }
      
    });
  }
  function insertude(){
    $("#edutbl tbody").empty();
    $.ajax({
      url: "iserting.php",
      dataType: "json",
      type: "post",
      data:{level: $("#edulvltxt").val(),degree: $("#edudgreetxt").val(),yrgrad: $("#eduyeargradtxt").val(),
          subject: $("#edusubtxt").val(),cate: $("#edutypetxt").val(),memid: $("#inid").val(),valval: 1,deleteeduid: eduid},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='record'></td>"+
                  "<td align='center' style='white-space: nowrap;'>" + response[i].edid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].levels + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].degrees + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].yeargrads + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].categorys + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].subjects + "</td>" +
                  "</tr>";
              $("#edutbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }
   function deleteude(){
    $("#edutbl tbody").empty();
    $.ajax({
      url: "iserting.php",
      dataType: "json",
      type: "post",
      data:{level: $("#edulvltxt").val(),degree: $("#edudgreetxt").val(),yrgrad: $("#eduyeargradtxt").val(),
          subject: $("#edutypetxt").val(),cate: $("#edusubtxt").val(),memid: $("#inid").val(),valval: 2,deleteeduid: eduid},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='record'></td>"+
                  "<td align='center' style='white-space: nowrap;'>" + response[i].edid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].levels + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].degrees + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].yeargrads + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].categorys + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].subjects + "</td>" +
                  "</tr>";
              $("#edutbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
  
   }
function serjedu(){
    $("#edutbl tbody").empty();
    $.ajax({
      url: "iserting.php",
      dataType: "json",
      type: "post",
      data:{level: $("#edulvltxt").val(),degree: $("#edudgreetxt").val(),yrgrad: $("#eduyeargradtxt").val(),
          subject: $("#edusubtxt").val(),cate: $("#edutypetxt").val(),memid: $("#inid").val(),valval: 3,deleteeduid: eduid},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='record'></td>"+
                  "<td align='center' style='white-space: nowrap;'>" + response[i].edid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].levels + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].degrees + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].yeargrads + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].categorys + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].subjects + "</td>" +
                  "</tr>";
              $("#edutbl tbody").append(tr_str);
          } 
          
      }, 
    
  }); // ajax end
}
function inserttraining(){
    $("#traintbl tbody").empty();
    $.ajax({
      url: "trainingfile.php",
      dataType: "json",
      type: "post",
      data:{level: $("#trnlvlsel").val(),titletrn: $("#titletrntxt").val(),incdate: $("#incdatetrntxt").val(),
          cunductor: $("#cunducttrntxt").val(),memid: $("#inid").val(),valval: 1,deletetrnuid: trnid},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='trnrcd'></td>"+
                  "<td align='center' style='white-space: nowrap;'>" + response[i].edid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].levels + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].trntitle + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].incluvdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].sponsor + "</td>" +
                  "</tr>";
              $("#traintbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }
   function deletetraining(){
    $("#traintbl tbody").empty();
    $.ajax({
      url: "trainingfile.php",
      dataType: "json",
      type: "post",
      data:{level: $("#trnlvlsel").val(),titletrn: $("#titletrntxt").val(),incdate: $("#incdatetrntxt").val(),
          cunductor: $("#cunducttrntxt").val(),memid: $("#inid").val(),valval: 2,deletetrnuid: trnid},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='trnrcd'></td>"+
                  "<td align='center' style='white-space: nowrap;'>" + response[i].edid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].levels + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].trntitle + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].incluvdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].sponsor + "</td>" +
                  "</tr>";
              $("#traintbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }
function srchtrng(){
  $("#traintbl tbody").empty();
  $.ajax({
    url: "trainingfile.php",
    dataType: "json",
    type: "post",
    data:{level: $("#trnlvlsel").val(),titletrn: $("#titletrntxt").val(),incdate: $("#incdatetrntxt").val(),
        cunductor: $("#cunducttrntxt").val(),memid: $("#inid").val(),valval: 3,deletetrnuid: trnid},
    success: function(response){
    //  var arr = JSON.parse(response);
       // alert(response.levels);
      var len = response.length;
        for(var i=0; i<len; i++){
            var tr_str = "<tr id='row1'>" +
                "<td align='center'><input type='radio' name='trnrcd'></td>"+
                "<td align='center' style='white-space: nowrap;'>" + response[i].edid + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].levels + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].trntitle + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].incluvdate + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].sponsor + "</td>" +
                "</tr>";
            $("#traintbl tbody").append(tr_str);
        } 
        
    },  // ajax end
  
});

 }
 function serjschlr(){
  $("#scholartbl tbody").empty();
  $.ajax({
    url: "scholarfile.php",
    dataType: "json",
    type: "post",
    data:{scholtitle: $("#scholartitle").val(),scholsponsor: $("#scholarsponsor").val(),scholincdate: $("#scholarincdate").val(),
        scholgraddaet: $("#scholargraddate").val(),memid: $("#inid").val(),valval: 3,deletetrnuid: scholid},
    success: function(response){
    //  var arr = JSON.parse(response);
       // alert(response.levels);
      var len = response.length;
        for(var i=0; i<len; i++){
            var tr_str = "<tr id='row1'>" +
                "<td align='center'><input type='radio' name='scholardelid'></td>"+
                "<td align='center' style='white-space: nowrap;'>" + response[i].scholid + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].titschol + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].sponsur + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].incluvdate + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].dategrad + "</td>" +
                "</tr>";
            $("#scholartbl tbody").append(tr_str);
        } 
        
    },  // ajax end
  
});

 }
 function serjawrds(){
  $("#awardtbl tbody").empty();
  $.ajax({
    url: "awardsfile.php",
    dataType: "json",
    type: "post",
    data:{awardtitle: $("#awardtitle").val(),awardslvl: $("#awrdlvlsel").val(),awrdtlesrch: $("#awardsearchtitle").val(),
        awardduration: $("#awardduration").val(),memid: $("#inid").val(),valval: 3,deleteawrdid: awarddelid},
    success: function(response){
    //  var arr = JSON.parse(response);
       // alert(response.levels);
      var len = response.length;
        for(var i=0; i<len; i++){
            var tr_str = "<tr id='row1'>" +
                "<td align='center'><input type='radio' name='awarddelids'></td>"+
                "<td align='center' style='white-space: nowrap;'>" + response[i].awardid + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].awrdtle + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].awrdlvl + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].awrdres + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].awardperiod + "</td>" +
                "</tr>";
            $("#awardtbl tbody").append(tr_str);
        } 
        
    },  // ajax end
  
});

 }
 function serjneddedtrn(){
  $("#trnneededtbl tbody").empty();
  $.ajax({
    url: "trnneededfile.php",
    dataType: "json",
    type: "post",
    data:{trainneeded: $("#traineed").val(),memid: $("#inid").val(),valval: 3,deleteneededid: trnneededid},
    success: function(response){
    //  var arr = JSON.parse(response);
       // alert(response.levels);
      var len = response.length;
        for(var i=0; i<len; i++){
            var tr_str = "<tr id='row1'>" +
                "<td align='center'><input type='radio' name='neededids'></td>"+
                "<td align='center' style='white-space: nowrap;'>" + response[i].needid + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].needtle + "</td>" +
                "</tr>";
            $("#trnneededtbl tbody").append(tr_str);
        } 
        
    },  // ajax end
  
});

 }
 function udatetecher(){
   
  $.ajax({
             url: "savenewtch.php",
             dataType: "json",
             type: "post",
             data:{surname: $("#surnametxt").val(),firstname: $("#firstametxt").val(),midname: $("#midnametxt").val(),
                 bdate: $("#bdate").val(),age: $("#agetxt").val(),address: $("#address").val(),bplace: $("#bplacetxt").val(),
                 citizen: $("#cititxt").val(),cp: $("#conttxt").val(),email: $("#emailtxt").val()
                 ,gender: $("#gender").val(),cstatus: $("#cstatus").val(),empdate: $("#empdate").val()
                 ,lentin: $("#lentin").val(),position: $("#position").val(),category: $("#category").val()
                 ,nameofschool: $("#nameofschool").val(),scoolid: $("#scoolid").val(),distrct: $("#distrct").val()
                 ,isertval: 2, memid: $("#inid").val()},
             success: function(response){
                // alert response.fill;
                var dataResult = $.parseJSON(response);
               // alert(dataResult);
                $("#inid").prop('value', dataResult);
                  $("#cont_shwhide").show();
                  $("#svmembtn").prop('value', 'Update');
                  alert('Successfuly Updated');
             }    
 
         });
         
 }
 function deltecher(){
   
  $.ajax({
             url: "savenewtch.php",
             dataType: "json",
             type: "post",
             data:{surname: $("#surnametxt").val(),firstname: $("#firstametxt").val(),midname: $("#midnametxt").val(),
                 bdate: $("#bdate").val(),age: $("#agetxt").val(),address: $("#address").val(),bplace: $("#bplacetxt").val(),
                 citizen: $("#cititxt").val(),cp: $("#conttxt").val(),email: $("#emailtxt").val()
                 ,gender: $("#gender").val(),cstatus: $("#cstatus").val(),empdate: $("#empdate").val()
                 ,lentin: $("#lentin").val(),position: $("#position").val(),category: $("#category").val()
                 ,nameofschool: $("#nameofschool").val(),scoolid: $("#scoolid").val(),distrct: $("#distrct").val()
                 ,isertval: 3, memid: $("#inid").val()},
             success: function(response){
                // alert response.fill;
                var dataResult = $.parseJSON(response);
                if(dataResult == 3){
                    alert("Teacher Has been Deleted::");
                }
               // alert(dataResult);
                $("#inid").prop('value', 0);
                  $("#cont_shwhide").hide();
                 // $("#svmembtn").prop('value', 'Update');
                  
             }    
 
         });
         
 }
 function insertscholar(){
    $("#scholartbl tbody").empty();
    $.ajax({
      url: "scholarfile.php",
      dataType: "json",
      type: "post",
      data:{scholtitle: $("#scholartitle").val(),scholsponsor: $("#scholarsponsor").val(),scholincdate: $("#scholarincdate").val(),
          scholgraddaet: $("#scholargraddate").val(),memid: $("#inid").val(),valval: 1,deletetrnuid: scholid},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='scholardelid'></td>"+
                  "<td align='center' style='white-space: nowrap;'>" + response[i].scholid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].titschol + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].sponsur + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].incluvdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].dategrad + "</td>" +
                  "</tr>";
              $("#scholartbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }
   function deletescholar(){
    $("#scholartbl tbody").empty();
    $.ajax({
      url: "scholarfile.php",
      dataType: "json",
      type: "post",
      data:{scholtitle: $("#scholartitle").val(),scholsponsor: $("#scholarsponsor").val(),scholincdate: $("#scholarincdate").val(),
          scholgraddaet: $("#scholargraddate").val(),memid: $("#inid").val(),valval: 2,deletetrnuid: scholid},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='scholardelid'></td>"+
                  "<td align='center' style='white-space: nowrap;'>" + response[i].scholid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].titschol + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].sponsur + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].incluvdate + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].dategrad + "</td>" +
                  "</tr>";
              $("#scholartbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }
   //===================awardsss functions====================================
   function insertawrds(){
    $("#awardtbl tbody").empty();
    $.ajax({
      url: "awardsfile.php",
      dataType: "json",
      type: "post",
      data:{awardtitle: $("#awardtitle").val(),awardslvl: $("#awrdlvlsel").val(),awrdtlesrch: $("#awardsearchtitle").val(),
          awardduration: $("#awardduration").val(),memid: $("#inid").val(),valval: 1,deleteawrdid: awarddelid},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='awarddelids'></td>"+
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awardid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awrdtle + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awrdlvl + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awrdres + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awardperiod + "</td>" +
                  "</tr>";
              $("#awardtbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }
   function deleteawrds(){
    $("#awardtbl tbody").empty();
    $.ajax({
      url: "awardsfile.php",
      dataType: "json",
      type: "post",
      data:{awardtitle: $("#awardtitle").val(),awardslvl: $("#trnlvlsel").val(),awrdtlesrch: $("#awardsearchtitle").val(),
          awardduration: $("#awardduration").val(),memid: $("#inid").val(),valval: 2,deleteawrdid: awarddelid},
      success: function(response){
      //  var arr = JSON.parse(response);
         // alert(response.levels);
        var len = response.length;
          for(var i=0; i<len; i++){
              var tr_str = "<tr id='row1'>" +
                  "<td align='center'><input type='radio' name='awarddelids'></td>"+
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awardid + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awrdtle + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awrdlvl + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awrdres + "</td>" +
                  "<td align='center' style='white-space: nowrap;'>" + response[i].awardperiod + "</td>" +
                  "</tr>";
              $("#awardtbl tbody").append(tr_str);
          } 
          
      },  // ajax end
    
  });
  
   }
    //===================awardsss functions====================================
    function inserttrnnedded(){
      $("#trnneededtbl tbody").empty();
      $.ajax({
        url: "trnneededfile.php",
        dataType: "json",
        type: "post",
        data:{trainneeded: $("#traineed").val(),memid: $("#inid").val(),valval: 1,deleteneededid: trnneededid},
        success: function(response){
        //  var arr = JSON.parse(response);
           // alert(response.levels);
          var len = response.length;
            for(var i=0; i<len; i++){
                var tr_str = "<tr id='row1'>" +
                    "<td align='center'><input type='radio' name='neededids'></td>"+
                    "<td align='center' style='white-space: nowrap;'>" + response[i].needid + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].needtle + "</td>" +
                    "</tr>";
                $("#trnneededtbl tbody").append(tr_str);
            } 
            
        },  // ajax end
      
    });
    
     }
     function delstrnnedded(){
      $("#trnneededtbl tbody").empty();
      $.ajax({
        url: "trnneededfile.php",
        dataType: "json",
        type: "post",
        data:{trainneeded: $("#traineed").val(),memid: $("#inid").val(),valval: 2,deleteneededid: trnneededid},
        success: function(response){
        //  var arr = JSON.parse(response);
           // alert(response.levels);
          var len = response.length;
            for(var i=0; i<len; i++){
                var tr_str = "<tr id='row1'>" +
                    "<td align='center'><input type='radio' name='neededids'></td>"+
                    "<td align='center' style='white-space: nowrap;'>" + response[i].needid + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].needtle + "</td>" +
                    "</tr>";
                $("#trnneededtbl tbody").append(tr_str);
            } 
            
        },  // ajax end
      
    });
    
     }