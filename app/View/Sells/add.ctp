<!-- Content -->
<?php echo $this->Html->css('sells/add/add')?>
<?php echo $this->Html->script('common')?>
<?php echo $this->Html->script('standard')?>
<?php echo $this->Html->script('jquery.modal')?>
<?php echo $this->Html->script('sells/sells')?>
<?php echo $this->Html->script('sells/add/add')?>
<style>
	.modal {
		background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
		height: 100%;
		left: 0;
		position: fixed;
		top: 0;
		width: 100%;
		z-index: 999980;
		display:block;
	}
	.no-modal {
		display:none;
	} 
</style>
<script>
	// Demo modal
	function openSearchProducts()
	{
		document.getElementById('productos-modal').className = 'modal';
		
	}
	
	function openSearchClient()
	{
		document.getElementById('client-modal').className = 'modal';
		
	} 
	
	function addCustomer(_id,_name,_rfc,_phone){
		$('#customer_id').val(_id);
		$('#idC').val(_id);
		$('#nameC').val(_name);
		$('#rfcC').val(_rfc);
		$('#phoneC').val(_phone);
		document.getElementById('client-modal').className = 'no-modal';
			
	}
	document.getElementById("id_home").className = "home current";
</script>
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Nueva Venta</h1>
            <div class="sells form">
            <div class="columns">
     			
                <!-- Left column -->
                <?php echo $this->Form->create('Sell'); ?>
                <div class="colx3-left-double">
                    <fieldset>
                        <legend>Factura</legend>
                        <div class="columns">
     
                            <!-- Left column -->
                            <div class="colx3-left-double">
                                <?=$this->Form->input('full_base',array("type"=>"hidden","value"=>Router::url('/', true))); ?>
                                <?=$this->Form->input('date',array("type"=>"text","value"=>date("d-m-Y"),"disabled"=>"true")); ?>
                                <?=$this->Form->input('status',array("type"=>"hidden","value"=>1)); ?>
                            </div>
                             
                            <!-- Right column -->
                            <div class="colx3-right">
                                <?=$this->Form->input('facturado'); ?>
                            </div>
                              
        		</div>
                        
    				</fieldset>
                    <fieldset>
                        <legend>Cliente</legend>
                        <?=$this->Form->input('customer_id',array("hidden"=>true,"label"=>false,"value"=>0,"type"=>"text","id"=>"customer_id")); ?>
                        <p style="overflow:hidden"><button type="button" class="float-right grey" onclick="openSearchClient()">Buscar Cliente</button></p>
                        
                        <div class="columns">
     
                            <!-- Left column -->
                            <div class="colx2-left">
                            	<p class="inline-small-label">
                                    <label >ID:</label>
                                    <input type="text" disabled="disabled" id="idC">
                                </p>
                               <p class="inline-small-label">
                                    <label >Nombre:</label>
                                    <input type="text" disabled="disabled" id="nameC">
                                </p>
                            </div>
                             
                            <!-- Right column -->
                            <div class="colx2-left">
                                <p class="inline-small-label">
                                    <label >RFC:</label>
                                    <input type="text" disabled="disabled" id="rfcC">
                                </p>
                                <p class="inline-small-label">
                                    <label >Telefono:</label>
                                    <input type="text" disabled="disabled" id="phoneC">
                                </p>
                            </div>
                             
                        </div>
                    </fieldset>

                    <fieldset>

                        <legend>Productos</legend>
                        <p style="overflow:hidden"><button type="button" class="float-right grey"  onclick="openSearchProducts()">Buscar Productos</button></p>
                         

                    	
                    
                    <!-- Add the class 'table' -->
                    <table class="table" cellspacing="0" width="100%">
                     

                        <thead>
                            <tr>
                                <!-- This is a special cell for loading statuses - see below for more -->
                                <th class="black-cell"><span class="loading"></span></th>

                                <th scope="col">Id</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripci&oacute;n</th>
                                <th scope="col">Categor&iacute;a</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Almacen</th>
                                
                               <!-- <th scope="col">Unidad</th>-->
                                <th scope="col">Cantidad</th>
                                <th scope="col">Descto %</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="table-actions">Acciones</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="11"><img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> 
                                </td>
                                <td></td>
                            </tr>

                        </tfoot>
                        <tbody id="rows-formulario-productos">

                          
                             

                        </tbody>
                    </table>
                    </fieldset>    
                    
                </div>
                
                <!-- Right column -->
                <div class="colx3-right">
                    <div class="sells form">
                        <fieldset>
                        <legend>Usuario</legend>
                        <label ><?=$name_user?></label>
                        <?php
                            //echo $this->Form->input('user_id',array("value"=>1));
                            //echo $this->Form->input('users_id');
							// echo $name_user 
                            
                            
                        ?>
                        
                        
                        <!-- Add the class 'table' -->
                      
                        </fieldset>
                    
                    
                        <fieldset>
                            <legend>Desglose</legend>
                            <p><?=$this->Form->input('subtotal', array("type"=>"text")); ?></p>
                            <!--<p><?php //echo$this->Form->input('descuento_sell', array("type"=>"text","label"=>"Descuento %")); ?></p>-->
                            <p><?=$this->Form->input('iva', array("type"=>"text")); ?></p>
                            <p><?=$this->Form->input('total', array("type"=>"text")); ?></p>                            
                             <input type="submit" value="Aceptar" class="big-button">
                        </fieldset>
                       
                    </div>
                </div>
                <?php //echo $this->Form->end(__('Submit')); ?>
               <?php echo $this->Form->end(); ?>
            </div>
            </div>
            
		</div>
	</div>
    
    <div id="productos-modal" class="no-modal">
    <div style="position:relative;margin:0 auto;width:1100px;top:200px">
        <div class="block-border">
            <div class="block-content">
                <h1>Buscar Productos</h1>
                
        <?php echo $this->Form->create('Product', array("action"=>"searchJSON"))?>
            
                <fieldset>
                        
               <p> <?php
                        echo $this->Form->input('busqueda');
                ?></p>
                </fieldset>
                <p></p>
                <p></p>
                <fieldset class="grey-bg no-margin">
                	<?php //echo $this->Form->end(__('Submit')); ?>	
                        <?php echo $this->Form->end(); ?>	
                </fieldset>
                <div style="height:300px;overflow:auto">
                    <table class="table" cellspacing="0" width="100%" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <!-- This is a special cell for loading statuses - see below for more -->
                                <th class="black-cell"><span class="loading"></span></th>

                                <th scope="col">Id</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripci&oacute;n</th>
                                <th scope="col">Categor&iacute;a</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Almacen</th>
                                
                                <!--<th scope="col">Unidad</th>-->
                                <th scope="col">Cantidad</th>
                                <th scope="col">Descto %</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="table-actions">Acciones</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="11"><img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> 
                                </td>
                                <td><!--<a href="#" class="button"><?=$this->Html->image("icons/fugue/cross-circle.png")?> delete all</a>--></td>
                            </tr>
                        </tfoot>
                        <tbody id="rows-productos">
                        </tbody>
                    </table>
                  </div>
                <div class="block-footer align-right">
                    <button type="button" onclick="document.getElementById('productos-modal').className = 'no-modal';">Close</button>
                </div>
            </div>
        </div>		
      </div>  
    </div>
    
    
    <div id="client-modal" class="no-modal">
        <div style="position:relative;margin:0 auto;width:1100px;top:50px">
            <div class="block-border">
                <div class="block-content">
                    <h1>Buscar Cliente</h1>
                    <?php echo $this->Form->create('Customer', array("action"=>"searchJSON"))?>
            
                    
                    <p><?php
                            echo $this->Form->input('busqueda');
                    ?></p>
                    </fieldset>
                    <fieldset class="grey-bg no-margin">
                            <?php //echo $this->Form->end(__('Submit')); ?>	
                    </fieldset>
                    <div style="height:300px;overflow:auto">
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <!-- This is a special cell for loading statuses - see below for more -->
                                <th class="black-cell"><span class="loading"></span></th>

                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">RFC</th>
                                <th scope="col">Telefono</th>
                                <th scope="col" class="table-actions">Acciones</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="5"><img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> 
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                        <tbody id="rows-clients">
                        </tbody>
                    </table>
                    </div>
                    <div class="block-footer align-right">
                   		<button type="button" onclick="document.getElementById('client-modal').className = 'no-modal';">Close</button>
                    </div>
                </div>
            </div>		
        </div>  
    </div>
</article>