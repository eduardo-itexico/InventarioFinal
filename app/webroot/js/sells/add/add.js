/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function()
{
    $('.modal-link').click(function(event)
    {
        // Prevent link opening
        event.preventDefault();
         console.log("llego");
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
                          var subtotal = parseFloat($("#cantidad"+indice).val()) * 
                                         parseFloat($("#precio"+indice).val());
                          $("#subtotal"+indice).html(subtotal);
       calculateSubtotal();
    });
    
    function calculateSubtotal(){
        console.log("Enctro al calculate")
        var inputs = $("#rows-formulario-productos").find("input[id^='subtotal']");
        console.log(inputs);
    };
    
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
                      var producto  = datos[i].Product;
                      var categoria = datos[i].Category;
                      var unidad    = datos[i].Unity;
                      var tr                = $("<tr></tr>");
                      var empty_td          = $("<td></td>");
                      var id_td             = $("<td></td>");
                      var nombre_td         = $("<td></td>");
                      var descripcion_td    = $("<td></td>");
                      var categoria_td      = $("<td></td>");
                      var precio_td         = $("<td></td>");
                      var imagen_td         = $("<td></td>");
                      var unidad_td         = $("<td></td>");
                      var cantidad_td       = $("<td></td>");
                      var subtotal_td       = $("<td></td>");
                      var actions_td        = $("<td></td>");
                      var button_add        = $("<ul></ul>");
                      var li_add            = $("<li></li>");
                      var anchor_agregar    = $("<a></a>").attr("href","#").html("Agregar");
                      var input_cantidad    = $("<input type='text'>");
                      var input_precio      = $("<input type='text'>");
                      
                      subtotal_td.attr("id","subtotal"+contador);
                      input_cantidad.attr("id","cantidad"+contador);
                      input_precio.attr("id","precio"+contador);
                      
                      subtotal_td.attr("indice",contador);
                      input_cantidad.attr("indice",contador);
                      input_precio.attr("indice",contador);
                      
                      input_precio.val(producto.precio);
                      input_cantidad.val(1);
                      subtotal_td.html(parseFloat(producto.precio) *1 );
                      
                      precio_td.append(input_precio);
                      cantidad_td.append(input_cantidad);
                      
                      anchor_agregar.click(function(event){
                            event.preventDefault();
                            var anchor_eliminar   = $("<a></a>");
                            anchor_eliminar.attr("href","#");
                            anchor_eliminar.attr("href","#");
                            anchor_eliminar.html("Eliminar");
                            anchor_eliminar.click(function(event){
                                event.preventDefault();
                                $(this).parent().parent().parent().parent().remove()
                                console.log($(this).parent().parent().parent().parent().remove());
                            });
                            var clone_row = $(this).parent().parent().parent().parent().clone();
                            clone_row.find("li").html("").append(anchor_eliminar);
                            $("#rows-formulario-productos").append(clone_row);
                            //console.log($(this).parent().parent().parent().parent());
                      });
                      li_add.html(anchor_agregar);
                      
                      id_td.html(producto.id);
                      nombre_td.html(producto.nombre);
                      descripcion_td.html(producto.descripcion);
                      categoria_td.html(categoria.name);
                      //precio_td.html(producto.precio);                  
                      unidad_td.html(unidad.name);                  
                      
                      button_add.attr("class","keywords");
                      button_add.append(li_add);
                      actions_td.html(button_add);
                      
                      tr.append(empty_td,id_td,nombre_td,nombre_td,
                                descripcion_td,categoria_td,precio_td,
                                imagen_td,unidad_td,cantidad_td,
                                subtotal_td,actions_td);

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
});

