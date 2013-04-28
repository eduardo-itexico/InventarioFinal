<script>
document.getElementById("id_home").className = "home current";
</script>
<!-- Content -->
	<article class="container_12">
    
    <div class="block-border">
        <div class="block-content">
            <h1>Ventas</h1>
            
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
            
        	 <?php echo $this->Form->create('Unity', array("id"=>"simple-list-form",'class'=>"form","action"=>"")); ?>
                    
                
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
            <!-- Add the class 'table' -->
            <table class="table" cellspacing="0" width="100%">
             
                <thead >
                    <tr>
                        <!-- This is a special cell for loading statuses - see below for more -->
                        <th class="black-cell"><span class="loading"></span></th>
                         
                        <th scope="col">
                         
                            <!-- Table sorting arrows -->
                            <span class="column-sort">
                                <?php echo $this->Paginator->sort('id','<span>',array('sort'=>'id','direction' => 'asc',
	                															"escape"=>false,
	                															"class"=> 
	                															($this->Paginator->sortDir() == "asc" && 
	                															 $this->Paginator->sortKey() == 'id' ? "active " : "") . "sort-up" ))?>
						<?php echo $this->Paginator->sort('id','<span>',array('sort'=>'id','direction' => 'desc',
	                															"escape"=>false,
																				"class"=>
																				($this->Paginator->sortDir() == "desc"&&
																				$this->Paginator->sortKey() == 'id' ? "active " : "") . "sort-down" ))?>
                            </span>
                             
                            <?php echo "ID" ?>
                        </th>
                        <th scope="col"><?php echo "Sub-Total";//$this->Paginator->sort('subtotal'); ?></th>
                        <th scope="col"><?php echo "IVA";//$this->Paginator->sort('iva'); ?></th>
                        <th scope="col">
                            <span class="column-sort">
                                <?php echo $this->Paginator->sort('total','<span>',array('sort'=>'total','direction' => 'asc',
	                															"escape"=>false,
	                															"class"=> 
	                															($this->Paginator->sortDir() == "asc" && 
	                															 $this->Paginator->sortKey() == 'total' ? "active " : "") . "sort-up" ))?>
						<?php echo $this->Paginator->sort('total','<span>',array('sort'=>'total','direction' => 'desc',
	                															"escape"=>false,
																				"class"=>
																				($this->Paginator->sortDir() == "desc"&&
																				$this->Paginator->sortKey() == 'total' ? "active " : "") . "sort-down" ))?>
                            </span>
                            <?php echo "Total";//$this->Paginator->sort('total'); ?>
                        </th>
                        <th scope="col">
	
						<?php echo "Cliente";//$this->Paginator->sort('customers_id'); ?>
                        </th>
                        <th scope="col"><?php echo "Usuario";//$this->Paginator->sort('users_id'); ?></th>
                        <th scope="col">
                         <span class="column-sort">
                                <?php echo $this->Paginator->sort('date','<span>',array('sort'=>'date','direction' => 'asc',
	                															"escape"=>false,
	                															"class"=> 
	                															($this->Paginator->sortDir() == "asc" && 
	                															 $this->Paginator->sortKey() == 'date' ? "active " : "") . "sort-up" ))?>
						<?php echo $this->Paginator->sort('date','<span>',array('sort'=>'date','direction' => 'desc',
	                															"escape"=>false,
																				"class"=>
																				($this->Paginator->sortDir() == "desc"&&
																				$this->Paginator->sortKey() == 'date' ? "active " : "") . "sort-down" ))?>
                            </span>
							<?php echo "Fecha";//$this->Paginator->sort('date'); ?>
                        </th>
                        <th scope="col"><?php echo "Facturado";//$this->Paginator->sort('facturado'); ?></th>
                        <th scope="col" class="table-actions">Acciones</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <td colspan="9"><?=$this->Html->image("icons/fugue/arrow-curve-000-left.png",array("class"=>"picto"))?> <?php
                echo $this->Paginator->counter(array(
                'format' => __('Pagina {:page} de {:pages}, mostrando {:current} ventas de {:count} en total')
                ));
                ?></td>
                        <td><!--<a href="#" class="button"><?=$this->Html->image("icons/fugue/cross-circle.png")?> delete all</a>--></td>
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
                            <?php echo ($sell["User"]["nombre"])?>
                        </td>
                        <td><?php echo h($sell['Sell']['date']); ?>&nbsp;</td>
                        <td><?php echo h($sell['Sell']['facturado']); ?>&nbsp;</td>
                        <!-- The class table-actions is designed for action icons -->
                        <td class="table-actions">
                        <?php //echo $this->Html->link("View", array('action' => 'view', $sell['Sell']['id']),array("class"=>"with-tip")); ?>
                            <?php //echo $this->Html->link($this->Html->image("icons/fugue/pencil.png"), array('action' => 'edit', $sell['Sell']['id']),array("class"=>"with-tip")); ?>
                            <?php //echo $this->Form->postLink($this->Html->image("icons/fugue/cross-circle.png"), array('action' => 'delete', $sell['Sell']['id']),array("class"=>"with-tip"), __('Are you sure you want to delete # %s?', $sell['Sell']['id'])); ?>
							
							<!--<a href="#" title="Edit" class="with-tip"><?=$this->Html->image("icons/fugue/pencil.png")?></a>-->
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