<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Nuevo Producto</h1>
            <div class="products form">
            <?php echo $this->Form->create('Product'); ?>
                <fieldset>
                <?php
                    echo $this->Form->input('nombre');
                    echo $this->Form->input('descripcion');
                    echo $this->Form->input('categories_id');
                    echo $this->Form->input('precio');
                    echo $this->Form->input('imagen');
                    echo $this->Form->input('unities_id');
                    echo $this->Form->input('Order');
                    echo $this->Form->input('Sell');
                ?>
                </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            </div>

		</div>
	</div>
    
    
</article>
<!-- End content -->