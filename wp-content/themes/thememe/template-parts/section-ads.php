<?php 
	$ads_data = ot_get_option( 'ads' );
	
	if(!empty($ads_data)){ ?>

		<ul class="ads list-unstyled">
			
			<?php foreach ($ads_data as $key => $value) {
			?>
			<li>
			<?php
				if(empty($value['embed_code'])){
			?>

				<a href="<?php echo $value['link']?>" title="<?php $value['title']?>" target="_blank"><img src="<?php echo $value['ads_image']?>"></a>
				
				<?php }else{ ?>

				<?php echo $value['embed_code']?>

				<?php } ?>

			</li>

			<?php } //end foreach ?>
		</ul>

<?php }//end if?>
