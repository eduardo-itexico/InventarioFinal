

<!-- Always visible control bar -->
	<div id="control-bar" class="grey-bg clearfix"><div class="container_12">
	
		<div class="float-left">
			<button type="button"><?=$this->Html->image("icons/fugue/navigation-180.png");?><!--<img src="images/icons/fugue/navigation-180.png" width="16" height="16">--> Back to list</button>
		</div>
		
		<div class="float-right"> 
			<button type="button" disabled="disabled">Disabled</button>
			<button type="button" class="red">Cancel</button> 
			<button type="button" class="grey">Reset</button> 
			<button type="button"><?=$this->Html->image("icons/fugue/tick-circle.png");?><!--<img src="images/icons/fugue/tick-circle.png" width="16" height="16">--> Save</button>
		</div>
			
	</div></div>
	<!-- End control bar -->
	
	<!-- Content -->
	<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Ventas</h1>
            
            <div class="paging">
			<?php
                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
            ?>
            </div>
            <!-- Add the class 'table' -->
            <table class="table" cellspacing="0" width="100%">
             
                <thead >
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
                        <th scope="col"><?php echo $this->Paginator->sort('subtotal'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('iva'); ?></th>
                        <th scope="col">
                            <span class="column-sort">
                                <a href="#" title="Sort up" class="sort-up"></a>
                                <a href="#" title="Sort down" class="sort-down"></a>
                            </span>
                            <?php echo $this->Paginator->sort('total'); ?>
                        </th>
                        <th scope="col"><?php echo $this->Paginator->sort('customers_id'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('users_id'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('date'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('facturado'); ?></th>
                        <th scope="col" class="table-actions">Actions</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <td colspan="9"><?=$this->Html->image("icons/fugue/arrow-curve-000-left.png",array("class"=>"picto"))?> <?php
                echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                ));
                ?></td>
                        <td><a href="#" class="button"><?=$this->Html->image("icons/fugue/cross-circle.png")?> delete all</a></td>
                    </tr>
                </tfoot>
                 
                <tbody>
                 <?php
                    foreach ($sells as $sell): ?>
                    <tr>
					
                        <th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
                        <td><?php echo h($sell['Sell']['id']); ?>&nbsp;</td>
                        <td><?php echo h($sell['Sell']['subtotal']); ?>&nbsp;</td>
                        <td><?php echo h($sell['Sell']['iva']); ?>&nbsp;</td>
                        <td><?php echo h($sell['Sell']['total']); ?>&nbsp;</td>
                        <td>
                            <?php echo ($sell["Customer"]["nombre"])?>
                        </td>
                        <td>
                            <?php //echo h($sell['Users']['id']); ?>
                        </td>
                        <td><?php echo h($sell['Sell']['date']); ?>&nbsp;</td>
                        <td><?php echo h($sell['Sell']['facturado']); ?>&nbsp;</td>
                        <!-- The class table-actions is designed for action icons -->
                        <td class="table-actions">
                        <?php echo $this->Html->link("View", array('action' => 'view', $sell['Sell']['id']),array("class"=>"with-tip")); ?>
                            <?php echo $this->Html->link($this->Html->image("icons/fugue/pencil.png"), array('action' => 'edit', $sell['Sell']['id']),array("class"=>"with-tip")); ?>
                            <?php echo $this->Form->postLink($this->Html->image("icons/fugue/cross-circle.png"), array('action' => 'delete', $sell['Sell']['id']),array("class"=>"with-tip"), __('Are you sure you want to delete # %s?', $sell['Sell']['id'])); ?>
                            
                        </td>
            
                    </tr>
                <?php endforeach; ?>
            
                </tbody>
             
            </table>
            
        </div>
    </div>
		
		
	</article>
	<!-- End content -->