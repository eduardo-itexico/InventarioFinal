
	<article class="container_12">
		<section class="grid_4">
			<div class="actions">
				<h3><?php echo __('Actions'); ?></h3>
				<ul>
					<li><?php echo $this->Html->link(__('List Supliers'), array('action' => 'index')); ?></li>
				</ul>
			</div>
		</section>
		<section class="grid_8">
			<div class="block-border">
				
				    
				<?php echo $this->Form->create('Suplier',array('class'=>"block-content form")); ?>
				<h1>Nuevo proveedor</h1>
					<fieldset>
						<legend><?php echo __('Proveedor'); ?></legend>
					<?php
						echo $this->Form->input('nombre');
						echo $this->Form->input('direccion');
						echo $this->Form->input('telefono');
						echo $this->Form->input('rfc');
						echo $this->Form->input('ciudad');
					?>
					</fieldset>
					<fieldset class="grey-bg no-margin">
						<?php echo $this->Form->end(__('Submit')); ?>	
					</fieldset>
				
				
			</div>
		</section>
	</article>
