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
</script>
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Ventas</h1>
            <div class="sells form">
            <div class="columns">
     			
                <!-- Left column -->
                <?php echo $this->Form->create('Sell'); ?>
                <div class="colx3-left-double">
                    <fieldset>
                        <legend>Factura</legend>
                        <p><?=$this->Form->input('facturado'); ?></p>
                        <p><?=$this->Form->input('date'); ?></p>
    				</fieldset>
                    <fieldset>
                        <legend>Cliente</legend>
                        <p><?=$this->Form->input('customers_id',array("hidden"=>true,"label"=>false)); ?></p>
                        <button type="button" class="modal-link">Buscar Cliente</button>
                    </fieldset>
                    <fieldset>
                        <legend>Usuario</legend>
                        <?php
                        
                        echo $this->Form->input('users_id');
                        
                        
                    ?>
                    </fieldset>
                    <fieldset>

                        <legend>Productos</legend>
                        <button type="button" class="modal-link"  onclick="openSearchProducts()">Agregar</button>
                         <table class="table" cellspacing="0" width="100%">

                    	
                    
                    <!-- Add the class 'table' -->
                    <table class="table" cellspacing="0" width="100%">
                     

                        <thead>
                            <tr>
                                <!-- This is a special cell for loading statuses - see below for more -->
                                <th class="black-cell"><span class="loading"></span></th>

                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripci&oacute;n</th>
                                <th scope="col">Categor&iacute;a</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Unidad</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="table-actions">Actions</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="10"><img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> 
                                </td>
                                <td></td>
                            </tr>

                        </tfoot>
                        <tbody id="rows-formulario-productos">

                          
                             

                        </tbody>
                    </table>
                    </fieldset>    
                    <fieldset>
                    <?php
                        
                        echo $this->Form->input('users_id');
                        
                        
                    ?>
                    
                    
                    <!-- Add the class 'table' -->
                  
                    </fieldset>
                </div>
                
                <!-- Right column -->
                <div class="colx3-right">
                    <div class="sells form">
                        <fieldset>
                            <legend>Desglose</legend>
                            <p><?=$this->Form->input('subtotal', array("type"=>"text")); ?></p>
                            <BR/>
                            <p><?=$this->Form->input('iva', array("type"=>"text")); ?></p>
                            <p><?=$this->Form->input('total', array("type"=>"text")); ?></p>
                            <p><?=$this->Form->input('Product.0.id'); ?></p>
                        </fieldset>
                    </div>
                </div>
               <?php echo $this->Form->end(__('Submit')); ?>
            </div>
            </div>
            
            
    
            <div class="actions">
                <h3><?php echo __('Actions'); ?></h3>
                <ul>
            
                    <li><?php echo $this->Html->link(__('List Sells'), array('action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
                    <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                    <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
                    <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
                </ul>
            </div>
		</div>
	</div>
    
    <div id="productos-modal" class="no-modal">
    <div style="position:relative;margin:0 auto;width:1100px;top:200px">
        <div class="block-border">
            <div class="block-content">
                <h1>Block title</h1>
                
        <?php echo $this->Form->create('Product', array("action"=>"searchJSON"))?>
            
                <fieldset>
                        <legend><?php echo __('Productos'); ?></legend>
                <?php
                        echo $this->Form->input('busqueda');
                ?>
                </fieldset>
                <fieldset class="grey-bg no-margin">
                        <?php echo $this->Form->end(__('Submit')); ?>	
                </fieldset>
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <!-- This is a special cell for loading statuses - see below for more -->
                                <th class="black-cell"><span class="loading"></span></th>

                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripci&oacute;n</th>
                                <th scope="col">Categor&iacute;a</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Unidad</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="table-actions">Actions</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="8"><img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> 
                                </td>
                                <td><a href="#" class="button"><?=$this->Html->image("icons/fugue/cross-circle.png")?> delete all</a></td>
                            </tr>
                        </tfoot>
                        <tbody id="rows-productos">
                        </tbody>
                    </table>
                <div class="block-footer align-right">
                    <button type="button" onclick="document.getElementById('productos-modal').className = 'no-modal';">Close</button>
                </div>
            </div>
        </div>		
      </div>  
    </div>
</article>