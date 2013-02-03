<!-- Content -->
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
                        <p><?=$this->Form->input('customers_id'); ?></p>
    				</fieldset>
                    <fieldset>
                    	<legend>Productos</legend>
                    <?php
                        
                        echo $this->Form->input('users_id');
                        
                        echo $this->Form->input('Product');
                    ?>
                    <!-- Add the class 'table' -->
                    <table class="table" cellspacing="0" width="100%">
                     
                        <thead>
                            <tr>
                                <!-- This is a special cell for loading statuses - see below for more -->
                                <th class="black-cell"><span class="loading"></span></th>
                                 
                                <th scope="col">
                                 
                                    <!-- Table sorting arrows -->
                                    <span class="column-sort">
                                        <a href="#" title="Sort up" class="sort-up active"></a>
                                        <a href="#" title="Sort down" class="sort-down"></a>
                                    </span>
                                     
                                    Title
                                </th>
                                <th scope="col">Keywords</th>
                                <th scope="col">Preview</th>
                                <th scope="col">
                                    <span class="column-sort">
                                        <a href="#" title="Sort up" class="sort-up"></a>
                                        <a href="#" title="Sort down" class="sort-down"></a>
                                    </span>
                                    Date
                                </th>
                                <th scope="col">
                                    <span class="column-sort">
                                        <a href="#" title="Sort up" class="sort-up"></a>
                                        <a href="#" title="Sort down" class="sort-down"></a>
                                    </span>
                                    Size
                                </th>
                                <th scope="col" class="table-actions">Actions</th>
                            </tr>
                        </thead>
                     
                        <tfoot>
                            <tr>
                                <td colspan="6"><img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> <b>Total:</b> 6 records found</td>
                                <td><a href="#" class="button"><img src="images/icons/fugue/cross-circle.png" width="16" height="16"> delete all</a></td>
                            </tr>
                        </tfoot>
                         
                        <tbody>
                             
                            <tr>
                                <th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
                                <td>Lorem ipsum sit amet</td>
                                <td><ul class="keywords">
                                    <li><a href="#">Ocean</a></li>
                                    <li class="orange-keyword"><a href="#">Sun</a></li>
                                </ul></td>
                                <td><a href="#"><small><img src="images/icons/fugue/image.png" width="16" height="16" class="picto"> jpg | 12 Ko</small></a></td>
                                <td>02-05-2010</td>
                                <td>320 x 240</td>
                                 
                                <!-- The class table-actions is designed for action icons -->
                                <td class="table-actions">
                                    <a href="#" title="Edit" class="with-tip"><img src="images/icons/fugue/pencil.png" width="16" height="16"></a>
                                    <a href="#" title="Delete" class="with-tip"><img src="images/icons/fugue/cross-circle.png" width="16" height="16"></a>
                                </td>
                            </tr>
                          
                             
                        </tbody>
                     
                    </table>
                    </fieldset>
                </div>
                
                <!-- Right column -->
                <div class="colx3-right">
                    <div class="sells form">
                        <fieldset>
                            <legend>Desglose</legend>
                            <p><?=$this->Form->input('subtotal'); ?></p>
                            <BR/>
                            <p><?=$this->Form->input('iva'); ?></p>
                            <p><?=$this->Form->input('total'); ?></p>
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
</article>