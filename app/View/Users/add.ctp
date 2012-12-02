
	<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Nuevo Usuario</h1>
            
            <div class="users form">
			<?php echo $this->Form->create('User'); ?>
                <fieldset>
                <?php
                    echo $this->Form->input('username');
                    echo $this->Form->input('pass');
                    echo $this->Form->input('nombre');
                    echo $this->Form->input('status');
                    echo $this->Form->input('email');
                ?>
                </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            </div>
            
        </div>
	</div>
    
    
</article>
<!-- End content -->
