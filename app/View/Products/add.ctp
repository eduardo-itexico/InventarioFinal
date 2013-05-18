<script>
document.getElementById("id_products").className = "products current";
</script>
<style>
div input, div select{
	margin-bottom:10px
	}
div .number label {
	color:#FFF
	}
</style>
<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Nuevo Producto</h1>
            <div class="products form">
            <?php echo $this->Form->create('Product', array('enctype' => 'multipart/form-data')); ?>
                <fieldset>
                <?php
                    echo $this->Form->input('nombre');
                    echo $this->Form->input('descripcion',array("type"=>"text"));
					?><label>Categoria</label><?PHP
                    echo $this->Form->input('category_id',array("label"=>false));
					?><label>Precio</label><?PHP
                    echo $this->Form->input('precio',array("label"=>false));
					?><label>Imagen</label><?PHP
                    echo $this->Form->input('imagen',array('type'=>'file',"label"=>false));
                    echo $this->Form->input('imagen_dir',array('type'=>'hidden'));
					?><label>Unidad</label><?PHP
                    echo $this->Form->input('unity_id',array("label"=>false));
                    echo $this->Form->input('Stock.minimo');
                    echo $this->Form->input('Stock.maximo');
                    echo $this->Form->input('Stock.actual');
                    //echo $this->Form->input('Order');
                    //echo $this->Form->input('Sell');
                ?>
                </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            </div>

		</div>
	</div>
    
    
</article>
<!-- End content -->