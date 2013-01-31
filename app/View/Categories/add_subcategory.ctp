<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Nueva Categoria</h1>
            <div class="categories form">
            <?php echo $this->Form->create('Category'); ?>
                <fieldset>
                <?php
					echo $this->Form->input('Category.ParentCategory.category_id');
                    echo $this->Form->input('name');
                    //echo $this->Form->input('status');
                   
                ?>
                </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            </div>

		</div>
	</div>
    
    
</article>
<!-- End content -->