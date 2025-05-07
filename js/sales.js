 var num_id="<?php echo $new_id;?>";
 var resultContainer = document.getElementById('qr-reader-results');
var lastResult, countResults = 0;

function onScanSuccess(decodedText, decodedResult) {
    if (decodedText !== lastResult) {
        ++countResults;
        lastResult = decodedText;
        // Handle on success condition with the decoded message.
        console.log(`Scan: ${decodedText}`);
        // alert(`${decodedText}`);

        $("#QR-code").modal("hide");  
        b_code(`${decodedText}`);
        $('#QR-code').load('#QR-code');
        // $("#full-width-modal").modal("show"); 


    }
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);
  
$("#item_description").keypress(function(e){
                var keyCode = e.which;
               
 if ( (keyCode == 38 || keyCode == 40)) { 
      return false;
    }     
                if (keyCode ==32) { 
               
                $("#full-width-modal").modal("show");   
                
                  List(1);
                  sales(0);
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

$("#view").click(function(){
$("#full-width-modal-1").modal("show");  
sales(1);
List(0);

                })
$("#product").click(function(){
$("#product-add").modal("show");  


                })


// $("#quick-add").click(function(){
//   alert("this");
  
// })





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
 var editRow = null;
function productDisplay(ctl) {
      
      console.log(ctl);
      
      editRow = $(ctl).parents("tr");
      var cols = editRow.children("td");

      $("#bin").val($(cols[1]).text());
      $("#item_no").val($(cols[2]).text());
      $("#item_description").val($(cols[3]).text());
      $("#pack").val($(cols[4]).text());
      $("#item_qty").val($(cols[6]).text());
      $("#item_unit").val($(cols[5]).text());
      $("#item_date").val($(cols[7]).text());
      $("#weight").val($(cols[8]).text());
      $("#cube").val($(cols[9]).text());
      $("#unit_price").val($(cols[10]).text());
      $("#item_total").val($(cols[11]).text());
     
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
         if(index==5){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cs').html(total);

            });
            
        }
        if(index==6){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_ea').html(total);

            });
            
        } 
        if(index==8){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_weight').html(total);

            });
            
        } 
        if(index==9){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cube').html(total);

            });
            
        } 

        if(index==11){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_total').html(total);

            });
            
        }

            if(index==10){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;

                }
                console.log(total);
                $('#total_net_amount').val(total);
                $('#foot_unit').html(total);

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
            if(index==10){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
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
    var randomNumber = Math.floor(Math.random() * 1000);
        var newid=randomNumber;
         // if(newid<10000)
         // {
         //  new_id=newid+10000;
         // }
     
      var ret =
        "<tr valign='top' id='"+newid+"'>" +
        "<td>" + newid + "</td>" +
        "<td class='bin"+newid+"'>" +  $("#bin").val()  + "</td>" +
        "<td class='code"+newid+"'>" +  $("#item_no").val()  + "</td>" +
        
        "<td class='description"+newid+"'>" + $("#item_description").val() + "</td>" +
        "<td class='pack"+newid+"'>" + $("#pack").val() + "</td>" +
          "<td  class='item_unit"+newid+"'>" + $("#item_unit").val() + "</td>" +
        
        "<td class='qty"+newid+"'>" + $("#item_qty").val() + "</td>" +
         "<td class='item_date"+newid+"'>" + $("#item_date").val() + "</td>" +
         "<td class='weight"+newid+"'>" + $("#weight").val() + "</td>" +
         "<td class='cube"+newid+"'>" + $("#Cube").val() + "</td>" +
       
        "<td class='unit_price"+newid+"'>" + $("#unit_price").val() + "</td>" +
        "<td class='net_amount"+newid+"'>" + $("#item_total").val() + "</td>" +
         "<td class='id"+newid+"' hidden=''>add</td>" +

         "<td>" +
          "<button type='button' " +
                  "onclick='productDisplay(this);' " +
                  "class='btn' style='height:25px;' id='update-conn'>" +
                  "<span class='far fa-share-square text-dark' />" +
          "</button>" +
        "</td>" +
        "<td>" +
          "<button type='button' " +
                  "onclick='productDelete(this);' " +
                  "class='btn' style='height:25px;'>" +
                  "<span class='far fa-trash-alt text-dark' />" +
          "</button>" +
        "</td>" +
      "</tr>"

      return ret;
         
          } 
      }
  

     function productBuildTableRow_1() {       
 var randomNumber = Math.floor(Math.random() * 1000);
        var newid=randomNumber;
         // if(newid<10000)
         // {
         //  newid=newid+10000;
         // }
  
      var ret =
       "<tr valign='top' id='"+newid+"'>" +
        "<td>" + newid + "</td>" +
        "<td class='bin"+newid+"'>" +  $("#bin").val()  + "</td>" +
       "<td class='code"+newid+"'>" +  $("#item_no").val()  + "</td>" +
        "<td class='description"+newid+"'>" + $("#item_description").val() + "</td>" +
        "<td class='pack"+newid+"'>" + $("#pack").val() + "</td>" +

          "<td  class='item_unit"+newid+"'>" + $("#item_unit").val() + "</td>" +
        
        "<td class='qty"+newid+"'>" + $("#item_qty").val() + "</td>" +
         "<td class='item_date"+newid+"'>" + $("#item_date").val() + "</td>" +
         "<td class='weight"+newid+"'>" + $("#weight").val() + "</td>" +
         "<td class='cube"+newid+"'>" + $("#Cube").val() + "</td>" +
       
        "<td class='unit_price"+newid+"'>" + $("#unit_price").val() + "</td>" +
        "<td class='net_amount"+newid+"'>" + $("#item_total").val() + "</td>" +
         "<td class='id"+newid+"' hidden=''>add</td>" +

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

          if(index==5){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cs').html(total);

            });
            
        }
        if(index==6){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_ea').html(total);

            });
            
        } 
        if(index==8){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_weight').html(total);

            });
            
        } 
        if(index==9){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cube').html(total);

            });
            
        } 

        if(index==11){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_total').html(total);

            });
            
        }

            if(index==10){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;

                }
                console.log(total);
                $('#total_net_amount').val(total);
                $('#foot_unit').html(total);

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

          if(index==5){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cs').html(total);

            });
            
        }
        if(index==6){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_ea').html(total);

            });
            
        } 
        if(index==8){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_weight').html(total);

            });
            
        } 
        if(index==9){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cube').html(total);

            });
            
        } 

        if(index==11){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_total').html(total);

            });
            
        }

            if(index==10){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;

                }
                console.log(total);
                $('#total_net_amount').val(total);
                $('#foot_unit').html(total);

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
      $("#item_description").val("");
      $("#item_qty").val("");
      $("#item_unit").val("");
      $("#item_date").val("");
      $("#weight").val("");
      $("#cube").val("");
      $("#unit_price").val("");
      $("#item_total").val("");
      $("#pack").val("");
      $("#bin").val("");
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
          if(index==5){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cs').html(total);

            });
            
        }
        if(index==6){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_ea').html(total);

            });
            
        } 
        if(index==8){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_weight').html(total);

            });
            
        } 
        if(index==9){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cube').html(total);

            });
            
        } 

        if(index==11){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_total').html(total);

            });
            
        }

            if(index==10){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;

                }
                console.log(total);
                $('#total_net_amount').val(total);
                $('#foot_unit').html(total);

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
            var brand= array[i].brand;
            var weight= array[i].weight;
            var cube= array[i].cube;
            var pack= array[i].pack;
 
          } 

          // $("#item_name").val(product_name);
        
          $("#item_date").val(brand);
          $("#weight").val(weight);
          $("#Cube").val(cube);
          $("#pack").val(pack);
          
          var date = new Date();
        
          $("#item_unit").val(unit);
          $("#unit_price").val(purchase_price);
          $("#item_description").val(description);
          $("#item_qty").val(1);
          $("#item_total").val(purchase_price);
          
         }
      }
      });

     $.ajax({
      url:"sales_data.php",
      method:"post",
      data:{item_code_for_quantity:item_code},
      success:function(data)
      {

         $("#total_qty").html(data);
      }
    });

    })

  $("#customer_name").change(function(){
    var customer_name=$("#customer_name").val();
     $.ajax({
      url:"sales_data.php",
      method:"post",
      data:{customer_id:customer_name},
      success:function(data)
      {
         if(data!=0){
            var array = JSON.parse(data);
        console.log(data);
        
          for (i=0; i<array.length; i++)
          {
            
            var customer_name= array[i].customer_name;
            var address= array[i].address;
            var ph_num= array[i].ph_num;
            var email= array[i].email;
 
          } 

        }
        $("#bill_no").val(""+customer_name.replace('\n', '<br/>')+" "+address.replace("\n", '<br/>')+"");
        $("#ship_no").val(""+customer_name.replace('\n', '<br/>')+" "+address.replace('\n', '<br/>')+"");
         // $("#vendor_num").val(data);
          $("#customer_po").val(ph_num);
      }
    });
  })
     $("#prt").click(function(){
  var vendor_val=$("#customer_name").val();
  var s_product=$("#product_name").val();
   var s_product=$("#sale_status").val();

  if(s_product=="POSTED"){

       var sale_no=$("#sale_no").val();
      
            window.location.href = "landprint.php?id="+sale_no;

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
        var tax =new Array(1000);
        var weight =new Array(1000);
        var cube =new Array(1000);
        var pack =new Array(1000);
        var bin =new Array(1000);

                       
        for ( var i = 1; i <= lastRowId; i++) {
            code.push($("#"+i+" .code"+i).html());  /* pushing all the names listed in the table */
           
            description.push($("#"+i+" .description"+i).html());
            qty.push($("#"+i+" .qty"+i).html());
            sale_price.push($("#"+i+" .unit_price"+i).html());
            item_unit.push($("#"+i+" .item_unit"+i).html()); 
            item_date.push($("#"+i+" .item_date"+i).html());
            net_amount.push($("#"+i+" .net_amount"+i).html());  
            // tax.push($("#"+i+" .tax"+i).html());  
            weight.push($("#"+i+" .weight"+i).html());  
            cube.push($("#"+i+" .cube"+i).html());  
            pack.push($("#"+i+" .pack"+i).html());  
            bin.push($("#"+i+" .bin"+i).html());  

        }
           var sendCode = JSON.stringify(code);  
           var sendPack = JSON.stringify(pack);  
           
           var sendDescription = JSON.stringify(description);
           var sendPrice = JSON.stringify(sale_price);
           var sendQty = JSON.stringify(qty); 
           var sendUnit = JSON.stringify(item_unit);
           var sendDate = JSON.stringify(item_date);
           var net_amount = JSON.stringify(net_amount);
           var sendWeight = JSON.stringify(weight);
           var sendCube = JSON.stringify(cube);
           var sendBin = JSON.stringify(bin);
            
           
var total_amount=$("#total_net_amount").val();    
var formData = new FormData($('#item')[0]);
formData.append('total_net_amount', total_amount);
formData.append('sendCode', sendCode);
formData.append('sendPack', sendPack);
formData.append('sendProduct', '');
formData.append('sendDescription', sendDescription);
formData.append('sendPrice', sendPrice);
formData.append('sendQty', sendQty);
formData.append('sendUnit', sendUnit);
formData.append('sendDate', sendDate);
formData.append('sendDate', sendDate);
formData.append('sendNet', net_amount);
formData.append('sendTax', '');
formData.append('sendWeight', sendWeight);
formData.append('sendCube', sendCube);
formData.append('sendBin', sendBin);
  $.ajax({
   url: "sales_data.php",
   type: "POST",
   data:  formData,
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
      {
         
         setTimeout(function()
      {  
        toastr.success(data, 'Food Distributor', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
            // window.location.reload();
            var sale_no=$("#sales_no").val();
            window.location.href = "landprint.php?id="+data;
          },1000);                

            },
              
    });
}
  
})

$("#add-ajax").click(function(){
  var vendor_val=$("#customer_name").val();
  var s_product=$("#sale_status").val();
  if(vendor_val==0 || s_product=="POSTED"){
        toastr.success("This Invoice ALready Posted!", 'Food Distributor', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
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
        var tax =new Array(1000);
        var weight =new Array(1000);
        var cube =new Array(1000);
        var pack =new Array(1000);
        var bin =new Array(1000);

                       
        for ( var i = 1; i <= lastRowId; i++) {
            code.push($("#"+i+" .code"+i).html());  /* pushing all the names listed in the table */
           
            description.push($("#"+i+" .description"+i).html());
            qty.push($("#"+i+" .qty"+i).html());
            sale_price.push($("#"+i+" .unit_price"+i).html());
            item_unit.push($("#"+i+" .item_unit"+i).html()); 
            item_date.push($("#"+i+" .item_date"+i).html());
            net_amount.push($("#"+i+" .net_amount"+i).html());  
            // tax.push($("#"+i+" .tax"+i).html());  
            weight.push($("#"+i+" .weight"+i).html());  
            cube.push($("#"+i+" .cube"+i).html());  
            pack.push($("#"+i+" .pack"+i).html());  
            bin.push($("#"+i+" .bin"+i).html());  

        }
           var sendCode = JSON.stringify(code);  
           var sendPack = JSON.stringify(pack);  
           
           var sendDescription = JSON.stringify(description);
           var sendPrice = JSON.stringify(sale_price);
           var sendQty = JSON.stringify(qty); 
           var sendUnit = JSON.stringify(item_unit);
           var sendDate = JSON.stringify(item_date);
           var net_amount = JSON.stringify(net_amount);
           var sendWeight = JSON.stringify(weight);
           var sendCube = JSON.stringify(cube);
           var sendBin = JSON.stringify(bin);
            
           
var total_amount=$("#total_net_amount").val();    
var formData = new FormData($('#item')[0]);
formData.append('total_net_amount', total_amount);
formData.append('sendCode', sendCode);
formData.append('sendPack', sendPack);
formData.append('sendProduct', '');
formData.append('sendDescription', sendDescription);
formData.append('sendPrice', sendPrice);
formData.append('sendQty', sendQty);
formData.append('sendUnit', sendUnit);
formData.append('sendDate', sendDate);
formData.append('sendDate', sendDate);
formData.append('sendNet', net_amount);
formData.append('sendTax', '');
formData.append('sendWeight', sendWeight);
formData.append('sendCube', sendCube);
formData.append('sendBin', sendBin);
  $.ajax({
   url: "sales_data.php",
   type: "POST",
   data:  formData,
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
      {
         
         setTimeout(function()
      {  
        toastr.success(data, 'Food Distributor', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
            // window.location.reload();
            var sale_no=$("#sales_no").val();
            window.location.href = "landprint.php?id="+data;
          },1000);  

          setTimeout(function()
      {  
        
            window.location.reload();
            
          },2000);               

            }
              
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
      
       $("#item_Model").modal("hide");
}
else{
  var comt=0;
  $("#myTable input[type=checkbox]:checked").each(function () {
                    var row = $(this).closest("tr")[0];
                    var barcode= row.cells[1].innerHTML;
                    // b_code(barcode);
                     $('#table2 tr').each(function(){
                      var ba=$(this).find('td').eq(2).text();

        if( ba == barcode){
           comt=1;
              
        }
        else{  
        if(comt==1){

        } 
        else{
          comt=0;
        } 
                   
        }

    });
                     if (comt!=1) {
                      b_code(barcode);
                    List(0); 
                                         }
              comt=0;
                  
                                    });
  m==t;
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


function sales(index) {
   /* var $j = jQuery.noConflict();*/
  if(index==1){
  window.focus()
  $('#salesTable').focus();
  highlight(0);
  
  $('#goto_first').click(function() {
    highlight(0);

  });

  $('#goto_prev').click(function() {
    highlight($('#salesTable tbody tr.highlight').index() - 1);   
  });

  $('#goto_next').click(function() {
    highlight($('#salesTable tbody tr.highlight').index() + 1);

  });

  $('#goto_last').click(function() {
    highlight($('#salesTable tbody tr:last').index());
  });

 $('#goto_close').click(function() {
 
  $("#item_Model").modal("hide");

  });
 
  $("#salesTable").on('click','tr',function(e){
     var index=$('#salesTable #tablebody tr.highlight').index();
    var newTr = $(this).closest("tr").clone().removeClass("light_1");
     var cols = newTr.children("td").clone().removeClass("light_1");
      
      var bill=$(cols[0]).text();
SalesFetch(bill); 
      $("#full-width-modal-1").modal("hide");  
          
     // $(this).find("input[type=checkbox]").attr("checked", true);
    
  });

  function highlight(tableIndex) {
    if ((tableIndex + 1) > $('#salesTable tbody tr').length) //restart process
      tableIndex = 0;

    if ($('#salesTable tbody tr:eq(' + tableIndex + ')').length > 0) {
      $('#salesTable tbody tr').removeClass('highlight');

      $('#salesTable tbody tr:eq(' + tableIndex + ')').addClass('highlight');
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
            var brand= array[i].brand;
            var weight= array[i].weight;
            var cube= array[i].cube;
            var pack= array[i].pack;
 
 
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

          var total=parseFloat(1)*purchase_price;

        
var comt=0;
         
    $('#table2 tr').each(function(){

        if($(this).find('td').eq(1).text() == index){
           comt=1;
            
        }
       
    });
 
    if(comt!=1){
        var randomNumber = Math.floor(Math.random() * 1000);
        var newid=randomNumber;
         if(newid<100)
         {
          newid=newid+100;
         }
        //id=tis_id;
        $("#table2").append("<tr valign='top' id='"+newid+"'>" +
        "<td>" + newid + "</td>" +
        "<td class='bin"+newid+"'>" +  "" + "</td>" +
        "<td class='code"+newid+"'>" +  index + "</td>" +
        "<td class='description"+newid+"'>" + description + "</td>" +
        "<td class='pack"+newid+"'>" + pack + "</td>" +
          "<td  class='item_unit"+newid+"'>" + "0" + "</td>" +
        
        "<td class='qty"+newid+"'>" + '1 '+ "</td>" +
         "<td class='item_date"+newid+"'>" + brand + "</td>" +
         "<td class='weight"+newid+"'>" + weight + "</td>" +
         "<td class='cube"+newid+"'>" + cube + "</td>" +
       
        "<td class='unit_price"+newid+"'>" + purchase_price + "</td>" +
        "<td class='net_amount"+newid+"'>" + total + "</td>" +
        "<td class='id"+newid+"' hidden=''>add</td>" +
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

             if(index==5){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cs').html(total);

            });
            
        }
        if(index==6){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_ea').html(total);

            });
            
        } 
        if(index==8){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_weight').html(total);

            });
            
        } 
        if(index==9){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cube').html(total);

            });
            
        } 

        if(index==11){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_total').html(total);
                $('#total_net_amount').val(total);

            });
            
        }

            if(index==10){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;

                }
                console.log(total);
                
                $('#foot_unit').html(total);

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

function SalesFetch(index){
   $.ajax({
      url:"sales_data.php",
      method:"post",
      data:{item_code:index},
      success:function(data)
      {
         if(data!=0){
          var array = JSON.parse(data);
            console.log(data);
           
     for (i=0; i<array.length; i++)
          {
               var customer_no= array[i].customer_no;
               var customer_po= array[i].customer_po;
               var sales_date= array[i].sales_date;
               var ship_via= array[i].ship_via;
               var ship_zone= array[i].ship_zone;
               var bill_to= array[i].bill_to;
               var ship_to= array[i].ship_to;
               var net_amount= array[i].net_amount;
               var term= array[i].term;
               var saleperson= array[i].saleperson;
               var truck_driver= array[i].truck_driver;
               var sold_to= array[i].sold_to;
          }
            
             $.ajax({
      url:"sales_data.php",
      method:"post",
      data:{truck_id:truck_driver},
      success:function(data)
      {
          
         $("#truck_p").html(data);
           }
      });
               $.ajax({
      url:"sales_data.php",
      method:"post",
      data:{customer_cum:customer_no},
      success:function(data)
      {
          
         $("#cus_p").html(data);
           }
      });



            $("#customer_name").val(customer_no);
            $("#sale_no").val(index);
            $("#sale_date").val(sales_date);
            $("#customer_po").val(customer_po);
            $("#vendor_po").val(term);
            $("#saleperson").val(saleperson);
            $("#ship_via").val(ship_via);
            $("#ship_zone").val(ship_zone);
            $("#bill_no").val(bill_to);
            $("#ship_no").val(ship_to);
            $("#sold_to").val(sold_to);
            $("#truck_driver").val(truck_driver);
            $("#sale_status").val("POSTED");
         }
       }
     });

   $.ajax({
      url:"sales_data.php",
      method:"post",
      data:{invoice_code:index},
      success:function(data)
      {
        // alert(data);
        if(data!=0){
            var array = JSON.parse(data);
            console.log(data);
          var rowCount = table2.rows.length;
        for (var i = rowCount - 1; i > 0; i--) {
            table2.deleteRow(i);
        }
           
     for (i=0; i<array.length; i++)
          {
             var randomNumber = Math.floor(Math.random() * 1000);
        var newid=randomNumber;
         if(newid<100)
         {
          newid=newid+100;
         }
              $("#table2").append("<tr valign='top' id='"+newid+"'>" +
        "<td>" + newid + "</td>" +
        "<td class='bin"+newid+"'>" +  array[i].bin  + "</td>" +
       "<td class='code"+newid+"'>" +  array[i].item_num  + "</td>" +
        "<td class='description"+newid+"'>" + array[i].description + "</td>" +
        "<td class='pack"+newid+"'>" + array[i].pack + "</td>" +

          "<td  class='item_unit"+newid+"'>" + array[i].ea  + "</td>" +
        
        "<td class='qty"+newid+"'>" + array[i].qty+ "</td>" +
         "<td class='item_date"+newid+"'>" + array[i].brand + "</td>" +
         "<td class='weight"+newid+"'>" + array[i].weight + "</td>" +
         "<td class='cube"+newid+"'>" + array[i].cube + "</td>" +
       
        "<td class='unit_price"+newid+"'>" + array[i].unit_price + "</td>" +
        "<td class='net_amount"+newid+"'>" + array[i].total + "</td>" +
        "<td class='id"+newid+"' hidden=''>" + array[i].id + "</td>" +

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

             if(index==5){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cs').html(total);

            });
            
        }
        if(index==6){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_ea').html(total);

            });
            
        } 
        if(index==8){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_weight').html(total);

            });
            
        } 
        if(index==9){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_cube').html(total);

            });
            
        } 

        if(index==11){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
                $('#foot_total').html(total);
                $('#total_net_amount').val(total);

            });
            
        }

            if(index==10){
            var total = 0;
            $('#table2 tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;

                }
                console.log(total);
                
                $('#foot_unit').html(total);

            });
            
        }
        else{
            // total=0;
            // $('#total_net_amount').val(total);
        }
        
      }
        }
      }
    });
}

