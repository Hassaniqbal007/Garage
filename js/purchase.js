 
    var num_id="<?php echo $new_id;?>";

    $("#item_name").keypress(function(e){
                var keyCode = e.which;
               
 if ( (keyCode == 38 || keyCode == 40)) { 
      return false;
    }     
                if (keyCode ==32) { 
               
                $("#full-width-modal").modal("show");   
                
                  List(1);
                     }
                    
                     
                   })

    $("#item_no").keypress(function(e){
                var keyCode = e.which;
               
 if ( (keyCode == 38 || keyCode == 40)) { 
      return false;
    }     
                if (keyCode ==32) { 
               
                $("#QR-code").modal("show");   
                
                  
                     }
                    
                     
                   })
  
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

	 var editRow = null;

	 $("#item_qty").keyup(function(){
	 	var qty=$("#item_qty").val();
	 	var price=$("#unit_price").val();
	 	if(price=="" || price==NaN)
	 	{
	 		price=0;
	 	}
	 	var total=qty*price;
	 	$("#item_total").val(total);
	 })
	  $("#unit_price").keyup(function(){
	 	var qty=$("#item_qty").val();
	 	var price=$("#unit_price").val();
	 	if(qty=="" || qty==NaN)
	 	{
	 		price=0;
	 	}
	 	var total=qty*price;
	 	$("#item_total").val(total);
	 })

    function productDisplay(ctl) {
      
      console.log(ctl);
      
      editRow = $(ctl).parents("tr");
      var cols = editRow.children("td");

      $("#item_no").val($(cols[1]).text());
      $("#item_name").val($(cols[2]).text());
      $("#item_description").val($(cols[3]).text());
      $("#item_qty").val($(cols[4]).text());
      $("#item_unit").val($(cols[5]).text());
      $("#item_date").val($(cols[6]).text());
      $("#unit_price").val($(cols[7]).text());
      $("#item_total").val($(cols[8]).text());
     
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
         
 
   $('#table2 tr').each(function(){

        if($(this).find('td').eq(1).text() == code){
           comt=1;
            
        }
        else{
                           
        }

    });             
       if(comt!=1){
    var randomNumber = Math.floor(Math.random() * 100000);
        var newid=randomNumber;
         // if(newid<10000)
         // {
         //  new_id=newid+10000;
         // }
     
      var ret =
        "<tr valign='top' id='"+newid+"'>" +
        "<td>" + newid + "</td>" +
        "<td class='code"+newid+"'>" +  $("#item_no").val()  + "</td>" +
        "<td class='product"+newid+"'>" + $("#item_name").val() + "</td>" +
        "<td class='description"+newid+"'>" + $("#item_description").val() + "</td>" +
        "<td class='qty"+newid+"'>" + $("#item_qty").val() + "</td>" +
        "<td  class='item_unit"+newid+"'>" + $("#item_unit").val() + "</td>" +
        "<td class='item_date"+newid+"'>" + $("#item_date").val() + "</td>" +
        "<td class='unit_price"+newid+"'>" + $("#unit_price").val() + "</td>" +
        "<td class='net_amount"+newid+"'>" + $("#item_total").val() + "</td>" +

         "<td>" +
          "<button type='button' " +
                  "onclick='productDisplay(this);' " +
                  "class='btn btn-info' style='height:25px;' id='update-conn'>" +
                  "<span class='far fa-share-square text-white' />" +
          "</button>" +
        "</td>" +
        "<td>" +
          "<button type='button' " +
                  "onclick='productDelete(this);' " +
                  "class='btn btn-info' style='height:25px;'>" +
                  "<span class='far fa-trash-alt text-white' />" +
          "</button>" +
        "</td>" +
      "</tr>"

      return ret;
         
          } 
      }
  

     function productBuildTableRow_1() {       
 var randomNumber = Math.floor(Math.random() * 100000);
        var newid=randomNumber;
         // if(newid<10000)
         // {
         //  newid=newid+10000;
         // }
  
      var ret =
       "<tr valign='top' id='"+newid+"'>" +
        "<td>" + newid + "</td>" +
        "<td class='code"+newid+"'>" +  $("#item_no").val()  + "</td>" +
        "<td class='product"+newid+"'>" + $("#item_name").val() + "</td>" +
        "<td class='description"+newid+"'>" + $("#item_description").val() + "</td>" +
        "<td class='qty"+newid+"'>" + $("#item_qty").val() + "</td>" +
        "<td  class='item_unit"+newid+"'>" + $("#item_unit").val() + "</td>" +
        "<td class='item_date"+newid+"'>" + $("#item_date").val() + "</td>" +
        "<td class='unit_price"+newid+"'>" + $("#unit_price").val() + "</td>" +
        "<td class='net_amount"+newid+"'>" + $("#item_total").val() + "</td>" +

         "<td>" +
          "<button type='button' " +
                  "onclick='productDisplay(this);' " +
                  "class='btn btn-info' style='height:25px;' id='update-conn'>" +
                  "<span class='far fa-share-square text-whit'  />" +
          "</button>" +
        "</td>" +
        "<td>" +
          "<button type='button' " +
                  "onclick='productDelete(this);' " +
                  "class='btn btn-info' style='height:25px;'>" +
                  "<span class='far fa-trash-alt text-white' />" +
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

    // Clear form fields
    function formClear() {
      $("#item_no").val("");
      $("#item_name").val("");
      $("#item_unit").val("");
      $("#item_date").val("");
      $("#item_qty").val("");
      $("#unit_price").val("");
      $("#item_total").val("");
      $("#item_description").val("");
     
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
            if(index==7){
              console.log(index);
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseInt($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
            });

            
        }
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

          $("#item_name").val(product_name);
          $("#item_unit").val(unit);
          $("#unit_price").val(purchase_price);
          $("#item_description").val(description);
          $("#item_qty").val(1);
          $("#item_total").val(purchase_price);
         }
      }
      });

    })

    $("#vendor_name").change(function(){
       var vendor_id=$("#vendor_name").val();
      $.ajax({
      url:"purchase_data.php",
      method:"post",
      data:{vemdor_id:vendor_id},
      success:function(data)
      {
         $("#vendor_num").val(data);
         $("#ship_via").val("Vendor");
      }
    });
    })

   $("#add-ajax").click(function(){
  var vendor_val=$("#vendor_name").val();
  var s_product=$("#product_name").val();
  if(s_product==0 || vendor_val==0){
        setTimeout(function()
      {     
        var opts = {
          'closeButton': true,
          'debug': false,
          'positionClass': rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? 'toast-top-left' : 'toast-top-right',
          'toastClass': 'black',
          'onclick': null,
          'showDuration': '300',
          'hideDuration': '100000',
          'timeOut': '5000',
          'extendedTimeOut': '100000',
          'showEasing': 'swing',
          'hideEasing': 'linear',
          'showMethod': 'fadeIn',
          'hideMethod': 'fadeOut'
        };
    
        toastr.warning('Select Vendor!', opts);
      });
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
        var product =new Array(1000);
        var description =new Array(1000);
        var qty =new Array(1000);
        var item_unit =new Array(1000);
        var sale_price =new Array(1000);
        var item_date =new Array(1000);
        var unit_price =new Array(1000);
        var net_amount =new Array(1000);
                       
        for ( var i = 1; i <= lastRowId; i++) {
            code.push($("#"+i+" .code"+i).html());  /* pushing all the names listed in the table */
            product.push($("#"+i+" .product"+i).html());
            description.push($("#"+i+" .description"+i).html());
            qty.push($("#"+i+" .qty"+i).html());
            sale_price.push($("#"+i+" .unit_price"+i).html());
            item_unit.push($("#"+i+" .item_unit"+i).html()); 
            item_date.push($("#"+i+" .item_date"+i).html());
            net_amount.push($("#"+i+" .net_amount"+i).html());  

        }
           var sendCode = JSON.stringify(code);  
           var sendProduct = JSON.stringify(product);
           var sendDescription = JSON.stringify(description);
           var sendPrice = JSON.stringify(sale_price);
           var sendQty = JSON.stringify(qty); 
           var sendUnit = JSON.stringify(item_unit);
           var sendDate = JSON.stringify(item_date);
           var net_amount = JSON.stringify(net_amount);
            
           
           var total_amount=$("#total_net_amount").val();
    
var formData = new FormData($('#item')[0]);
formData.append('total_net_amount', total_amount);
formData.append('sendCode', sendCode);
formData.append('sendProduct', sendProduct);
formData.append('sendDescription', sendDescription);
formData.append('sendPrice', sendPrice);
formData.append('sendQty', sendQty);
formData.append('sendUnit', sendUnit);
formData.append('sendDate', sendDate);
formData.append('sendNet', net_amount);
  $.ajax({
   url: "purchase_data.php",
   type: "POST",
   data:  formData,
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
      {
        alert(data);
                  },
              
    });
}
  
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
          
          var d = new Date();
var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
          // $("#item_name").val(product_name);
          // $("#item_unit").val(unit);
          // $("#unit_price").val(purchase_price);
          // $("#item_description").val(description);
          // $("#item_qty").val(1);
          // $("#item_total").val(purchase_price);
          // $("#item_date").val(strDate);

          var total=parseInt(1)*purchase_price;

        
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
        $("#table2").append("<tr valign='top' id='"+newid+"'>" +
        "<td>" + newid + "</td>" +
        "<td class='code"+newid+"'>" +  index + "</td>" +
        "<td class='product"+newid+"'>" + product_name + "</td>" +
        "<td class='description"+newid+"'>" + description + "</td>" +
        "<td class='qty"+newid+"'>" + '1' + "</td>" +
         "<td  class='item_unit"+newid+"'>" + unit + "</td>" +
        "<td class='item_date"+newid+"'>" + strDate + "</td>" +
        "<td class='unit_price"+newid+"'>" +purchase_price + "</td>" +
        "<td class='net_amount"+newid+"'>" + total + "</td>" +

         "<td>" +
          "<button type='button' " +
                  "onclick='productDisplay(this);' " +
                  "class='btn' style='height:25px;' id='update-conn'>" +
                  "<span class='far fa-share-square text-dark'  />" +
          "</button>" +
        "</td>" +
        "<td>" +
          "<button type='button' " +
                  "onclick='productDelete(this);' " +
                  "class='btn' style='height:25px;'>" +
                  "<span class='far fa-trash-alt text-dark' />" +
          "</button>" +
        "</td>" +
      "</tr>"); 
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
         }
      }
      });

}
  
  