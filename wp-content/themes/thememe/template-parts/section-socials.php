<?php 
	$socials_data = ot_get_option( 'socials' );
	
	if(!empty($socials_data)){ ?>

	<ul class="socials list-inline">
		
		<?php foreach ($socials_data as $key => $value) {?>
		<li><a href="<?php echo $value['link']?>" title="<?php $value['title']?>"><img src="<?php echo $value['icon']?>"></a></li>
		<?php } //end foreach ?>

	</ul>

<?php 
	}//end if
?>
