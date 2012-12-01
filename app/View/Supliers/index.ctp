<div class="block-border">

    <div class="block-content no-padding">
        <h1>Proveedores</h1>
             
        <div class="block-controls">
            <ul class="controls-buttons">
                <li><a href="#" title="Previous"><img src="images/icons/fugue/navigation-180.png" width="16" height="16"> Prev</a></li>
                <li><a href="#" title="Page 1" class="current><b>1</b></a></li>
                <li><a href="#" title="Page 2""><b>2</b></a></li>
                <li><a href="#" title="Page 3"><b>3</b></a></li>
                <li><a href="#" title="Next">Next <img src="images/icons/fugue/navigation.png" width="16" height="16"></a></li>
            </ul>
        </div>
    </div>
	<table cellpadding="0" cellspacing="0" class="table" width="100%">
	 <tr>
            <!-- This is a special cell for loading statuses - see below for more -->
            <th class="black-cell"><span class="loading"></span></th>
             
            <th scope="col">
             
                <!-- Table sorting arrows -->
                <span class="column-sort">
                    <a href="#" title="Sort up" class="sort-up active"></a>
                    <a href="#" title="Sort down" class="sort-down"></a>
                </span>
                 
                Id
            </th>
            <th scope="col">
             
                <!-- Table sorting arrows -->
                <span class="column-sort">
                    <a href="#" title="Sort up" class="sort-up active"></a>
                    <a href="#" title="Sort down" class="sort-down"></a>
                </span>
                 
                Nombre
            </th>
            <th scope="col">
             
                <!-- Table sorting arrows -->
                <span class="column-sort">
                    <a href="#" title="Sort up" class="sort-up active"></a>
                    <a href="#" title="Sort down" class="sort-down"></a>
                </span>
                 
                Direci&oacute;n
            </th>
            <th scope="col">Tel&eacute;fono</th>
            <th scope="col">
             
                <!-- Table sorting arrows -->
                <span class="column-sort">
                    <a href="#" title="Sort up" class="sort-up active"></a>
                    <a href="#" title="Sort down" class="sort-down"></a>
                </span>
                 
                RFC
            </th>
           <th scope="col">
             
                <!-- Table sorting arrows -->
                <span class="column-sort">
                    <a href="#" title="Sort up" class="sort-up active"></a>
                    <a href="#" title="Sort down" class="sort-down"></a>
                </span>
                 
                Ciudad
            </th>
            
            <th scope="col" class="table-actions">Actions</th>
        </tr>
    </thead>
    
     <tfoot>
        <tr>
            <td colspan="6"><?= $this->Html->image("icons/fugue/arrow-curve-000-left.png", array("class"=>"picto"))?><b>Total:</b> <?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages} ')
	));
	?></td>
            <td><a href="#" class="button"><?= $this->Html->image("icons/fugue/cross-circle.png")?> delete all</a></td>
        </tr>
    </tfoot>
    <tbody>
	<?php
	foreach ($supliers as $suplier): ?>
	
	<tr>
	 	<th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
		<td><?php echo h($suplier['Suplier']['id']); ?>&nbsp;</td>
		<td><?php echo h($suplier['Suplier']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($suplier['Suplier']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($suplier['Suplier']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($suplier['Suplier']['rfc']); ?>&nbsp;</td>
		<td><?php echo h($suplier['Suplier']['ciudad']); ?>&nbsp;</td>
		<td class="table-actions">
			<?php echo $this->Html->link(	$this->Html->image("icons/fugue/pencil.png"), 
											array('action' => 'edit',$suplier['Suplier']['id']),
					 						array('escape' => false)); ?>
			<?php echo $this->Html->link(	$this->Html->image("icons/fugue/cross-circle.png"), 
											array('action' => 'delete',$suplier['Suplier']['id']),
					 						array('escape' => false)); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Suplier'), array('action' => 'add')); ?></li>
	</ul>
</div>
