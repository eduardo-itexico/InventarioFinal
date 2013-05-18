<script>
document.getElementById("id_users").className = "users current";
</script>
	<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Nuevo Usuario</h1>
            
            <div class="users form">
			<?php echo $this->Form->create('User'); ?>
                <fieldset>
                <?php
				?><label>Usuario</label><?PHP
                    echo $this->Form->input('username',array("label"=>false));
					?><label>Contraseña</label><?PHP
                    echo $this->Form->input('pass',array("label"=>false));
					?><label>Nombre</label><?PHP
                    echo $this->Form->input('nombre',array("label"=>false));
                    //echo $this->Form->input('status');
					?><label>Correo</label><?PHP
                    echo $this->Form->input('email',array("type"=>"text","label"=>false));
                ?>
                </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            </div>
            
        </div>
	</div>
    
    
</article>
<!-- End content -->
