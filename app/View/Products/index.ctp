
	
<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Productos</h1>
            <div class="block-controls">
	            <ul class="controls-buttons">
                
                <li class="sep"></li>
	            <li>
	            <?php echo $this->Paginator->prev($this->Html->image("icons/fugue/navigation-180.png"), array("escape"=>false), null, array("escape"=>false));?>
	            </li>
	            
	            <?php echo $this->Paginator->numbers(array("tag"=>"li","separator"=>""))?>
	            
	            <li>
				<?php echo $this->Paginator->next($this->Html->image("icons/fugue/navigation.png"), array("escape"=>false), null, array("escape"=>false));?>
				</li>
	            </ul>
	        </div>
            <?php echo $this->Form->create('Product', array("id"=>"simple-list-form",'class'=>"form","action"=>"")); ?>
                    
                
                <div class="columns">
                    <div class="colx3-left-double">
                        <label for="field16">Buscar</label>
                        <p class="input-type-text">
                            <input id="simple-search" type="text" title="Filter results" style="width:90%" value="" name="simple-search" >
                            <?php echo $this->Html->image("icons/fugue/magnifier.png");
                            ?>
                        </p>
              
                    </div>
                    <div class="colx3-right">
                    	<?php echo $this->Form->end(__('Submit'), array("margin"=>"30px")); ?>
                    </div>
                </div>
                <p></p>
    		
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
                    <th scope="col"><?php echo $this->Paginator->sort('descripcion'); ?></th>
                    <th scope="col">
                        <span class="column-sort">
                            <a href="#" title="Sort up" class="sort-up"></a>
                            <a href="#" title="Sort down" class="sort-down"></a>
                        </span>
                        <?php echo $this->Paginator->sort('categories_id'); ?>
                    </th>
                    <th scope="col">
                        <span class="column-sort">
                            <a href="#" title="Sort up" class="sort-up"></a>
                            <a href="#" title="Sort down" class="sort-down"></a>
                        </span>
                        <?php echo $this->Paginator->sort('precio'); ?>
                    </th>
                    <th scope="col">
                        Stock Actual
                    </th>
                    <th scope="col"><?php echo $this->Paginator->sort('imagen'); ?></th>
                    <th scope="col"><?php echo $this->Paginator->sort('unities_id'); ?></th>
                    <th scope="col" class="table-actions">Actions</th>
                </tr>
            </thead>
         
            <tfoot>
                <tr>
                    <td colspan="8"><img src="images/icons/fugue/arrow-curve-000-left.png" width="16" height="16" class="picto"> <?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?></td>
                    <td><a href="#" class="button"><?=$this->Html->image("icons/fugue/cross-circle.png")?> delete all</a></td>
                </tr>
            </tfoot>
             
            <tbody>
                 <?php
					foreach ($products as $product): ?>
					<tr>
						<th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
						<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
						<td><?php echo h($product['Product']['nombre']); ?>&nbsp;</td>
						<td><?php echo h($product['Product']['descripcion']); ?>&nbsp;</td>
						<td>
							<?php echo ($product["Category"]["name"])?>
						</td>
						<td><?php echo h($product['Product']['precio']); ?>&nbsp;</td>
						<td><?php echo h($product['Stock']['actual']); ?>&nbsp;</td>
						<td><?php echo h($product['Product']['imagen']); ?>&nbsp;</td>
						<td>
							<?php echo ($product["Unity"]["name"])?>
						</td>
                            <!-- The class table-actions is designed for action icons -->
                        <td class="table-actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
							<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
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