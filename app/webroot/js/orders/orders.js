/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function Orders(){
    this.iva = 0.16;
}


Orders.prototype.beforeSubmitCreateProducts = function(selector,placeSave){
    
    var input_hidden = $("<input type='hidden'>");
    try{
        
    
    $(selector).each(function(index){
        //index = index +1;
        var producto = $(this).data("producto");
        var cantidad = $(this).find("input[id^='cantidad']").val();
        var precio   = $(this).find("input[id^='precio']").val();
        var descuento   = $(this).find("input[id^='descuento']").val();
        
        //console.log(precio);
        
        var cantidad_hidden     = input_hidden.clone().attr("name","data[Product]["+index+"][cantidad]");
        var precio_hidden       = input_hidden.clone().attr("name","data[Product]["+index+"][precio]");
        var product_id_hidden   = input_hidden.clone().attr("name","data[Product]["+index+"][product_id]");
        var descto_hidden       = input_hidden.clone().attr("name","data[Product]["+index+"][descuento]");
        
        cantidad_hidden.attr("id","Product"+index+"Cantidad");
        precio_hidden.attr("id","Product"+index+"Precio");
        product_id_hidden.attr("id","Product"+index+"ProductId");
        product_id_hidden.attr("id","Product"+index+"Descuento");
        
        cantidad_hidden.val(cantidad);
        precio_hidden.val(precio);        
        product_id_hidden.val(producto.id);
        descto_hidden.val(descuento);
        
        $(placeSave).append(cantidad_hidden,precio_hidden,product_id_hidden,descto_hidden);
        
    });
    }catch(e){
        alert(e.message);
    }
    
}

Orders.prototype.calculateSubtotal = function(){
    var subtotal = 0;
    var inputs = $("#rows-formulario-productos td[id^='subtotal']").each(function(){
        subtotal += parseFloat($(this).html());
    });
    $("#OrderSubtotal").val(subtotal.toFixed(2));
    $("#OrderIva").val((subtotal*this.iva).toFixed(2));
    $("#OrderTotal").val(((subtotal*this.iva)+subtotal).toFixed(2));
};