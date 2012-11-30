<?php

	// Get apache version
	function apache_version()
	{
		if (function_exists('apache_get_version'))
		{
			if (preg_match('|Apache\/(\d+)\.(\d+)\.(\d+)|', apache_get_version(), $version))
			{
				return $version[1].'.'.$version[2].'.'.$version[3];
			}
		}
		elseif (isset($_SERVER['SERVER_SOFTWARE']))
		{
			if (preg_match('|Apache\/(\d+)\.(\d+)\.(\d+)|', $_SERVER['SERVER_SOFTWARE'], $version))
			{
				return $version[1].'.'.$version[2].'.'.$version[3];
			} 
		}
		
		return '(unknown)';
	}

?>


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
		
		<h1>MAIN PAGE</h1>
		
	</article>
	<!-- End content -->
	
