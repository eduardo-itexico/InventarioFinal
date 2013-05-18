    <?=$this->Html->css('development-bundle/themes/base/jquery.ui.all.css');?>
    <?=$this->Html->script('development-bundle/ui/jquery.ui.core.js');?>
    <?=$this->Html->script('development-bundle/ui/jquery.ui.datepicker.js');?>
    
    <script>
	var tipo = 1;
	function manda(){
		if(document.getElementById('datepicker').value == "" || document.getElementById('datepicker2').value == "")
			alert("Favor de verificar las fechas.");
		else{
			if(document.getElementById('chckbx_customer').checked){
				var tempCustomer_id = document.getElementById('customer_id').value;
			}else{
				var tempCustomer_id = 0;
			}
			
			switch(tipo){
					case 1:
						window.open("http://localhost:8888/Reports/Ventas_detail.php?ini="+document.getElementById('datepicker').value+"&fin="+document.getElementById('datepicker2').value+"&c_id="+tempCustomer_id);
					break;
					case 2:
						window.open("http://localhost:8888/Reports/Ventas_general_sem.php?ini="+document.getElementById('datepicker').value+"&fin="+document.getElementById('datepicker2').value+"&c_id="+tempCustomer_id);
					break;
					case 3:
						window.open("http://localhost:8888/Reports/Ventas_general_mes.php?ini="+document.getElementById('datepicker').value+"&fin="+document.getElementById('datepicker2').value+"&c_id="+tempCustomer_id);
					break;
					case 4:
						window.open("http://localhost:8888/Reports/Ventas_general_year.php?ini="+document.getElementById('datepicker').value+"&fin="+document.getElementById('datepicker2').value+"&c_id="+tempCustomer_id);
					break;
				}
		}
	}
	</script>
	<script>
document.getElementById("id_stats").className = "stats current";
</script>
	<!-- Content -->
<article class="container_12">
    
    <div class="block-border">
        <div class="block-content align-center">
            <h1>Reportes</h1>
            <form class="form">
			
                <p class="input-height grey-bg">
                		<input type="radio" name="field17" id="format" value="yy-mm-dd" checked="checked" onClick="tipo = 1;"> <label for="field17-1"> Imprimir por dia </label>
                        <input type="radio" name="field17" id="format2" value="yy-mm" onClick="tipo = 2;"> <label for="field17-1"> Imprimir por semana </label>
                        <input type="radio" name="field17" id="format3" value="yy-mm" onClick="tipo = 3;"> <label for="field17-0"> Imprimir por mes </label>
                        <input type="radio" name="field17" id="format4" value="yy" onClick="tipo = 4;"> <label for="field17-0"> Imprimir por año </label>
                    </p>
                   
                        <script>
                        $(function() {
                            $( "#datepicker" ).datepicker({
                                changeMonth: true,
                                changeYear: true
                            });
                            $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
							
							$( "#datepicker2" ).datepicker({
                                changeMonth: true,
                                changeYear: true
                            });
                            $( "#datepicker2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
                            
                            $( "#format" ).change(function() {
                                $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
								$( "#datepicker2" ).datepicker( "option", "dateFormat", $( this ).val() );
                            });
                            
                            $( "#format2" ).change(function() {
                                $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
								$( "#datepicker2" ).datepicker( "option", "dateFormat", $( this ).val() );
                            });
							
							$( "#format3" ).change(function() {
                                $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
								$( "#datepicker2" ).datepicker( "option", "dateFormat", $( this ).val() );
                            });
							
							$( "#format4" ).change(function() {
                                $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
								$( "#datepicker2" ).datepicker( "option", "dateFormat", $( this ).val() );
                            });
                        });

                                    
                              
                         
                                    
                       </script>
                        <div class="columns">
     
                            <!-- Left column -->
                            <div class="colx2-left">
                            	<p class="float-right">

                                     <span class="input-type-text" style="height:15px; margin-top:-5px; margin-bottom:-2px;margin-right:20px">
                                    <input name="datepicker" type="text" id="datepicker"  size="10" >
                                    <a><?=$this->Html->image("icons/fugue/calendar-month.png")?></a>                 
                                     </span>
                                    
                                </p>
                           		 <label class="float-right" for="field13" style="margin-right:30px">Inicio</label>
                                
                            </div>
                             
                            <!-- Right column -->
                            <div class="colx2-left">
                            	<label class="float-left" for="field13" style="margin-right:30px;margin-left:20px">Fin</label>
                                <p class="float-left">

                                     <span class="input-type-text" style="height:15px; margin-top:-5px; margin-bottom:-2px">
                                    <input name="datepicker2" type="text" id="datepicker2"  size="10" >
                                    <a><?=$this->Html->image("icons/fugue/calendar-month.png")?></a>                 
                                     </span>
                                    
                                </p>
                                
                            </div>
                             
						</div>
						<p>
							<div style="width: 140px; overflow: hidden; display: inline-block;">
								<label class="float-right" for="field18">Filtrar por Cliente</label>
								<input class="float-left" type="checkbox" id="chckbx_customer"/>
							</div>
						</p>
                        <?php echo $this->Form->input('customer_id',array("value"=>1,"label"=>false)); ?>
                        <br/>
						<br/>
                    
                    <button id="btn_imprimir" type="button" onClick="manda();"> Imprimir</button>


                
          </form>          
        </div>
	</div>
    
    
</article>
<!-- End content -->