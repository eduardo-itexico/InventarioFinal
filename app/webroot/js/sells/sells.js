/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function Sells(){
    
}


Sells.prototype.beforeSubmitCreateProducts = function(selector,placeSave){
    
    var input_hidden = $("<input type='hidden'>");
    try{
        
    
    $(selector).each(function(index){
        var producto = $(this).data("producto");
        var cantidad = $(this).find("input[id^='cantidad']").val();
        var precio   = $(this).find("input[id^='precio']").val();
        
        console.log("cantidad:"+cantidad);
        console.log("precio:"+precio);
        
        var cantidad_hidden     = input_hidden.clone().attr("name","data[Product]["+index+"][cantidad]");
        var precio_hidden       = input_hidden.clone().attr("name","data[Product]["+index+"][precio]");
        var product_id_hidden   = input_hidden.clone().attr("name","data[Product]["+index+"][id]");
        
        cantidad_hidden.attr("id","Product"+index+"Cantidad");
        precio_hidden.attr("id","Product"+index+"Precio");
        product_id_hidden.attr("id","Product"+index+"Id");
        
        cantidad_hidden.val(cantidad);
        cantidad_hidden.val(precio);
        product_id_hidden.val(producto.id);
        
        $(placeSave).append(cantidad_hidden,precio_hidden,product_id_hidden);
        
    });
    }catch(e){
        alert(e.message);
    }
    return false;
}