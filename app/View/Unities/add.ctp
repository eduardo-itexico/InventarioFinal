<script>
document.getElementById("id_products").className = "products current";
</script>
<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Nueva Unidad</h1>
            <div class="unities form">
            <?php echo $this->Form->create('Unity'); ?>
                <fieldset>
                <label>Nombre</label>
                <?php
					
                    echo $this->Form->input('name',array("label"=>false));
                ?>
                </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            </div>
		</div>
	</div>
    
    
</article>
<!-- End content -->
