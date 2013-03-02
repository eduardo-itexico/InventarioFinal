
	<article class="container_12">
		<section class="grid_4">
			<div class="block-border">
				<div class="block-content">
					<h1><?php echo __('Acciones'); ?></h1>
					<h3><?php echo __('Cliente'); ?></h3>
					<ul class="shortcuts-list">
						<li>
							<?php echo $this->Html->link($this->Html->image("icons/web-app/48/Modify.png") ."Listado", 
														 array('action' => 'index'),
														 array("escape"=>false)); ?>
							
						</li>
					</ul>
				</div>
				</div>
		</section>
		<section class="grid_8">
			<div class="block-border">
				
				    
				<?php echo $this->Form->create('Customer',array('class'=>"block-content form")); ?>
				<h1>Nuevo cliente</h1>
					<fieldset>
						<legend><?php echo __('Clientes'); ?></legend>
					<?php
						echo $this->Form->input('nombre',array("type"=>"textarea"));
						echo $this->Form->input('direccion',array("type"=>"textarea"));
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
