/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function()
{
    
    var sells = new Sells();
    
    $("#SellAddForm").submit(function(){
        sells.beforeSubmitCreateProducts("#rows-formulario-productos tr","#rows-formulario-productos");
        //return false;
    });
    
    $('.modal-link').click(function(event)
    {
        // Prevent link opening
        event.preventDefault();
         //console.log("llego");
        // Open modal
        $("#productos-modal").modal({
            
            title: 'New modal window',
            maxWidth: 500,
            //url: this.href,
            buttons: {
                'Close': function(win) {win.closeModal();}
            }
        });
    });
    $("tbody input").live("change",function(){
                         console.log("cghange");
                         var indice = $(this).attr("indice");
                          var subtotal  = parseFloat($("#cantidad"+indice).val()) * 
                                          parseFloat($("#precio"+indice).val()) ;
                          subtotal 	    = subtotal - (subtotal*($("#descuento"+indice).val() / 100)); 
                          $("#subtotal"+indice).html(subtotal);
       calculateSubtotal();
    });
    
    function calculateSubtotal(){
        
        var subtotal = 0;
        var inputs = $("#rows-formulario-productos td[id^='subtotal']").each(function(){
            subtotal += parseFloat($(this).html());
            //console.log();
        });
        $("#SellSubtotal").val(subtotal.toFixed(2));
        $("#SellIva").val((subtotal*0.16).toFixed(2));
        $("#SellTotal").val(((subtotal*0.16)+subtotal).toFixed(2));
        
    };
    /*
    $("#SellDescuentoSell").change(function(){
           
    });
    */
    $("#ProductSearchJSONForm").submit(function(){
        //event.preventDefault();
        //console.log("Aqui llego");
        //console.log($(this).serialize());
        $.ajax({
          type: "POST",
          url: $(this).attr("action"),
          dataType: 'json',
          data: $(this).serialize(),
          success:function(data){
              
              $("#rows-productos").html('');
                var datos = data.data;
                
                if(datos.length > 0){
                  var contador = 0;
                  for(var i in  datos){
                      
                      var producto      = datos[i].Product;
                      var categoria     = datos[i].Category;
                      var unidad        = datos[i].Unity;
                      var stock         = datos[i].Stock;
                      var red_class     = parseFloat(stock.actual) <= parseFloat(stock.minimo) ? "red" : "";
                      
                      var tr                = $("<tr></tr>");
                      var empty_td          = $("<td></td>");
                      var id_td             = $("<td></td>");
                      var nombre_td         = $("<td></td>");
                      var descripcion_td    = $("<td></td>");
                      var categoria_td      = $("<td></td>");
                      var precio_td         = $("<td></td>");
                      var imagen_td         = $("<td></td>");
                      var img_src           = $("<img />");
                      var stock_td          = $("<td></td>");    
                      //var unidad_td         = $("<td></td>");
                      var cantidad_td       = $("<td></td>");
                      var descuento_td      = $("<td></td>");
                      var subtotal_td       = $("<td></td>");
                      var actions_td        = $("<td></td>");
                      var button_add        = $("<ul></ul>");
                      var li_add            = $("<li></li>");
                      
                      var anchor_agregar    = $("<a></a>").attr("href","#").html("Agregar");
                      var input_cantidad    = $("<input type='text'>");
                      var input_precio      = $("<input type='text'>");
                      var input_descuento      = $("<input type='text'>");
                      
                      stock_td.html(stock.actual + '/' +stock.minimo);
                      tr.data("producto",producto);
                      
                      
                      subtotal_td.attr("id","subtotal"+contador);
                      input_cantidad.attr("id","cantidad"+contador);
					  input_cantidad.attr("style","width: 40px");
                      input_precio.attr("id","precio"+contador);
					  input_precio.attr("style","width: 40px");
					  input_descuento.attr("id","descuento"+contador);
					  input_descuento.attr("style","width: 40px");
                      
                      subtotal_td.attr("indice",contador);
                      input_cantidad.attr("indice",contador);
                      input_precio.attr("indice",contador);
                      input_descuento.attr("indice",contador);
                      img_src.attr("src",$("#SellFullBase").val()+"/files/product/imagen/"+producto.imagen_dir +'/80X80_'+producto.imagen);
                      
                      
                      input_precio.val(producto.precio);
                      input_cantidad.val(1);
                      input_descuento.val(0);
                      
                      subtotal_td.html(parseFloat(producto.precio) *1 );
                      
                      precio_td.append(input_precio);
                      cantidad_td.append(input_cantidad);
                      descuento_td.append(input_descuento);
                      
                      imagen_td.append(img_src);
                      
                      anchor_agregar.click(function(event){
                            event.preventDefault();
                            var anchor_eliminar   = $("<a></a>");
                            anchor_eliminar.attr("href","#");
                            anchor_eliminar.attr("href","#");
                            anchor_eliminar.html("Eliminar");
                            anchor_eliminar.click(function(event){
                                event.preventDefault();                                
                                $(this).parent().parent().parent().parent().remove();
                                console.log("Eliminar------------------------------>")
                                calculateSubtotal();
                                //console.log($(this).parent().parent().parent().parent().remove());
                            });
                            //console.log("data-Before");
                            //console.log($(this).parent().parent().parent().parent().data());
                            var clone_row = $(this).parent().parent().parent().parent().clone(true);
                            //console.log("data_AFTER");
                            //console.log($(this).parent().parent().parent().parent().clone().data());
                            
                            clone_row.find("li").html("").append(anchor_eliminar);
                            $("#rows-formulario-productos").append(clone_row);
                            calculateSubtotal();
                            //console.log($(this).parent().parent().parent().parent());
                      });
                      li_add.html(anchor_agregar);
                      
                      id_td.html(producto.id);
                      nombre_td.html(producto.nombre);
                      descripcion_td.html(producto.descripcion);
                      categoria_td.html(categoria.name);
                      //precio_td.html(producto.precio);                  
                      //unidad_td.html(unidad.name);                  
                      
                      button_add.attr("class","keywords");
                      button_add.append(li_add);
                      actions_td.html(button_add);
                      
                     /* tr.append(empty_td,id_td,nombre_td,nombre_td,
                                descripcion_td,categoria_td,precio_td,
                                imagen_td,unidad_td,cantidad_td,
                                subtotal_td,actions_td);*/
								
                        tr.append(empty_td,id_td,imagen_td,nombre_td,nombre_td,
                                descripcion_td,categoria_td,precio_td,stock_td,
                                cantidad_td,descuento_td,
                                subtotal_td,actions_td);
                      red_class && tr.find("td").addClass("rojo");
                      $("#rows-productos").append(tr);
                      contador++;
                }                
              }else{
                  alert("No existen prodcutos con esas descripciones...");
              }
              
              console.log('Exito');
          } ,
          error:function(data){
              console.log('Error');
              console.log(data);
          }
          
        });
        return false;
    });
	
      
	
	/*
	* Seacrh Customer
	*/
	$("#CustomerSearchJSONForm").submit(function(){
        //event.preventDefault();
        //console.log("Aqui llego");
        //console.log($(this).serialize());
        $.ajax({
          type: "POST",
          url: $(this).attr("action"),
          dataType: 'json',
          data: $(this).serialize(),
          success:function(data){
              
              $("#rows-clients").html('');
                var datos = data.data;
                
                if(datos.length > 0){
                  var contador = 0;
				  var newRow = "";
                  for(var i in  datos){
                     //alert(datos[i].Customer.nombre);
					 newRow += '<tr><th scope="row" class="table-check-cell"></th><td>'+datos[i].Customer.id+'</td><td>'+datos[i].Customer.nombre+'</td><td>'+datos[i].Customer.rfc+'</td><td>'+datos[i].Customer.telefono+'</td><td ><ul class="keywords"><li><a href="javascript:addCustomer('+datos[i].Customer.id+',\''+String(datos[i].Customer.nombre)+'\',\''+String(datos[i].Customer.rfc)+'\',\''+String(datos[i].Customer.telefono)+'\');" >agregar</a></li></ul></td></tr>';
                      contador++;
                }    
				$("#rows-clients").html(newRow);            
              }else{
                  alert("No existen clientes con esas descripciones...");
              }
              
              console.log('Exito');
          } ,
          error:function(data){
              console.log('Error');
              console.log(data);
          }
          
        });
        return false;
    });
	
	
	
	
});

