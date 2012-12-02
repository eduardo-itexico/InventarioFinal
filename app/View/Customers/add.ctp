
	<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Nuevo Usuario</h1>
            <div class="customers form">
            <?php echo $this->Form->create('Customer'); ?>
                <fieldset>
                <?php
                    echo $this->Form->input('nombre');
                    echo $this->Form->input('direccion');
                    echo $this->Form->input('telefono');
                    echo $this->Form->input('rfc');
                    echo $this->Form->input('ciudad');
                ?>
                </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
			</div>

		</div>
	</div>
    
    
</article>
<!-- End content -->