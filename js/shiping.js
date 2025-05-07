
$("#item_description").keypress(function(e){
                var keyCode = e.which;
               
 if ( (keyCode == 38 || keyCode == 40)) { 
      return false;
    }     
                if (keyCode ==32) { 
               
                $("#full-width-modal").modal("show");   
                
                  List(1);
                     }
                    
                     
                   })

var checkCol = 0; 

  
   $('#myTable thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#myTable').DataTable({
        "bPaginate": false,
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });

   $("#add-carton").click(function(){
    var shiping=$("#sale_no").val();
    var carton=$("#carton_no").val();
    var tracking_no=$("#tracking_no").val();
    var weight=$("#weight").val();
    var height=$("#height").val();
    var lenght=$("#lenght").val();
    var cost=$("#cost").val();
    var declare_value=$("#declare_value").val();
    var width=$("#width").val();
    // alert(carton);
    //var formData = new FormData($('#carton').get(0));
    //formData.append('shipping_no', shiping)
       $.ajax({
   url: "shiping_data.php",
   type: "POST",
   data:  {shipping_no:shiping,carton_no:carton,tracking_no:tracking_no,weight:weight,height:height,lenght:lenght,cost:cost,declare_value:declare_value,width:width},
   success: function(data)
      {
        alert(data);
       $("#carton_form")[0].reset();
       toastr.success(data, 'Food Distributor', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
        $.ajax({
        url:"shiping_data.php",
        method:"post",
        data:{fetch_carton:shiping},
         success:function(data)
      {
          $("#carton_div").html(data);
      }
  })
      }
  })
   })

  function List(index) {
   /* var $j = jQuery.noConflict();*/
   console.log("LIst"+index);
  if(index==1){
  window.focus()
  $('#myTable').focus();
  highlight(0);
  
  $('#goto_first').click(function() {
    highlight(0);

  });

  $('#goto_prev').click(function() {
    highlight($('#myTable tbody tr.highlight').index() - 1);   
  });

  $('#goto_next').click(function() {
    highlight($('#myTable tbody tr.highlight').index() + 1);

  });

  $('#goto_last').click(function() {
    highlight($('#myTable tbody tr:last').index());
  });

 $('#goto_close').click(function() {
  var comt=0;
  var status=$("#status").val();
  if(status=="Posted"){
      setTimeout(function()
      {     
        var opts = {
          'closeButton': true,
          'debug': false,
          'positionClass': rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? 'toast-top-left' : 'toast-top-right',
          'toastClass': 'black',
          'onclick': null,
          'showDuration': '300',
          'hideDuration': '1000',
          'timeOut': '5000',
          'extendedTimeOut': '1000',
          'showEasing': 'swing',
          'hideEasing': 'linear',
          'showMethod': 'fadeIn',
          'hideMethod': 'fadeOut'
        };
    
        toastr.warning('Purchase ALready Posted.', opts);
      });
       $("#item_Model").modal("hide");
}
else{
  $("#myTable input[type=checkbox]:checked").each(function () {
                    var row = $(this).closest("tr")[0];
                    var barcode= row.cells[1].innerHTML;
                    // b_code(barcode);
                      $('#table2 tr').each(function(){

        if($(this).find('td').eq(1).text() == barcode){
           comt=1;
            
        }
        else{
                    b_code(barcode);
                    List(0);
                   
        }

    });
           
                                    });
  $("#item_Model").modal("hide");
}
  });
 
  $("#myTable").on('click','tr',function(e){
    var index=$('#myTable #tablebody tr.highlight').index();
    console.log(index);
           
     $(this).find("input[type=checkbox]").attr("checked", true);
    
  });

  function highlight(tableIndex) {
    if ((tableIndex + 1) > $('#myTable tbody tr').length) //restart process
      tableIndex = 0;

    if ($('#myTable tbody tr:eq(' + tableIndex + ')').length > 0) {
      $('#myTable tbody tr').removeClass('highlight');

      $('#myTable tbody tr:eq(' + tableIndex + ')').addClass('highlight');
    }
  }

$(document).keydown(function(e) {
  switch (e.which) {
    case 38:
      $('#goto_prev').trigger('click');
      break;
    case 40:
      $('#goto_next').trigger('click');
      break;
    case 13:
      $(".highlight").trigger('click');
      break;
    case 27:
      $('#goto_close').trigger('click');
    
  }

});
}
else if(index==0){
  return false;
}
else{
  return false;
}
}
var tracking_no;
function tracking(num){
      tracking_no=num;
      alert(tracking_no);
}
function b_code(index){
    var carton=$("#carton").val();
     var shiping=$("#sale_no").val();
      $.ajax({
      url:"purchase_data.php",
      method:"post",
      data:{item_code:index},
      success:function(data)
      {
        //alert(data);
         if(data!=0){
            var array = JSON.parse(data);
            console.log(data);
           
        
          for (i=0; i<array.length; i++)
          {
            
            var product_name= array[i].product_name;
            var description= array[i].description;
            var purchase_price= array[i].purchase_price;
            var unit= array[i].unit;
 
          } 

           var tracking_no=$.ajax({
                       async:false,
                       url:"shiping_data.php",
                       method:"post",
                       data:{carton_tracking:carton,carton_ship:shiping},
                       dataType:"TEXT"
                       }).responseText;
        
var comt=0;
         
    $('#table2 tr').each(function(){

        if($(this).find('td').eq(1).text() == index){
           comt=1;
            
        }
       
    });
 
    if(comt!=1){
        var randomNumber = Math.floor(Math.random() * 1000);
        var tis_id=randomNumber;
         if(tis_id<100)
         {
          tis_id=tis_id+100;
         }
        //id=tis_id;
        $("#table2").append('<tr valign="top" id="'+tis_id+'">\n\
            <td width="100px" >' + tis_id + '</td>\n\
            <td width="100px" class="code'+tis_id+'">'+index +'</td>\n\
             <td width="100px" class="product'+tis_id+'">'+description +'</td>\n\
             <td width="100px" class="qty'+tis_id+'">'+'1'+'</td>\n\
            <td width="100px" class="unit'+tis_id+'">'+ unit +'</td>\n\
            <td width="100px" class="weight'+tis_id+'">'+ '' +'</td>\n\
            <td width="100px" class="tracking_no'+tis_id+'">'+ tracking_no +'</td>\n\
            <td><button type="button" onclick="productDisplay(this);" class="far fa-share-square text-dark" style="height:25px;" id="update-conn"><span class="glyphicon glyphicon-edit text-info"/></button></td>\n\
            <td><button type="button" onclick="productDelete(this);" class="far fa-trash-alt text-dark" style="height:25px;"><span class="glyphicon glyphicon-remove text-info" /></button></td>"\n\
        </tr>'); 
         $('#table2 thead th').each(function(i) {
                calculateColumn(i);
            });
        

        function calculateColumn(index) {
          cont=0;
          console.log(cont);
          if(index==0){
                $('#table2 tr').each(function() {
                $('td', this).eq(index).text(cont++);
              
            });
         }
        

       }  
      
                 }  
         }
      }
      });

}


var editRow = null;
function productDisplay(ctl) {
      
      console.log(ctl);
      
      editRow = $(ctl).parents("tr");
      var cols = editRow.children("td");

      $("#item_no").val($(cols[1]).text());
      $("#item_description").val($(cols[2]).text());
      $("#item_qty").val($(cols[3]).text());
      $("#item_unit").val($(cols[4]).text());
      $("#weight").val($(cols[5]).text());
      // $("#item_date").val($(cols[6]).text());
      // $("#unit_price").val($(cols[7]).text());
      // $("#item_total").val($(cols[8]).text());
     
      $("#updateButton").text("Update");
    
    }

    function productUpdate() {
      if ($("#updateButton").text() == "Update") {
        productUpdateInTable();
         $('#table2 thead th').each(function(i) {
                calculateColumn(i);
            });
        

        function calculateColumn(index) {
          cont=0;
          console.log(cont);
          if(index==0){
                $('#table2 tr').each(function() {
                $('td', this).eq(index).text(cont++);
              
            });
         }
            if(index==8){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseInt($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;

                }
                console.log(total);
                $('#total_net_amount').val(total);

            });
            
        }
        else{
            // total=0;
            // $('#total_net_amount').val(total);
        }
        
      }
      }
      else {
        productAddToTable();
         $('#table2 thead th').each(function(i) {
                calculateColumn(i);
            });
        

        function calculateColumn(index) {
          cont=0;
          console.log(cont);
          if(index==0){
                $('#table2 tr').each(function() {
                $('td', this).eq(index).text(cont++);
              
            });
         }
        //     if(index==8){
        //     var total = 0;
        //     $('#table2 tr').each(function() {
        //         var value = parseInt($('td', this).eq(index).text());
        //         if (!isNaN(value)) {
        //             total += value;

        //         }
        //         console.log(total);
        //         $('#total_net_amount').val(total);

        //     });
            
        // }
        else{
            // total=0;
            // $('#total_net_amount').val(total);
        }
        
      }
      }

      // Clear form fields
      formClear();

      // Focus to product name field
      $("#code").focus();
    }

    // Add product to <table>
    function productAddToTable() {
      // First check if a <tbody> tag exists, add one if not
      if ($("#table2 tbody").length == 0) {
        $("#table2").append("<tbody></tbody>");
      }

      // Append product to table
      $("#table2 tbody").append(
        productBuildTableRow());
    }

    // Update product in <table>
    function productUpdateInTable() {
      // Add changed product to table
      
      $(editRow).after(productBuildTableRow_1());
      console.log("edit  "+editRow);
      $(editRow).remove();
      //  Remove original product
      // Clear form fields
      formClear();
      
      // Change Update Button Text
      $("#updateButton").text("Add");


    }


    // Build a <table> row of Product data
    var bar_code_data=0;
    function require(index){
           bar_code_data=index;
           //alert(bar_code_data);
    }

 var  mi=0;
  var comnt=0;
  var newid=0;
 
 function productBuildTableRow() {
 var comt=0;         
 var code=$("#item_no").val();
 var quantity=$("#item_qty").val(); 
  var carton=$("#carton").val();
     var shiping=$("#sale_no").val();
 var tracking_no=$.ajax({
                       async:false,
                       url:"shiping_data.php",
                       method:"post",
                       data:{carton_tracking:carton,carton_ship:shiping},
                       dataType:"TEXT"
                       }).responseText;
         
 
   $('#table2 tr').each(function(){

        if($(this).find('td').eq(1).text() == code){
           comt=1;
            
        }
        else{
                           
        }

    });             
       if(comt!=1){
    var randomNumber = Math.floor(Math.random() * 1000);
        var newid=randomNumber;
         // if(newid<10000)
         // {
         //  new_id=newid+10000;
         // }
     
      var ret =
        "<tr valign='top' id='"+newid+"'>" +
        "<td>" + newid + "</td>" +
        "<td class='code"+newid+"'>" +  $("#item_no").val()  + "</td>" +
        "<td class='description"+newid+"'>" + $("#item_description").val() + "</td>" +
        "<td class='qty"+newid+"'>" + $("#item_qty").val() + "</td>" +
        "<td  class='item_unit"+newid+"'>" + $("#item_unit").val() + "</td>" +
        "<td  class='weight"+newid+"'>" + $("#weight").val() + "</td>" +
        "<td  class='tracking_no"+newid+"'>" + tracking_no + "</td>" +
         "<td>" +
          "<button type='button' " +
                  "onclick='productDisplay(this);' " +
                  "class='' style='height:25px;' id='update-conn'>" +
                  "<span class='far fa-share-square text-dark' style='height:25px;'/>" +
          "</button>" +
        "</td>" +
        "<td>" +
          "<button type='button' " +
                  "onclick='productDelete(this);' " +
                  "class='' style='height:25px;'>" +
                  "<span class='far fa-trash-alt text-dark' style='height:25px;'/>" +
          "</button>" +
        "</td>" +
      "</tr>"

      return ret;
         
          } 
      }
  

     function productBuildTableRow_1() {       
 var randomNumber = Math.floor(Math.random() * 1000);
        var newid=randomNumber;
         var carton=$("#carton").val();
     var shiping=$("#sale_no").val();
 var tracking_no=$.ajax({
                       async:false,
                       url:"shiping_data.php",
                       method:"post",
                       data:{carton_tracking:carton,carton_ship:shiping},
                       dataType:"TEXT"
                       }).responseText;
         // if(newid<10000)
         // {
         //  newid=newid+10000;
         // }
  
      var ret =
       "<tr valign='top' id='"+newid+"'>" +
        "<td>" + newid + "</td>" +
        "<td class='code"+newid+"'>" +  $("#item_no").val()  + "</td>" +
        "<td class='description"+newid+"'>" + $("#item_description").val() + "</td>" +
        "<td class='qty"+newid+"'>" + $("#item_qty").val() + "</td>" +
        "<td  class='item_unit"+newid+"'>" + $("#item_unit").val() + "</td>" +
        "<td  class='weight"+newid+"'>" + $("#weight").val() + "</td>" +
        "<td  class='tracking_no"+newid+"'>" + tracking_no + "</td>" +

         "<td>" +
          "<button type='button' " +
                  "onclick='productDisplay(this);' " +
                  "class='' style='height:25px;' id='update-conn'>" +
                  "<span class='far fa-share-square text-dark' style='height:25px;' />" +
          "</button>" +
        "</td>" +
        "<td>" +
          "<button type='button' " +
                  "onclick='productDelete(this);' " +
                  "class='' style='height:25px;'>" +
                  "<span class='far fa-trash-alt text-dark' style='height:25px;'/>" +
          "</button>" +
        "</td>" +
      "</tr>"
       return ret;
  
    }
     $('#table2 thead th').each(function(i) {
                calculateColumn(i);
            });
        

        function calculateColumn(index) {
          cont=0;
          console.log(cont);
          if(index==0){
                $('#table2 tr').each(function() {
                $('td', this).eq(index).text(cont++);
              
            });
         }
        

       }  
           
    // Deblete product from <table>
    function productDelete(ctl) {
     
    
 
      $(ctl).parents("tr").remove();
      $('#table2 thead th').each(function(i) {
                calculateColumn(i);
            });
        

        function calculateColumn(index) {
          cont=0;
          console.log(cont);
          if(index==0){
                $('#table2 tr').each(function() {
                $('td', this).eq(index).text(cont++);
              
            });
         }
        //     if(index==8){
        //     var total = 0;
        //     $('#table2 tr').each(function() {
        //         var value = parseInt($('td', this).eq(index).text());
        //         if (!isNaN(value)) {
        //             total += value;

        //         }
        //         console.log(total);
        //         $('#total_net_amount').val(total);

        //     });
            
        // }
        else{
            // total=0;
            // $('#total_net_amount').val(total);
        }
        
      }
    }

    // Clear form fields
    function formClear() {
      $("#item_no").val("");
      $("#item_unit").val("");
      $("#item_qty").val("");
      $("#item_description").val("");
      $("#weight").val("");
     
    }
    $("#updateButton").click(function(){
          $('#table2 thead th').each(function(i) {
                calculateColumn(i);
            });
           function calculateColumn(index) {
          cont=0;
          console.log(cont);
          if(index==0){
                $('#table2 tr').each(function() {
                $('td', this).eq(index).text(cont++);
                 id=cont;    
            });
         }
        //     if(index==7){
        //       console.log(index);
        //     var total = 0;
        //     $('#table2 tr').each(function() {
        //         var value = parseInt($('td', this).eq(index).text());
        //         if (!isNaN(value)) {
        //             total += value;
        //         }
        //     });

            
        // }
        else{
            // total=0;
            // $('#total_net_amount').val(total);
        }
        }
    })
     $("#item_no").keyup(function(e){

      if (e.keyCode == 13) { // barcode scanned!
        $('#code').focus();
        return false; // block form from being submitted yet
    }
      var item_code=$("#item_no").val();
      //console.log(item_code);
    $.ajax({
      url:"purchase_data.php",
      method:"post",
      data:{item_code:item_code},
      success:function(data)
      {
        //alert(data);
         if(data!=0){
            var array = JSON.parse(data);
        console.log(data);
        
          for (i=0; i<array.length; i++)
          {
            
            var product_name= array[i].product_name;
            var description= array[i].description;
            var purchase_price= array[i].purchase_price;
            var unit= array[i].unit;
 
          } 
          
          $("#item_unit").val(unit);
         
          $("#item_description").val(description);
          $("#item_qty").val(1);
         
         }
      }
      });

    })

          $("#add-ajax").click(function(){
  var ship_to = $('#editor').text();
  if(ship_to=='' || ship_to==null){
        toastr.success("Shipping Address Must be Added!", 'Food Distributor', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
      //       window.location.reload();
  }
  else{
  //var lastRowId = $('#table2 tr:last').attr("id"); /* finds id of the last row inside table */
  var first=0; /* finds id of the last row inside table */


  /* alert each TR's ID from #theTable */
  $("#table2 tr").each(function() {    
    console.log($(this).attr('id'));
    var lastID=$(this).attr('id');
    if(lastID>first)
    {
      first=lastID;
      // alert(first);
    }
  
  });

 // var lastRowId = $('#table2 tr:last').attr("id");
         var lastRowId=first;
        // alert(first);

        var code = new Array(1000);   
        var description =new Array(1000);
        var qty =new Array(1000);
        var item_unit =new Array(1000);
        var weight =new Array(1000);
        var tracking_no =new Array(1000);

                       
        for ( var i = 1; i <= lastRowId; i++) {
            code.push($("#"+i+" .code"+i).html());  /* pushing all the names listed in the table */
            description.push($("#"+i+" .description"+i).html());
            qty.push($("#"+i+" .qty"+i).html());
            item_unit.push($("#"+i+" .item_unit"+i).html()); 
            weight.push($("#"+i+" .weight"+i).html()); 
            tracking_no.push($("#"+i+" .tracking_no"+i).html()); 

        }
           var sendCode = JSON.stringify(code);  
           var sendDescription = JSON.stringify(description);
           
           var sendQty = JSON.stringify(qty); 
           var sendUnit = JSON.stringify(item_unit);
           var sendWeight = JSON.stringify(weight);
           var tracking_no = JSON.stringify(tracking_no);

            
           
           // var total_amount=$("#total_net_amount").val();
    
var formData = new FormData($('#item')[0]);
formData.append('sendCode', sendCode);
formData.append('sendDescription', sendDescription);
formData.append('sendQty', sendQty);
formData.append('sendUnit', sendUnit);
formData.append('sendWeight', sendWeight);
formData.append('sendTracking', tracking_no);
formData.append('ship_to', ship_to);

  $.ajax({
   url: "shiping_data.php",
   type: "POST",
   data:  formData,
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
      {
        
        alert(data);
         toastr.success(data, 'Food Distributor', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
    setTimeout(function()
      {  
       
            window.location.reload();
          },2000);                

            },
              
    });
}
  
})