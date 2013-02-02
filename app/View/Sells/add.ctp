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
                    <?php
                        
                        echo $this->Form->input('users_id');
                        
                        echo $this->Form->input('Product');
                    ?>
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