function land(){

  var status=$("#sale_status").val();
  var sale_no=$("#sale_no").val();
  if(status=="Unpost"){

  }
  else{
     var win = window.open('landprint.php?id='+sale_no, '_blank');
if (win) {
    //Browser has allowed it to be opened
    win.focus();
}

  }

}

function pot(){

  var status=$("#sale_status").val();
  var sale_no=$("#sale_no").val();
  if(status=="Unpost"){

  }
  else{
     var win = window.open('print.php?id='+sale_no, '_blank');
if (win) {
    //Browser has allowed it to be opened
    win.focus();
}

  }

}


$("#delete").click(function(){

  var index=$("#sale_no").val();
   if (confirm("You Really Want to Delete Sales Order!!")) {
    
   $.ajax({
      url:"function.php",
      method:"post",
      data:{delete_sales:index},
      success:function(data)
      {
         
 toastr.success(data, 'Food Distributor', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });

 setTimeout(function(){
    window.location.reload();
},2000);

      }
    });
  } else {
    
  }
})


$("#edit").click(function(){


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
        var tax =new Array(1000);
        var weight =new Array(1000);
        var cube =new Array(1000);
        var pack =new Array(1000);
        var bin =new Array(1000);
        var id =new Array(1000);

                       
        for ( var i = 1; i <= lastRowId; i++) {
            code.push($("#"+i+" .code"+i).html());  /* pushing all the names listed in the table */
           
            description.push($("#"+i+" .description"+i).html());
            qty.push($("#"+i+" .qty"+i).html());
            sale_price.push($("#"+i+" .unit_price"+i).html());
            item_unit.push($("#"+i+" .item_unit"+i).html()); 
            item_date.push($("#"+i+" .item_date"+i).html());
            net_amount.push($("#"+i+" .net_amount"+i).html());  
            // tax.push($("#"+i+" .tax"+i).html());  
            weight.push($("#"+i+" .weight"+i).html());  
            cube.push($("#"+i+" .cube"+i).html());  
            pack.push($("#"+i+" .pack"+i).html());  
            bin.push($("#"+i+" .bin"+i).html());  
            id.push($("#"+i+" .id"+i).html());  

        }
           var sendCode = JSON.stringify(code);  
           var sendPack = JSON.stringify(pack);  
           
           var sendDescription = JSON.stringify(description);
           var sendPrice = JSON.stringify(sale_price);
           var sendQty = JSON.stringify(qty); 
           var sendUnit = JSON.stringify(item_unit);
           var sendDate = JSON.stringify(item_date);
           var net_amount = JSON.stringify(net_amount);
           var sendWeight = JSON.stringify(weight);
           var sendCube = JSON.stringify(cube);
           var sendBin = JSON.stringify(bin);
           var sendId = JSON.stringify(id);
            
           
           
var total_amount=$("#total_net_amount").val();    
var formData = new FormData($('#item')[0]);
formData.append('total_net_amount', total_amount);
formData.append('sendCode', sendCode);
formData.append('sendPack', sendPack);
formData.append('sendProduct', '');
formData.append('sendDescription', sendDescription);
formData.append('sendPrice', sendPrice);
formData.append('sendQty', sendQty);
formData.append('sendUnit', sendUnit);
formData.append('sendDate', sendDate);
formData.append('sendDate', sendDate);
formData.append('sendNet', net_amount);
formData.append('sendTax', '');
formData.append('sendWeight', sendWeight);
formData.append('sendCube', sendCube);
formData.append('sendBin', sendBin);
formData.append('sendID', sendId);
  $.ajax({
   url: "function.php",
   type: "POST",
   data:  formData,
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
      {
                  

setTimeout(function()
      {  
        toastr.success("Sales Order Edit Successfully!", 'Food Distributor', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
            // window.location.reload();
          },1000);                

    setTimeout(function()
      {  
        toastr.success(data, 'Food Distributor', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 });
            // window.location.reload();
            var sale_no=$("#sales_no").val();
            window.location.href = "landprint.php?id="+data;
          },1000); 

           setTimeout(function()
      {  
        
            window.location.reload();
            
          },3000);                

            }
              
    });


  
})