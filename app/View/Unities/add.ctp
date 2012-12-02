<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Nueva Categoria</h1>
            <div class="unities form">
            <?php echo $this->Form->create('Unity'); ?>
                <fieldset>
                <?php
                    echo $this->Form->input('name');
                ?>
                </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            </div>
		</div>
	</div>
    
    
</article>
<!-- End content -->
