<article class="container_12">
	<section class="grid_4">
	<div class="block-border">
            <div class="block-content">
                <h1><?php echo __('Acciones'); ?></h1>
                <h3><?php echo __('Clientes'); ?></h3>
                <ul class="shortcuts-list">
                        <li>
                                <?php echo $this->Html->link($this->Html->image("icons/web-app/48/Add.png") ."Agregar", 
                                                                                         array('action' => 'add'),
                                                                                         array("escape"=>false)); ?>

                        </li>
                </ul>
		
            </div>
	</div>
	</section>
<section class="grid_8">
	<div class="block-border">
	
	    <div class="block-content no-padding">
	        <h1>Proveedores</h1>
	             
	        <div class="block-controls">
	            <ul class="controls-buttons">
	            <li>
	            <?php echo $this->Paginator->prev($this->Html->image("icons/fugue/navigation-180.png"), array("escape"=>false), null, array("escape"=>false));?>
	            </li>
	            
	            <?php echo $this->Paginator->numbers(array("tag"=>"li","separator"=>""))?>
	            
	            <li>
				<?php echo $this->Paginator->next($this->Html->image("icons/fugue/navigation.png"), array("escape"=>false), null, array("escape"=>false));?>
				</li>
	            </ul>
	        </div>
	    </div>
		<table cellpadding="0" cellspacing="0" class="table" width="100%">
		 <tr>
	            <!-- This is a special cell for loading statuses - see below for more -->
	            <th class="black-cell"><span class="loading"></span></th>
	             <?php 
	             		$fields = array( array("field"=>'id',
	             							   "print"=>"Id"),
	             						 array("field"=>'nombre',
	             								"print"=>"Nombre"),
	             						 array("field"=>'direccion',
	             								"print"=>"Direcci&oacute;n"),
	             						array("field"=>'telefono',
	             								"print"=>"Tel&eacute;fono"),
	             						array("field"=>'rfc',
	             								"print"=>"RFC"),
	             						array("field"=>'ciudad',
	             								"print"=>"Ciudad")             						 
	             						);
	             		foreach ($fields as $field):
	             	
	             ?>
	            <th scope="col">
	             
	                <!-- Table sorting arrows -->
	                <span class="column-sort">
	                	
	                	<?php echo $this->Paginator->sort($field["field"],'<span>',array('sort'=>$field["field"],'direction' => 'asc',
	                															"escape"=>false,
	                															"class"=> 
	                															($this->Paginator->sortDir() == "asc" && 
	                															 $this->Paginator->sortKey() == $field["field"] ? "active " : "") . "sort-up" ))?>
						<?php echo $this->Paginator->sort($field["field"],'<span>',array('sort'=>$field["field"],'direction' => 'desc',
	                															"escape"=>false,
																				"class"=>
																				($this->Paginator->sortDir() == "desc"&&
																				$this->Paginator->sortKey() == $field["field"] ? "active " : "") . "sort-down" ))?>
	                </span>
	                <?php echo $field["print"] ?>
	            </th>
	            <?php endforeach; ?>
	
	            
	            <th scope="col" class="table-actions">Actions</th>
	        </tr>
	    </thead>
	    
	     <tfoot>
	        <tr>
	            <td colspan="7"><?= $this->Html->image("icons/fugue/arrow-curve-000-left.png", array("class"=>"picto"))?><b>Total:</b> <?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages} ')
		));
		?></td>
	            <td><a href="#" class="button"><?= $this->Html->image("icons/fugue/cross-circle.png")?> delete all</a></td>
	        </tr>
	    </tfoot>
	    <tbody>
		<?php
		foreach ($customers as $customer): ?>
		
		<tr>
		 	<th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
			<td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
			<td><?php echo h($customer['Customer']['nombre']); ?>&nbsp;</td>
			<td><?php echo h($customer['Customer']['direccion']); ?>&nbsp;</td>
			<td><?php echo h($customer['Customer']['telefono']); ?>&nbsp;</td>
			<td><?php echo h($customer['Customer']['rfc']); ?>&nbsp;</td>
			<td><?php echo h($customer['Customer']['ciudad']); ?>&nbsp;</td>
			<td class="table-actions">
				<?php echo $this->Html->link(	$this->Html->image("icons/fugue/pencil.png"), 
												array('action' => 'edit',$customer['Customer']['id']),
						 						array('escape' => false)); ?>
				<?php echo $this->Html->link(	$this->Html->image("icons/fugue/cross-circle.png"), 
												array('action' => 'delete',$customer['Customer']['id']),
						 						array('escape' => false)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</section>
</article>

<!-- End content -->