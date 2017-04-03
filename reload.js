$(document).ready( function() {

     $("#client-select, #treatment-type, #reschedule-this").attr('disabled', true);
   });



   $("#client-select").change( function() {
     $("#treatment-type, #reschedule-this").attr('disabled', true);
    var customer = $("#client-select").val();
     $.post("sales-orders/reschedule-process.php", { customer: customer }, function(data){
       alert(data);

         var toAppend = "<option>Select Treatment Type</option>";
             for(var i = 0; i < data.length; i++){
               toAppend += '<option value = \"' + data[i].Job_order_type + '\">' + data[i].Job_order_type + '</option>';
             }
             $("#treatment-type").empty();
             $("#treatment-type").removeAttr('disabled');
             $("#treatment-type").html(toAppend);
     }, "json");

     $("#treatment-type").change( function() {
       $("#reschedule-this").attr('disabled', true);

       var Job_order_type = $("#treatment-type").val();
       $.post("sales-orders/reschedule-process.php", { Job_order_type: Job_order_type }, function(data){
           var toAppend = "<option>Select Date of Service Request to be Rescheduled</option>";
               for(var i = 0; i < data.length; i++){
                 toAppend += '<option value = \"' + data[i].date + '\">' + data[i].date + '</option>';
               }
               $("#reschedule-this").empty();
               $("#reschedule-this").removeAttr('disabled');
               $("#reschedule-this").html(toAppend);
           }, "json");
     }); //END OF $(#treatment-type).change()
   }); //END OF $(#client-select).change()
