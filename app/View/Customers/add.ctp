<script>
document.getElementById("id_customer").className = "customer current";
</script>
<style>
div input, div select, div .textarea{
	margin-bottom:10px
	}

</style>
	<article class="container_12">
		<!--<section class="grid_4">
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
		</section>-->
			<div class="block-border">
				
				    
				<?php echo $this->Form->create('Customer',array('class'=>"block-content form")); ?>
				<h1>Nuevo Cliente</h1>
					
					<?php
						echo $this->Form->input('nombre',array("type"=>"text"));
						echo $this->Form->input('direccion',array("type"=>"textarea"));
						echo $this->Form->input('telefono');
						echo $this->Form->input('rfc');
						echo $this->Form->input('ciudad');
                                                echo $this->Form->input('estado');
                                                echo $this->Form->input('codigo_postal', array("type"=>"text"));
					?>
					<fieldset class="grey-bg no-margin">
						<?php echo $this->Form->end(__('Submit')); ?>	
					</fieldset>
				
				
			</div>
	</article>
