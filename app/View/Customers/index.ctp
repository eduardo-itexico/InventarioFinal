
	<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Clientes</h1>
            <?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
            <table class="table" cellspacing="0" width="100%">
 
            <thead>
                <tr>
                    <!-- This is a special cell for loading statuses - see below for more -->
                    <th class="black-cell"><span class="loading"></span></th>
                     
                    <th scope="col">
                     
                        <!-- Table sorting arrows -->
                        <span class="column-sort">
                            <a href="#" title="Sort up" class="sort-up active"></a>
                            <a href="#" title="Sort down" class="sort-down"></a>
                        </span>
                         
                        <?php echo $this->Paginator->sort('id'); ?>
                    </th>
                    <th scope="col"><?php echo $this->Paginator->sort('nombre'); ?></th>
                    <th scope="col"><?php echo $this->Paginator->sort('direccion'); ?></th>
                    <th scope="col">
                        <span class="column-sort">
                            <a href="#" title="Sort up" class="sort-up"></a>
                            <a href="#" title="Sort down" class="sort-down"></a>
                        </span>
                        <?php echo $this->Paginator->sort('telefono'); ?>
                    </th>
                    <th scope="col">
                        <span class="column-sort">
                            <a href="#" title="Sort up" class="sort-up"></a>
                            <a href="#" title="Sort down" class="sort-down"></a>
                        </span>
                        <?php echo $this->Paginator->sort('rfc'); ?>
                    </th>
                    <th scope="col"><?php echo $this->Paginator->sort('ciudad'); ?></th>
                    <th scope="col" class="table-actions">Actions</th>
                </tr>
            </thead>
         
            <tfoot>
                <tr>
                    <td colspan="7"><img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> <?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?></td>
                    <td><a href="#" class="button"><?=$this->Html->image("icons/fugue/cross-circle.png")?> delete all</a></td>
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
                    <!-- The class table-actions is designed for action icons -->
                    <td class="table-actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['id'])); ?>
						<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $customer['Customer']['id'])); ?>
						<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?>
                        <a href="#" title="Edit" class="with-tip"><?=$this->Html->image("icons/fugue/pencil.png")?></a>
                        <a href="#" title="Delete" class="with-tip"><?=$this->Html->image("icons/fugue/cross-circle.png")?></a>
                    </td>
	
				</tr>
			<?php endforeach; ?>
               
            </tbody>
         
        </table>
            
        </div>
	</div>
    
    
</article>
<!-- End content -->